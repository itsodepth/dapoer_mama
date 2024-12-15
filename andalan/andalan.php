<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "catering";

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data berdasarkan ID rekomendasi
$id_rek = $_GET['id_ad'] ?? 0;
$sql = "SELECT * FROM box_an WHERE id_ad = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_rek);
$stmt->execute();
$result = $stmt->get_result();
$menu = $result->fetch_assoc();

// Periksa apakah pengguna sudah login
$is_logged_in = isset($_SESSION['id_user']);
$id_user = $_SESSION['id_user'];

// Mengonversi data gambar dari BLOB menjadi base64
$imageSrc = 'default.jpg'; // Gambar default jika tidak ada BLOB
if (!empty($menu['gambar'])) {
    $imageData = base64_encode($menu['gambar']);
    $imageSrc = 'data:image/jpeg;base64,' . $imageData;
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
        <title>Rekomendasi</title>
        <style>
        body {
            font-family: "Nunito", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        main {
            padding-top: 50px;
        }

        .back-button {
            font-size: 24px;
            margin-bottom: 20px;
            color: #b93f3f;
            text-decoration: none;
        }

        .product-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .product-image {
            position: relative;
            width: 100%;
            max-width: 300px;
        }

        .product-image img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .image-title {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(185, 63, 63, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
        }

        .form-section {
            flex: 2;
        }

        .form-section label {
            display: inline-block;
            margin-bottom: 5px;
        }

        .btn-confirm {
            background-color: #b93f3f;
            color: white;
        }

        footer {
            margin-top: 50px;
            background-color: #b93f3f;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        </style>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #b93f3f">
                <div class="container-fluid" style="margin-top: -5px; margin-bottom: -5px">
                    <a class="navbar-brand d-flex align-items-center" href="index.php">
                        <img src="../assets/images/logo.png" alt="Logo" width="45" height="45" class="me-2" />
                        <span>Dapoer Mama</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex" id="navbarNav">
                        <ul class="navbar-nav ms-auto py-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pesan-menu/pesan.php">Pesan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="pesan-menu/history/history.php?id_user=<?php echo $id_user; ?>">History</a>
                            </li>
                            <li class="nav-item">
                                <?php if ($is_logged_in): ?>
                                <nav>
                                    <div class="toggle"><span class="fa fa-bars"></span></div>
                                    <ul class="menu">
                                        <li><a
                                                href="profile-screen/profile.php?id_user=<?php echo $id_user; ?>">Profile</a>
                                        </li>
                                        <li><a href="logout.php">Logout</a></li>
                                    </ul>
                                </nav>
                                <?php else: ?>
                                <!-- Jika belum login -->
                                <a class="nav-link" href="login.php"><i class="bi bi-person-circle"
                                        style="font-size: 28px"></i></a>
                                <?php endif; ?>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container my-5">
            <div class="product-container">
                <a href="../index.php" class="back-button"><i class="bi bi-arrow-left-circle"></i></a>
                <div class="product-image">
                    <img src="<?= $imageSrc ?>" alt="<?= htmlspecialchars($menu['nama_menu'] ?? 'Produk') ?>" />
                    <div class="image-title"><?= htmlspecialchars($menu['nama_menu'] ?? 'Nama Produk') ?></div>
                </div>
                <div class="form-section">
                    <form action="checkout.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Isian box (max 5):</label>
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                            <input type="text" class="form-control mb-2"
                                value="<?= htmlspecialchars($menu['isi_' . $i] ?? '') ?>" readonly />
                            <?php endfor; ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Minuman:</label>
                            <input type="text" class="form-control"
                                value="<?= htmlspecialchars($menu['minuman'] ?? '') ?>" readonly />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Qty:</label>
                            <input type="number" class="form-control" name="qty" id="qty" placeholder="Masukkan Jumlah"
                                required />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih bayar:</label>
                            <select class="form-select" name="payment_method" required>
                                <option selected>Pilih pembayaran</option>
                                <option value="Transfer Bank">Transfer Bank</option>
                                <option value="COD">COD</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Harga Keseluruhan:</label>
                            <input type="text" class="form-control" id="total_price" value="0" readonly />
                        </div>
                        <button type="submit" class="btn btn-confirm w-100">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </main>
        <script>
        // Menghitung total harga
        document.getElementById("qty").addEventListener("input", function() {
            const qty = parseInt(this.value) || 0;
            const harga = <?= $menu['harga'] ?? 0 ?>;
            const total = qty * harga;
            document.getElementById("total_price").value = total.toFixed(2);
        });
        </script>
    </body>

</html>