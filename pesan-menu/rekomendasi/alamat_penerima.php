<?php
session_start();
if (!isset($_SESSION['order_data'])) {
    header("Location: proses_transaksi.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data alamat
    $namaPenerima = $_POST['nama_penerima'];
    $nomorTelepon = $_POST['nomor_telepon'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $desa = $_POST['desa'];
    $kodePos = $_POST['kode_pos'];
    $patokanRumah = $_POST['patokan_rumah'];

    // Gabungkan alamat
    $alamat = "$namaPenerima, $nomorTelepon, $kota, $kecamatan, $desa, $kodePos, $patokanRumah";

    // Ambil data order dari session
    $orderData = $_SESSION['order_data'];

    // Koneksi ke database
    $conn = new mysqli("localhost", "root", "", "catering");
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Prepare statement untuk insert
    $stmt = $conn->prepare("INSERT INTO pesanan (id_user, id_size, isi_1, isi_2, isi_3, isi_4, isi_5, minuman, jumlah, harga, dp, alamat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Mendapatkan id_size untuk box large
    $sizeQuery = "SELECT id_size FROM size_box WHERE size = 'small' LIMIT 1";
    $sizeResult = $conn->query($sizeQuery);
    $sizeRow = $sizeResult->fetch_assoc();
    $idSize = $sizeRow['id_size'];

    // Bind parameter
    $stmt->bind_param("iissssssiiss", 
        $orderData['id_user'],    // integer
        $idSize,                  // integer (id_size untuk large)
        $orderData['isi1'],       // string
        $orderData['isi2'],       // string
        $orderData['isi3'],       // string
        $orderData['isi4'],       // string
        $orderData['isi5'],       // string
        $orderData['minuman'],    // string
        $orderData['jumlah'],     // integer
        $orderData['harga'],      // integer
        $orderData['dp'],         // string (enum)
        $alamat                   // string (alamat gabungan)
    );

    // Eksekusi query
    if ($stmt->execute()) {
        echo "<script>
            alert('Transaksi berhasil disimpan!');
            window.location.href = '../pesan.php';
        </script>";
    } else {
        echo "Gagal menyimpan transaksi: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    unset($_SESSION['order_data']); // Hapus data session setelah digunakan
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
        <title>Checkout</title>
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

        .form-section {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-section label {
            font-weight: bold;
        }

        .btn-submit {
            background-color: #b93f3f;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        footer {
            margin-top: 50px;
            background-color: #b93f3f;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .form-control,
        .form-select {
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        </style>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #b93f3f">
                <div class="container-fluid" style="margin-top: -5px; margin-bottom: -5px">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <img src="../../assets/images/logo.png" alt="Logo" width="45" height="45" class="me-2" />
                        <span>Dapoer Mama</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex" id="navbarNav">
                        <ul class="navbar-nav ms-auto py-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="../../index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Histori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pesan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../profile-screen/profile.html"><i
                                        class="bi bi-person-circle" style="font-size: 28px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main class="container my-5">
            <a href="boxbesar.html" class="back-button"><i class="bi bi-arrow-left-circle"></i></a>
            <div class="form-section">
                <h5 class="mb-4">Data Diri</h5>
                <form method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="namaPenerima" class="form-label">Nama Penerima*</label>
                            <input type="text" name="nama_penerima" id="namaPenerima" class="form-control"
                                placeholder="Masukkan Nama" required />
                        </div>
                        <div class="col-md-6">
                            <label for="nomorTelepon" class="form-label">Nomor Telepon*</label>
                            <input type="text" name="nomor_telepon" id="nomorTelepon" class="form-control"
                                placeholder="Masukkan Nomor" required />
                        </div>
                    </div>
                    <h5 class="mb-4">Alamat Pengiriman</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="kotaKabupaten" class="form-label">Kota/Kabupaten*</label>
                            <select name="kota" id="kotaKabupaten" class="form-select" required>
                                <option selected>Pilih kota</option>
                                <option>Surakarta</option>
                                <option>Surabaya</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="kecamatan" class="form-label">Kecamatan*</label>
                            <select name="kecamatan" id="kecamatan" class="form-select" required>
                                <option selected>Pilih kecamatan</option>
                                <option>Banjarsari</option>
                                <option>Laweyan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="kelurahanDesa" class="form-label">Kelurahan/Desa*</label>
                            <select name="desa" id="kelurahanDesa" class="form-select" required>
                                <option selected>Pilih desa</option>
                                <option>Gilingan</option>
                                <option>Bumi</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="kodePos" class="form-label">Kode Pos*</label>
                            <input type="text" name="kode_pos" id="kodePos" class="form-control"
                                placeholder="Masukkan Kode Pos" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="detailAlamat" class="form-label">Detail Alamat/Patokan Rumah*</label>
                        <textarea name="patokan_rumah" id="detailAlamat" class="form-control" rows="3" placeholder=""
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-confirm w-100 text-center">Konfirmasi</button>
                </form>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Dapoer Mama. All rights reserved.</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>