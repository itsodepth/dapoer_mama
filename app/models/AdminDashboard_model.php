<?php
class AdminDashboard_model {
    private $db;
    private $table = 'pembayaran';

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPenghasilan() {
        $this->db->query('SELECT SUM(total_bayar) AS total_penghasilan FROM pembayaran');
        $result = $this->db->object(); // Mengambil hasil sebagai single row
    
        // Periksa apakah hasilnya null
        return $result ? $result : (object) ['total_penghasilan' => 0];
    }
    
    public function getAllPenghasilanByMonth() {
        $this->db->query('SELECT SUM(total_bayar) AS total_penghasilan_bulan_ini FROM pembayaran WHERE MONTH(waktu_bayar) = MONTH(CURRENT_DATE) and YEAR(waktu_bayar) = YEAR(CURRENT_DATE)');
        $result = $this->db->object(); // Mengambil hasil sebagai single row
    
        // Periksa apakah hasilnya null
        return $result ? $result : (object) ['total_penghasilan_bulan_ini' => 0];
    }
}