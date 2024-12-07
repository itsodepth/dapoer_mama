<div class="container">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <form action="<?= BASEURL; ?>/diskon/save" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_diskon" value="<?= $data['diskon']['id_diskon'] ?? ''; ?>">

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Diskon</label>
            <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['diskon']['judul'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="besaran" class="form-label">Besaran Diskon</label>
            <input type="number" class="form-control" id="besaran" name="besaran" value="<?= $data['diskon']['besaran'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="maksharga" class="form-label">Maksimal Harga</label>
            <input type="number" class="form-control" id="maksharga" name="maksharga" value="<?= $data['diskon']['maksharga'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggalexp" class="form-label">Tanggal EXP</label>
            <input type="date" class="form-control" id="tanggalexp" name="tanggalexp" value="<?= $data['diskon']['tanggalexp'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $data['diskon']['deskripsi'] ?? ''; ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL; ?>/diskon" class="btn btn-secondary">Batal</a>
    </form>
</div>
