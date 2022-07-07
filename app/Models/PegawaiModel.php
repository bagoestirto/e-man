<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'tb_pegawai';
    protected $primaryKey = 'kode_pegawai';
    //  protected $useTimestamps = true;
    protected $allowedFields = ['kode_pegawai', 'nama_pegawai', 'slug', 'alamat', 'nomor_telepon'];

    public function getPegawai($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
