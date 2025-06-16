<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'menu' => 'admin',
            'page' => 'v_admin',
            'jml_kriteria' => $this->ModelAdmin->JumlahKriteria(),
            'jml_sub_kriteria' => $this->ModelAdmin->JumlahSubKriteria(),
            'jml_mahasiswa' => $this->ModelAdmin->JumlahMahasiswa(),
            'jml_user' => $this->ModelAdmin->JumlahUser(),
        ];
        return view('v_template', $data);
    }
}
