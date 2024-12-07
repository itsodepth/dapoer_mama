<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Pesanan</h1>

    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="<?= BASEURL; ?>/pesanan/form" class="btn btn-primary my-3">Tambah Data Pesanan</a>
        </div>
    </div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Pemesan</th>
                        <th>Waktu</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Cara Bayar</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Pemesan</th>
                        <th>Waktu</th>
                        <th>Alamat</th>
                        <th>No. Telepon</th>
                        <th>Cara Bayar</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['pesanan'] as $pesanan) : ?>
                    <tr>
                        <td><?= $pesanan['username']; ?></td>
                        <td><?= $pesanan['waktu']; ?></td>
                        <td><?= $pesanan['alamat']; ?></td>
                        <td><?= $pesanan['tlp']; ?></td>
                        <td><?= $pesanan['cara_bayar']; ?></td>
                        <td><?= $pesanan['jumlah']; ?></td>
                        <td><?= number_format($pesanan['totalharga'], 0, ',', '.'); ?></td>
                        <td><?= $pesanan['status']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/pesanan/detail/<?= $pesanan['id_pes']; ?>" class="btn btn-primary btn-icon-split" style="width: 60px;">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->