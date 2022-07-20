<?php

namespace App\Controllers;

use App\Models\TransModel;
use App\Models\PinjamModel;
use App\Models\BarangModel;
use App\Models\PegawaiModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\Validation\StrictRules\Rules;
use Kint\Parser\FsPathPlugin;
use CodeIgniter\I18n\Time;
use Dompdf\Dompdf;

class Mpinjam extends BaseController
{
    public function __construct()
    {
        $this->transModel = new TransModel();
        $this->pinjamModel = new PinjamModel();
        $this->barangModel = new BarangModel();
        $this->pegawaiModel = new PegawaiModel();
    }

    public function l_pinjam()
    {
        $lokasi = $this->pinjamModel->getPinjam();
        $i = 0;
        $data = [
            'side' => "c_pinjam",
            'tittle' => "List Peminjaman Barang",
            'pinjam' => $this->pinjamModel->getPinjam(),
        ];
        return view('pinjam/l_pinjam', $data);
    }

    public function c_pinjam()
    {
        //session();// pindahkan ke base controller
        $myTime = new Time('now', 'Asia/Jakarta', 'en_US');
        $maxIdPinjam = $this->pinjamModel->getMaxIdPinjam()->getResult();
        foreach ($maxIdPinjam as $a) {
        }
        $maxIdPinjam = $a->kode_pinjam + 1;
        $data = [
            'side' => "c_pinjam",
            'pegawai' => $this->pinjamModel->getPegawai()->getResult(),
            'tittle' => "Tambah Peminjaman Barang",
            'barang' => $this->barangModel->getBarangNotNol(), //ambil barang aset tetap yg qty tidak 0
            'maxIdPinjam' => $maxIdPinjam,
            'dToday' => $myTime->toDateString(),
            'validation' => \Config\Services::validation()
        ];
        return view('pinjam/c_pinjam', $data);
    }

    public function s_pinjam()
    {
        // dd($this->request->getVar());
        $datapinjam = [
            'kode_pinjam' => $this->request->getVar('kode_pinjam'),
            'kode_pegawai' => $this->request->getVar('kpeg'),
            'username' => $this->request->getVar('username'),
            'tgl_pinjam' => $this->request->getVar('tgl_pinjam'),
            'tgl_jatuh_tempo' => $this->request->getVar('tglJT'),
            'status' => "Keluar",
        ];
        $this->transModel->insave('tb_peminjaman', $datapinjam);

        $qtyBar = $this->request->getVar('nbar');
        $totbar = count($qtyBar);
        for ($i = 0; $i < $totbar; $i++) {
            $databar = [
                'kode_pinjam' => $this->request->getVar('kode_pinjam'),
                'kode_barang' => $this->request->getVar('nbar[' . $i . ']'),
                'jumlah' => $this->request->getVar('qbar[' . $i . ']'),
            ];
            $this->transModel->insave('tb_detail_peminjaman', $databar);

            $stokAwal = $this->barangModel->getBarang($this->request->getVar('nbar[' . $i . ']'));
            $stok_Awal = $stokAwal['stok_barang'];
            $stokAkhir = $stok_Awal - $this->request->getVar('qbar[' . $i . ']');
            $this->barangModel->save([
                'id_barang' => $this->request->getVar('nbar[' . $i . ']'),
                'stok_barang' => $stokAkhir
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('/mpinjam/cetak/' . $this->request->getVar('kode_pinjam')));
    }

    public function cetak($slug)
    {
        $qlok = $this->pinjamModel->getDetPinjam($slug);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $data = [
            'side' => "c_pinjam",
            'tittle' => "Detail Peminjaman Barang",
            'pegawai' => $this->pegawaiModel->getPegawai($kpeg),
            'pinjam' => $this->pinjamModel->getDetPinjam($slug),
            'validation' => \Config\Services::validation()
        ];
        return view('pinjam/cetak', $data);
    }

    public function generate($slug)
    {
        $qlok = $this->pinjamModel->getDetPinjam($slug);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $data = [
            'pegawai' => $this->pegawaiModel->getPegawai($kpeg),
            'pinjam' => $this->pinjamModel->getDetPinjam($slug),
            'validation' => \Config\Services::validation()
        ];

        $filename = date('y-m-d-H-i-s') . '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content
        $dompdf->loadHtml(view('pinjam/print', $data));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }

    public function print($slug) //untuk tes
    {
        $qlok = $this->pinjamModel->getDetPinjam($slug);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $data = [
            'pegawai' => $this->pegawaiModel->getPegawai($kpeg),
            'pinjam' => $this->pinjamModel->getDetPinjam($slug),
            'validation' => \Config\Services::validation()
        ];

        return view('pinjam/print', $data);
    }
}
