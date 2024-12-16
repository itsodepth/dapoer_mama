<?php
session_start(); // Memulai session


// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering";

$logged_in = isset($_SESSION['id_user']);
$id_user = $_SESSION['id_user'];

$host = new mysqli($servername, $username, $password, $dbname);
if ($host->connect_error) {
    die("Koneksi gagal: " . $host->connect_error);
}

// Memeriksa apakah 'id_user' ada dalam session
if (isset($_SESSION['id_user'])) {
    $userId = $_SESSION['id_user']; // Mengambil id_user dari session

    // Query untuk mengambil data pengguna dari database
    $query = "SELECT username, tlp, alamat, kode_pos FROM user WHERE id_user = ?";

    // Preparing query
    $stmt = $host->prepare($query);
    $stmt->bind_param("i", $userId); // Mengikat parameter id_user
    $stmt->execute();
    $result = $stmt->get_result();

    // Menampilkan hasil query
    if ($userData = $result->fetch_assoc()) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Debugging: Tampilkan data POST
            echo "<h3>Data POST:</h3>";
            print_r($_POST);

            $qty = isset($_POST['qty']) ? intval($_POST['qty']) : 0; // Mengambil qty dari form
            $harga = isset($_POST['harga']) ? floatval($_POST['harga']) : 0.0; // Mengambil harga dari form

            // Debugging: Tampilkan qty dan harga
            echo "<h3>Qty:</h3> $qty";
            echo "<h3>Harga:</h3> $harga";

            // Menambahkan qty dan harga ke data pengguna
            $userData['qty'] = $qty;
            $userData['harga'] = $harga;

            // Redirect ke payment.php dengan data pengguna
            header("Location: payment.php?" . http_build_query($userData));
            exit;
    } else {
        echo "Data pengguna tidak ditemukan.";
    }
} else {
    echo "Pengguna tidak terautentikasi.";
}
}
?>