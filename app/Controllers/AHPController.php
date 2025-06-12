<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKriteria;
use App\Models\ModelPairwiseKriteria;

class AHPController extends BaseController
{
    protected $ModelKriteria;
    protected $pairwiseModel;

    public function __construct()
    {
        $this->ModelKriteria = new ModelKriteria();
        $this->pairwiseModel = new ModelPairwiseKriteria();
    }

    public function index()
    {
        $data = [
            'judul' => 'Sistem AHP',
            'subjudul' => 'Sistem AHP',
            'menu' => 'ahp',
            'submenu' => '',
            'page' => 'ahp/input_pairwise',
            'kriterias' => $this->ModelKriteria->findAll()
        ];
        return view('v_template', $data);
    }

    public function simpan()
    {
        $kriteria1 = $this->request->getPost('kriteria1');
        $kriteria2 = $this->request->getPost('kriteria2');
        $nilai     = $this->request->getPost('nilai');

        foreach ($kriteria1 as $i => $id1) {
            $this->pairwiseModel->insert([
                'id_kriteria_1' => $id1,
                'id_kriteria_2' => $kriteria2[$i],
                'nilai'         => $nilai[$i],
            ]);
        }

        return redirect()->to('AHPController')->with('pesan', 'Data pairwise berhasil disimpan.');
    }

    public function hitungBobot()
    {
        $kriterias = $this->ModelKriteria->findAll();
        $pairwise = $this->pairwiseModel->findAll();

        $jumlahKriteria = count($kriterias);
        $matriks = [];

        // Inisialisasi matriks pairwise dengan nilai default 1
        foreach ($kriterias as $i => $k1) {
            foreach ($kriterias as $j => $k2) {
                if ($k1['id_kriteria'] == $k2['id_kriteria']) {
                    $matriks[$i][$j] = 1;
                } else {
                    // Cek apakah sudah ada nilai dari tabel
                    $nilai = $this->cariNilaiPairwise($pairwise, $k1['id_kriteria'], $k2['id_kriteria']);
                    $matriks[$i][$j] = $nilai;
                }
            }
        }

        // Hitung jumlah kolom
        $jumlahKolom = array_fill(0, $jumlahKriteria, 0);
        for ($j = 0; $j < $jumlahKriteria; $j++) {
            for ($i = 0; $i < $jumlahKriteria; $i++) {
                $jumlahKolom[$j] += $matriks[$i][$j];
            }
        }

        // Normalisasi dan hitung bobot
        $normalisasi = [];
        $bobot = array_fill(0, $jumlahKriteria, 0);

        for ($i = 0; $i < $jumlahKriteria; $i++) {
            for ($j = 0; $j < $jumlahKriteria; $j++) {
                $normalisasi[$i][$j] = $matriks[$i][$j] / $jumlahKolom[$j];
                $bobot[$i] += $normalisasi[$i][$j];
            }
            $bobot[$i] = $bobot[$i] / $jumlahKriteria; // Rata-rata baris
        }

        $data = [ 
            'judul'        => 'AHP',
            'subjudul'     => 'Hasil Perhitungan Bobot Kriteria',
            'menu'         => 'hitung_bobot',
            'submenu'      => '',
            'page'         => 'ahp/hasil_bobot', // pastikan file ini ada di app/Views/ahp/hasil_bobot.php
            'kriterias'    => $kriterias,
            'matriks'      => $matriks,
            'normalisasi'  => $normalisasi,
            'bobot'        => $bobot,
        ];
        return view('v_template', $data);
    }

    private function cariNilaiPairwise($pairwise, $id1, $id2)
    {
        foreach ($pairwise as $row) {
            if ($row['id_kriteria_1'] == $id1 && $row['id_kriteria_2'] == $id2) {
                return $row['nilai'];
            } elseif ($row['id_kriteria_1'] == $id2 && $row['id_kriteria_2'] == $id1) {
                return 1 / $row['nilai']; // nilai resiprokal
            }
        }
        return 1; // default kalau tidak ditemukan
    }
}
