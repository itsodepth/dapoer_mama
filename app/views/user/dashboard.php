

        <main class="mt-5">
            <div class="p-5 mb-3 bg-image d-flex align-items-center" style="background-image: url('<?= BASEURL ?>/img/food.jpg'); height: 500px; background-size: cover; position: relative">
                <div class="mask d-flex align-items-center justify-content-start" style="background-color: rgba(0, 0, 0, 0.6); position: absolute; top: 0; left: 0; width: 100%; height: 100%">
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
                            <img src="<?= BASEURL; ?>/img/menu1.jpg" class="card-img-top img-fluid h-100" alt="Menu Rekomendasi 1" />
                            <div class="card-body">
                                <h5 class="card-title mb-2">Ayam Bakar Bujang</h5>
                                <p class="card-text mb-0">Rp12.000 per box</p>
                                <!-- Link stretched over the card -->
                                <a href="page1.html" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-3">
                        <div class="card h-100 mx-2">
                            <img src="<?= BASEURL; ?>/img/menu2.jpg" class="card-img-top img-fluid h-100" alt="Menu Rekomendasi 2" />
                            <div class="card-body">
                                <h5 class="card-title mb-2">Ayam Bakar Tuban</h5>
                                <p class="card-text mb-0">Rp10.000 per box</p>
                                <a href="page2.html" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-3">
                        <div class="card h-100 mx-2">
                            <img src="<?= BASEURL; ?>/img/menu3.jpg" class="card-img-top img-fluid h-100" alt="Menu Rekomendasi 3" />
                            <div class="card-body">
                                <h5 class="card-title mb-2">Ayam Bakar Madu</h5>
                                <p class="card-text mb-0">Rp14.000 per box</p>
                                <a href="page3.html" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-3">
                        <div class="card h-100 mx-2">
                            <img src="<?= BASEURL; ?>/img/menu4.jpeg" class="card-img-top img-fluid h-100" alt="Menu Rekomendasi 4" />
                            <div class="card-body">
                                <h5 class="card-title mb-2">Ayam Bakar Solo</h5>
                                <p class="card-text mb-0">Rp20.000 per box</p>
                                <a href="page4.html" class="stretched-link"></a>
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
                            <img src="<?= BASEURL; ?>/img/paket1.jpeg" class="card-img-top" alt="Menu Rekomendasi 1" />
                            <div class="card-body">
                                <h5 class="card-title text-center">Paket 1</h5>
                                <p class="card-text text-center">Cocok untuk acara pengajian di pedesaan atau tempat lainnya</p>
                                <a href="page3.html" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-4">
                        <div class="card mx-2">
                            <img src="<?= BASEURL ?>/img/paket2.jpeg" class="card-img-top" alt="Menu Rekomendasi 2" />
                            <div class="card-body">
                                <h5 class="card-title text-center">Paket 2</h5>
                                <p class="card-text text-center">Cocok untuk acara kantoran sebagai kudapan saat rapat</p>
                                <a href="page3.html" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-4">
                        <div class="card mx-2">
                            <img src="<?= BASEURL ?>/img/paket3.jpeg" class="card-img-top" alt="Menu Rekomendasi 3" />
                            <div class="card-body">
                                <h5 class="card-title text-center">Paket 3</h5>
                                <p class="card-text text-center">Paket ini cocok untuk acara berskala besar semacam pernikahan</p>
                                <a href="page3.html" class="stretched-link"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

        <!-- Modal Bootstrap untuk peringatan login -->
        <!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
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
        </div> -->
    
