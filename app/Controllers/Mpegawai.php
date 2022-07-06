<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

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
}
