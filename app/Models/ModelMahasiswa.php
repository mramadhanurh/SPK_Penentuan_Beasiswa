<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{
    protected $table = 'tbl_mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $allowedFields = ['jenjang', 'nim', 'fakultas', 'program_studi', 'ipk', 'semester'];
}
