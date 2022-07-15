<?php

namespace App\Controllers;

use App\Models\TransModel;
use App\Models\BarangModel;
use App\Models\PegawaiModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\Validation\StrictRules\Rules;
use Kint\Parser\FsPathPlugin;

class Mtrans extends BaseController
{
    public function __construct()
    {
        $this->transModel = new TransModel();
        $this->barangModel = new BarangModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function l_lokasi()
    {
        $lokasi = $this->transModel->getLokasi();
        $i = 0;
        $data = [
            'side' => "t_lokasi",
            'tittle' => "List Lokasi Barang",
            'lokasi' => $this->transModel->getLokasi(),
        ];
        return view('transaksi/l_lokasi', $data);
    }

    public function det_lokasi($klok)
    {
        $qlok = $this->transModel->getDetLokasi($klok);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $data = [
            'side' => "c_lokasi",
            'tittle' => "Detail Lokasi Barang",
            'pegawai' => $this->pegawaiModel->getPegawai($kpeg),
            'lokasi' => $this->transModel->getDetLokasi($klok),
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/det_lokasi', $data);
    }

    public function e_lokasi($klok)
    {
        $qlok = $this->transModel->getDetLokasi($klok);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $data = [
            'side' => "c_lokasi",
            'tittle' => "Detail Lokasi Barang",
            'pegawai' => $this->pegawaiModel->getPegawai(),
            'lokasi' => $this->transModel->getDetLokasi($klok),
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/e_lokasi', $data);
    }

    public function c_lokasi()
    {
        //session();// pindahkan ke base controller
        $maxIdLokasi = $this->transModel->getMaxIdLokasi()->getResult();
        foreach ($maxIdLokasi as $a) {
        }
        $maxIdLokasi = $a->kode_lokasi + 1;
        $data = [
            'side' => "c_lokasi",
            'tittle' => "Tambah Lokasi Barang",
            'pegawai' => $this->transModel->getPegawai()->getResult(),
            'barang' => $this->barangModel->getBarangNotNol(),
            'maxIdLokasi' => $maxIdLokasi,
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/c_lokasi', $data);
    }

    public function s_lokasi()
    {
        $datalokasi = [
            'kode_lokasi' => $this->request->getVar('kode_lokasi'),
            'kode_pegawai' => $this->request->getVar('kpeg'),
            'nama_lokasi' => $this->request->getVar('nlok'),
            'titik_koordinat' => $this->request->getVar('tkor'),
        ];
        $this->transModel->insave('tb_lokasi', $datalokasi);

        $qtyBar = $this->request->getVar('nbar');
        $totbar = count($qtyBar);
        for ($i = 0; $i < $totbar; $i++) {
            $databar = [
                'kode_lokasi' => $this->request->getVar('kode_lokasi'),
                'kode_barang' => $this->request->getVar('nbar[' . $i . ']'),
                'qty' => $this->request->getVar('qbar[' . $i . ']'),
            ];
            $this->transModel->insave('tb_detail_lokasi', $databar);

            $stokAwal = $this->barangModel->getBarang($this->request->getVar('nbar[' . $i . ']'));
            $stok_Awal = $stokAwal['stok_barang'];
            $stokAkhir = $stok_Awal - $this->request->getVar('qbar[' . $i . ']');
            $this->barangModel->save([
                'id_barang' => $this->request->getVar('nbar[' . $i . ']'),
                'stok_barang' => $stokAkhir
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('/mtrans/l_lokasi'));
    }

    public function dLokasi() //delete lokasi dan update jumlah stok barang
    {
        $kode_lokasi = $this->request->getVar('kode_lokasi');
        $data_lokasi = $this->transModel->getDetLokasi($kode_lokasi);
        foreach ($data_lokasi as $datLok) {
            $stokBaru = $datLok['stok_barang'] + $datLok['qty'];
            $this->barangModel->save([
                'id_barang' => $datLok['id_barang'],
                'stok_barang' => $stokBaru
            ]);
        }

        $this->transModel->dLokasi($kode_lokasi);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/mtrans/l_lokasi');
    }
}
