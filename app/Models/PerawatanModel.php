<?php

namespace App\Models;

use CodeIgniter\Model;

class PerawatanModel extends Model
{
    public function getPerawatan($slug = false)
    {
        $builder = $this->db->table('tb_perawatan')
            ->join('tb_detail_perawatan', 'tb_perawatan.kode_perawatan = tb_detail_perawatan.kode_perawatan', 'LEFT')
            ->join('tb_barang', 'tb_detail_perawatan.kode_barang = tb_barang.id_barang', 'LEFT')
            ->orderBy('tb_perawatan.kode_perawatan', 'DESC');
        $builder = $builder->select('tb_perawatan.tgl_perawatan')
            ->select('tb_detail_perawatan.*')
            ->select('tb_barang.nama_barang');

        if ($slug == false) {
            return $builder->get()->getResultArray();
        }

        return $builder->where(['tb_perawatan.kode_perawatan' => $slug]);
    }

    public function getMaxIdPerawatan()
    {
        $builder = $this->db->table('tb_perawatan')->selectMax('kode_perawatan')->limit(1);
        return $builder->get();
    }

    public function getBarangGroup()
    {
        $builder = $this->db->table('tb_detail_lokasi')
            ->join('tb_barang', 'tb_detail_lokasi.kode_barang = tb_barang.id_barang', 'LEFT')
            ->groupBy('tb_detail_lokasi.kode_barang');
        return $builder->get()->getResultArray();
    }
}
