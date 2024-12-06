<div class="container">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <form action="<?= BASEURL; ?>/box/save" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_box" value="<?= $data['box']['id_box'] ?? ''; ?>">

        <div class="mb-3">
            <label for="ukuran" class="form-label">Ukuran</label>
            <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= $data['box']['ukuran'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?= $data['box']['kapasitas'] ?? ''; ?>" required>
        </div>

        <div>
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar" accept="image/*">
        <?php if (!empty($data['box']['gambar'])) : ?>
            <p>Gambar saat ini: <img src="data:image/jpeg;base64,<?= base64_encode($data['box']['gambar']); ?>" alt="Gambar Box" width="100"></p>
            <!-- Input hidden untuk menyimpan gambar lama -->
            <input type="hidden" name="gambar_lama" value="<?= base64_encode($data['box']['gambar']); ?>">
        <?php endif; ?>
    </div>      

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL; ?>/box" class="btn btn-secondary">Batal</a>
    </form>
</div>
