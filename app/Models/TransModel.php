<?php

namespace App\Models;

use CodeIgniter\Model;

class TransModel extends Model
{
    public function getLokasi($slug = false)
    {
        $builder = $this->db->table('tb_lokasi')->select('*')
            ->join('tb_pegawai', 'tb_lokasi.kode_pegawai = tb_pegawai.kode_pegawai', 'LEFT')
            ->orderBy('tb_lokasi.kode_lokasi', 'DESC');
        $builder = $builder->select('tb_lokasi.*')
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
            ->join('tb_barang', 'tb_detail_lokasi.kode_barang=tb_barang.id_barang', 'LEFT')
            ->where(['tb_lokasi.kode_lokasi' => $slug])
            ->orderBy('tb_lokasi.kode_lokasi', 'DESC');
        $builder = $builder->select('tb_lokasi.*')
            ->select('tb_detail_lokasi.qty')
            ->select('tb_barang.id_barang, tb_barang.kode_barang, tb_barang.nama_barang, tb_barang.jenis_barang, tb_barang.merk, tb_barang.type, tb_barang.kode_sumberdana, tb_barang.tgl_pembelian, tb_barang.kondisi, tb_barang.stok_barang')
            ->select('tb_pegawai.nama_pegawai');

        return $builder->get()->getResultArray();
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

    public function dLokasi($kode_lokasi)
    {
        $this->db->table('tb_lokasi')->where('kode_lokasi', $kode_lokasi)->delete();
        $this->db->table('tb_detail_lokasi')->where('kode_lokasi', $kode_lokasi)->delete();
    }
}
