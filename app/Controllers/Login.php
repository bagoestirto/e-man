<?php

namespace App\Controllers;

use App\Models\UserModel;
// use App\Filters\AuthGuard;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('v_login');
    }

    public function proses()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $dataUser = $this->userModel->getUserLog($username);
        // echo $username . "<br>" . $password . "<br>" . $dataUser['password'] . "<br>" . password_verify($password, $this->request->getVar('password'));
        // die;
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                session()->set([
                    'username' => $dataUser['username'],
                    'nama_user' => $dataUser['nama_user'],
                    'jabatan' => $dataUser['jabatan'],
                    'id_user' => $dataUser['id_user'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('pesan', 'Username & Password Salah');
                return redirect()->to(base_url() . '/login');
            }
        } else {
            session()->setFlashdata('pesan', 'Username & Password Salah');
            return redirect()->to(base_url() . '/login');
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url() . '/login');
    }
}
