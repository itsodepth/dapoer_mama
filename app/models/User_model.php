<?php

class User_model {
    private $table = 'user';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllUser(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUserById($id_user){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_user = :id_user');
        $this->db->bind('id_user', $id_user);
        return $this->db->single();
    }

    public function tambahDataUser($data){
        $query = "INSERT INTO user (username, email, tlp, level ) VALUES (:username, :email, :tlp, :level)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('tlp', $data['tlp']);
        $this->db->bind('level', $data['level']);
        $this->db->execute();
        
        return $this->db->rowCount();
    }

    public function hapusDataUser($id_user){
        $query = "DELETE FROM user WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind('id_user', $id_user);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataUser($data){
        $query = "UPDATE user SET 
                    username = :username,
                    email = :email,
                    tlp = :tlp,
                    level = :level
                    WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('tlp', $data['tlp']);
        $this->db->bind('level', $data['level']);
        $this->db->bind('id_user', $data['id_user']);

        $this->db->execute();
        
        return $this->db->rowCount();
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
