<?php

namespace App\Controllers;

use App\Models\TransModel;
use App\Models\BarangModel;
use CodeIgniter\Validation\StrictRules\Rules;
use Kint\Parser\FsPathPlugin;

class Mtrans extends BaseController
{
    public function __construct()
    {
        $this->transModel = new TransModel();
        $this->barangModel = new BarangModel();
    }

    public function l_lokasi()
    {
        $data = [
            'side' => "t_lokasi",
            'tittle' => "List Lokasi Barang",
            'lokasi' => $this->transModel->getLokasi()->getResult()
        ];
        return view('transaksi/l_lokasi', $data);
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
            'barang' => $this->barangModel->getBarang(),
            'maxIdLokasi' => $maxIdLokasi,
            'validation' => \Config\Services::validation()
        ];
        return view('transaksi/c_lokasi', $data);
    }

    public function s_lokasi()
    {
        //dd($this->request->getVar('nbar'));
        $datalokasi = [
            'kode_lokasi' => $this->request->getVar('kode_lokasi'),
            'kode_pegawai' => $this->request->getVar('kpeg'),
            'nama_lokasi' => $this->request->getVar('nlok'),
            'titik_koordinat' => $this->request->getVar('tkor'),
        ];
        $this->transModel->insave('tb_lokasi', $datalokasi);

        $qtyBar = $this->request->getVar('nbar');
        $totbar = count($qtyBar);
        //echo $totbar;
        for ($i = 0; $i < $totbar; $i++) {
            $databar = [
                'kode_lokasi' => $this->request->getVar('kode_lokasi'),
                'kode_barang' => $this->request->getVar('nbar[' . $i . ']'),
            ];
            //echo $this->request->getVar('nbar[' . $i . ']');
            $this->transModel->insave('tb_detail_lokasi', $databar);
        }
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('/mtrans/l_lokasi'));
    }
}
