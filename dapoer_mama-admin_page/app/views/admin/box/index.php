<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Box</h1>

    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="<?= BASEURL; ?>/box/form" class="btn btn-primary my-3">Tambah Data Box</a>
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
                        <th>Ukuran</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Ukuran</th>
                        <th>Kapasitas</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['box'] as $box) : ?>
                    <tr>
                        <td><?= $box['size']; ?></td>
                        <td><?= $box['capacity']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/box/hapus/<?= $box['id_size']; ?>" class="btn btn-danger btn-icon-split" style="width: 60px;" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                            <a href="<?= BASEURL; ?>/box/form/<?= $box['id_size']; ?>" class="btn btn-primary btn-icon-split" style="width: 60px;">Edit</a>
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