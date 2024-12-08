<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $data['judul']; ?></h1>

    <!-- Detail Pesanan Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Pesanan</h6>
        </div>
        <div class="card-body">
            <!-- Tombol Kembali -->
            <a href="<?= BASEURL; ?>/pesanan" class="btn btn-secondary mb-3">Kembali</a>

            <h5>Informasi Pemesan</h5>
            <table class="table" style="width: 40%;">
                <tr>
                    <td>Nama Pemesan</td>
                    <td>: <?= $data['pesanan']['username']; ?></td>
                </tr>
                <tr>
                    <td>Waktu Estimasi</td>
                    <td>: <?= $data['pesanan']['waktu']; ?></td>
                </tr>
                <tr>
                    <td>Alamat Pengiriman</td>
                    <td>: <?= $data['pesanan']['alamat']; ?></td>
                </tr>
                <tr>
                    <td>No. Telepon Pemesan</td>
                    <td>: <?= $data['pesanan']['tlp']; ?></td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td>: <?= $data['pesanan']['cara_bayar']; ?></td>
                </tr>
                <tr>
                    <td>Jumlah Pesanan</td>
                    <td>: <?= $data['pesanan']['jumlah']; ?></td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>: <?= number_format($data['pesanan']['totalharga'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>Status Pesanan</td>
                    <td>: <?= $data['pesanan']['status_pes']; ?></td> <!-- Pastikan ini menggunakan 'status_pes' -->
                </tr>
            </table>

            <!-- Form untuk Update Status Pesanan -->
            <form action="<?= BASEURL; ?>/pesanan/updateStatus" method="POST" class="my-3">
                <input type="hidden" name="id_pes" value="<?= $data['pesanan']['id_pes']; ?>">
                <div class="form-group d-flex align-items-center">
                    <label for="status" class="mr-2">Update Status:</label>
                    <select name="status" id="status" class="form-control" style="max-width: 200px; margin-right: 10px;">
                        <?php 
                        // Array status yang tersedia
                        $statuses = ['Pending', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'];
                        foreach ($statuses as $status) : ?>
                            <option value="<?= $status; ?>" <?= $data['pesanan']['status_pes'] == $status ? 'selected' : ''; ?>>
                                <?= $status; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

            <h5>Informasi Pembayaran</h5>
            <table class="table" style="width: 40%;">
                <tr>
                    <td>ID Diskon</td>
                    <td>: <?= isset($data['pembayaran']['id_diskon']) ? $data['pembayaran']['id_diskon'] : 'Tidak ada diskon'; ?></td>
                </tr>
                <tr>
                    <td>Total Bayar</td>
                    <td>: <?= number_format(isset($data['pembayaran']['total_bayar']) ? $data['pembayaran']['total_bayar'] : 0, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>Status Pembayaran</td>
                    <td>: <?= isset($data['pembayaran']['status']) ? $data['pembayaran']['status'] : 'belum_lunas'; ?></td>
                </tr>
            </table>

            <h5>Detail Menu Pesanan</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Menu</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['detail_pesanan'] as $detail) : ?>
                    <tr>
                        <td><?= $detail['id_menu']; ?></td>
                        <td><?= $this->model('Menu_model')->getMenuById($detail['id_menu'])['nama']; ?></td>
                        <td><?= number_format($this->model('Menu_model')->getMenuById($detail['id_menu'])['harga'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->