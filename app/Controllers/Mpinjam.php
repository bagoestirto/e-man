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
use App\ThirdParty\FPDF\fpdf;

// use Dompdf\Dompdf;

class Mpinjam extends BaseController
{
    public function __construct()
    {
        $this->transModel = new TransModel();
        $this->pinjamModel = new PinjamModel();
        $this->barangModel = new BarangModel();
        $this->pegawaiModel = new PegawaiModel();
        $this->myTime = new Time('now', 'Asia/Jakarta', 'en_US');
    }

    public function l_pinjam()
    {
        $lokasi = $this->pinjamModel->getPinjam();
        $i = 0;
        $data = [
            'halaman' => 'l_pinjam',
            'side' => "c_pinjam",
            'tittle' => "List Peminjaman Barang",
            'pinjam' => $this->pinjamModel->getPinjam(),
        ];
        return view('pinjam/l_pinjam', $data);
    }

    public function l_kembali()
    {
        $lokasi = $this->pinjamModel->getPinjam();
        $i = 0;
        $data = [
            'halaman' => 'l_kembali',
            'side' => "c_kembali",
            'tittle' => "List Peminjaman Barang",
            'pinjam' => $this->pinjamModel->getPinjam(),
        ];
        return view('pinjam/l_pinjam', $data);
    }

    public function c_pinjam()
    {
        //session();// pindahkan ke base controller
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
            'dToday' => $this->myTime->toDateString(),
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
        return redirect()->to(base_url('/mpinjam/l_pinjam'));
    }

    public function s_kembali()
    {
        // dd($this->request->getVar());
        $this->pinjamModel->up_pinjam($this->request->getVar('kode_pinjam'));
        $kode_pinjam = $this->request->getVar('kode_pinjam');
        $data_pinjam = $this->pinjamModel->getDetPinjam($kode_pinjam);
        foreach ($data_pinjam as $datPin) {
            $stokBaru = $datPin['stok_barang'] + $datPin['jumlah'];
            $this->barangModel->save([
                'id_barang' => $datPin['id_barang'],
                'stok_barang' => $stokBaru
            ]);
        }
        session()->setFlashdata('pesan', 'Data berhasil diproses.');
        return redirect()->to(base_url('/mpinjam/l_kembali'));
    }

    public function det_pinjam($slug)
    {
        $qlok = $this->pinjamModel->getDetPinjam($slug);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $data = [
            'halaman' => "det_pinjam",
            'side' => "c_pinjam",
            'tittle' => "Detail Peminjaman Barang",
            'pegawai' => $this->pegawaiModel->getPegawai($kpeg),
            'pinjam' => $this->pinjamModel->getDetPinjam($slug),

            'validation' => \Config\Services::validation()
        ];
        return view('pinjam/det_pinjam', $data);
    }

    public function det_kembali($slug)
    {
        $qlok = $this->pinjamModel->getDetPinjam($slug);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $data = [
            'halaman' => "det_kembali",
            'side' => "c_kembali",
            'tittle' => "Detail Peminjaman Barang",
            'pegawai' => $this->pegawaiModel->getPegawai($kpeg),
            'pinjam' => $this->pinjamModel->getDetPinjam($slug),

            'validation' => \Config\Services::validation()
        ];
        return view('pinjam/det_pinjam', $data);
    }

