<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    //  protected $useTimestamps = true;
    protected $allowedFields = ['kode_barang', 'slug_barang', 'nama_barang', 'stok_barang', 'jenis_barang', 'merk', 'type', 'kode_sumberdana', 'tgl_pembelian', 'satuan', 'kondisi', 'harga'];

    public function getBarang($slug = false)
    {
        if ($slug == false) {
            $this->orderBy('id_barang', 'desc');
            return $this->findAll();
        }

        return $this->where(['slug_barang' => $slug])->first();
    }
}
