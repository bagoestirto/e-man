<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Validation\StrictRules\Rules;
use Kint\Parser\FsPathPlugin;

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

    /*public function s_pegawai()
    {
        if (!$this->validate([
            'kpeg' => [
                'rules' => 'required|is_unique[tb_pegawai.kode_pegawai]',
                'errors' => [
                    'required' => 'Kode Pegawai tidak boleh kosong.',
                    'is_unique' => 'Kode Pegawai sudah terdaftar.'
                ]
            ],
            'npeg' => [
                'rules' => 'required|is_unique[tb_pegawai.nama_pegawai]',
                'errors' => [
                    'required' => 'Nama Pegawai tidak boleh kosong.',
                    'is_unique' => 'Nama Pegawai sudah terdaftar.'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/mpegawai/c_pegawai')->withInput()->with('validation', $validation);
        }

        //dd($this->request->getVar());
        $slug = url_title($this->request->getVar('npeg'), '-', true);
        //echo "<br>" . $slug . "<br>" . $this->request->getVar('kpeg') . "<br>" . $this->request->getVar('npeg') . "<br>" . $this->request->getVar('alamat') . "<br>" . $this->request->getVar('notelp');

        $this->pegawaiModel->insert([
            'kode_pegawai' => $this->request->getVar('kpeg'),
            'nama_pegawai' => $this->request->getVar('npeg'),
            'slug' => $slug,
            'alamat' => $this->request->getVar('alamat'),
            'nomor_telepon' => $this->request->getVar('notelp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('/mpegawai/l_pegawai'));
    }

    public function delete($kode_pegawai)
    {
        $this->pegawaiModel->delete($kode_pegawai);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/mpegawai/l_pegawai');
    }

    public function edit($slug)
    {
        //session();// pindahkan ke base controller
        $data = [
            'side' => "c_pegawai",
            'tittle' => "Edit Pegawai",
            'validation' => \Config\Services::validation(),
            'pegawai' => $this->pegawaiModel->getPegawai($slug)
        ];
        return view('mastering/e_pegawai', $data);
    }

    public function update($kode_pegawai)
    {
        $data_lama = $this->pegawaiModel->getPegawai($this->request->getVar('slug'));

        if ($data_lama['kode_pegawai'] == $this->request->getVar('kpeg')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[tb_pegawai.kode_pegawai]';
        }

        if ($data_lama['nama_pegawai'] == $this->request->getVar('npeg')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[tb_pegawai.nama_pegawai]';
        }

        if (!$this->validate([
            'kpeg' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => 'Kode Pegawai tidak boleh kosong.',
                    'is_unique' => 'Kode Pegawai sudah terdaftar.'
                ]
            ],
            'npeg' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => 'Nama Pegawai tidak boleh kosong.',
                    'is_unique' => 'Nama Pegawai sudah terdaftar.'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/mpegawai/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('npeg'), '-', true);
        //echo "<br>" . $slug . "<br>" . $this->request->getVar('kpeg') . "<br>" . $this->request->getVar('npeg') . "<br>" . $this->request->getVar('alamat') . "<br>" . $this->request->getVar('notelp');

        $this->pegawaiModel->save([
            'kode_pegawai' => $kode_pegawai,
            //'kode_pegawai' => $this->request->getVar('kpeg'),
            'nama_pegawai' => $this->request->getVar('npeg'),
            'slug' => $slug,
            'alamat' => $this->request->getVar('alamat'),
            'nomor_telepon' => $this->request->getVar('notelp')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to(base_url('/mpegawai/l_pegawai'));
    }*/
}
