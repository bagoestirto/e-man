<?php

namespace App\Models;

use CodeIgniter\Model;

class TransModel extends Model
{
    //protected $table = 'tb_lokasi';
    //protected $primaryKey = 'kode_lokasi';
    //  protected $useTimestamps = true;
    //protected $allowedFields = ['kode_barang', 'slug_barang', 'nama_barang', 'stok_barang', 'jenis_barang', 'merk', 'type', 'kode_sumberdana', 'tgl_pembelian', 'satuan', 'kondisi', 'harga'];

    public function getLokasi($slug = false)
    {
        $builder = $this->db->table('tb_lokasi')->orderBy('kode_lokasi', 'DESC');
        if ($slug == false) {
            //$this->orderBy('id_barang', 'desc');
            return $builder->get();
        }

        return $builder->where(['kode_lokasi' => $slug]);
    }

    public function getMaxIdLokasi()
    {
        $builder = $this->db->table('tb_lokasi')->selectMax('kode_lokasi')->limit(1);
        return $builder->get();
    }

    public function getPegawai()
    {
        $builder = $this->db->table('tb_pegawai');
        $query   = $builder->get();

        return $query;
    }

    public function insave($table, $data)
    {
        $builder = $this->db->table($table)->insert($data);
    }
}
