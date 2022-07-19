<?php

namespace App\Controllers;

use App\Models\PerawatanModel;
use App\Models\TransModel;
use App\Models\BarangModel;
use App\Models\PegawaiModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\Validation\StrictRules\Rules;
use Kint\Parser\FsPathPlugin;

class Mperawatan extends BaseController
{
    public function __construct()
    {
        $this->perawatanModel = new PerawatanModel();
        $this->transModel = new TransModel();
        $this->barangModel = new BarangModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function l_perawatan()
    {
        // $perawatan = $this->perawatanModel->getPerawatan();
        $i = 0;
        $data = [
            'side' => "c_perawatan",
            'tittle' => "List Perawatan Barang",
            'perawatan' => $this->perawatanModel->getPerawatan(),
        ];
        return view('perawatan/l_perawatan', $data);
    }

    public function c_perawatan()
    {
        //session();// pindahkan ke base controller
        $maxIdPerawatan = $this->perawatanModel->getMaxIdPerawatan()->getResult();
        foreach ($maxIdPerawatan as $a) {
        }
        $maxIdPerawatan = $a->kode_perawatan + 1;
        $data = [
            'side' => "c_perawatan",
            'tittle' => "Tambah Perawatan Barang",
            'barang' => $this->perawatanModel->getBarangGroup(), //ambil dari detail lokasi barang
            'maxIdPerawatan' => $maxIdPerawatan,
            'validation' => \Config\Services::validation()
        ];
        return view('perawatan/c_perawatan', $data);
    }

    public function s_perawatan()
    {
        $data = [
            'kode_perawatan' => $this->request->getVar('kode_perawatan'),
            'tgl_perawatan' => $this->request->getVar('tglPer'),
        ];
        $this->transModel->insave('tb_perawatan', $data);

        $qtyBar = $this->request->getVar('nbarper');
        $totbar = count($qtyBar);
        for ($i = 0; $i < $totbar; $i++) {
            $databar = [
                'kode_perawatan' => $this->request->getVar('kode_perawatan'),
                'kode_barang' => $this->request->getVar('nbarper[' . $i . ']'),
                'qty' => $this->request->getVar('qbarper[' . $i . ']'),
                'status' => 'proses',
            ];
            $this->transModel->insave('tb_detail_perawatan', $databar);
        }
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('/mperawatan/l_perawatan'));
    }

    public function det_perawatan($kper)
    {
        $data = [
            'side' => "c_perawatan",
            'tittle' => "Detail Perawatan Barang",
            'perawatan' => $this->perawatanModel->getPerawatan($kper),
            'validation' => \Config\Services::validation()
        ];
        return view('perawatan/det_perawatan', $data);
    }

    public function s_det_per()
    {
        // dd($this->request->getVar());
        $totKper = count($this->request->getVar('kper'));
        for ($i = 0; $i < $totKper; $i++) {
            $data = [
                'status' => $this->request->getVar('status[' . $i . ']')
            ];
            $where = ['kode_perawatan' => $this->request->getVar('kper[' . $i . ']'), 'kode_barang' => $this->request->getVar('kbar[' . $i . ']')];
            $this->perawatanModel->upDetPer('tb_detail_perawatan', $where, $data);

            // echo $this->request->getVar('status[' . $i . ']') . " | " . $this->request->getVar('kper[' . $i . ']') . " | " . $this->request->getVar('kbar[' . $i . ']') . "<br>";
        }
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url('/mperawatan/l_perawatan'));
    }

    public function dPer() //delete perawatan
    {
        $kode_perawatan = $this->request->getVar('kode_perawatan');

        $this->perawatanModel->dPer($kode_perawatan);

        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/mperawatan/l_perawatan');
    }
}
