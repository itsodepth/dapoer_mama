<?php

class Diskon_model {
    private $table = 'diskon';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllDiskon(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDiskonById($id_diskon){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_diskon = :id_diskon');
        $this->db->bind('id_diskon', $id_diskon);
        return $this->db->single();
    }

    public function addDataDiskon($data)
    {
    $query = "INSERT INTO diskon (judul, besaran, maksharga, tanggalexp, deskripsi) 
              VALUES (:judul, :besaran, :maksharga, :tanggalexp, :deskripsi)";

    $this->db->query($query);
    $this->db->bind('judul', $data['judul']);
    $this->db->bind('besaran', $data['besaran']);
    $this->db->bind('maksharga', $data['maksharga']);
    $this->db->bind('tanggalexp', $data['tanggalexp']);
    $this->db->bind('deskripsi', $data['deskripsi']);

    return $this->db->execute();
    }
    
    public function hapusDataDiskon($id_diskon){
        $query = "DELETE FROM diskon WHERE id_diskon = :id_diskon";
        $this->db->query($query);
        $this->db->bind('id_diskon', $id_diskon);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateDataDiskon($data)
    {
    $query = "UPDATE diskon 
              SET 
                judul = :judul,
                besaran = :besaran,
                maksharga = :maksharga,
                tanggalexp = :tanggalexp,
                deskripsi = :deskripsi
              WHERE id_diskon = :id_diskon";

    $this->db->query($query);
    $this->db->bind('judul', $data['judul']);
    $this->db->bind('besaran', $data['besaran']);
    $this->db->bind('maksharga', $data['maksharga']);
    $this->db->bind('tanggalexp', $data['tanggalexp']);
    $this->db->bind('deskripsi', $data['deskripsi']);
    $this->db->bind('id_diskon', $data['id_diskon']);

    return $this->db->execute();
    }

    public function cariDataDiskon(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM diskon WHERE judul LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }
}
?>
