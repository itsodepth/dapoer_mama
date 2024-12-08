<?php
class AdminDashboard_model {
    private $db;
    private $table = 'pembayaran';

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllPenghasilan() {
        $this->db->query('SELECT SUM(total_bayar) AS total_penghasilan FROM pembayaran');
        $result = $this->db->single(); // Mengambil hasil sebagai array asosiatif
        
        // Periksa apakah hasilnya null dan set default 0 jika null
        return $result ? $result : ['total_penghasilan' => 0];
    }
    
    public function getAllPenghasilanByMonth() {
        $this->db->query('SELECT SUM(total_bayar) AS total_penghasilan_bulan_ini FROM pembayaran WHERE MONTH(waktu_bayar) = MONTH(CURRENT_DATE) and YEAR(waktu_bayar) = YEAR(CURRENT_DATE)');
        $result = $this->db->single(); // Mengambil hasil sebagai array asosiatif
        
        // Periksa apakah hasilnya null dan set default 0 jika null
        return $result ? $result : ['total_penghasilan_bulan_ini' => 0];
    }

    public function getPenghasilanPerBulan() {
        $this->db->query('
            SELECT MONTH(waktu_bayar) AS bulan, SUM(total_bayar) AS total_penghasilan
            FROM pembayaran
            WHERE YEAR(waktu_bayar) = YEAR(CURRENT_DATE)
            GROUP BY MONTH(waktu_bayar)
            ORDER BY bulan ASC
        ');
        $result = $this->db->resultSet(); // Mengambil hasil sebagai array
        
        // Jika data kosong, set semua bulan penghasilan menjadi 0
        if (empty($result)) {
            $result = array_fill(0, 12, ['bulan' => 0, 'total_penghasilan' => 0]);
        }
        
        return $result;
    }    
}