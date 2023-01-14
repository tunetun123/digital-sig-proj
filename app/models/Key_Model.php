<?php

class Key_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addKey($data)
    {
        $this->db->query('INSERT INTO kunci (id_user, nilai_n, kunci_publik, kunci_privat) VALUES (:id_user, :nilai_n, :kunci_publik, :kunci_privat)');

        $this->db->bind(':id_user', $data['id_user']);
        $this->db->bind(':nilai_n', $data['nilai_n']);
        $this->db->bind(':kunci_publik', $data['kunci_publik']);
        $this->db->bind(':kunci_privat', $data['kunci_privat']);

        // execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function listKey()
    {
        $this->db->query('SELECT * FROM kunci');

        $result = $this->db->resultSet();

        return $result;
    }

    public function pubKeyById($data)
    {
        $this->db->query('SELECT nilai_n, kunci_publik FROM kunci WHERE id_kunci = :id_kunci');

        $this->db->bind(':id_kunci', $data);

        $row = $this->db->single();

        return $row;
    }

    public function keyUser()
    {
        $this->db->query(
            'SELECT kunci.id_kunci, pegawai.nama 
                            FROM kunci, users, pegawai 
                            WHERE pegawai.nik = users.nik AND kunci.id_user = users.id_user'
        );

        $option = $this->db->resultSet();

        return $option;
    }
}
