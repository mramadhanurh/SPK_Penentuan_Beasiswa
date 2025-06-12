<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPairwiseKriteria extends Model
{
    protected $table      = 'tbl_pairwise_kriteria';
    protected $primaryKey = 'id_pairwise_kriteria';
    protected $allowedFields = ['id_kriteria_1', 'id_kriteria_2', 'nilai'];
}
