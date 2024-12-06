<?php
include_once("koneksi.php");

// Ambil data dari tabel menu
$sql = "SELECT nama FROM menu";
$result = $host->query($sql);
$options = "";

// Simpan opsi ke dalam variabel untuk digunakan pada semua dropdown
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . htmlspecialchars($row['nama']) . "'>" . htmlspecialchars($row['nama']) . "</option>";
    }
} else {
    $options = "<option value=''>Tidak ada data</option>";
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
    <title>Box Besar</title>
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
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="../../assets/images/logo.png" alt="Logo" width="45" height="45" class="me-2" />
                <span>Dapoer Mama</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
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
                        <a class="nav-link" href="../../profile-screen/profile.html"><i class="bi bi-person-circle"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<main class="container my-5">
    <a href="../pesan.html" class="back-button"><i class="bi bi-arrow-left-circle"></i></a>
    <form>
        <div class="mb-3">
            <label for="isian1" class="form-label">Isian box 1:</label>
            <select class="form-select mb-2" id="isian1">
                <option selected>Pilih isian box</option>
                <?= $options; ?>
            </select>
            <label for="isian2" class="form-label">Isian box 2:</label>
            <select class="form-select mb-2" id="isian2">
                <option selected>Pilih isian box</option>
                <?= $options; ?>
            </select>
            <label for="isian3" class="form-label">Isian box 3:</label>
            <select class="form-select mb-2" id="isian3">
                <option selected>Pilih isian box</option>
                <?= $options; ?>
            </select>
            <label for="isian4" class="form-label">Isian box 4:</label>
            <select class="form-select mb-2" id="isian4">
                <option selected>Pilih isian box</option>
                <?= $options; ?>
            </select>
            <label for="isian5" class="form-label">Isian box 5:</label>
            <select class="form-select mb-2" id="isian5">
                <option selected>Pilih isian box</option>
                <?= $options; ?>
            </select>
        </div>
    </form>
</main>
<footer>
    <p>&copy; 2024 Dapoer Mama. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
