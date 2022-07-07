<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function noFound()
    {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Halaman tidak ditemukan');
    }
}
