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
    // Ambil input dari reset_password.php
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_SESSION['email']; // Ambil email dari session

    // Verifikasi apakah new password dan confirm new password sama
    if ($new_password === $confirm_password) {
        // Hash password baru
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update password di database
        $stmt = $conn->prepare("UPDATE user SET password = ? WHERE email = ?");
        $stmt->bind_param('ss', $hashed_password, $email);
        if ($stmt->execute()) {
            echo "Password berhasil diperbarui.";
        } else {
            echo "Gagal memperbarui password. Silakan coba lagi.";
        }
        $stmt->close();
    } else {
        echo "Password dan konfirmasi password tidak cocok.";
    }
} else {
    echo "Unauthorized access.";
}

$conn->close();
?>
