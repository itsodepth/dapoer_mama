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
                                <a class="nav-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">Pesan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login/login.php"><i class="bi bi-person-circle"
                                        style="font-size: 28px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main class="mt-5">
            <div class="p-5 mb-3 bg-image d-flex align-items-center"
                style="background-image: url('assets/images/food.jpg'); height: 500px; background-size: cover; position: relative">
                <div class="mask d-flex align-items-center justify-content-start"
                    style="background-color: rgba(0, 0, 0, 0.6); position: absolute; top: 0; left: 0; width: 100%; height: 100%">
                    <div class="text-start text-white ms-3 p-5">
                        <h2 class="mb-3">Judul Banner</h2>
                        <h4>Deskripsi singkat tentang gambar atau website.</h4>
                    </div>
                </div>
            </div>

            <div class="container">
                <h2 class="text-center my-5">Menu Andalan Kami</h2>
                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-3">
                        <div class="card h-100 mx-2">
                            <img src="assets/images/menu1.jpg" class="card-img-top img-fluid h-100"
                                alt="Menu Rekomendasi 1" />
                            <div class="card-body">
                                <h5 class="card-title mb-2">Ayam Bakar Bujang</h5>
                                <p class="card-text mb-0">Rp12.000 per box</p>
                                <!-- Link stretched over the card -->
                                <a class="stretched-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-3">
                        <div class="card h-100 mx-2">
                            <img src="assets/images/menu2.jpg" class="card-img-top img-fluid h-100"
                                alt="Menu Rekomendasi 2" />
                            <div class="card-body">
                                <h5 class="card-title mb-2">Ayam Bakar Tuban</h5>
                                <p class="card-text mb-0">Rp10.000 per box</p>
                                <a class="stretched-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-3">
                        <div class="card h-100 mx-2">
                            <img src="assets/images/menu3.jpg" class="card-img-top img-fluid h-100"
                                alt="Menu Rekomendasi 3" />
                            <div class="card-body">
                                <h5 class="card-title mb-2">Ayam Bakar Madu</h5>
                                <p class="card-text mb-0">Rp14.000 per box</p>
                                <a class="stretched-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-3">
                        <div class="card h-100 mx-2">
                            <img src="assets/images/menu4.jpeg" class="card-img-top img-fluid h-100"
                                alt="Menu Rekomendasi 4" />
                            <div class="card-body">
                                <h5 class="card-title mb-2">Ayam Bakar Solo</h5>
                                <p class="card-text mb-0">Rp20.000 per box</p>
                                <a class="stretched-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <h2 class="text-center my-5">Rekomendasi Paket Dapoer Mama</h2>
                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-4">
                        <div class="card mx-2">
                            <img src="assets/images/paket1.jpeg" class="card-img-top" alt="Menu Rekomendasi 1" />
                            <div class="card-body">
                                <h5 class="card-title text-center">Paket 1</h5>
                                <p class="card-text text-center">Cocok untuk acara pengajian di pedesaan atau tempat
                                    lainnya</p>
                                <a class="stretched-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-4">
                        <div class="card mx-2">
                            <img src="assets/images/paket2.jpeg" class="card-img-top" alt="Menu Rekomendasi 2" />
                            <div class="card-body">
                                <h5 class="card-title text-center">Paket 2</h5>
                                <p class="card-text text-center">Cocok untuk acara kantoran sebagai kudapan saat rapat
                                </p>
                                <a class="stretched-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-4">
                        <div class="card mx-2">
                            <img src="assets/images/paket3.jpeg" class="card-img-top" alt="Menu Rekomendasi 3" />
                            <div class="card-body">
                                <h5 class="card-title text-center">Paket 3</h5>
                                <p class="card-text text-center">Paket ini cocok untuk acara berskala besar semacam
                                    pernikahan</p>
                                <a class="stretched-link" href="#" data-bs-toggle="modal"
                                    data-bs-target="#loginModal"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Modal Bootstrap untuk peringatan login -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Peringatan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Anda harus login untuk melakukan pemesanan.</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <a href="login/index.html" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>
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