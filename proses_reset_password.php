<?php
session_start(); // Menggunakan session untuk autentikasi


include "koneksi.php"; // Memasukkan konfigurasi database

// Ambil ID user dari session atau parameter GET/POST
$id_user = $_SESSION['id_user'];

if (isset($_SESSION['id_user']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_user = $_SESSION['id_user'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validasi kesesuaian password baru dan konfirmasi
    if ($new_password !== $confirm_password) {
        echo "Passwords do not match. Please try again.";
        exit;
    }

    // Hash password baru
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // Update password di database
    $update = $host->prepare( "UPDATE user SET password=? WHERE id_user=?");
    $update->bind_param('si', $hashed_password, $id_user);
    $update->execute();

    // Hapus session dan konfirmasi berhasil
    session_unset();
    session_destroy();
    echo "Password has been successfully reset.";
} else {
    // Jika sesi id_user tidak ditemukan
    echo "Unauthorized access.";
}
?>
