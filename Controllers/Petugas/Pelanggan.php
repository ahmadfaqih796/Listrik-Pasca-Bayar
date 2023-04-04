<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\PelangganModel;
use App\Models\PenggunaanModel;

class Pelanggan extends BaseController
{
    public function __construct()
    {
        if (session()->get('username') == '') {
            session()->setFlashdata('gagal', 'anda belum login sayang !!!');
            return redirect()->to(base_url('petugas/login'));
        }
        $this->pelangganModel = new PelangganModel();
        $this->penggunaanModel = new PenggunaanModel();
    }
    public function index()
    {
        $this->pelangganModel = new PelangganModel();
        // pencarian
        $kunci = $this->request->getVar('kunci');
        if ($kunci) {
            $pelanggan = $this->pelangganModel->cari($kunci);
        } else {
            $pelanggan = $this->pelangganModel;
        }
        $halaman = $this->request->getVar('page_pelanggan') ? $this->request->getVar('page_pelanggan') : 1;
        $data = [
            'judul' => 'Pelanggan',
            'pelanggan' => $pelanggan->paginate(5, 'pelanggan'),
            "pager" => $this->pelangganModel->pager,
            "halaman" => $halaman
        ];
        return view('admin/petugas/pelanggan/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'tambah Pelanggan',
            "validasi" => \Config\Services::validation()
        ];
        return view('admin/petugas/pelanggan/tambah', $data);
    }

    public function simpan()
    {
        // dd('berhasil');
        // dd($this->request->getVar());
        $this->pelangganModel->save([
            'no_pelanggan' => $this->request->getVar('no_pelanggan'),
            'no_meter' => $this->request->getVar('no_meter'),
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'tenggang' => $this->request->getVar('tenggang'),
            'id_tarif' => $this->request->getVar('id_tarif'),
        ]);
        session()->setFlashdata('pesan', 'data berhasil ditambahkan.');
        return redirect()->to('petugas/pelanggan');
    }

    public function detail($no_pelanggan)
    {
        $data = [
            "title" => "detail Pelanggan",
            "pelanggan" => $this->pelangganModel->getPelanggan($no_pelanggan)
        ];
        // jika pelanggan tidak ada maka
        if (empty($data['pelanggan'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul pelanggan ' . $no_pelanggan . ' tidak ditemukan');
        }
        return view('admin/petugas/pelanggan/detail', $data);
    }

    public function ubah($no_pelanggan)
    {
        $data = [
            'title' => "Ubah pelanggan",
            'validasi' => \Config\Services::validation(),
            'pelanggan' => $this->pelangganModel->getPelanggan($no_pelanggan)
        ];
        return view('admin/petugas/pelanggan/ubah', $data);
    }

    public function hapus($id)
    {
        $this->pelangganModel->delete($id);
        session()->setFlashdata('pesan', 'data berhasil dihapus.');
        return redirect()->to('petugas/pelanggan');
    }

    public function perbarui($id)
    {
        // dd($this->request->getVar());
        $this->pelangganModel->save([
            'id' => $id,
            'no_pelanggan' => $this->request->getVar('no_pelanggan'),
            'nama' => $this->request->getVar('nama'),
            'no_meter' => $this->request->getVar('no_meter'),
            'alamat' => $this->request->getVar('alamat'),
            'tenggang' => $this->request->getVar('tenggang'),
            'id_tarif' => $this->request->getVar('id_tarif')
        ]);
        session()->setFlashdata('pesan', 'data berhasil diubah.');
        return redirect()->to('petugas/pelanggan');
    }

    public function tagihan($id_penggunaan)
    {
        $data = [
            'title' => "Ubah pelanggan",
            'validasi' => \Config\Services::validation(),
            'pelanggan' => $this->pelangganModel->findAll(),
            'penggunaan' => $this->penggunaanModel->getPenggunaan($id_penggunaan)
        ];
        return view('admin/petugas/pelanggan/tagihan', $data);
    }

    public function bayar($id)
    {
        // dd($this->request->getVar());
        $kembali = $this->request->getVar('bayar') - $this->request->getVar('jumlah_bayar');
        $this->penggunaanModel->save([
            'id' => $id,
            'no_penggunaan' => $this->request->getVar('no_penggunaan'),
            'id_pelanggan' => $this->request->getVar('id_pelanggan'),
            'bulan' => $this->request->getVar('bulan'),
            'tahun' => $this->request->getVar('tahun'),
            'meter_awal' => $this->request->getVar('meter_awal'),
            'meter_akhir' => $this->request->getVar('meter_akhir'),
            'jumlah_meter' => $this->request->getVar('jumlah_meter'),
            'tarif_perkwh' => $this->request->getVar('tarif_perkwh'),
            'jumlah_bayar' => $this->request->getVar('jumlah_bayar'),
            'bayar' => $this->request->getVar('bayar'),
            'kembali' => $kembali,
            'status' => $this->request->getVar('status'),
            'tgl_cek' => $this->request->getVar('tgl_cek'),
            'id_petugas' => $this->request->getVar('id_petugas'),
        ]);
        session()->setFlashdata('pesan', 'Transaksi berhasil dibayar pada bulan ini');
        $db = \Config\Database::connect();
        $tampil = $db->query("SELECT * from penggunaan where id = $id");
        foreach ($tampil->getResultArray() as $t) {
            $id_pelanggan = $t['id_pelanggan'];
        }
        return redirect()->to('petugas/pelanggan/detail/' . $id_pelanggan);
    }
}
