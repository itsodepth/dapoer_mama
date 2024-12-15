<?php
require 'koneksi.php'; // File koneksi database

$id_user = $_SESSION['id_user'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $code_reset = $_POST['code_reset'];

    // Periksa kombinasi email dan kode reset
    $query = $host->prepare("SELECT id_user FROM user WHERE email = ? AND code_reset = ?");
    $query->bind_param('si', $email, $code_reset);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Jika valid, simpan id_user di session dan arahkan ke halaman reset password
        session_start();
        $user = $result->fetch_assoc();
        $_SESSION['id_user'] = $user['id_user'];
        header('Location: reset_password.php');
    } else {
        // Jika tidak valid, tampilkan pesan error
        echo "Invalid email or reset code.";
    }
}
?>
