<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSubKriteria extends Model
{
    protected $table      = 'tbl_sub_kriteria';
    protected $primaryKey = 'id_sub_kriteria';
    protected $allowedFields = ['id_kriteria', 'nama_sub_kriteria', 'bobot_sub_kriteria'];

    public function AllData()
    {
        return $this->db->table('tbl_sub_kriteria')
            ->join('tbl_kriteria', 'tbl_kriteria.id_kriteria=tbl_sub_kriteria.id_kriteria')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_sub_kriteria')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_sub_kriteria')
            ->where('id_sub_kriteria', $data['id_sub_kriteria'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_sub_kriteria')
            ->where('id_sub_kriteria', $data['id_sub_kriteria'])
            ->delete($data);
    }
}
