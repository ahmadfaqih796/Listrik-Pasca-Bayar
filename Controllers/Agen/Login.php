<?php

namespace App\Controllers\Agen;

use App\Controllers\BaseController;
use App\Models\AgenModel;
use App\Models\PetugasModel;

class Login extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->agenModel = new AgenModel();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login'
        ];
        if (session()->get('username_agen')) {
            session()->setFlashdata('gagal', 'Anda masih login, harap logout terlebih dahulu');
            return redirect()->to(base_url('agen/beranda'));
        }
        return view('admin/agen/login', $data);
    }
    public function cek_login()
    {
        $this->agenModel = new AgenModel();
        $username = $this->request->getPost('username_agen');
        $password = $this->request->getPost('password_agen');
        $cek = $this->agenModel->cek_login($username, $password);
        if ($cek) {
            session()->set('id_petugas', $cek['id_petugas']);
            session()->set('username_agen', $cek['username_agen']);
            session()->set('nama', $cek['nama']);
            session()->set('akses', $cek['akses']);
            session()->set('alamat', $cek['alamat']);
            session()->set('no_telepon', $cek['no_telepon']);
            session()->set('jk', $cek['jk']);
            return redirect()->to(base_url('agen/beranda'));
        } else {
            session()->setFlashdata('gagal', 'username atau password salah');
            return redirect()->to(base_url('agen/login'));
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('agen/login'));
    }
}
