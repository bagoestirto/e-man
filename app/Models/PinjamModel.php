<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;


class PinjamModel extends Model
{
    public function getPinjam($slug = false)
    {
        $builder = $this->db->table('tb_peminjaman')
            ->join('tb_pegawai', 'tb_peminjaman.kode_pegawai = tb_pegawai.kode_pegawai', 'LEFT')
            ->orderBy('tb_peminjaman.kode_pinjam', 'DESC');
        $builder = $builder->select('tb_peminjaman.*')
            ->select('tb_pegawai.nama_pegawai')
            ->where(['tb_peminjaman.status' => 'Keluar']);

        if ($slug == false) {
            return $builder->get()->getResultArray();
        }

        return $builder->where(['kode_pinjam' => $slug]);
    }

    public function getPinKem($slug = false)
    {
        $builder = $this->db->table('tb_peminjaman')
            ->join('tb_pegawai', 'tb_peminjaman.kode_pegawai = tb_pegawai.kode_pegawai', 'LEFT')
            ->orderBy('tb_peminjaman.kode_pinjam', 'DESC');
        $builder = $builder->select('tb_peminjaman.*')
            ->select('tb_pegawai.nama_pegawai')
            ->where(['tb_peminjaman.status' => $slug]);

        return $builder->get()->getResultArray();
    }

    public function getMaxIdPinjam()
    {
        $builder = $this->db->table('tb_peminjaman')->selectMax('kode_pinjam')->limit(1);
        return $builder->get();
    }

    public function getPegawai() //data pegawai yg tidak ada tanggungan
    {
        $where = "tb_peminjaman.kode_pegawai IS NULL";
        $builder = $this->db->table('tb_pegawai')
            ->select('tb_pegawai.*')
            ->join('tb_peminjaman', 'tb_pegawai.kode_pegawai=tb_peminjaman.kode_pegawai', 'LEFT')
            ->where($where);
        $query   = $builder->get();

        return $query;
    }

    public function getDetPinjam($slug = false)
    {
        $builder = $this->db->table('tb_peminjaman')
            ->join('tb_pegawai', 'tb_peminjaman.kode_pegawai = tb_pegawai.kode_pegawai', 'LEFT')
            ->join('tb_detail_peminjaman', 'tb_peminjaman.kode_pinjam=tb_detail_peminjaman.kode_pinjam', 'LEFT')
            ->join('tb_barang', 'tb_detail_peminjaman.kode_barang=tb_barang.id_barang', 'LEFT')
            ->where(['tb_peminjaman.kode_pinjam' => $slug])
            ->orderBy('tb_peminjaman.kode_pinjam', 'DESC');
        $builder = $builder->select('tb_peminjaman.*')
            ->select('tb_detail_peminjaman.jumlah')
            ->select('tb_barang.id_barang, tb_barang.kode_barang, tb_barang.nama_barang, tb_barang.jenis_barang, tb_barang.merk, tb_barang.type, tb_barang.kode_sumberdana, tb_barang.tgl_pembelian, tb_barang.kondisi, tb_barang.stok_barang')
            ->select('tb_pegawai.nama_pegawai');

        return $builder->get()->getResultArray();
    }

    public function up_pinjam($slug)
    {
        $myTime = new Time('now', 'Asia/Jakarta', 'en_US');
        $builder = $this->db->table('tb_peminjaman');
        $builder->set('status', 'Kembali');
        $builder->set('tgl_kembali', $myTime->toDateString());
        $builder->where('kode_pinjam', $slug);
        $builder->update();
    }
}
