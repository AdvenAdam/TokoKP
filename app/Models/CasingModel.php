<?php

namespace App\Models;

use CodeIgniter\Model;

class CasingModel extends Model
{
    protected $table = 'tbl_casing';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'merk', 'nama', 'slug', 'harga', 'stok', 'faktor_bentuk',
        'rincian', 'gambar'
    ];

    public function getCasing($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
