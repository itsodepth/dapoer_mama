<?php

class Pesanan_model {
    private $table = 'pesanan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllPesanan(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPesananById($id_pes){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pes = :id_pes');
        $this->db->bind('id_pes', $id_pes);
        return $this->db->single();
    }

    public function tambahDataPesanan($data){
        $query = "INSERT INTO pesanan (waktu, status, alamat, tlp, cara_bayar, jumlah, totalharga, id_size) VALUES (:waktu, :status, :alamat, :tlp, :cara_bayar, :jumlah, :totalharga, :id_size)";
        $this->db->query($query);
        $this->db->bind('waktu', $data['waktu']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('tlp', $data['tlp']);
        $this->db->bind('cara_bayar', $data['cara_bayar']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('totalharga', $data['totalharga']);
        $this->db->bind('id_size', $data['id_size']);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function hapusDataMenu($id_pes){
        $query = "DELETE FROM pesanan WHERE id_pes = :id_pes";
        $this->db->query($query);
        $this->db->bind('id_pes', $id_pes);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMenu($data){
        $query = "UPDATE pesanan SET 
                    waktu = :waktu,
                    status = :status,
                    alamat = :alamat,
                    tlp = :tlp, 
                    cara_bayar = :cara_bayar,
                    jumlah = :jumlah,
                    totalharga = :totalharga,
                    id_size = :id_size
                    WHERE id_pes = :id_pes";

        $this->db->query($query);
        $this->db->bind('waktu', $data['waktu']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('tlp', $data['tlp']);
        $this->db->bind('cara_bayar', $data['cara_bayar']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('totalharga', $data['totalharga']);
        $this->db->bind('id_size', $data['id_size']);
        $this->db->bind('id_pes', $data['id_pes']);

        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function cariDataMenu(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM pesanan WHERE waktu LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }
}
?>
