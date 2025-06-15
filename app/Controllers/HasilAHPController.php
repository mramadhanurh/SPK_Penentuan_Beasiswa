<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;
use App\Models\ModelKriteria;
use App\Models\ModelPenilaian;

class HasilAHPController extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelKriteria = new ModelKriteria();
        $this->ModelPenilaian = new ModelPenilaian();
    }

    public function index()
    {
        // Ambil semua mahasiswa calon
        $mahasiswa = $this->ModelUser->where('level', 3)->findAll();
        $kriteria = $this->ModelKriteria->findAll();
    
        // Ambil bobot kriteria dari hasil AHP
        $bobotKriteria = [];
        foreach ($kriteria as $k) {
            $bobotKriteria[$k['id_kriteria']] = $k['bobot_kriteria']; // pastikan sudah dihitung sebelumnya
        }
    
        $hasil = [];
    
        foreach ($mahasiswa as $mhs) {
            $totalSkor = 0;
    
            // Ambil nilai penilaian mahasiswa per kriteria
            foreach ($kriteria as $k) {
                $penilaian = $this->ModelPenilaian
                    ->where('id_user', $mhs['id_user'])
                    ->where('id_kriteria', $k['id_kriteria'])
                    ->first();
    
                $nilai = $penilaian ? $penilaian['nilai'] : 0;
                $bobot = $bobotKriteria[$k['id_kriteria']] ?? 0;
    
                $totalSkor += $nilai * $bobot;
            }
    
            $hasil[] = [
                'nama' => $mhs['nama_user'],
                'email' => $mhs['email'],
                'skor' => round($totalSkor, 4)
            ];
        }
    
        // Urutkan berdasarkan skor tertinggi
        usort($hasil, fn($a, $b) => $b['skor'] <=> $a['skor']);
    
        $data = [
            'judul' => 'Hasil Perhitungan AHP',
            'subjudul' => 'Ranking Mahasiswa',
            'menu' => 'hasil',
            'submenu' => '',
            'page' => 'ahp/hasil_ahp',
            'hasil' => $hasil,
        ];
    
        return view('v_template', $data);
    }
}
