<?php

class Box_model {
    private $table = 'size_box';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllBox(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBoxById($id_size){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_size = :id_size');
        $this->db->bind('id_size', $id_size);
        return $this->db->single();
    } 

    public function addDataBox($data)
    {

    $this->db->query('INSERT INTO ' . $this->table . ' SET size = :size, capacity = :capacity, gambar = :gambar');
    $this->db->bind('size', $data['size']);
    $this->db->bind('capacity', $data['capacity']);
    $this->db->bind('gambar', $data['gambar']);

    return $this->db->execute();
    }
    
    public function hapusDataBox($id_size){
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_size = :id_size');
        $this->db->bind('id_size', $id_size);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataBox($data)
{
    $this->db->query('UPDATE ' . $this->table . ' SET
                        size = :size,
                        capacity = :capacity,
                        gambar = :gambar
                    WHERE id_size = :id_size');

    $this->db->bind('size', $data['size']);
    $this->db->bind('capacity', $data['capacity']);
    $this->db->bind('gambar', $data['gambar']);
    $this->db->bind('id_size', $data['id_size']);

    return $this->db->execute();
}

    public function cariDataBox(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM size_box WHERE size LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }

    public function showImage($id_size) {
        $this->db->query("SELECT gambar FROM size_box WHERE id_size = :id_size");
        $this->db->bind(':id_size', $id_size);
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
