<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db = "catering";

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

<<<<<<< HEAD
    // Debugging: output the posted username and password
    // var_dump($_POST);

=======
>>>>>>> 57aed091c831c25c39e546f8d798c4dff57db05f
    // Query untuk mendapatkan data user berdasarkan username
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

<<<<<<< HEAD
        // Debugging: Check fetched user data
        // var_dump($user);

        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            session_start();
=======
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            session_start(); // Mulai sesi

            // Atur variabel sesi
            $_SESSION['logged_in'] = true; // Menandakan pengguna sudah login
>>>>>>> 57aed091c831c25c39e546f8d798c4dff57db05f
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];

            // Redirect berdasarkan level
            if ($user['level'] == 2) {
                header("Location: dapoer_mama-admin_page/app/views/admin/dashboard.php");
            } else if ($user['level'] == 1) {
                header("Location: index.php");
            }
<<<<<<< HEAD
            exit;
=======
            exit; // Pastikan untuk keluar setelah redirect
>>>>>>> 57aed091c831c25c39e546f8d798c4dff57db05f
        } else {
            // Password salah
            header("Location: login.php?error=" . urlencode("Username atau password salah!"));
            exit();
        }
    } else {
        // User tidak ditemukan
        header("Location: login.php?error=" . urlencode("Username tidak ditemukan."));
        exit();
    }
}

<<<<<<< HEAD
$conn->close();
=======
$conn->close();
?>
>>>>>>> 57aed091c831c25c39e546f8d798c4dff57db05f
