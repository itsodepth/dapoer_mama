<?php

class Pelanggan_model {
    private $table = 'pelanggan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUser(){
        $this->db->query("SELECT * FROM user WHERE level = '1'");
    }

    public function getPelangganWithUserData()
    {
    $this->db->query("SELECT 
                user.username,
                user.email,
                pelanggan.nama,
                pelanggan.alamat,
                user.tlp,
                pelanggan.kodepos
            FROM  pelanggan
            INNER JOIN user ON user.id_user = pelanggan.id_pelanggan
            WHERE user.level = '1'");
            return $this->db->resultSet();
    }

    public function cariDataPelanggan(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM pelanggan WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }

}
?>
