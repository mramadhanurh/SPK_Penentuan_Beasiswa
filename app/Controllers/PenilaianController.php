<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use App\Models\ModelKriteria;
use App\Models\ModelSubKriteria;
use App\Models\ModelPenilaian;

class PenilaianController extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelKriteria = new ModelKriteria();
        $this->ModelSubKriteria = new ModelSubKriteria();
        $this->ModelPenilaian = new ModelPenilaian();
    }

    public function index()
    {
        $data = [
            'judul'     => 'Penilaian Mahasiswa',
            'subjudul'  => 'Input Nilai',
            'menu'      => 'penilaian',
            'submenu'   => '',
            'page'      => 'penilaian/form_nilai',
            'mahasiswa' => $this->ModelUser->where('level', 3)->findAll(),
            'kriteria'  => $this->ModelKriteria->findAll(),
            'subkriteria' => $this->ModelSubKriteria->findAll(),
        ];
        return view('v_template', $data);
    }

    public function simpan()
    {
        $id_user = $this->request->getPost('id_user');
        $kriteria = $this->ModelKriteria->findAll();

        foreach ($kriteria as $k) {
            $nilai = $this->request->getPost('nilai_' . $k['id_kriteria']);
            $this->ModelPenilaian->save([
                'id_user' => $id_user,
                'id_kriteria' => $k['id_kriteria'],
                'nilai' => $nilai
            ]);
        }

        return redirect()->to('PenilaianController')->with('success', 'Nilai berhasil disimpan.');
    }
}
