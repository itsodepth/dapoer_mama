<?php
$host = "localhost";    // Ganti sesuai host Anda
$user = "root";         // Username database
$password = "";         // Password database
$dbname = "catering";   // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>
