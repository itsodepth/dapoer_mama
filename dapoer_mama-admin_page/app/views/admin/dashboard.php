                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Penghasilan (Bulanan)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= number_format($data['hasil_bulan']['total_penghasilan_bulan_ini'] ?? 0, 2, ',', '.') ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Yearly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Penghasilan (Tahunan)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= number_format($data['total_penghasilan_tahun_ini']['total_penghasilan_tahun_ini'] ?? 0, 2, ',', '.') ?>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Penghasilan (Total)</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?= number_format($data['hasil']['total_penghasilan'] ?? 0, 2, ',', '.') ?>
                                                </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Diagram Penghasilan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="penghasilanChart" width="400" height="200"></canvas>
                                        <script>
                                            // Ambil data penghasilan per bulan dari PHP
                                            const penghasilanData = <?= json_encode($data['penghasilan_per_bulan']); ?>;
                                            
                                            // Array nama bulan dalam urutan yang benar
                                            const bulan = [
                                                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                                            ];
                                            
                                            // Inisialisasi array penghasilan per bulan
                                            const totalPenghasilan = new Array(12).fill(0); // Pastikan ada 12 bulan, diisi dengan 0
                                            
                                            // Isi penghasilan per bulan berdasarkan data yang diterima
                                            penghasilanData.forEach(item => {
                                                totalPenghasilan[item.bulan - 1] = item.total_penghasilan; // Posisikan penghasilan pada bulan yang benar
                                            });
                                            
                                            // Membuat diagram garis menggunakan Chart.js
                                            const ctx = document.getElementById('penghasilanChart').getContext('2d');
                                            const penghasilanChart = new Chart(ctx, {
                                                type: 'line',
                                                data: {
                                                    labels: bulan, // Menampilkan nama bulan
                                                    datasets: [{
                                                        label: 'Penghasilan Bulanan',
                                                        data: totalPenghasilan, // Data penghasilan per bulan
                                                        borderColor: 'rgb(75, 192, 192)', // Warna garis
                                                        fill: false, // Tidak ada area yang diisi
                                                    }]
                                                },
                                                options: {
                                                    responsive: true,
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->