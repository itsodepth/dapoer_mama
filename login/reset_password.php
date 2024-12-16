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
    <div class="input__container">
        <div class="shadow__input"></div>
        <div class="border-line"></div>
        <form action="proses_reset_password.php" method="POST">
            <h2 style="color: black;">Reset Password</h2>
            <div class="input__button__shadow">
                <input type="password" name="new_password" required="required">
                <span>New Password</span>
                <i></i>
            </div>
            <div class="input__button__shadow">
                <input type="password" name="confirm_password" required="required">
                <span>Confirm New Password</span>
                <i></i>
            </div>
            <button type="submit" class="input__button__shadow"> reset password </button>
        </form>
    </div>
</body>
</html>
