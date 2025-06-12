<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKriteria extends Model
{
    protected $table      = 'tbl_kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $allowedFields = ['nama_kriteria', 'bobot_kriteria'];

    public function AllData()
    {
        return $this->db->table('tbl_kriteria')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kriteria')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_kriteria')
            ->where('id_kriteria', $data['id_kriteria'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kriteria')
            ->where('id_kriteria', $data['id_kriteria'])
            ->delete($data);
    }
}
