<div class="container">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <form action="<?= BASEURL; ?>/box/save" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_size" value="<?= $data['box']['id_size'] ?? ''; ?>">

        <div class="mb-3">
            <label for="size" class="form-label">Ukuran</label>
            <input type="text" class="form-control" id="size" name="size" value="<?= $data['box']['size'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="capacity" class="form-label">Kapasitas</label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="<?= $data['box']['capacity'] ?? ''; ?>" required>
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
