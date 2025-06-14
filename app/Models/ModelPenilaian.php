<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenilaian extends Model
{
    protected $table = 'tbl_penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $allowedFields = ['id_user', 'id_kriteria', 'nilai'];
}
