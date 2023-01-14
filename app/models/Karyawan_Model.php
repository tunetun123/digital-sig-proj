<?php

class Karyawan_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKaryawan()
    {
        $this->db->query('SELECT * FROM pegawai');

        $option = $this->db->resultSet();

        return $option;
    }

    public function getRole()
    {
        $this->db->query('SELECT * FROM role');

        $option = $this->db->resultSet();

        return $option;
    }
}
