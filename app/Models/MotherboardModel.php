<?php

namespace App\Models;

use CodeIgniter\Model;

class MotherboardModel extends Model
{
    protected $table = 'tbl_motherboard';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'merk', 'nama', 'slug', 'harga', 'stok', 'socket', 'faktor_bentuk', 'jenis_ram',
        'ukuran_ram_maks', 'jml_slot_pcie', 'kekuatan_cpu', 'chipset', 'jml_slot_ram',
        'jml_slot_sata', 'jml_slot_m2', 'frekuensi_maks_ram', 'rincian', 'gambar'
    ];

    public function getMotherboard($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
