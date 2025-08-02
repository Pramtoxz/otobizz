<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelDetailCucianMasuk;
use App\Models\ModelCucianMasuk;
use App\Models\SatuanModel;
use App\Models\JenisCucianModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\Alignment\LabelAlignment;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use App\Libraries\QRCodeGenerator;
use Endroid\QrCode\QrCode;



class PencucianController extends BaseController
{

    public function Detail($nofak = null)
    {
        $db = db_connect();
        $userQuery = $db
            ->table('cucianmasuk')
            ->select('cucianmasuk.nofak, cucianmasuk.tglmasuk, cucianmasuk.tglkeluar, konsumen.nama, konsumen.alamat, konsumen.nohp, cucianmasuk.grandtotal')
            ->join('konsumen', 'konsumen.idkonsumen = cucianmasuk.idkonsumen')
            ->where('nofak', $nofak);
        $user = $userQuery->get();

        $detailcucianmasuk = $db
            ->table('detailcucianmasuk')
            ->select('jeniscucian.jenis, satuan.namasatuan, berat, total')
            ->join('jeniscucian', 'jeniscucian.kdjeniscucian = detailcucianmasuk.kdjeniscucian', 'left')
            ->join('satuan', 'satuan.kdsatuan = detailcucianmasuk.kdsatuan', 'left')
            ->where('nofak', $nofak);
        $detail = $detailcucianmasuk->get();

        $userData = $user->getRow();
        $detailData = $detail->getResultArray();

        if (!$userData) {
            return redirect()->back();
        }

        // Membuat QR Code
        $qrCode = QrCode::create("http://localhost:8080/home/cekstatus/$nofak")
            ->setSize(300)
            ->setMargin(10);

        $writer = new PngWriter();
        $qrCodeImage = $writer->write($qrCode)->getDataUri();

        // Menambahkan nomor urut pada setiap item
        foreach ($detailData as $index => &$value) {
            $value['nomor'] = $index + 1;
            if (!empty($value['jenis']) && empty($value['namasatuan'])) {
                $value['berat'] .= ' KG';
            } elseif (empty($value['jenis']) && !empty($value['namasatuan'])) {
                $value['berat'] .= ' Helai';
            }
        }

        $data = [
            'qrCodeImage' => $qrCodeImage,
            'cucianmasuk' => $userData,
            'detail' => $detailData,
            'qrCodeImage' => $qrCodeImage
        ];

        return view('cucianmasuk/detail', $data);
    }



    public function index()
    {
        $title = [
            'title' => 'Kelola Pencucian'
        ];
        return view('pencucian/datapencucian', $title);
    }

