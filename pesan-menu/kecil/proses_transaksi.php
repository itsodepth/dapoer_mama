<?php
session_start(); // Jika menggunakan sesi, pastikan ini di awal script

// Database connection
$servername = "localhost";
$username = "root"; // Sesuaikan dengan username database Anda
$password = ""; // Sesuaikan dengan password database Anda
$dbname = "catering"; // Sesuaikan dengan nama database Anda

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pembayaran = $_POST['pembayaran'];
    $totalHarga = floatval($_POST['totalHarga']); // Mengubah string ke float
    $sisaPembayaran = ($pembayaran === 'DP') ? $totalHarga * 0.2 : 0;

    // Simpan transaksi
    $stmt = $conn->prepare("INSERT INTO transaksi (total_harga, pembayaran, sisa_pembayaran) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $totalHarga, $pembayaran, $sisaPembayaran);
    $stmt->execute();
    $transaksiId = $stmt->insert_id;

    // Cek jika detailPesanan ada dan adalah array
    if (isset($_POST['detail_pesanan']) && is_array($_POST['detail_pesanan'])) {
        foreach ($_POST['detail_pesanan'] as $detail) {
            $stmt = $conn->prepare("INSERT INTO transaksi_detail (id_transaksi, id_isian, id_minuman, qty, subtotal) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiii", $transaksiId, $detail['id_isian'], $detail['id_minuman'], $detail['qty'], $detail['subtotal']);
            $stmt->execute();
        }
    } else {
        echo "Detail pesanan tidak ada atau format tidak valid.";
    }

    echo "Transaksi berhasil disimpan!";
}

$conn->close();
?>