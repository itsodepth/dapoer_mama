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

        .product-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .product-image {
            flex: 1;
            max-width: 400px;
        }

        .product-image img {
            width: 100%;
            border-radius: 10px;
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
        <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "catering";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    ?>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #b93f3f">
                <div class="container-fluid">
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
            <a href="../pesan.html" class="back-button"><i class="bi bi-arrow-left-circle"></i></a>
            <div class="product-container">
                <div class="product-image">
                    <img src="../../assets/images/size l.png" alt="Box Besar" />
                </div>
                <div class="form-section">
                    <form method="POST" action="proses_transaksi.php">
                        <div class="mb-3">
                            <label for="isian1" class="form-label">Isian box (max 5):</label>
                            <?php
                        $query = "SELECT ib.id_isian, ib.nama_isian, ib.harga, kb.nama_kategori 
                                    FROM isian_box ib 
                                    JOIN kategori_isian_box kb ON ib.id_kategori = kb.id_kategori";
                        $result = $conn->query($query);

                        for ($i = 1; $i <= 5; $i++) {
                            echo '<select class="form-select mb-2" name="isian_box[]" id="isian' . $i . '"><option selected>Pilih isian box</option>';
                            while ($row = $result->fetch_assoc()) {
                                if (
                                    ($i === 1 && $row['nama_kategori'] === 'Lauk Utama') ||
                                    ($i === 2 && $row['nama_kategori'] === 'Lauk Pauk') ||
                                    ($i === 3 && $row['nama_kategori'] === 'Lalapan') ||
                                    ($i === 4 && $row['nama_kategori'] === 'Sambal') ||
                                    ($i === 5 && $row['nama_kategori'] === 'Kerupuk')
                                ) {
                                    echo '<option value="' . $row['id_isian'] . '" data-harga="' . $row['harga'] . '">' . $row['nama_isian'] . ' (' . $row['nama_kategori'] . ' - Rp' . $row['harga'] . ')</option>';
                                }
                            }
                            echo '</select>';
                            $result->data_seek(0); // Reset pointer for the next iteration
                        }
                        ?>
                        </div>
                        <div class="mb-3">
                            <label for="minuman" class="form-label">Minuman:</label>
                            <select class="form-select" name="minuman" id="minuman">
                                <option selected>Pilih minuman</option>
                                <?php
                            $query = "SELECT * FROM minuman";
                            $result = $conn->query($query);
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['id_minuman'] . '" data-harga="' . $row['harga'] . '">' . $row['nama_minuman'] . ' (Rp' . $row['harga'] . ')</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Qty:</label>
                            <input type="number" class="form-control" name="quantity" id="quantity"
                                placeholder="Masukkan Jumlah" />
                        </div>
                        <div class="mb-3">
                            <label for="pembayaran" class="form-label">Pilih bayar:</label>
                            <select class="form-select" name="pembayaran" id="pembayaran">
                                <option selected>Pilih pembayaran</option>
                                <option value="Lunas">Lunas</option>
                                <option value="DP">DP (80%)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="totalHarga" class="form-label">Total Harga Keseluruhan:</label>
                            <input type="text" class="form-control" name="totalHarga" id="totalHarga" readonly />
                        </div>
                        <button type="submit" class="btn btn-confirm w-100 text-center">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <p>&copy; 2024 Dapoer Mama. All rights reserved.</p>
        </footer>
        <script>
        document.addEventListener('DOMContentLoaded', () => {
            const quantityInput = document.getElementById('quantity');
            const totalHargaInput = document.getElementById('totalHarga');

            const calculateTotal = () => {
                const selectedIsian = document.querySelectorAll('[id^="isian"] option:checked');
                const minuman = document.getElementById('minuman').selectedOptions[0];
                let total = 0;

                selectedIsian.forEach(option => {
                    total += parseInt(option.dataset.harga || 0);
                });

                total += parseInt(minuman.dataset.harga || 0);
                total *= parseInt(quantityInput.value || 1);
                totalHargaInput.value = `Rp${total}`;
            };

            document.querySelectorAll('[id^="isian"], #minuman, #quantity').forEach(element => {
                element.addEventListener('change', calculateTotal);
            });
        });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>