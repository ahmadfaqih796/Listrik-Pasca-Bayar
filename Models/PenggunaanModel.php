<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penggunaan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['no_penggunaan', 'id_pelanggan', 'bulan', 'tahun', 'meter_awal', 'meter_akhir', 'jumlah_meter', 'tarif_perkwh', 'jumlah_bayar', 'bayar', 'kembali', 'status', 'tgl_cek', 'id_petugas'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPenggunaan($id_penggunaan = false)
    {
        if ($id_penggunaan == false) {
            return $this->findAll();
        }
        return $this->where(['no_penggunaan' => $id_penggunaan])->first();
    }

    public function cari($kunci)
    {
        $builder = $this->table('penggunaan');
        $builder->like('nama', $kunci);
        $builder->orlike('no_meter', $kunci);
        return $builder;
    }
}
