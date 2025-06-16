<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function JumlahKriteria()
    {
        return $this->db->table('tbl_kriteria')->countAll();
    }

    public function JumlahSubKriteria()
    {
        return $this->db->table('tbl_sub_kriteria')->countAll();
    }

    public function JumlahMahasiswa()
    {
        return $this->db->table('tbl_mahasiswa')->countAll();
    }

    public function JumlahUser()
    {
        return $this->db->table('tbl_user')->countAll();
    }
}
