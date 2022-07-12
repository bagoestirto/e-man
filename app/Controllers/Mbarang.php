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
            'barang' => $this->barangModel->getBarang($slug)
        ];
        return view('mastering/e_barang', $data);
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
}
