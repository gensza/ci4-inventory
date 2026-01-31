<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Barang extends BaseController
{
    protected $db, $validation;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->validation = \Config\Services::validation();
    }
    public function index()
    {
        return view('barangView');
    }

    public function barangList()
    {

        $draw   = $this->request->getPost('draw');
        $start  = $this->request->getPost('start');
        $length = $this->request->getPost('length');
        $search = $this->request->getPost('search')['value'];

        $builder = $this->db->table('Barang a')
            ->join('Kategori b', 'b.ID = a.IDKategori');

        // total data
        $totalData = clone $builder;
        $recordsTotal = $totalData->countAllResults();

        // filter search
        if ($search) {
            $builder->groupStart()
                ->like('a.NamaBarang', $search)
                ->orLike('b.Nama', $search)
                ->groupEnd();
        }

        // total filtered
        $totalFiltered = clone $builder;
        $recordsFiltered = $totalFiltered->countAllResults();

        // data
        $data = $builder
            ->select('
                a.ID, a.NamaBarang, a.Harga, a.TanggalPembelian, 
                b.Nama AS NamaKategori
            ')
            ->orderBy('a.ID', 'DESC')
            ->limit($length, $start)
            ->get()
            ->getResultArray();

        $rows = [];
        $no   = $start + 1;

        foreach ($data as $row) {
            $rows[] = [
                'no' => $no++,
                'nama' => esc($row['NamaBarang']),
                'kategori' => esc($row['NamaKategori']),
                'harga' => esc('Rp ' . $row['Harga']),
                'tglPembelian' => date('d M Y', strtotime($row['TanggalPembelian'])),
                'action' => '
                    <button class="btn btn-sm btn-warning btn-edit" data-id="' . $row['ID'] . '"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-danger btn-delete" data-id="' . $row['ID'] . '"><i class="bi bi-trash"></i></button>
                '
            ];
        }

        return $this->response->setJSON([
            'draw' => intval($draw),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $rows
        ]);
    }

    public function kategoriList()
    {
        $builder = $this->db->table('Kategori');

        $data = $builder->get()->getResultArray();

        return $this->response->setJSON($data);
    }

    public function barangInsert()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setJSON([
                'status' => false,
                'message' => 'Invalid request'
            ]);
        }

        $rules = [
            'NamaBarang'        => 'required',
            'IDKategori'        => 'required',
            'Harga'             => 'required|numeric',
            'TanggalPembelian'  => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => false,
                'message' => $this->validation->getErrors()
            ]);
        }

        $builder = $this->db->table('Barang')
            ->insert([
                'NamaBarang' => $this->request->getPost('NamaBarang'),
                'IDKategori' => $this->request->getPost('IDKategori'),
                'Harga' => $this->request->getPost('Harga'),
                'TanggalPembelian' => $this->request->getPost('TanggalPembelian'),
            ]);

        return $this->response->setJSON([
            'status' => $builder,
            'message' => 'Insert Data Success'
        ]);
    }

    public function barangEdit()
    {
        $id = $this->request->getPost('id');

        $builder = $this->db->table('Barang a')
            ->select('
                a.ID, a.NamaBarang, a.Harga, a.TanggalPembelian, 
                b.Nama AS NamaKategori, a.IDKategori
            ')
            ->join('Kategori b', 'b.ID = a.IDKategori')
            ->where('a.ID', $id)
            ->get()
            ->getRowArray();

        return $this->response->setJSON($builder);

        var_dump($request->getPost());
    }

    public function barangUpdate()
    {
        $builder = $this->db->table('Barang')
            ->where('id', $this->request->getPost('id'))
            ->update([
                'NamaBarang' => $this->request->getPost('NamaBarang'),
                'IDKategori' => $this->request->getPost('IDKategori'),
                'Harga' => $this->request->getPost('Harga'),
                'TanggalPembelian' => $this->request->getPost('TanggalPembelian'),
            ]);

        return $this->response->setJSON($builder);
    }

    public function barangDelete()
    {
        $builder = $this->db->table('Barang')
            ->where('ID', $this->request->getPost('id'))
            ->delete();

        return $this->response->setJSON($builder);
    }
}
