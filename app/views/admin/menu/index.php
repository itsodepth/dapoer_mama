<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tabel Menu</h1>

    <div class="row mb-3">
        <div class="col-lg-6">
            <a href="<?= BASEURL; ?>/menu/form" class="btn btn-primary my-3">Tambah Data Menu</a>
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
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Tipe</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['menu'] as $menu) : ?>
                    <tr>
                        <td><?= $menu['nama']; ?></td>
                        <td><?= number_format($menu['harga'], 0, ',', '.'); ?></td>
                        <td><?= $menu['deskripsi']; ?></td>
                        <td>
                            <img src="data:image/jpeg;base64,<?= base64_encode($menu['gambar']); ?>" alt="Gambar Menu" width="100">
                        </td>
                        <td><?= $menu['tipe']; ?></td>
                        <td>
                            <a href="<?= BASEURL; ?>/menu/hapus/<?= $menu['id_menu']; ?>" class="btn btn-danger btn-icon-split" style="width: 60px;" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                            <a href="<?= BASEURL; ?>/menu/form/<?= $menu['id_menu']; ?>" class="btn btn-primary btn-icon-split" style="width: 60px;">Edit</a>
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