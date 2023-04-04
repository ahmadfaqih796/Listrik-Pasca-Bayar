<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    public function index()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'anda belum login sayang !!!');
            return redirect()->to(base_url('petugas/login'));
        }
        $data = [
            "judul" => "Beranda"
        ];
        return view('admin/petugas/index', $data);
    }
}
