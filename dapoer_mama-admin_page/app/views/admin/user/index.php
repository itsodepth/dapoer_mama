<div class="container-fluid">
<h1 class="mt-4">Daftar Pelanggan</h1>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Table</h6>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($data['user'] as $index => $user) : ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($user['username'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($user['nama'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($user['email'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($user['tlp'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($user['alamat'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($user['kodepos'] ?? 'Tidak tersedia'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>
