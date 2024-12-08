<?php

class User_model {
    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllUser(){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE level = 1');
        return $this->db->resultSet();
    }

    public function cariDataUser(){
        $keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
        $query = "SELECT * FROM user WHERE username LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', '%'. $keyword . '%');

        return $this->db->resultSet();
    }

}
?>
