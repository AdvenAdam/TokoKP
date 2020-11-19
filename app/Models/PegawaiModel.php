<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Config\I18n;

class PegawaiModel extends Model
{
    protected $table = 'tbl_pegawai';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id', 'no_pegawai', 'nama', 'slug', 'alamat', 'no_hp',
        'gaji_pokok', 'jabatan', 'foto'
    ];

    public function getPegawai($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getMaxs()
    {
        $this->db->table('tbl_pegawai');
        $this->selectmax('id');
        $data = $this->get();
        return $data;
    }
}
