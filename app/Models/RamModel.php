<?php

namespace App\Models;

use CodeIgniter\Model;

class RamModel extends Model
{
    protected $table = 'tbl_ram';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'merk', 'model', 'slug', 'harga', 'stok', 'jenis_ram',
        'ukuran_ram', 'frekuensi', 'rincian', 'gambar'
    ];

    public function getRam($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
