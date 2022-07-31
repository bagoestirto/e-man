<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Validation\StrictRules\Rules;
use Kint\Parser\FsPathPlugin;
use App\ThirdParty\FPDF\fpdf;


class Mbarang extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function l_barang()
    {
        $data = [
            'side' => "l_barang",
            'tittle' => "List Barang",
            'barang' => $this->barangModel->getBarang()
        ];
        return view('mastering/l_barang', $data);
    }

    public function c_barang()
    {
        //session();// pindahkan ke base controller
        $data = [
            'side' => "c_barang",
            'tittle' => "Tambah Barang",
            'validation' => \Config\Services::validation()
        ];
        return view('mastering/c_barang', $data);
    }

    public function s_barang()
    {
        if (!$this->validate([
            'kbar' => [
                'rules' => 'required|is_unique[tb_barang.kode_barang]',
                'errors' => [
                    'required' => 'Kode Barang tidak boleh kosong.',
                    'is_unique' => 'Kode Barang sudah terdaftar.'
                ]
            ],
            'harga' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Harga hanya boleh diisi dengan angka'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/mbarang/c_barang')->withInput()->with('validation', $validation);
        }

        $sensor = array('/', '`');
        $slug_barang = str_replace($sensor, '-', $this->request->getVar('kbar'));
        //echo "<br>" . $this->request->getVar('kbar') . "<br>" . $this->request->getVar('kpeg') . "<br>" . $this->request->getVar('npeg') . "<br>" . $this->request->getVar('alamat') . "<br>" . $this->request->getVar('notelp');

        $this->barangModel->insert([
            'kode_barang' => $this->request->getVar('kbar'),
            'slug_barang' => str_replace($sensor, '-', $this->request->getVar('kbar')),
            'nama_barang' => $this->request->getVar('nbar'),
            'stok_barang' => $this->request->getVar('stok'),
            'jenis_barang' => $this->request->getVar('jbar'),
            'merk' => $this->request->getVar('merk'),
            'type' => $this->request->getVar('type'),
            'kode_sumberdana' => $this->request->getVar('ksum'),
            'tgl_pembelian' => $this->request->getVar('tgl_beli'),
            'satuan' => $this->request->getVar('satuan'),
            'kondisi' => $this->request->getVar('kondisi'),
            'harga' => $this->request->getVar('harga')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('/mbarang/l_barang'));
    }

    public function delete($id_barang)
    {
        $this->barangModel->delete($id_barang);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/mbarang/l_barang');
    }

    public function edit($slug)
    {
        //session();// pindahkan ke base controller
        $data = [
            'side' => "e_barang",
            'tittle' => "Edit Barang",
            'validation' => \Config\Services::validation(),
            'barangMaster' => $this->barangModel->getBarang($slug)
        ];
        return view('mastering/e_barang', $data);
    }

    public function a_barang()
    {
        //session();// pindahkan ke base controller
        $data = [
            'side' => "e_barang",
            'tittle' => "Tambah Stok Barang",
            'validation' => \Config\Services::validation(),
            'barangStok' => $this->barangModel->getBarang()
        ];
        return view('mastering/a_barang', $data);
    }

    public function u_stok()
    {
        if (!$this->validate([
            'plusStok' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Harga hanya boleh diisi dengan angka'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/mbarang/a_barang/')->withInput()->with('validation', $validation);
        }

        $data_lama = $this->barangModel->getBarang($this->request->getVar('id_barang'));
        $stokLama = $data_lama['stok_barang'];
        $stokBaru = $stokLama + $this->request->getVar('plusStok');

        echo $stokLama . " + " . $this->request->getVar('plusStok') . " = " . $stokBaru;

        $this->barangModel->save([
            'id_barang' => $this->request->getVar('id_barang'),
            'stok_barang' => $stokBaru,
        ]);

        session()->setFlashdata('pesan', 'Data stok berhasil ditambahkan.');
        return redirect()->to(base_url('/mbarang/l_barang'));
    }

    public function update($id_barang)
    {
        $data_lama = $this->barangModel->getBarang($this->request->getVar('slug_barang'));

        if ($data_lama['kode_barang'] == $this->request->getVar('kbar')) {
            $rule_kode = 'required';
        } else {
            $rule_kode = 'required|is_unique[tb_barang.kode_barang]';
        }

        if (!$this->validate([
            'kbar' => [
                'rules' => $rule_kode,
                'errors' => [
                    'required' => 'Kode Barang tidak boleh kosong.',
                    'is_unique' => 'Kode Barang sudah terdaftar.'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/mbarang/edit/' . $this->request->getVar('slug_barang'))->withInput()->with('validation', $validation);
        }

        $sensor = array('/', '`');
        $slug_barang = str_replace($sensor, '-', $this->request->getVar('kbar'));

        $this->barangModel->save([
            'id_barang' => $id_barang,
            'kode_barang' => $this->request->getVar('kbar'),
            'slug_barang' => $slug_barang,
            'nama_barang' => $this->request->getVar('nbar'),
            'stok_barang' => $this->request->getVar('stok'),
            'jenis_barang' => $this->request->getVar('jbar'),
            'merk' => $this->request->getVar('merk'),
            'type' => $this->request->getVar('type'),
            'kode_sumberdana' => $this->request->getVar('ksum'),
            'tgl_pembelian' => $this->request->getVar('tgl_beli'),
            'satuan' => $this->request->getVar('satuan'),
            'kondisi' => $this->request->getVar('kondisi'),
            'harga' => $this->request->getVar('harga')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url('/mbarang/l_barang'));
    }

    public function printBarang($jen_bar)
    {
        if ($jen_bar == 'tetap') {
            $jenBar = 'Aset Tetap';
        } else if ($jen_bar == 'ekstra') {
            $jenBar = 'Aset Ekstrakomtabel';
        } else if ($jen_bar == 'habis') {
            $jenBar = 'Habis Pakai';
        }
        $query = $this->barangModel->getBarangPrint($jenBar);

        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 7, 'DATA BARANG ' . strtoupper($jenBar), 0, 1, 'C'); //panjang 277
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);

        $pdf->Ln();
        $pdf->Cell(7, 6, 'No', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Kode Barang', 1, 0, 'C');
        $pdf->Cell(90, 6, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Merk', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Kondisi', 1, 0, 'C');
        $pdf->Cell(40, 6, 'Harga', 1, 0, 'C');
        $pdf->Cell(18, 6, 'Stok', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $i = 1;
        foreach ($query as $p) {
            $pdf->Cell(7, 6, $i++, 1, 0, 'C');
            $pdf->Cell(50, 6, $p['kode_barang'], 1, 0, 'C');
            $pdf->Cell(90, 6, $p['nama_barang'], 1, 0);
            $pdf->Cell(40, 6, $p['merk'], 1, 0);
            $pdf->Cell(30, 6, $p['kondisi'], 1, 0);
            $pdf->Cell(40, 6, number_format($p['harga']) . " ", 1, 0, 'R');
            $pdf->Cell(18, 6, $p['stok_barang'], 1, 1, 'C');
        }
        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('I');
    }
}
