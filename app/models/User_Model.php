<?php

class User_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getName()
    {
        $this->db->query('SELECT users.id_user, pegawai.nama FROM users,pegawai WHERE users.nik=pegawai.nik');

        $option = $this->db->resultSet();

        return $option;
    }

    public function username($username)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        // Bind Value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $usernamedb = $row->username;

        if ($username == $usernamedb) {
            return true;
        } else {
            return false;
        }
    }

    public function nikCheck($data)
    {
        $this->db->query('SELECT * FROM users WHERE nik = :nik');

        // Bind Value
        $this->db->bind(':nik', $data);

        $row = $this->db->single();

        $nikdb = $row->nik;

        if ($data == $nikdb) {
            return true;
        } else {
            return false;
        }
    }

    public function listUsers()
    {
        $this->db->query(
            'SELECT users.id_user, users.nik, role.role, users.username, users.password 
            FROM users, role WHERE users.id_role = role.id_role'
        );

        $result = $this->db->resultSet();

        return $result;
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (nik, id_role, username, password) VALUES (:nik, :id_role, :username, :password)');

        //Bind values
        $this->db->bind(':nik', $data['nik']);
        $this->db->bind(':id_role', $data['role']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        // Bind Value
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }
}
