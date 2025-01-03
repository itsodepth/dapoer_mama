<?php
class AdminDashboard_model {
    private $db;
    private $table = 'transaksi';

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPenghasilan() {
        $this->db->query('SELECT SUM(total_harga) AS total_penghasilan FROM '. $this->table . ' ');
        $result = $this->db->single(); // Mengambil hasil sebagai array asosiatif
        
        // Periksa apakah hasilnya null dan set default 0 jika null
        return $result ? $result : ['total_penghasilan' => 0];
    }
    
    public function getAllPenghasilanByMonth() {
        $this->db->query('SELECT SUM(total_harga) AS total_penghasilan_bulan_ini FROM '. $this->table . '  WHERE MONTH(tgl) = MONTH(CURRENT_DATE) and YEAR(tgl) = YEAR(CURRENT_DATE)');
        $result = $this->db->single(); // Mengambil hasil sebagai array asosiatif
        
        // Periksa apakah hasilnya null dan set default 0 jika null
        return $result ? $result : ['total_penghasilan_bulan_ini' => 0];
    }

    public function getPenghasilanPerBulan() {
        $this->db->query('
            SELECT MONTH(tgl) AS bulan, SUM(total_harga) AS total_penghasilan
            FROM '. $this->table . ' 
            WHERE YEAR(tgl) = YEAR(CURRENT_DATE)
            GROUP BY MONTH(tgl)
            ORDER BY bulan ASC
        ');
        $result = $this->db->resultSet(); // Mengambil hasil sebagai array
        
        // Jika data kosong, set semua bulan penghasilan menjadi 0
        if (empty($result)) {
            $result = array_fill(0, 12, ['bulan' => 0, 'total_penghasilan' => 0]);
        }
        
        return $result;
    }    

    public function getPenghasilanTahunIni() {
        $this->db->query('
            SELECT SUM(total_harga) AS total_penghasilan_tahun_ini
            FROM '. $this->table . ' 
            WHERE YEAR(tgl) = YEAR(CURRENT_DATE)
        ');
        $result = $this->db->single(); // Mengambil hasil sebagai array asosiatif
        
        // Periksa apakah hasilnya null dan set default 0 jika null
        return $result ? $result : ['total_penghasilan_tahun_ini' => 0];
    }
}