<?php
session_start();

// Pastikan sesi 'logged_in' dan 'id_user' diatur
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || !isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit();
}

// Ambil data dari query string
$username = $_GET['username'] ?? ''; // Mengambil username
$tlp = $_GET['tlp'] ?? '';           // Mengambil telepon
$alamat = $_GET['alamat'] ?? '';     // Mengambil alamat
$kode_pos = $_GET['kode_pos'] ?? ''; // Mengambil kode pos
$qty = isset($_GET['qty']) ? intval($_GET['qty']) : 0; // Mengambil qty dan konversi ke integer
$harga = isset($_GET['harga']) ? floatval($_GET['harga']) : 0; // Mengambil harga dan konversi ke float

$total_harga = $harga * $qty;

// Hitung total bayar berdasarkan metode pembayaran
$total_bayar_80 = $total_harga * 0.8; // 80%
$total_bayar_lunas = $total_harga; // Lunas
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Payment</title>
</head>
<body>
    <div class="container my-5">
        <h2>Payment Details</h2>
        <form action="process_payment.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?= htmlspecialchars($username) ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" class="form-control" name="tlp" value="<?= htmlspecialchars($tlp) ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= htmlspecialchars($alamat) ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Kode Pos</label>
                <input type="text" class="form-control" name="kode_pos" value="<?= htmlspecialchars($kode_pos) ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Harga</label>
                <input type="text" class="form-control" value="Rp. <?= number_format($total_harga, 0, ',', '.') ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Pilih Metode Pembayaran:</label>
                <select class="form-select" name="payment_method" required>
                    <option value="" disabled selected>Pilih metode pembayaran</option>
                    <option value="80%">80% (DP)</option>
                    <option value="Lunas">Lunas</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Total Bayar:</label>
                <input type="text" class="form-control" id="total_bayar" name="total_bayar" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
        </form>
    </div>

    <script>
        // Menghitung total bayar berdasarkan metode pembayaran yang dipilih
        document.querySelector('select[name="payment_method"]').addEventListener('change', function() {
            const totalHarga = <?= $total_harga ?>;
            let totalBayar;

            if (this.value === '80%') {
                totalBayar = totalHarga * 0.8;
            } else if (this.value === 'Lunas') {
                totalBayar = totalHarga;
            }

            document.getElementById('total_bayar').value = 'Rp. ' + totalBayar.toLocaleString('id-ID');
        });
    </script>
</body>
</html>