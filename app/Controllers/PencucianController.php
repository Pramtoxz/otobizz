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
use App\Models\Pencucian as ModelPencucian;



class PencucianController extends BaseController
{

    public function detail($idpencucian)
    {
        $db = db_connect();
        
        // Join tabel pencucian dengan pelanggan, paket, dan karyawan
        $pencucianQuery = $db
            ->table('pencucian')
            ->select('pencucian.*, 
                     pelanggan.nama as nama_pelanggan, 
                     pelanggan.alamat, 
                     pelanggan.nohp, 
                     pelanggan.platnomor,
                     paket_cucian.namapaket, 
                     paket_cucian.harga, 
                     paket_cucian.jenis,
                     karyawan.nama as nama_karyawan')
            ->join('pelanggan', 'pelanggan.idpelanggan = pencucian.idpelanggan')
            ->join('paket_cucian', 'paket_cucian.idpaket = pencucian.idpaket')
            ->join('karyawan', 'karyawan.idkaryawan = pencucian.idkaryawan')
            ->where('pencucian.idpencucian', $idpencucian);
        
        $pencucianData = $pencucianQuery->get()->getRowArray();

        if (!$pencucianData) {
            return redirect()->back()->with('error', 'Data pencucian tidak ditemukan');
        }

        // Membuat QR Code untuk tracking pencucian
        $qrCode = QrCode::create("http://localhost:8080/pencucian/tracking/$idpencucian")
            ->setSize(300)
            ->setMargin(10);

        $writer = new PngWriter();
        $qrCodeImage = $writer->write($qrCode)->getDataUri();

        $data = [
            'qrCodeImage' => $qrCodeImage,
            'pencucian' => $pencucianData
        ];

        return view('pencucian/detail', $data);
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
                ->select('pencucian.idpencucian,pencucian.tgl,  pelanggan.nama, pelanggan.platnomor, paket_cucian.namapaket , karyawan.nama as nama_karyawan, pencucian.status')
                ->join('pelanggan', 'pelanggan.idpelanggan = pencucian.idpelanggan')
                ->join('paket_cucian', 'paket_cucian.idpaket = pencucian.idpaket')
                ->join('karyawan', 'karyawan.idkaryawan = pencucian.idkaryawan')
                ->groupBy('idpencucian');
            return DataTable::of($produk)
                ->add('action', function ($row) {
                    $button1 = '<button type="button" class="btn btn-primary btn-sm btn-detail" data-idpencucian="' . $row->idpencucian . '" ><i class="fas fa-eye"></i></button>';
                    $buttonsGroup = '<div style="display: flex;">' . $button1;
                    if ($row->status != 'selesai') {
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
        
        $debug_date = $this->request->getGet('debug_date');
        
        if (!empty($debug_date) && ENVIRONMENT !== 'production') {
            $today = date('Ymd', strtotime($debug_date));
        } else {
            $today = date('Ymd');
        }
        
        $prefix = "FKP-$today-";
        
        $query = $db->query("SELECT idpencucian FROM pencucian WHERE idpencucian LIKE ?", ["$prefix%"]);
        $results = $query->getResultArray();
        
        if (empty($results)) {
            $nextNo = 1;
        } else {
            $numbers = [];
            foreach ($results as $row) {
                $num = substr($row['idpencucian'], strlen($prefix));
                if (is_numeric($num)) {
                    $numbers[] = (int)$num;
                }
            }
            
            if (!empty($numbers)) {
                $nextNo = max($numbers) + 1;
            } else {
                $nextNo = 1;
            }
        }
        
        $next_id = $prefix . str_pad($nextNo, 4, '0', STR_PAD_LEFT);
        
        $data = [
            'next_id' => $next_id,
            'debug_date' => $debug_date
        ];
        return view('pencucian/formtambah', $data);
    }

    public function getPelanggan()
    {
        return view('pencucian/getpelanggan');
    }

    public function viewGetPelanggan()
    {
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $pelanggan = $db->table('pelanggan')
                ->select('idpelanggan, nama as nama_pelanggan, alamat, nohp, platnomor');

            return DataTable::of($pelanggan)
                ->add('action', function ($row) {
                    $button1 = '<button type="button" class="btn btn-primary btn-pilihpelanggan" 
                                data-idpelanggan="' . $row->idpelanggan . '" 
                                data-nama_pelanggan="' . esc($row->nama_pelanggan) . '"
                                data-alamat="' . esc($row->alamat) . '"
                                data-nohp="' . esc($row->nohp) . '"
                                data-platnomor="' . esc($row->platnomor) . '">Pilih</button>';
                    return $button1;
                }, 'last')
                ->addNumbering()
                ->toJson();
        }
    }

    public function getPaket()
    {
        return view('pencucian/getpaket');
    }

    public function viewGetPaket()
    {
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $paket = $db->table('paket_cucian')
                ->select('idpaket, namapaket, harga, jenis, keterangan');

            return DataTable::of($paket)
                ->add('action', function ($row) {
                    $button1 = '<button type="button" class="btn btn-primary btn-pilihpaket" 
                                data-idpaket="' . $row->idpaket . '" 
                                data-namapaket="' . esc($row->namapaket) . '"
                                data-harga="' . $row->harga . '"
                                data-jenis="' . esc($row->jenis) . '">Pilih</button>';
                    return $button1;
                }, 'last')
                ->addNumbering()
                ->edit('harga', function ($row) {
                    return 'Rp. ' . number_format($row->harga, 0, ',', '.');
                })
                ->toJson();
        }
    }

    public function getKaryawan()
    {
        return view('pencucian/getkaryawan');
    }

    public function viewGetKaryawan()
    {
        if ($this->request->isAJAX()) {
            $db = db_connect();
            $karyawan = $db->table('karyawan')
                ->select('idkaryawan, nama as namakaryawan, alamat, nohp');

            return DataTable::of($karyawan)
                ->add('action', function ($row) {
                    $button1 = '<button type="button" class="btn btn-primary btn-pilihkaryawan" 
                                data-idkaryawan="' . $row->idkaryawan . '" 
                                data-namakaryawan="' . esc($row->namakaryawan) . '"
                                data-alamat="' . esc($row->alamat) . '"
                                data-nohp="' . esc($row->nohp) . '">Pilih</button>';
                    return $button1;
                }, 'last')
                ->addNumbering()
                ->toJson();
        }
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $idpencucian = $this->request->getPost('idpencucian');
            $idpelanggan = $this->request->getPost('idpelanggan');
            $idpaket = $this->request->getPost('idpaket');
            $idkaryawan = $this->request->getPost('idkaryawan');
            $tgl = date('Y-m-d');
            $jamdatang = date('H:i:s');

            $rules = [
                'idpelanggan' => [
                    'label' => 'Pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'idpaket' => [
                    'label' => 'Paket',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'idkaryawan' => [
                    'label' => 'Karyawan',
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
                $db->table('pencucian')->insert([
                    'idpencucian' => $idpencucian,
                    'idpelanggan' => $idpelanggan,
                    'idpaket' => $idpaket,
                    'idkaryawan' => $idkaryawan,
                    'tgl' => $tgl,
                    'jamdatang' => $jamdatang,
                    'status' => 'diproses',
                ]);

                $json = [
                    'sukses' => 'Data Pencucian Berhasil Ditambahkan',
                    'idpencucian' => $idpencucian
                ];
            }
            return $this->response->setJSON($json);
        }
    }
    public function delete()
    {
        if ($this->request->isAJAX()) {
            $idpencucian = $this->request->getPost('idpencucian');

            $db = db_connect();
            $db->table('pencucian')->where('idpencucian', $idpencucian)->delete();
            
            $json = [
                'sukses' => 'Data Pencucian Berhasil Dihapus'
            ];

            return $this->response->setJSON($json);
        }
    }



    public function formedit($idpencucian)
    {
        $db = db_connect();
        $pencucian = $db->table('pencucian')
            ->select('pencucian.*, 
                     pelanggan.nama as nama_pelanggan, 
                     pelanggan.alamat, 
                     pelanggan.nohp, 
                     pelanggan.platnomor,
                     paket_cucian.namapaket, 
                     paket_cucian.harga, 
                     paket_cucian.jenis,
                     karyawan.nama as nama_karyawan,
                     karyawan.alamat as alamat_karyawan,
                     karyawan.nohp as nohp_karyawan')
            ->join('pelanggan', 'pelanggan.idpelanggan = pencucian.idpelanggan')
            ->join('paket_cucian', 'paket_cucian.idpaket = pencucian.idpaket')
            ->join('karyawan', 'karyawan.idkaryawan = pencucian.idkaryawan')
            ->where('idpencucian', $idpencucian)
            ->get()->getRowArray();

        if (!$pencucian) {
            return redirect()->back()->with('error', 'Data Pencucian tidak ditemukan');
        }

        $data = [
            'pencucian' => $pencucian
        ];

        return view('pencucian/formedit', $data);
    }


    public function updatedata($idpencucian = null)
    {
        if ($this->request->isAJAX()) {
            if (!$idpencucian) {
                $idpencucian = $this->request->getPost('idpencucian');
            }
            $idpelanggan = $this->request->getPost('idpelanggan');
            $idpaket = $this->request->getPost('idpaket');
            $idkaryawan = $this->request->getPost('idkaryawan');

            $rules = [
                'idpelanggan' => [
                    'label' => 'Pelanggan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'idpaket' => [
                    'label' => 'Paket',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'idkaryawan' => [
                    'label' => 'Karyawan',
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
            $dataPencucian = [
                'idpelanggan' => $idpelanggan,
                'idpaket' => $idpaket,
                'idkaryawan' => $idkaryawan,
            ];
            
            $db->table('pencucian')->where('idpencucian', $idpencucian)->update($dataPencucian);

            return $this->response->setJSON(['sukses' => 'Update data berhasil']);
        }
    }

    public function ubahstatus()
    {
        if ($this->request->isAJAX()) {
            $idpencucian = $this->request->getPost('idpencucian');

            $model = new ModelPencucian();
            $pencucian = $model->where('idpencucian', $idpencucian)->first();

            if ($pencucian) {
                // Hanya mengubah antara 'diproses' dan 'dijemput' saja
                if ($pencucian['status'] == 'diproses') {
                    $statusBaru = 'dijemput';
                } else {
                    $statusBaru = 'diproses';
                }
                $model->update($idpencucian, ['status' => $statusBaru]);

                $json = [
                    'sukses' => 'Status Pencucian berhasil diubah'
                ];
            } else {
                $json = [
                    'error' => 'Pencucian tidak ditemukan'
                ];
            }

            return $this->response->setJSON($json);
        }
    }

    public function tracking($idpencucian = null)
    {
        if (!$idpencucian) {
            return redirect()->to(base_url());
        }

        $db = db_connect();
        
        // Join tabel pencucian dengan pelanggan, paket, dan karyawan untuk tracking
        $pencucianQuery = $db
            ->table('pencucian')
            ->select('pencucian.*, 
                     pelanggan.nama as nama_pelanggan, 
                     pelanggan.alamat, 
                     pelanggan.nohp, 
                     pelanggan.platnomor,
                     paket_cucian.namapaket, 
                     paket_cucian.harga, 
                     paket_cucian.jenis,
                     karyawan.nama as nama_karyawan')
            ->join('pelanggan', 'pelanggan.idpelanggan = pencucian.idpelanggan')
            ->join('paket_cucian', 'paket_cucian.idpaket = pencucian.idpaket')
            ->join('karyawan', 'karyawan.idkaryawan = pencucian.idkaryawan')
            ->where('pencucian.idpencucian', $idpencucian);
        
        $pencucianData = $pencucianQuery->get()->getRowArray();

        if (!$pencucianData) {
            $data = [
                'error' => 'ID Pencucian tidak ditemukan. Pastikan ID yang Anda masukkan benar.'
            ];
        } else {
            $data = [
                'pencucian' => $pencucianData
            ];
        }

        return view('home/tracking', $data);
    }
}