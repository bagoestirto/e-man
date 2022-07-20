<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'side' => "home",
            'tittle' => "Dashboard",
            // 'session' => session()->get('nama_user')
        ];
        return view('layout/home', $data);
    }
}
