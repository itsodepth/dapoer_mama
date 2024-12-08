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

<<<<<<< HEAD
// Logika untuk redirect jika sudah login
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['id_user'])) {
    $userId = $_SESSION['id_user'];

    // Ambil data pengguna dari database
    $query = "SELECT nama, tlp, alamat, kode_pos FROM pesanan WHERE id_user = ?";
    $stmt = $host->prepare($query);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($userData = $result->fetch_assoc()) {
        // Redirect ke payment.php dengan data pengguna
        header("Location: payment.php?" . http_build_query($userData));
        exit;
    } else {
        // Jika data tidak ditemukan
        echo "Data pengguna tidak ditemukan.";
        exit;
    }
}
?>
=======
// Debugging: Periksa nilai sesi
if (!isset($_SESSION['logged_in'])) {
    echo "Sesi 'logged_in' tidak diatur.";
    exit();
}

if ($_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['id_user'])) {
    echo "Sesi 'id_user' tidak diatur.";
    exit();
}

// Jika sudah login, lanjutkan dengan mengambil data pengguna
$userId = $_SESSION['id_user'];

// Ambil data pengguna dari database
$query = "SELECT username, tlp, alamat, kode_pos FROM user WHERE id_user = ?";
$stmt = $host->prepare($query);
if ($stmt === false) {
    die("Kesalahan dalam persiapan statement: " . $host->error);
}

$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($userData = $result->fetch_assoc()) {
    // Jika ada data dari POST, ambil dan kirim ke payment.php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $harga = isset($_POST['harga']) ? $_POST['harga'] : null;
        $qty = isset($_POST['qty']) ? $_POST['qty'] : null;

        // Gabungkan data pengguna dan data POST
        $dataToSend = array_merge($userData, [
            'qty' => $qty,
            'harga' => $harga
        ]);

        // Redirect ke payment.php dengan data pengguna dan data POST
        header("Location: payment.php?" . http_build_query($dataToSend));
        exit();
    } else {
        // Jika tidak ada data POST, redirect ke payment.php dengan data pengguna saja
        header("Location: payment.php?" . http_build_query($userData));
        exit();
    }
} else {
    // Jika data tidak ditemukan
    echo "Data pengguna tidak ditemukan.";
    exit();
}

// Tutup statement dan koneksi
$stmt->close();
$host->close();
?>
>>>>>>> 57aed091c831c25c39e546f8d798c4dff57db05f
