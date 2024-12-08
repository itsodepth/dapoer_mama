<?php
session_start();

// Periksa apakah pengguna sudah login
$is_logged_in = isset($_SESSION['id_user']); 
$id_user = $_SESSION['id_user'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
        <title>Pilih Size Box</title>
        <style>
            body {
                font-family: "Nunito", sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

<<<<<<< HEAD
            header {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 1000;
            }
=======
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
            rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" />
        <title>Pilih Size Box</title>
        <style>
        body {
            font-family: "Nunito", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
>>>>>>> a7be75aed93453bf42339a0413ba86ab18d63fe6

            main {
                padding-top: 80px; /* Tambahkan padding agar tidak tumpang tindih dengan navbar */
            }

            .section-title {
                font-family: "Nunito", sans-serif;
                font-weight: bold;
                color: #5e875e;
                text-align: center;
                margin-bottom: 30px;
            }

            .card {
                border: 2px solid #ddd; /* Tambahkan properti ini */
                border-radius: 10px; /* Tambahkan properti ini */
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan */
            }

            .card-title {
                font-weight: bold;
            }

            .card-text {
                color: #555;
            }
        </style>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #b93f3f">
                <div class="container-fluid" style="margin-top: -5px; margin-bottom: -5px">
                    <a class="navbar-brand d-flex align-items-center" href="../index.php">
                        <img src="../assets/images/logo.png" alt="Logo" width="45" height="45" class="me-2" />
                        <span>Dapoer Mama</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex" id="navbarNav">
                        <ul class="navbar-nav ms-auto py-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="../index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="history/history.php?id_user=<?php echo $id_user; ?>">Histori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pesan.php">Pesan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../profile-screen/profile.php?id_user=<?php echo $id_user; ?>"><i class="bi bi-person-circle" style="font-size: 28px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

<<<<<<< HEAD
=======
        .card-text {
            color: #555;
        }
        </style>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #b93f3f">
                <div class="container-fluid" style="margin-top: -5px; margin-bottom: -5px">
                    <a class="navbar-brand d-flex align-items-center" href="../index.php">
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
                                <a class="nav-link" href="#">Histori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pesan.html">Pesan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../profile-screen/profile.html"><i class="bi bi-person-circle"
                                        style="font-size: 28px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

>>>>>>> a7be75aed93453bf42339a0413ba86ab18d63fe6
        <main class="container my-5">
            <h2 class="section-title">Pilih Size Box</h2>
            <div class="row text-center">
                <!-- Small Box -->
                <div class="col-md-4 mb-4">
                    <a href="kecil/boxkecil.php" style="text-decoration: none; color: inherit">
                        <div class="card">
                            <img src="../assets/images/size s.png" class="card-img-top" alt="Small Box" />
                            <div class="card-body">
                                <h5 class="card-title">Small (Kecil)</h5>
                                <p class="card-text">Rp 30.000 per box</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Medium Box -->
                <div class="col-md-4 mb-4">
                    <a href="sedang/boxsedang.php" style="text-decoration: none; color: inherit">
                        <div class="card">
                            <img src="../assets/images/size m.png" class="card-img-top" alt="Medium Box" />
                            <div class="card-body">
                                <h5 class="card-title">Medium (Sedang)</h5>
                                <p class="card-text">Rp 40.000 per box</p>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Large Box -->
                <div class="col-md-4 mb-4">
                    <a href="besar/boxbesar.php" style="text-decoration: none; color: inherit">
                        <div class="card">
                            <img src="../assets/images/size l.png" class="card-img-top" alt="Large Box" />
                            <div class="card-body">
                                <h5 class="card-title">Large (Besar)</h5>
                                <p class="card-text">Rp 50.000 per box</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

<<<<<<< HEAD
                <section>
                    <h2 class="section-title">Menu Rekomendasi</h2>
                    <div class="row">
                        <?php
                        // Koneksi ke database
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "catering";

                        $host = new mysqli($servername, $username, $password, $dbname);
                        if ($host->connect_error) {
                            die("Koneksi gagal: " . $host->connect_error);
                        }

                        // Ambil data dari tabel
                        $sql = "SELECT * FROM box_rek";
                        $id_rek = $_GET['id_rek'] ?? 0;
                        $result = $host->query($sql);

                        // Render elemen HTML untuk setiap menu
                        while ($row = $result->fetch_assoc()): 
                            // Konversi data BLOB menjadi format base64
                            $gambar = !empty($row['gambar']) 
                                ? 'data:image/jpeg;base64,' . base64_encode($row['gambar']) 
                                : '../assets/images/default.jpg';
                        ?>
                            <div class="col-3">
                                
                                <a href="rekomendasi/rekomendasi.php?id_rek=<?php echo $row['id_rek']; ?>" style="text-decoration: none; color: inherit">
                                    <div class="card h-100 mx-2">
                                        <!-- Gambar -->
                                        <img 
                                            src="<?= $gambar; ?>" 
                                            class="card-img-top img-fluid h-100" 
                                            alt="<?= $row['nama_menu']; ?>" 
                                        />
                                        <div class="card-body mb-0">
                                            <h5 class="card-title mb-2"><?= $row['nama_menu']; ?></h5>
                                            <p class="card-text mb-0">Rp<?= number_format($row['harga'], 0, ',', '.'); ?> per box</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                        <?php $host->close(); ?>
                    </div>
                </section>



        </main>

=======
            <!-- Menu Rekomendasi Section -->
            <section>
                <h2 class="section-title">Menu Rekomendasi</h2>
                <div class="row">
                    <div class="col-3">
                        <a href="rekomendasi1/rekomendasi1.html" style="text-decoration: none; color: inherit">
                            <div class="card h-100 mx-2">
                                <img src="../assets/images/menu1.jpg" class="card-img-top img-fluid h-100"
                                    alt="Menu Rekomendasi 1" />
                                <div class="card-body mb-0">
                                    <h5 class="card-title mb-2">Ayam Bakar Madura</h5>
                                    <p class="card-text mb-0">Rp12.000 per box</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="rekomendasi2/rekomendasi2.html" style="text-decoration: none; color: inherit">
                            <div class="card h-100 mx-2">
                                <img src="../assets/images/menu2.jpg" class="card-img-top img-fluid h-100"
                                    alt="Menu Rekomendasi 2" />
                                <div class="card-body">
                                    <h5 class="card-title mb-2">Ayam Bakar Tuban</h5>
                                    <p class="card-text mb-0">Rp10.000 per box</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="rekomendasi3/rekomendasi3.html" style="text-decoration: none; color: inherit">
                            <div class="card h-100 mx-2">
                                <img src="../assets/images/menu3.jpg" class="card-img-top img-fluid h-100"
                                    alt="Menu Rekomendasi 3" />
                                <div class="card-body">
                                    <h5 class="card-title mb-2">Ayam Bakar Madu</h5>
                                    <p class="card-text mb-0">Rp14.000 per box</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="rekomendasi4/rekomendasi4.html" style="text-decoration: none; color: inherit">
                            <div class="card h-100 mx-2">
                                <img src="../assets/images/menu4.jpeg" class="card-img-top img-fluid h-100"
                                    alt="Menu Rekomendasi 4" />
                                <div class="card-body">
                                    <h5 class="card-title mb-2">Ayam Bakar Solo</h5>
                                    <p class="card-text mb-0">Rp20.000 per box</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </main>

>>>>>>> a7be75aed93453bf42339a0413ba86ab18d63fe6
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    <footer class="text-white py-5 mt-5" style="background-color: #b93f3f">
        <div class="container">
            <div class="row">
                <!-- Jam Operasional -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold">JAM OPERASIONAL</h5>
                    <p class="mb-1">Senin - Jumat: 07.00 - 20.00</p>
                    <p class="mb-1">Sabtu - Minggu: 07.00 - 15.00</p>
                    <p>Hari Besar Nasional: Tutup/Libur</p>
                </div>

                <!-- Customer Care -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold">CUSTOMER CARE</h5>
                    <p class="mb-1">Aktif pada jam operasional</p>
                    <p class="mb-1">
                        <i class="bi bi-telephone-fill"></i>
                        <a href="tel:+6281309907080" class="text-white text-decoration-none">+62 81309907080</a>
                    </p>
                    <p class="mb-1"><i class="bi bi-chat-dots-fill"></i> Saran dan Keluhan</p>
                    <p><i class="bi bi-geo-alt-fill"></i> Lokasi kami</p>
                </div>

                <!-- Sosial Media -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold">SOSIAL MEDIA</h5>
                    <p class="mb-1">
                        <i class="bi bi-instagram"></i>
<<<<<<< HEAD
                        <a href="https://instagram.com/dapoermama" class="text-white text-decoration-none">@dapoermama</a>
                    </p>
                    <p class="mb-1">
                        <i class="bi bi-facebook"></i>
                        <a href="https://facebook.com/Dapoermama_Official" class="text-white text-decoration-none">Dapoermama_Official</a>
                    </p>
                    <p class="mb-1">
                        <i class="bi bi-tiktok"></i>
                        <a href="https://tiktok.com/@dapoermama_official" class="text-white text-decoration-none">@dapoermama_official</a>
                    </p>
                    <p>
                        <i class="bi bi-youtube"></i>
                        <a href="https://youtube.com/@dapoermama" class="text-white text-decoration-none">@dapoermama</a>
=======
                        <a href="https://instagram.com/dapoermama"
                            class="text-white text-decoration-none">@dapoermama</a>
                    </p>
                    <p class="mb-1">
                        <i class="bi bi-facebook"></i>
                        <a href="https://facebook.com/Dapoermama_Official"
                            class="text-white text-decoration-none">Dapoermama_Official</a>
                    </p>
                    <p class="mb-1">
                        <i class="bi bi-tiktok"></i>
                        <a href="https://tiktok.com/@dapoermama_official"
                            class="text-white text-decoration-none">@dapoermama_official</a>
                    </p>
                    <p>
                        <i class="bi bi-youtube"></i>
                        <a href="https://youtube.com/@dapoermama"
                            class="text-white text-decoration-none">@dapoermama</a>
>>>>>>> a7be75aed93453bf42339a0413ba86ab18d63fe6
                    </p>
                </div>

                <!-- Newsletter -->
                <div class="col-md-3 mb-4">
                    <h5 class="fw-bold">NEWSLETTER</h5>
                    <form action="mailto:your-email@example.com" method="post" enctype="text/plain">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Masukkan email anda" required />
                            <button class="btn btn-light" type="submit">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Metode Pembayaran -->
            <div class="row mt-4">
                <div class="col text-center">
                    <hr class="border border-light" />
                    <div class="d-flex justify-content-center pt-3">
                        <img src="../assets/images/payment.png" alt="Payment method" width="100%" />
                    </div>
                </div>
            </div>
        </div>
    </footer>
<<<<<<< HEAD
</html>
=======

</html>
>>>>>>> a7be75aed93453bf42339a0413ba86ab18d63fe6
