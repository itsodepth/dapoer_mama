<?php

class Pesanan_model {
    private $table = 'pesanan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllPesanan() {
        $this->db->query('SELECT 
                    pesanan.id_history,
                    user.username,
                    size_box.size,
                    pesanan.isi_1,
                    pesanan.isi_2,
                    pesanan.isi_3,
                    pesanan.isi_4,
                    pesanan.isi_5,
                    pesanan.minuman,
                    pesanan.jumlah,
                    pesanan.harga,
                    pesanan.dp,
                    pesanan.alamat
                FROM ' . $this->table . ' 
                INNER JOIN user ON pesanan.id_user = user.id_user
                INNER JOIN size_box ON pesanan.id_size = size_box.id_size
                ORDER BY pesanan.id_history DESC');
        return $this->db->resultSet();
    }
}