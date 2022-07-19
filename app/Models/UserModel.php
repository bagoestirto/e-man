<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'nama_user', 'jabatan', 'password'];

    public function getUser($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['id_user' => $slug])->first();
    }
    public function getUserLog($slug)
    {
        return $this->where(['username' => $slug])->first();
    }
}
