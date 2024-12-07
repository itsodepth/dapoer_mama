<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
            rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="assets/style.css" />
        <title>Profil - Dapoer Mama</title>
    </head>

    <body>
        <!-- Header -->
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
                                <a class="nav-link" href="../pesan-menu/pesan.php">Pesan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profile-screen/profile.php"><i class="bi bi-person-circle"
                                        style="font-size: 28px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Main Content -->
        <main class="container" style="margin-top: 80px">
            <h2 class="text-center my-4">Personal Info</h2>
            <!-- Personal Info -->
            <div class="card p-4 mb-4" style="border: 2px solid #b93f3f; border-radius: 8px">
                <div class="p-3 mb-3" style="background-color: #b93f3f; color: white; border-radius: 4px">
                    <h4 class="mb-0">Ubah Password</h4>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="namaLengkap" class="form-label">Nama Lengkap*</label>
                        <input type="text" class="form-control" id="namaLengkap" required />
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username*</label>
                        <input type="text" class="form-control" id="username" required />
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email" required />
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="noTelepon" class="form-label">No. Telepon*</label>
                            <input type="tel" class="form-control" id="noTelepon" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kodePos" class="form-label">Kode Pos*</label>
                            <input type="text" class="form-control" id="kodePos" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamatLengkap" class="form-label">Alamat Lengkap*</label>
                        <textarea class="form-control" id="alamatLengkap" rows="3" required></textarea>
                    </div>
                </form>
                <div class="d-grid">
                    <button class="btn btn-danger w-100" style="background-color: #b93f3f"
                        onclick="window.location.href='../index.php'">Submit</button>
                </div>
            </div>

            <!-- Ubah Password -->
            <div class="card p-4 mb-4" style="border: 2px solid #b93f3f; border-radius: 8px">
                <div class="p-3 mb-3" style="background-color: #b93f3f; color: white; border-radius: 4px">
                    <h4 class="mb-0">Ubah Password</h4>
                </div>
                <form>
                    <div class="mb-3">
                        <label for="passwordLama" class="form-label">Password Lama*</label>
                        <input type="password" class="form-control" id="passwordLama" required />
                    </div>
                    <div class="mb-3">
                        <label for="passwordBaru" class="form-label">Password Baru*</label>
                        <input type="password" class="form-control" id="passwordBaru" required />
                    </div>
                    <div class="mb-3">
                        <label for="konfirmasiPassword" class="form-label">Konfirmasi Password*</label>
                        <input type="password" class="form-control" id="konfirmasiPassword" required />
                    </div>
                </form>
                <div class="d-grid">
                    <button class="btn btn-danger w-100" style="background-color: #b93f3f"
                        onclick="window.location.href='../index.php'">Submit</button>
                </div>
            </div>

            <!-- Button Log Out -->
            <div class="d-grid">
                <button class="btn btn-danger w-100" style="background-color: #b93f3f"
                    onclick="window.location.href='../index.php'">Log out</button>
            </div>
        </main>

        <!-- Footer -->
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
                            <img src="../assets/images/payment.png" alt="Payment method" width="100%" />
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>

</html>