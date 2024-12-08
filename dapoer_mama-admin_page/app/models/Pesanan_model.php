<?php

class Pesanan_model {
    private $table = 'pesanan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllPesanan(){
        $this->db->query('SELECT 
                    pesanan.id_pes,
                    user.username,
                    pesanan.waktu,
                    pesanan.alamat,
                    user.tlp,
                    pesanan.cara_bayar,
                    pesanan.jumlah,
                    pesanan.totalharga,
                    pesanan.status
                        FROM ' . $this->table . ' INNER JOIN user on pesanan.id_user = user.id_user ORDER BY waktu DESC');
        return $this->db->resultSet();
    }

    public function getPesananById($id_pes){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pes = :id_pes');
        $this->db->bind('id_pes', $id_pes);
        return $this->db->single();
    }

    public function tambahDataPesanan($data){
        $this->db->query('INSERT INTO pesanan (username, waktu, status, alamat, cara_bayar, jumlah, totalharga, id_size) VALUES (:username, :waktu, :status, :alamat, :cara_bayar, :jumlah, :totalharga, :id_size)');
        $this->db->bind('username', $data['username']);
        $this->db->bind('waktu', $data['waktu']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('cara_bayar', $data['cara_bayar']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('totalharga', $data['totalharga']);
        $this->db->bind('id_size', $data['id_size']);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function cariDataPesanan(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM pesanan WHERE waktu LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }
}
?>
