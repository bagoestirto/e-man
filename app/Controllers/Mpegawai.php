<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use CodeIgniter\Validation\StrictRules\Rules;

class Mpegawai extends BaseController
{
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function l_pegawai()
    {
        $data = [
            'side' => "l_pegawai",
            'tittle' => "List Pegawai",
            'pegawai' => $this->pegawaiModel->getPegawai()
        ];
        return view('mastering/l_pegawai', $data);
    }

    public function c_pegawai()
    {
        //session();// pindahkan ke base controller
        $data = [
            'side' => "c_pegawai",
            'tittle' => "Tambah Pegawai",
            'validation' => \Config\Services::validation()
        ];
        return view('mastering/c_pegawai', $data);
    }

    public function s_pegawai()
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
}
