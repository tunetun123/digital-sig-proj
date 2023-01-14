<?php

class Sig_Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function uploadDokumen($data)
    {
        $this->db->query('INSERT INTO dokumen (judul_dokumen, dokumen, nilai_hash) VALUES(:judul_dokumen, :dokumen, :nilai_hash)');

        //Bind values
        $this->db->bind(':judul_dokumen', $data['judul_dokumen']);
        $this->db->bind(':dokumen', $data['dokumen']);
        $this->db->bind(':nilai_hash', $data['nilai_hash']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getDokumen($data)
    {
        $this->db->query('SELECT id_dokumen, judul_dokumen, dokumen, nilai_hash FROM dokumen WHERE nilai_hash = :nilai_hash');

        //Bind values
        $this->db->bind(':nilai_hash', $data);

        $row = $this->db->single();

        return $row;
    }

    public function deleteDokumen($data)
    {
        $this->db->query('DELETE FROM dokumen WHERE id_dokumen = :id_dokumen');

        //Bind values
        $this->db->bind(':id_dokumen', $data);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getKunci($data)
    {
        $this->db->query('SELECT * FROM kunci WHERE kunci_privat = :kunci_privat');

        $this->db->bind(':kunci_privat', $data);

        $row = $this->db->single();

        return $row;
    }

    public function generateSig($data)
    {
        $this->db->query('INSERT INTO tanda_tangan (id_dokumen, id_kunci, sig, kongruen, tanggal_pengesahan, waktu_pengesahan) 
                            VALUES (:id_dokumen, :id_kunci, :sig, :kongruen, :tanggal_pengesahan, :waktu_pengesahan)');

        $this->db->bind(':id_dokumen', $data['id_dokumen']);
        $this->db->bind(':id_kunci', $data['id_kunci']);
        $this->db->bind(':sig', $data['sig']);
        $this->db->bind(':kongruen', $data['kongruen']);
        $this->db->bind(':tanggal_pengesahan', $data['tanggal_pengesahan']);
        $this->db->bind(':waktu_pengesahan', $data['waktu_pengesahan']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getKongruen($data)
    {
        $this->db->query('SELECT id_sig, kongruen FROM tanda_tangan WHERE sig = :sig');

        $this->db->bind(':sig', $data);

        $row = $this->db->single();

        return $row;
    }

    public function getDetail($data)
    {
        $this->db->query(
            'SELECT pegawai.nama, pegawai.divisi, pegawai.jabatan, dokumen.judul_dokumen, tanda_tangan.tanggal_pengesahan, 
            tanda_tangan.waktu_pengesahan, kunci.kunci_publik 
            FROM pegawai, users, dokumen, tanda_tangan, kunci 
            WHERE users.nik = pegawai.nik AND kunci.id_user = users.id_user 
            AND dokumen.id_dokumen = tanda_tangan.id_dokumen AND tanda_tangan.id_kunci = kunci.id_kunci 
            AND tanda_tangan.id_sig = :id_sig'
        );

        $this->db->bind(':id_sig', $data);

        $row = $this->db->single();

        return $row;
    }
}