    public function cetak($slug)
    {
        $qlok = $this->pinjamModel->getDetPinjam($slug);
        foreach ($qlok as $k) {
            $kpegawai = $k['kode_pegawai'];
        }
        $kpeg = $kpegawai;
        $pegawai = $this->pegawaiModel->getPegawai($kpeg);
        $pinjam = $this->pinjamModel->getDetPinjam($slug);

        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DATA PEMINJAMAN ASET', 0, 1, 'C'); //panjang 277
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(10, 6, '', 0, 0, 'C');
        $pdf->Cell(30, 6, 'Kode Pinjam', 0, 0, 'L');
        $pdf->Cell(90, 6, ": " . $k['kode_pinjam'], 0, 0, 'L');
        $pdf->Cell(30, 6, '', 0, 0, 'L');
        $pdf->Cell(32, 6, 'Tgl Pinjam', 0, 0, 'L');
        $pdf->Cell(90, 6, ": " . $k['tgl_pinjam'], 0, 1, 'L');
        $pdf->Cell(10, 6, '', 0, 0, 'C');
        $pdf->Cell(30, 6, 'Nama Peminjam', 0, 0, 'L');
        $pdf->Cell(90, 6, ": " . $k['nama_pegawai'], 0, 0, 'L');
        $pdf->Cell(30, 6, '', 0, 0, 'L');
        $pdf->Cell(32, 6, 'Tgl Jatuh Tempo', 0, 0, 'L');
        $pdf->Cell(90, 6, ": " . $k['tgl_jatuh_tempo'], 0, 1, 'L');
        $pdf->Cell(10, 6, '', 0, 0, 'C');
        $pdf->Cell(30, 6, 'Nama Petugas', 0, 0, 'L');
        $pdf->Cell(90, 6, ": " . $k['username'], 0, 0, 'L');
        $pdf->Cell(30, 6, '', 0, 0, 'L');
        $pdf->Cell(32, 6, 'Status', 0, 0, 'L');
        $pdf->Cell(90, 6, ": " . $k['status'], 0, 1, 'L');

        $pdf->Ln();
        $pdf->Cell(10, 6, '', 0, 0, 'C');
        $pdf->Cell(27, 6, 'ID Brg', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Kode Barang', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Merk', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Type', 1, 0, 'C');
        $pdf->Cell(10, 6, 'Qty', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        foreach ($pinjam as $p) {
            $pdf->Cell(10, 6, '', 0, 0, 'C');
            $pdf->Cell(27, 6, $p['id_barang'], 1, 0, 'C');
            $pdf->Cell(50, 6, $p['kode_barang'], 1, 0);
            $pdf->Cell(90, 6, $p['nama_barang'], 1, 0);
            $pdf->Cell(40, 6, $p['merk'], 1, 0);
            $pdf->Cell(40, 6, $p['type'], 1, 0);
            $pdf->Cell(10, 6, $p['jumlah'], 1, 1, 'C');
        }
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('I');
    }

    public function printPinKem($slug)
    {
        // $slug = $this->request->getVar('status');
        $Pin = $this->pinjamModel->getPinKem($slug);
        // $pegawai = $this->pegawaiModel->getPegawai($kpeg);
        // $pinjam = $this->pinjamModel->getDetPinjam($slug);

        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 7, 'DATA BARANG ' . strtoupper(($slug == 'Keluar') ? 'PEMINJAMAN BARANG' : 'PENGEMBALIAN BARANG'), 0, 1, 'C'); //panjang 277

        if ($slug == 'Keluar') {
            $lenTgl = 30;
        } else {
            $lenTgl = 20;
        }
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Ln();
        $pdf->Cell(8, 6, 'No', 1, 0, 'C');
        $pdf->Cell(22, 6, 'Kode Pinjam', 1, 0, 'C');
        $pdf->Cell($lenTgl, 6, 'Tgl Pinjam', 1, 0, 'C');
        $pdf->Cell($lenTgl, 6, 'Tgl Jth Tempo', 1, 0, 'C');
        ($slug == 'Kembali') ? $pdf->Cell($lenTgl, 6, 'Tgl Kembali', 1, 0, 'C') : '';
        $pdf->Cell(70, 6, 'Nama Pegawai', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Keterangan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 8);
        $no = 1;
        foreach ($Pin as $p) {
            $pdf->Cell(8, 6, $no++, 1, 0, 'C');
            $pdf->Cell(22, 6, $p['kode_pinjam'], 1, 0, 'C');
            $pdf->Cell($lenTgl, 6, $p['tgl_pinjam'], 1, 0);
            $pdf->Cell($lenTgl, 6, $p['tgl_jatuh_tempo'], 1, 0);
            if ($slug == 'Keluar') {
                $paramTgl = $this->myTime->toDateString();
            } else {
                $pdf->Cell($lenTgl, 6, $p['tgl_kembali'], 1, 0);
                $paramTgl = $p['tgl_kembali'];
            }
            $pdf->Cell(70, 6, $p['nama_pegawai'], 1, 0);
            $pdf->Cell(30, 6, ($p['tgl_jatuh_tempo'] > $paramTgl) ? '' : 'Terlambat', 1, 1);
            if ($slug == 'Keluar') {
                $detPin = $this->pinjamModel->getDetPinjam($p['kode_pinjam']);
                foreach ($detPin as $dp) {
                    $pdf->Cell(30, 6, '', 0, 0, 'C');
                    $pdf->Cell(30, 6, $dp['kode_barang'], 1, 0);
                    $pdf->Cell(60, 6, $dp['nama_barang'], 1, 0);
                    $pdf->Cell(50, 6, 'Jumlah : ' . $dp['jumlah'], 1, 1);
                }
            }
        }
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('I');
    }
}
