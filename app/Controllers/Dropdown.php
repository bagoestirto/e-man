<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dropdown extends BaseController
{
    private $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getState()
    {
        $id_barang = $this->request->getVar("id_barang");

        $states = $this->db->query("SELECT id_barang, stok_barang from tb_barang where id_barang = " . $id_barang)->getFirstRow();

        return json_encode($states);
    }
    public function getPerDrop()
    {
        $id_barang = $this->request->getVar("id_barang");

        $states = $this->db->query("SELECT kode_barang as id_barang, sum(qty) as stok_barang from tb_detail_lokasi where kode_barang = " . $id_barang)->getFirstRow();

        return json_encode($states);
    }
}
