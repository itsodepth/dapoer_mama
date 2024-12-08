<div class="container">
    <h1 class="mt-4">Daftar Pelanggan</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Username</th>
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
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Kode Pos</th>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($data['pelanggan'] as $index => $pelanggan) : ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= htmlspecialchars($pelanggan['username'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($pelanggan['email'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($pelanggan['tlp'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($pelanggan['alamat'] ?? 'Tidak tersedia'); ?></td>
                    <td><?= htmlspecialchars($pelanggan['kodepos'] ?? 'Tidak tersedia'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
