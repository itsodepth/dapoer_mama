<div class="container">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <form action="<?= BASEURL; ?>/menu/save" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_menu" value="<?= $data['menu']['id_menu'] ?? ''; ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Menu</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['menu']['nama'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $data['menu']['harga'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $data['menu']['deskripsi'] ?? ''; ?></textarea>
        </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="tipe">Options</label>
        <select class="form-control" id="tipe" name="tipe" required>
            <option selected disabled>Pilih Tipe...</option>
            <option value="makanan" <?= ($data['menu']['tipe'] ?? '') == 'makanan' ? 'selected' : ''; ?>>Makanan</option>
            <option value="minuman" <?= ($data['menu']['tipe'] ?? '') == 'minuman' ? 'selected' : ''; ?>>Minuman</option>
            <option value="snack" <?= ($data['menu']['tipe'] ?? '') == 'snack' ? 'selected' : ''; ?>>Snack</option>
        </select>
    </div>


    <div>
        <label for="gambar">Gambar:</label>
        <input type="file" name="gambar" id="gambar" accept="image/*">
        <?php if (!empty($data['menu']['gambar'])) : ?>
            <p>Gambar saat ini: <img src="data:image/jpeg;base64,<?= base64_encode($data['menu']['gambar']); ?>" alt="Gambar Menu" width="100"></p>
            <!-- Input hidden untuk menyimpan gambar lama -->
            <input type="hidden" name="gambar_lama" value="<?= base64_encode($data['menu']['gambar']); ?>">
        <?php endif; ?>
    </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL; ?>/menu" class="btn btn-secondary">Batal</a>
    </form>
</div>
