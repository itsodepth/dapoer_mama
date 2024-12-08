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
                        FROM ' . $this->table . ' INNER JOIN user on pesanan.id_user = user.id_user WHERE id_pes = :id_pes');
        $this->db->bind('id_pes', $id_pes);
        return $this->db->single();
    }

    public function getDetailPesananById($id_pes) {
        $this->db->query('SELECT * FROM detail_pesanan WHERE id_pes = :id_pes');
        $this->db->bind('id_pes', $id_pes);
        return $this->db->resultSet();
    }

    public function getMenuById($id_menu) {
        $this->db->query('SELECT * FROM menu WHERE id_menu = :id_menu');
        $this->db->bind('id_menu', $id_menu);
        return $this->db->single();
    }

    public function getAllSizes() {
        $this->db->query('SELECT * FROM size_box');
        return $this->db->resultSet();
    }

    public function cariDataPesanan(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM pesanan WHERE waktu LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }

    public function updateStatusPesanan($data) {
        $id_pes = $data['id_pes'];
        $status = $data['status'];
    
        $query = "UPDATE pesanan SET status = :status WHERE id_pes = :id_pes";
        $this->db->query($query);
        $this->db->bind('status', $status);
        $this->db->bind('id_pes', $id_pes);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
}
?>
