<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PegawaiModel;
use App\Models\PakaiModel;
use App\Models\TransModel;

class Mpakai extends BaseController
{
    public function __construct()
    {
        $this->pakaiModel = new PakaiModel();
        $this->barangModel = new BarangModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->transModel = new TransModel();
    }

    public function l_pakai()
    {
        $pakai = $this->pakaiModel->getPakai();
        $i = 0;
        $data = [
            'side' => "l_pakai",
            'tittle' => "List Pemakaian Barang",
            'pakai' => $this->pakaiModel->getPakai(),
        ];
        // dd($data);
        return view('transaksi/l_pakai', $data);
    }

    public function det_pakai($kpak)
    {
        $qlok = $this->pakaiModel->getDetPakai($kpak);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $data = [
            'side' => "l_pakai",
            'tittle' => "Detail Pemakaian Barang",
            'pegawai' => $this->pegawaiModel->getPegawai($kpeg),
            'pakai' => $this->pakaiModel->getDetPakai($kpak),
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/det_pakai', $data);
    }

    public function c_pakai()
    {
        //session();// pindahkan ke base controller
        $maxIdPakai = $this->pakaiModel->getMaxIdPakai()->getResult();
        foreach ($maxIdPakai as $a) {
        }
        $maxIdPakai = $a->kode_pakai + 1;
        $data = [
            'side' => "l_pakai",
            'tittle' => "Tambah Pemakaian Barang",
            'pegawai' => $this->transModel->getPegawai()->getResult(),
            'barang' => $this->barangModel->getBarangHPNotNol(),
            'maxIdPakai' => $maxIdPakai,
            'validation' => \Config\Services::validation()
        ];
        // dd($this->barangModel->getBarangHPNotNol());
        return view('transaksi/c_pakai', $data);
    }

    public function s_pakai()
    {
        $datapakai = [
            'kode_pakai' => $this->request->getVar('kode_pakai'),
            'kode_pegawai' => $this->request->getVar('kpeg'),
            'tgl' => $this->request->getVar('tgl'),
            'username' => $this->request->getVar('username'),
        ];
        $this->transModel->insave('tb_pakai', $datapakai);

        $qtyBar = $this->request->getVar('nbar');
        $totbar = count($qtyBar);
        for ($i = 0; $i < $totbar; $i++) {
            $databar = [
                'kode_pakai' => $this->request->getVar('kode_pakai'),
                'id_barang' => $this->request->getVar('nbar[' . $i . ']'),
                'qty' => $this->request->getVar('qbar[' . $i . ']'),
            ];
            $this->transModel->insave('tb_detail_pakai', $databar);

            $stokAwal = $this->barangModel->getBarang($this->request->getVar('nbar[' . $i . ']'));
            $stok_Awal = $stokAwal['stok_barang'];
            $stokAkhir = $stok_Awal - $this->request->getVar('qbar[' . $i . ']');
            $this->barangModel->save([
                'id_barang' => $this->request->getVar('nbar[' . $i . ']'),
                'stok_barang' => $stokAkhir
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('/mpakai/l_pakai'));
    }

    public function dPakai() //delete pakai dan update jumlah stok barang
    {
        $kode_pakai = $this->request->getVar('kode_pakai');
        $data_pakai = $this->pakaiModel->getDetPakai($kode_pakai);
        foreach ($data_pakai as $datPak) {
            $stokBaru = $datPak['stok_barang'] + $datPak['qty'];
            $this->barangModel->save([
                'id_barang' => $datPak['id_barang'],
                'stok_barang' => $stokBaru
            ]);
        }

        $this->pakaiModel->dPakai($kode_pakai);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/mpakai/l_pakai');
    }
}