    public function viewCucian()
    {
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $produk = $db->table('pencucian')
                ->select('pencucian.idpencucian,pencucian.tgl,  pelanggan.nama, pelanggan.platnomor, paket_cucian.namapaket ,pencucian.status')
                ->join('pelanggan', 'pelanggan.idpelanggan = pencucian.idpelanggan')
                ->join('paket_cucian', 'paket_cucian.idpaket = pencucian.idpaket')
                ->groupBy('idpencucian');
            return DataTable::of($produk)
                ->add('action', function ($row) {
                    $button1 = '<button type="button" class="btn btn-primary btn-sm btn-detail" data-idpencucian="' . $row->idpencucian . '" ><i class="fas fa-eye"></i></button>';
                    $buttonsGroup = '<div style="display: flex;">' . $button1;
                    if ($row->status != 3) {
                        $button2 = '<button type="button" class="btn btn-warning btn-sm btn-status" data-idpencucian="' . $row->idpencucian . '" style="margin-left: 5px;"><i class="fas fa-sync-alt"></i></button>';
                        $button3 = '<button type="button" class="btn btn-secondary btn-sm btn-edit" data-idpencucian="' . $row->idpencucian . '" style="margin-left: 5px;"><i class="fas fa-pencil-alt"></i></button>';
                        $button4 = '<button type="button" class="btn btn-danger btn-sm btn-delete" data-idpencucian="' . $row->idpencucian . '" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>';
                        $buttonsGroup .= $button2 . $button3 . $button4;
                    }
                    $buttonsGroup .= '</div>';
                    return $buttonsGroup;
                }, 'last')
                ->addNumbering()

                ->edit('status', function ($row) {
                    if ($row->status == 'diproses') {
                        return '<span class="badge bg-warning">Sedang Proses</span>';
                    } else if ($row->status == 'dijemput') {
                        return '<span class="badge bg-primary">Sudah bisa Dijemput</span>';
                    } else if ($row->status == 'selesai') {
                        return '<span class="badge bg-success">Selesai</span>';
                    }
                })
                ->toJson();
        }
    }

    public function formtambah()
    {
        $db = db_connect();
        $tanggal = date('Ymd'); // Format tanggal menjadi YYYYMMDD
        $randomNumber = mt_rand(100, 999); // Generate 3 angka acak
        $kode_otomatis = 'FAK-' . $tanggal . '-' . $randomNumber; // Format kode menjadi FAK-YYYYMMDD-RRR

        $db->table('temp')->emptyTable();
        $konsumen = $db->table('konsumen')->get()->getResultArray();
        $data = [
            'title' => 'Tambah Cucian Masuk',
            'nofak' => $kode_otomatis,
            'konsumen' => $konsumen,
        ];
        return view('cucianmasuk/formtambah', $data);
    }

    public function getJenis()
    {

        return view('cucianmasuk/getjenis');
    }

    public function viewGetJenis()
    {
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $jeniscucian = $db->table('jeniscucian')
                ->select('kdjeniscucian, jenis, harga');
            return DataTable::of($jeniscucian)
                ->add('action', function ($row) {
                    $button1 = '<button type="button" class="btn btn-primary btn-pilihobat"  data-kdjeniscucian="' . $row->kdjeniscucian . '" data-jenis="' . esc($row->jenis) . '" data-harga="' . $row->harga . '">
                                Pilih
                            </button>';
                    return $button1;
                }, 'last')
                ->addNumbering()
                ->toJson();
        }
    }


    public function getSatuan()
    {

        return view('cucianmasuk/getsatuan');
    }

    public function viewGetSatuan()
    {
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $satuan = $db->table('satuan')
                ->select('kdsatuan, namasatuan, harga');
            return DataTable::of($satuan)
                ->add('action', function ($row) {
                    $button1 = '<button type="button" class="btn btn-primary btn-pilihsatuan"  data-kdsatuan="' . $row->kdsatuan . '" data-namasatuan="' . esc($row->namasatuan) . '" data-harga="' . $row->harga . '">
                                Pilih
                            </button>';
                    return $button1;
                }, 'last')
                ->addNumbering()
                ->toJson();
        }
    }

    public function viewTemp()
    {
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $produk = $db->table('temp')->select('id, jeniscucian.jenis, satuan.namasatuan, temp.berat, temp.total')
                ->join('jeniscucian', 'jeniscucian.kdjeniscucian = temp.kdjeniscucian', 'left')
                ->join('satuan', 'satuan.kdsatuan = temp.kdsatuan', 'left');
            return DataTable::of($produk)
                ->add('action', function ($row) {
                    return
                        '<a href="#" class="btn btn-danger btn-sm btn-delete" data-id="' . $row->id . '" data-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash"></i></a>';
                }, 'last')
                ->addNumbering()
                ->format('jenis', function ($value, $meta) {
                    return $value ?: '0';
                })
                ->format('namasatuan', function ($value, $meta) {
                    return $value ?: '0';
                })
                ->hide('id')
                ->toJson();
        }
    }

    public function addTemp()
    {
        if ($this->request->isAJAX()) {
            $kdjeniscucian = $this->request->getPost('kdjeniscucian');
            $kdsatuan = $this->request->getPost('kdsatuan');
            $berat = $this->request->getPost('berat');
            $total = $this->request->getPost('total');

            $rules = [
                'berat' => [
                    'label' => 'Berat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'total' => [
                    'label' => 'Total',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ];

            if (!$this->validate($rules)) {
                $errors = [];
                foreach ($rules as $field => $rule) {
                    $errors["error_$field"] = $this->validator->getError($field);
                }

                $json = [
                    'error' => $errors
                ];
            } else {
                $db = db_connect();
                $db->table('temp')->insert([
                    'kdjeniscucian' => $kdjeniscucian,
                    'kdsatuan' => $kdsatuan,
                    'berat' => $berat,
                    'total' => $total,

                ]);

                $json = [
                    'sukses' => 'Berhasil Ditambahkan'
                ];
            }
            return $this->response->setJSON($json);
        }
    }

    public function deleteTemp()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');

            $db = db_connect();
            $db->table('temp')->where('id', $id)->delete();
            $json = [
                'sukses' => 'Data berhasil dihapus'
            ];


            return $this->response->setJSON($json);
        }
    }
    public function deleteAllTemp()
    {
        if ($this->request->isAJAX()) {

            $db = db_connect();
            $db->table('temp')->emptyTable();
            $json = [
                'sukses' => 'Semua data berhasil dihapus'
            ];

            return $this->response->setJSON($json);
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $nofak = $this->request->getPost('nofak');
            $idkonsumen = $this->request->getPost('idkonsumen');
            $tglmasuk = $this->request->getPost('tglmasuk');
            $tglkeluar = $this->request->getPost('tglkeluar');
            $grandtotal = $this->request->getPost('grandtotal');


            $rules = [
                'idkonsumen' => [
                    'label' => 'Nama Konsumen',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tglmasuk' => [
                    'label' => 'Tanggal Masuk',
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tglkeluar' => [
                    'label' => 'Estimasi Selesai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ];

            if (!$this->validate($rules)) {
                $errors = [];
                foreach ($rules as $field => $rule) {
                    $errors["error_$field"] = $this->validator->getError($field);
                }

                $json = [
                    'error' => $errors
                ];
            } else {

                $model = new ModelCucianMasuk();
                $model->insert([
                    'nofak' => $nofak,
                    'idkonsumen' => $idkonsumen,
                    'tglmasuk' => $tglmasuk,
                    'tglkeluar' => $tglkeluar,
                    'grandtotal' => $grandtotal,
                    'status' => 1,
                ]);

                $db = db_connect();
                $tempMasuk = $db->table('temp')->get()->getResultArray();
                foreach ($tempMasuk as $item) {
                    $model = new ModelDetailCucianMasuk();
                    $model->insert([
                        'nofak' => $nofak,
                        'kdjeniscucian' => $item['kdjeniscucian'],
                        'kdsatuan' => $item['kdsatuan'],
                        'berat' => $item['berat'],
                        'total' => $item['total'],
                        'statusdetail' => 1,
                    ]);
                }
                $db->table('temp')->emptyTable();

                $json = [
                    'sukses' => 'Berhasil Ditambahkan'
                ];
            }
            return $this->response->setJSON($json);
        }
    }
    public function delete()
    {
        if ($this->request->isAJAX()) {
            $nofak = $this->request->getPost('nofak');


            $modelDetail = new ModelDetailCucianMasuk();
            $modelDetail->where('nofak', $nofak)->delete();

            $model = new ModelCucianMasuk();
            $model->where('nofak', $nofak)->delete();
            $json = [
                'sukses' => 'Data Peminjaman Berhasil Dihapus'
            ];

            return $this->response->setJSON($json);
        }
    }



    public function formedit($nofak)
    {
        $db = db_connect();
        $model = new ModelCucianMasuk();
        $konsumen = $db->table('konsumen')->get()->getResultArray();
        $cucianmasuk = $model->where('nofak', $nofak)->first();


        if (!$cucianmasuk) {
            return redirect()->back()->with('error', 'Data Cucian Masuk tidak ditemukan');
        }

        $konsumenData = $db->table('konsumen')->where('idkonsumen', $cucianmasuk['idkonsumen'])->get()->getRowArray();
        if (!$konsumenData) {
            return redirect()->back()->with('error', 'Data Konsumen tidak ditemukan');
        }

        $cekData = $db->table('temp')->where('nofak', $nofak)->countAllResults();
        if ($cekData == 0) {
            $detailCucianMasuk = $db->table('detailcucianmasuk')
                ->select('kdjeniscucian, kdsatuan, berat, total')
                ->where('nofak', $nofak)
                ->get();

            foreach ($detailCucianMasuk->getResultArray() as $row) {
                $db->table('temp')->insert([
                    'nofak' => $nofak,
                    'kdjeniscucian' => $row['kdjeniscucian'],
                    'kdsatuan' => $row['kdsatuan'],
                    'berat' => $row['berat'],
                    'total' => $row['total'],
                ]);
            }
        }

        $data = [
            'cucianmasuk' => $cucianmasuk,
            'konsumen' => $konsumen,
            'namaKonsumen' => $konsumenData['nama'],
        ];

        return view('cucianmasuk/formedit', $data);
    }


    public function updatedata()
    {
        if ($this->request->isAJAX()) {
            $nofak = $this->request->getPost('nofak');
            $idkonsumen = $this->request->getPost('idkonsumen');
            $tglmasuk = $this->request->getPost('tglmasuk');
            $tglkeluar = $this->request->getPost('tglkeluar');
            $grandtotal = $this->request->getPost('grandtotal');


            $rules = [
                'idkonsumen' => [
                    'label' => 'Nama Konsumen',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tglmasuk' => [
                    'label' => 'Tanggal Masuk',
                    'rules' => 'required|',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'tglkeluar' => [
                    'label' => 'Estimasi Selesai',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

            ];

            if (!$this->validate($rules)) {
                $errors = [];
                foreach ($rules as $field => $rule) {
                    $errors["error_$field"] = $this->validator->getError($field);
                }
                return $this->response->setJSON(['error' => $errors]);
            }

            $db = db_connect();
            $ModelCucianMasuk = new ModelCucianMasuk();
            $modelDetail = new ModelDetailCucianMasuk();
            $datacucianmasuk = [
                'nofak' => $nofak,
                'idkonsumen' => $idkonsumen,
                'tglmasuk' => $tglmasuk,
                'tglkeluar' => $tglkeluar,
                'grandtotal' => $grandtotal,
                'status' => 1,
            ];
            $ModelCucianMasuk->update($nofak, $datacucianmasuk);
            $detailCucianMasuk = $modelDetail->where('nofak', $nofak)->findAll();
            foreach ($detailCucianMasuk as $itemdetail) {
                $db->table('detailcucianmasuk')
                    ->where('nofak', $itemdetail['nofak'])
                    ->set('total', 'total + ' . $itemdetail['total'], false)
                    ->set('kdjeniscucian', $itemdetail['kdjeniscucian'])
                    ->set('kdsatuan', $itemdetail['kdsatuan'])
                    ->set('berat', $itemdetail['berat'])
                    ->set('statusdetail', 1)
                    ->update();
            }
            $modelDetail->where('nofak', $nofak)->delete();


            $tempMasuk = $db->table('temp')->get()->getResultArray();
            foreach ($tempMasuk as $item) {
                $dataDetail = [
                    'nofak' => $nofak,
                    'kdjeniscucian' => $item['kdjeniscucian'],
                    'kdsatuan' => $item['kdsatuan'],
                    'berat' => $item['berat'],
                    'total' => $item['total'],
                ];
                $modelDetail->insert($dataDetail);
                $db->table('detailcucianmasuk')
                    ->where('nofak', $item['nofak'])
                    ->set('total', 'total - ' . $item['total'], false)
                    ->update();
            }

            $db->table('temp')->emptyTable();

            return $this->response->setJSON(['sukses' => 'Update data berhasil']);
        }
    }

    public function ubahstatus()
    {
        if ($this->request->isAJAX()) {
            $nofak = $this->request->getPost('nofak');
            $status = $this->request->getPost('status');

            $model = new ModelCucianMasuk(); // Ganti dengan model yang sesuai
            $cucianmasuk = $model->where('nofak', $nofak)->first();

            if ($cucianmasuk) {
                $statusBaru = ($cucianmasuk['status'] == 1) ? 2 : ($cucianmasuk['status'] == 2 ? 1 : $cucianmasuk['status']);
                $model->update($nofak, ['status' => $statusBaru]);

                $json = [
                    'sukses' => 'Status Cucian Masuk berhasil diubah'
                ];
            } else {
                $json = [
                    'error' => 'Cucian Masuk tidak ditemukan'
                ];
            }

            return $this->response->setJSON($json);
        }
    }
}