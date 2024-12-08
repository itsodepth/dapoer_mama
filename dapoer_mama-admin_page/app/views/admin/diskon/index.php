<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Diskon</h1>

    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="<?= BASEURL; ?>/diskon/form" class="btn btn-primary my-3">Tambah Data Diskon</a>
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
                        <th>Judul</th>
                        <th>Besaran Diskon</th>
                        <th>Maksimal Diskon</th>
                        <th>Tanggal Kadaluarsa</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Judul</th>
                        <th>Besaran Diskon</th>
                        <th>Maksimal Diskon</th>
                        <th>Tanggal Kadaluarsa</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['diskon'] as $diskon) : ?>
                    <tr>
                        <td><?= $diskon['judul']; ?></td>
                        <td><?= $diskon['besaran']; ?></td>
                        <td><?= number_format($diskon['maksharga'], 0, ',', '.'); ?></td>
                        <td><?= $diskon['tanggalexp']; ?></td>
                        <td><?= $diskon['deskripsi']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/diskon/hapus/<?= $diskon['id_diskon']; ?>" class="btn btn-danger btn-icon-split" style="width: 60px;" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                            <a href="<?= BASEURL; ?>/diskon/form/<?= $diskon['id_diskon']; ?>" class="btn btn-primary btn-icon-split" style="width: 60px;">Edit</a>
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