<?php

namespace App\Controllers;

class Muser extends BaseController
{
    public function l_user()
    {
        $data = [
            'side' => "l_user",
            'tittle' => "List User"
        ];
        return view('mastering/l_user', $data);
    }
}
