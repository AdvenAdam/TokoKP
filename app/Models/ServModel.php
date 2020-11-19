<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Config\I18n;

class ServModel extends Model
{
    protected $table = 'tbl_service';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id', 'nama', 'slug', 'kerusakan', 'pc', 'status',
        'biaya', 'no_hp'
    ];

    public function getServ($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
