<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        return view('dashboardView');
    }

    public function totalKategori()
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
                b.Nama AS NamaKategori
            ')
            ->selectSum('a.Harga', 'TotalHarga')
            ->orderBy('TotalHarga', 'DESC')
            ->limit($length, $start)
            ->groupBy('a.IDKategori')
            ->get()
            ->getResultArray();

        $rows = [];
        $no   = $start + 1;

        foreach ($data as $row) {
            $rows[] = [
                'no' => $no++,
                'kategori' => esc($row['NamaKategori']),
                'totalharga' => esc('Rp ' . $row['TotalHarga']),
            ];
        }

        return $this->response->setJSON([
            'draw' => intval($draw),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $rows
        ]);
    }

    public function totalData()
    {
        $builder = $this->db->table('Kategori');

        $countKategori = $builder->countAllResults();

        $builder = $this->db->table('Barang');
        $countBarang = $builder->countAllResults();

        $datas = [
            'countKategori' => $countKategori,
            'countBarang' => $countBarang
        ];

        return $this->response->setJSON($datas);
    }
}
