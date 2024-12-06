<?php

class Box_model {
    private $table = 'box';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllBox(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBoxById($id_box){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_box = :id_box');
        $this->db->bind('id_box', $id_box);
        return $this->db->single();
    } 

    public function addDataBox($data)
    {
    $query = "INSERT INTO box (ukuran, kapasitas,  gambar) 
              VALUES (:ukuran, :kapasitas,  :gambar)";

    $this->db->query($query);
    $this->db->bind('ukuran', $data['ukuran']);
    $this->db->bind('kapasitas', $data['kapasitas']);
    $this->db->bind('gambar', $data['gambar']);

    return $this->db->execute();
    }
    
    public function hapusDataBox($id_box){
        $query = "DELETE FROM box WHERE id_box = :id_box";
        $this->db->query($query);
        $this->db->bind('id_box', $id_box);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataBox($data)
    {
    $query = "UPDATE box 
              SET 
                ukuran = :ukuran,
                kapasitas = :kapasitas,
                gambar = :gambar
              WHERE id_box = :id_box";

    $this->db->query($query);
    $this->db->bind('ukuran', $data['ukuran']);
    $this->db->bind('kapasitas', $data['kapasitas']);
    $this->db->bind('gambar', $data['gambar']);
    $this->db->bind('id_box', $data['id_box']);

    return $this->db->execute();
    }

    public function cariDataBox(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM box WHERE ukuran LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }

    public function showImage($id_box) {
        $this->db->query("SELECT gambar FROM box WHERE id_box = :id_box");
        $this->db->bind(':id_box', $id_box);
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
