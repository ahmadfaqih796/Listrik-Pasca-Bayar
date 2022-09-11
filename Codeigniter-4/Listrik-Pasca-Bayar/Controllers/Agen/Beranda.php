<?php

namespace App\Controllers\Agen;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    public function index()
    {
        if (session()->get('username_agen') == '') {
            session()->setFlashdata('gagal', 'anda belum login sayang !!!');
            return redirect()->to(base_url('agen/login'));
        }
        $data = [
            "judul" => "Beranda"
        ];
        return view('admin/agen/index', $data);
    }
}
