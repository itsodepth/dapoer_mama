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
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
            rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="assets/style.css">
        <title>Dapoer Mama</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #b93f3f">
                <div class="container-fluid" style="margin-top: -5px; margin-bottom: -5px">
                    <a class="navbar-brand d-flex align-items-center" href="index.php">
                        <img src="assets/images/logo.png" alt="Logo" width="45" height="45" class="me-2" />
                        <span>Dapoer Mama</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse d-flex" id="navbarNav">
                        <ul class="navbar-nav ms-auto py-auto align-items-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php">Home</a>
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

        <main class="mt-2">
            <div class="p-5 mb-3 bg-image d-flex align-items-center"
                style="background-image: url('assets/images/food.jpg'); height: 500px; background-size: cover; position: relative">
                <div class="mask d-flex align-items-center justify-content-start"
                    style="background-color: rgba(0, 0, 0, 0.6); position: absolute; top: 0; left: 0; width: 100%; height: 100%">
                    <div class="text-start text-white ms-3 p-5">
                        <h1 class="mb-3">Dapoer Mama</h1>
                        <h4>Katering enak dan murah? Dapoer Mama solusinya!</h4>
                    </div>
                </div>
            </div>

            <div class="container">
                <h2 class="text-center my-5">Menu Andalan Kami</h2>
                <div class="row">
                    <?php
                // Koneksi ke database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "catering";

                $konn = new mysqli($servername, $username, $password, $dbname);
                if ($konn->connect_error) {
                    die("Koneksi gagal: " . $konn->connect_error);
                }

                // Ambil data dari tabel
                $sql = "SELECT * FROM box_an";
                $id_rek = $_GET['id_ad'] ?? 0;
                $result = $konn->query($sql);

                // Render elemen HTML untuk setiap menu
                while ($row = $result->fetch_assoc()):
                    // Konversi data BLOB menjadi format base64
                    $gambar = !empty($row['gambar'])
                        ? 'data:image/jpeg;base64,' . base64_encode($row['gambar'])
                        : '../assets/images/default.jpg';
                ?>
                    <div class="col-3">

                        <a href="andalan/andalan.php?id_ad=<?php echo $row['id_ad']; ?>"
                            style="text-decoration: none; color: inherit">
                            <div class="card h-100 mx-2">
                                <!-- Gambar -->
                                <img src="<?= $gambar; ?>" class="card-img-top img-fluid h-100"
                                    alt="<?= $row['nama_menu']; ?>" />
                                <div class="card-body mb-0">
                                    <h5 class="card-title mb-2"><?= $row['nama_menu']; ?></h5>
                                    <p class="card-text mb-0">Rp<?= number_format($row['harga'], 0, ',', '.'); ?> per
                                        box</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endwhile; ?>
                    <?php $konn->close(); ?>
                </div>

                <div class="container">
                    <h2 class="text-center my-5">Menu Rekomendasi</h2>
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

                            <a href="pesan-menu/rekomendasi/rekomendasi.php?id_rek=<?php echo $row['id_rek']; ?>"
                                style="text-decoration: none; color: inherit">
                                <div class="card h-100 mx-2">
                                    <!-- Gambar -->
                                    <img src="<?= $gambar; ?>" class="card-img-top img-fluid h-100"
                                        alt="<?= $row['nama_menu']; ?>" />
                                    <div class="card-body mb-0">
                                        <h5 class="card-title mb-2"><?= $row['nama_menu']; ?></h5>
                                        <p class="card-text mb-0">Rp<?= number_format($row['harga'], 0, ',', '.'); ?>
                                            per box</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                        <?php $host->close(); ?>
                    </div>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
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
                        <img src="assets/images/payment.png" alt="Payment method" width="100%" />
                    </div>
                </div>
            </div>
        </div>
    </footer>

</html>