<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('selamat_datang');
        // echo "apa ini";
    }
    public function noFound()
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak ditemukan');
    }
}
