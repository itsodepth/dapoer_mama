<?php

class Menu_model {
    private $table = 'menu';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMenu(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMenuById($id_menu){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_menu = :id_menu');
        $this->db->bind('id_menu', $id_menu);
        return $this->db->single();
    }

    public function addDataMenu($data)
    {
    $query = "INSERT INTO menu (nama, harga, deskripsi, tipe, gambar) 
              VALUES (:nama, :harga, :deskripsi, :tipe, :gambar)";

    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('harga', $data['harga']);
    $this->db->bind('deskripsi', $data['deskripsi']);
    $this->db->bind('tipe', $data['tipe']);
    $this->db->bind('gambar', $data['gambar']);

    return $this->db->execute();
    }
    
    public function hapusDataMenu($id_menu){
        $query = "DELETE FROM menu WHERE id_menu = :id_menu";
        $this->db->query($query);
        $this->db->bind('id_menu', $id_menu);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataMenu($data)
    {
    $query = "UPDATE menu 
              SET 
                nama = :nama,
                harga = :harga,
                deskripsi = :deskripsi,
                tipe = :tipe,
                gambar = :gambar
              WHERE id_menu = :id_menu";

    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('harga', $data['harga']);
    $this->db->bind('deskripsi', $data['deskripsi']);
    $this->db->bind('tipe', $data['tipe']);
    $this->db->bind('gambar', $data['gambar']);
    $this->db->bind('id_menu', $data['id_menu']);

    return $this->db->execute();
    }

    public function cariDataMenu(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM menu WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }

    public function showImage($id_menu) {
        $this->db->query("SELECT gambar FROM menu WHERE id_menu = :id_menu");
        $this->db->bind(':id_menu', $id_menu);
        $result = $this->db->single();

        if ($result) {
            // Deteksi jenis MIME dari data BLOB
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->buffer($result['gambar']);

            // Default ke image/jpeg jika MIME tidak terdeteksi
            $mimeType = $mimeType ?: 'image/jpeg';

            // Set header Content-Type
            header("Content-Type: $mimeType");
            echo $result['gambar'];
            exit;
        } else {
            http_response_code(404);
            die("Image not found.");
        }
    }
}
?>
