<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKriteria;
use App\Models\ModelSubKriteria;

class SubKriteria extends BaseController
{
    public function __construct()
    {
        $this->ModelKriteria = new ModelKriteria();
        $this->ModelSubKriteria = new ModelSubKriteria();
    }

    public function index()
    {
        $data = [
            'judul' => 'Sub Kriteria',
            'subjudul' => 'Sub Kriteria',
            'menu' => 'sub_kriteria',
            'submenu' => '',
            'page' => 'v_subkriteria',
            'subkriteria' => $this->ModelSubKriteria->AllData(),
            'kriteria' => $this->ModelKriteria->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_sub_kriteria' => $this->request->getPost('nama_sub_kriteria'),
            'id_kriteria' => $this->request->getPost('id_kriteria'),
            'bobot_sub_kriteria' => $this->request->getPost('bobot_sub_kriteria'),
        ];
        $this->ModelSubKriteria->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('SubKriteria');
    }

    public function UpdateData($id_sub_kriteria)
    {
        $data = [
            'id_sub_kriteria' => $id_sub_kriteria,
            'nama_sub_kriteria' => $this->request->getPost('nama_sub_kriteria'),
            'id_kriteria' => $this->request->getPost('id_kriteria'),
            'bobot_sub_kriteria' => $this->request->getPost('bobot_sub_kriteria'),
        ];
        $this->ModelSubKriteria->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('SubKriteria');
    }

    public function DeleteData($id_sub_kriteria)
    {
        $data = [
            'id_sub_kriteria' => $id_sub_kriteria,
        ];
        $this->ModelSubKriteria->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('SubKriteria');
    }
}
