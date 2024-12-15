<?php
session_start();
// Periksa apakah id_user tersedia di session
if (!isset($_SESSION['id_user'])) {
    header('Location: verify_code_process.php'); // Arahkan kembali ke halaman verifikasi
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <div class="border-line"></div>
        <form action="proses_reset_password.php" method="POST">
            <h2 style="color: black;">Reset Password</h2>
            <div class="input-box">
                <input type="password" name="new_password" required="required">
                <span>New Password</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" required="required">
                <span>Confirm New Password</span>
                <i></i>
            </div>
            <input type="submit" value="Reset Password" class="btn">
        </form>
    </div>
</body>
</html>
