<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    //  protected $useTimestamps = true;
    protected $allowedFields = ['kode_barang', 'slug_barang', 'nama_barang', 'stok_barang', 'jenis_barang', 'merk', 'type', 'kode_sumberdana', 'tgl_pembelian', 'satuan', 'kondisi', 'harga', 'hapus', 'del_at'];

    public function getBarang($slug = false)
    {
        if ($slug == false) {
            $this->orderBy('id_barang', 'desc');
            return $this->where('hapus', 'ada')->findAll();
        }

        return $this->where(['id_barang' => $slug])->first();
    }
    public function getBaranghapus()
    {
        $array = ['hapus' => 'hapus'];
        return $this->where($array)->findAll();
    }
    public function getBarangbaik()
    {
        $array = ['hapus' => 'ada', 'kondisi' => 'Baik', 'jenis_barang' => 'ASET TETAP'];
        return $this->where($array)->findAll();
    }
    public function getBarangrusak()
    {
        $array = ['hapus' => 'ada', 'kondisi' => 'Rusak', 'jenis_barang' => 'ASET TETAP'];
        return $this->where($array)->findAll();
    }
    public function getBarangNotNol()
    {
        $array = ['stok_barang >' => 0, 'jenis_barang' => 'ASET TETAP', 'hapus' => 'ada'];
        return $this->where($array)->findAll();
    }

    public function getBarangPrint($jenBar)
    {
        $array = ['jenis_barang' => $jenBar];
        return $this->where($array)->findAll();
    }
}
