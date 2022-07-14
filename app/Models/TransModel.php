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
        $builder = $this->db->table('tb_lokasi')->select('*')
            ->join('tb_pegawai', 'tb_lokasi.kode_pegawai = tb_pegawai.kode_pegawai', 'LEFT')
            //->join('tb_detail_lokasi', 'tb_lokasi.kode_lokasi=tb_detail_lokasi.kode_lokasi', 'LEFT')
            // ->join('tb_barang', 'tb_detail_lokasi.kode_barang=tb_barang.kode_barang', 'LEFT')
            ->orderBy('tb_lokasi.kode_lokasi', 'DESC');
        $builder = $builder->select('tb_lokasi.*')
            //->select('tb_barang.kode_barang')
            ->select('tb_pegawai.nama_pegawai');

        if ($slug == false) {
            //$this->orderBy('id_barang', 'desc');
            return $builder->get()->getResultArray();
        }

        return $builder->where(['kode_lokasi' => $slug]);
    }

    public function getDetLokasi($slug = false)
    {
        $builder = $this->db->table('tb_lokasi')
            ->join('tb_pegawai', 'tb_lokasi.kode_pegawai = tb_pegawai.kode_pegawai', 'LEFT')
            ->join('tb_detail_lokasi', 'tb_lokasi.kode_lokasi=tb_detail_lokasi.kode_lokasi', 'LEFT')
            ->join('tb_barang', 'tb_detail_lokasi.kode_barang=tb_barang.kode_barang', 'LEFT')
            ->where(['tb_lokasi.kode_lokasi' => $slug])
            ->orderBy('tb_lokasi.kode_lokasi', 'DESC');
        $builder = $builder->select('tb_lokasi.*')
            ->select('tb_barang.kode_barang, tb_barang.nama_barang, tb_barang.jenis_barang, tb_barang.merk, tb_barang.type, tb_barang.kode_sumberdana, tb_barang.tgl_pembelian, tb_barang.kondisi')
            ->select('tb_pegawai.nama_pegawai');

        return $builder->get()->getResultArray();
        /* if ($slug == false) {
            //$this->orderBy('id_barang', 'desc');
        }

        return $builder->where(['kode_lokasi' => $slug]);
        */
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
