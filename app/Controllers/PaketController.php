<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Paket;
use Hermawan\DataTables\DataTable;

class PaketController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kelola Data Paket'
        ];
        return view('paket/datapaket', $data); // View kamu simpan di app/Views/paket/data.php
    }

    public function viewPaket()
    {
        $db = db_connect();
        $builder = $db->table('paket_cucian')
            ->select('idpaket, namapaket, harga, keterangan');

        return DataTable::of($builder)
            ->edit('harga', function($row){
                return 'Rp ' . number_format($row->harga, 0, ',', '.');
            })
            ->add('action', function ($row) {
                $button1 = '<button type="button" class="btn btn-primary btn-sm btn-detail" data-idpaket="' . $row->idpaket . '" data-toggle="modal" data-target="#detailModal"><i class="fas fa-eye"></i></button>';
                $button2 = '<button type="button" class="btn btn-secondary btn-sm btn-edit" data-idpaket="' . $row->idpaket . '" style="margin-left: 5px;"><i class="fas fa-pencil-alt"></i></button>';
                $button3 = '<button type="button" class="btn btn-danger btn-sm btn-delete" data-idpaket="' . $row->idpaket . '" style="margin-left: 5px;"><i class="fas fa-trash"></i></button>';

                $buttonsGroup = '<div style="display: flex;">' . $button1 . $button2 . $button3 . '</div>';
                return $buttonsGroup;
            }, 'last')
            ->addNumbering()
            ->toJson();
    }

    public function formtambah()
    {
        $db = db_connect();
        $query = $db->query("SELECT CONCAT('PKT', LPAD(IFNULL(MAX(SUBSTRING(idpaket, 4)) + 1, 1), 4, '0')) AS next_id FROM paket_cucian");
        $row = $query->getRow();
        $data = [
            'next_id' => $row->next_id
        ];
        return view('paket/formtambah', $data);
    }

    public function save()
    {
        if ($this->request->isAJAX()) {
            $idpaket = $this->request->getPost('idpaket');
            $namapaket = $this->request->getPost('namapaket');
            $harga = $this->request->getPost('harga');
            $keterangan = $this->request->getPost('keterangan');
            $rules = [
                'namapaket' => [
                    'label' => 'Nama Paket',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'harga' => [
                    'label' => 'Harga',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan' => [
                    'label' => 'Deskripsi',
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
                    $modelPaket = new Paket();
                    $modelPaket->insert([
                        'idpaket' => $idpaket,
                        'namapaket' => $namapaket,
                        'harga' => $harga,
                        'keterangan' => $keterangan,
                    ]);

                    $json = [
                        'sukses' => 'Berhasil Simpan Data'
                    ];
                } 
            }
            echo json_encode($json);
        }

    public function formedit($idpaket)
    {
        $model = new Paket();
        $paket = $model->find($idpaket);

        if (!$paket) {
            return redirect()->to('/paket')->with('error', 'Data Paket tidak ditemukan');
        }
        
        $data = [
            'paket' => $paket
        ];

        return view('paket/formedit', $data);
    }

    public function updatedata($idpaket)
    {
         $idpaket = $this->request->getPost('idpaket');
            $namapaket = $this->request->getPost('namapaket');
            $harga = $this->request->getPost('harga');
            $keterangan = $this->request->getPost('keterangan');
            $rules = [
                'namapaket' => [
                    'label' => 'Nama Paket',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],

                'harga' => [
                    'label' => 'Harga',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'keterangan' => [
                    'label' => 'Deskripsi',
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

                return $this->response->setJSON([
                    'error' => $errors
                ]);
            }

            $model = new Paket();
            
            $dataUpdate = [
                'namapaket' => $namapaket,
                'harga' => $harga,
                'keterangan' => $keterangan,
            ];

            $model->update($idpaket, $dataUpdate);

            return $this->response->setJSON([
                'sukses' => 'Data paket berhasil diperbarui'
            ]);
            echo json_encode($json);
        }

    public function delete()
    {
        if ($this->request->isAJAX()) {
            $idpaket = $this->request->getPost('idpaket');
            $model = new Paket();
            $model->delete($idpaket);

            return $this->response->setJSON(['sukses' => 'Data paket berhasil dihapus']);
        }
    }

    public function detail($idpaket)
    {
        $model = new Paket();
        $paket = $model->find($idpaket);

        if (!$paket) {
            return redirect()->back()->with('error', 'Data paket tidak ditemukan');
        }

        return view('paket/detail', ['paket' => $paket]);
    }
}
