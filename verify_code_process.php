<?php
session_start(); // Menggunakan session untuk autentikasi

$host = "localhost";
$user = "root";
$pass = "";
$db = "catering";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Cek apakah request adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Cek apakah email ada di database
    $stmt = $conn->prepare("SELECT id_user FROM user WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email ditemukan, alihkan ke halaman reset_password
        $_SESSION['email'] = $email; // Simpan email di session jika perlu
        header("Location: reset_password.php"); // Ganti dengan nama file halaman reset password Anda
        exit();
    } else {
        // Jika email tidak ditemukan
        echo "Email not found. Please check and try again.";
    }

    $stmt->close();
} else {
    // Jika request bukan POST
    echo "Unauthorized access.";
}

$conn->close();
?>