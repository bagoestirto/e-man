<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Validation\StrictRules\Rules;


class Muser extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function l_user()
    {
        $data = [
            'side' => "c_user",
            'tittle' => "List User",
            'user' => $this->userModel->getUser()
        ];
        return view('user/l_user', $data);
    }

    public function c_user()
    {
        //session();// pindahkan ke base controller
        $data = [
            'side' => "c_user",
            'tittle' => "Tambah User",
            'validation' => \Config\Services::validation()
        ];
        return view('user/c_user', $data);
    }

    public function s_user()
    {
        $rules = [
            'username' => [
                'rules' => 'required|min_length[3]|max_length[20]|is_unique[tb_user.username]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'min_length' => 'Username minimal 3 huruf',
                    'max_length' => 'Username maximal 20 huruf',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'password'      => [
                'rules' => 'required|min_length[6]|max_length[200]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Password minimal 6 huruf',
                    'max_length' => 'Password maximal 200 huruf',
                ]
            ],
            'confpassword'  => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $data = [
                'username'     => $this->request->getVar('username'),
                'jabatan'     => $this->request->getVar('jabatan'),
                'nama_user'    => $this->request->getVar('nama_user'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $this->userModel->insert($data);
            return redirect()->to(base_url('muser/l_user'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/muser/c_user')->withInput()->with('validation', $validation);
        }
    }

    public function delete($id_user)
    {
        $this->userModel->delete($id_user);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/muser/l_user');
    }

    public function edit($id_user)
    {
        $data = [
            'side' => "c_user",
            'tittle' => "Edit User",
            'validation' => \Config\Services::validation(),
            'user' => $this->userModel->getUser($id_user)
        ];
        return view('user/e_user', $data);
    }

    public function update()
    {
        $data_lama = $this->userModel->getUser($this->request->getVar('id_user'));

        if ($data_lama['username'] == $this->request->getVar('username')) {
            $rule_username = 'required|min_length[3]|max_length[20]';
        } else {
            $rule_username = 'required|min_length[3]|max_length[20]|is_unique[tb_user.username]';
        }

        $rules = [
            'username' => [
                'rules' =>  $rule_username,
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'min_length' => 'Username minimal 3 huruf',
                    'max_length' => 'Username maximal 20 huruf',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'password'      => [
                'rules' => 'required|min_length[6]|max_length[200]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                    'min_length' => 'Password minimal 6 huruf',
                    'max_length' => 'Password maximal 200 huruf',
                ]
            ],
            'confpassword'  => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sama'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $data = [
                'id_user' => $this->request->getVar('id_user'),
                'username'     => $this->request->getVar('username'),
                'jabatan'     => $this->request->getVar('jabatan'),
                'nama_user'    => $this->request->getVar('nama_user'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];
            $this->userModel->save($data);
            return redirect()->to(base_url('muser/l_user'));
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/muser/e_user')->withInput()->with('validation', $validation);
        }
    }
}
