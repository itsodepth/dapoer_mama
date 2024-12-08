<?php
session_start();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering";

$host = new mysqli($servername, $username, $password, $dbname);
if ($host->connect_error) {
    die("Koneksi gagal: " . $host->connect_error);
}

// Logika untuk redirect jika sudah login
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['id_user'])) {
    $userId = $_SESSION['id_user'];

    // Ambil data pengguna dari database
    $query = "SELECT username, tlp, alamat, kode_pos FROM user WHERE id_user = ?";
    $stmt = $host->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($userData = $result->fetch_assoc()) {
        // Menerima data qty dan harga dari form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $qty = isset($_POST['qty']) ? intval($_POST['qty']) : 0; // Mengambil qty dari form
            $harga = isset($_POST['harga']) ? floatval($_POST['harga']) : 0.0; // Mengambil harga dari form

            // Menambahkan qty dan harga ke data pengguna
            $userData['qty'] = $qty;
            $userData['harga'] = $harga;

            // Redirect ke payment.php dengan data pengguna
            header("Location: payment.php?" . http_build_query($userData));
            exit;
        } else {
            echo "Data qty dan harga tidak diterima.";
            exit;
        }
    } else {
        // Jika data tidak ditemukan
        echo "Data pengguna tidak ditemukan.";
        exit;
    }
}