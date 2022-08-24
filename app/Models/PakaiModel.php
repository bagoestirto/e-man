<?php

namespace App\Models;

use CodeIgniter\Model;

class PakaiModel extends Model
{
    public function getPakai($slug = false)
    {
        $builder = $this->db->table('tb_pakai')->select('*')
            ->join('tb_pegawai', 'tb_pakai.kode_pegawai = tb_pegawai.kode_pegawai', 'LEFT')
            ->orderBy('tb_pakai.kode_pakai', 'DESC');
        $builder = $builder->select('tb_pakai.*')
            ->select('tb_pegawai.nama_pegawai');

        if ($slug == false) {
            //$this->orderBy('id_barang', 'desc');
            return $builder->get()->getResultArray();
        }

        return $builder->where(['kode_pakai' => $slug]);
    }

    public function getDetPakai($slug = false)
    {
        $builder = $this->db->table('tb_pakai')
            ->join('tb_pegawai', 'tb_pakai.kode_pegawai = tb_pegawai.kode_pegawai', 'LEFT')
            ->join('tb_detail_pakai', 'tb_pakai.kode_pakai=tb_detail_pakai.kode_pakai', 'LEFT')
            ->join('tb_barang', 'tb_detail_pakai.id_barang=tb_barang.id_barang', 'LEFT')
            ->where(['tb_pakai.kode_pakai' => $slug])
            ->orderBy('tb_pakai.kode_pakai', 'DESC');
        $builder = $builder->select('tb_pakai.*')
            ->select('tb_detail_pakai.qty')
            ->select('tb_barang.id_barang, tb_barang.kode_barang, tb_barang.nama_barang, tb_barang.jenis_barang, tb_barang.merk, tb_barang.type, tb_barang.kode_sumberdana, tb_barang.tgl_pembelian, tb_barang.kondisi, tb_barang.stok_barang')
            ->select('tb_pegawai.nama_pegawai');

        return $builder->get()->getResultArray();
    }

    public function getMaxIdPakai()
    {
        $builder = $this->db->table('tb_pakai')->selectMax('kode_pakai')->limit(1);
        return $builder->get();
    }

    public function dPakai($kode_pakai)
    {
        $this->db->table('tb_pakai')->where('kode_pakai', $kode_pakai)->delete();
        $this->db->table('tb_detail_pakai')->where('kode_pakai', $kode_pakai)->delete();
    }
}
