<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\AgenModel;
use App\Models\PetugasModel;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->petugasModel = new PetugasModel();
        $this->agenModel = new AgenModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login'
        ];
        if (session()->get('username')) {
            session()->setFlashdata('gagal', 'Anda masih login, harap logout terlebih dahulu');
            return redirect()->to(base_url('petugas/pelanggan'));
        }
        return view('admin/petugas/login', $data);
    }
    public function cek_login()
    {
        $this->petugasModel = new PetugasModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $cek = $this->petugasModel->cek_login($username, $password);
        if ($cek) {
            session()->set('id_petugas', $cek['id_petugas']);
            session()->set('username', $cek['username']);
            session()->set('nama', $cek['nama']);
            session()->set('akses', $cek['akses']);
            session()->set('alamat', $cek['alamat']);
            session()->set('no_telepon', $cek['no_telepon']);
            session()->set('jk', $cek['jk']);
            return redirect()->to(base_url('petugas/pelanggan'));
        } else {
            session()->setFlashdata('gagal', 'username atau password salah');
            return redirect()->to(base_url('petugas/login'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('petugas/login'));
    }
}
