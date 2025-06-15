<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMahasiswa;
use App\Models\ModelUser;

class MahasiswaController extends BaseController
{
    protected $mahasiswaModel;
    protected $userModel;

    public function __construct()
    {
        $this->mahasiswaModel = new ModelMahasiswa();
        $this->userModel = new ModelUser();
    }

    public function form()
    {
        $data = [
            'judul' => 'Form Mahasiswa',
            'subjudul' => 'Lengkapi Data Mahasiswa',
            'menu' => 'mahasiswa',
            'submenu' => '',
            'page' => 'mahasiswa/form_mahasiswa',
        ];
        return view('v_template', $data);
    }

    public function simpan()
    {
        $idUser = session()->get('id_user');
        if (!$idUser) {
            return redirect()->to('/login'); // Jika belum login
        }
    
        $user = $this->userModel->find($idUser);
        $idMahasiswa = $user['id_mahasiswa'];
    
        $dataMahasiswa = [
            'jenjang'       => $this->request->getPost('jenjang'),
            'nim'           => $this->request->getPost('nim'),
            'fakultas'      => $this->request->getPost('fakultas'),
            'program_studi' => $this->request->getPost('program_studi'),
            'ipk'           => $this->request->getPost('ipk'),
            'semester'      => $this->request->getPost('semester'),
        ];
    
        if ($idMahasiswa) {
            // Sudah punya data -> lakukan update
            $this->mahasiswaModel->update($idMahasiswa, $dataMahasiswa);
        } else {
            // Belum punya data -> insert lalu simpan id ke user
            $idMahasiswaBaru = $this->mahasiswaModel->insert($dataMahasiswa, true);
            $this->userModel->update($idUser, [
                'id_mahasiswa' => $idMahasiswaBaru
            ]);
        }
    
        return redirect()->to('/MahasiswaController/form')->with('success', 'Data Mahasiswa Berhasil Disimpan atau Diperbarui!');
    }
}
