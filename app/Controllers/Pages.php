<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'side' => "home",
            'tittle' => "Dashboard"
        ];
        return view('layout/home', $data);
    }
}
