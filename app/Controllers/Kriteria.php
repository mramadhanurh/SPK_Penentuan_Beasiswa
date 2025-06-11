<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKriteria;

class Kriteria extends BaseController
{
    public function __construct()
    {
        $this->ModelKriteria = new ModelKriteria();
    }

    public function index()
    {
        $data = [
            'judul' => 'Kriteria',
            'subjudul' => 'Kriteria',
            'menu' => 'kriteria',
            'submenu' => '',
            'page' => 'v_kriteria',
            'kriteria' => $this->ModelKriteria->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot_kriteria' => $this->request->getPost('bobot_kriteria'),
        ];
        $this->ModelKriteria->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('Kriteria');
    }

    public function UpdateData($id_kriteria)
    {
        $data = [
            'id_kriteria' => $id_kriteria,
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot_kriteria' => $this->request->getPost('bobot_kriteria'),
        ];
        $this->ModelKriteria->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('Kriteria');
    }

    public function DeleteData($id_kriteria)
    {
        $data = [
            'id_kriteria' => $id_kriteria,
        ];
        $this->ModelKriteria->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('Kriteria');
    }
}
