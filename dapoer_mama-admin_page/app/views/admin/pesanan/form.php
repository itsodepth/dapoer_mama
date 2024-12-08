<div class="container">
    <h1 class="mt-4"><?= $data['judul']; ?></h1>
    <form action="<?= BASEURL; ?>/pesanan/save" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu</label>
            <input type="date" class="form-control" id="waktu" name="waktu" value="<?= $data['pesanan']['waktu'] ?? ''; ?>" required>
        </div>

        <div class="input-group mb-3">
        <label class="input-group-text" for="status">Options</label>
        <select class="form-control" id="status">
            <option selected>Choose...</option>
            <option value="selesai">Selesai</option>
            <option value="terkirim">Terkirim</option>
            <option value="sedang dibuat">Sedang Dibuat</option>
    </select>
    </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $data['pesanan']['alamat'] ?? ''; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">No. Telepon</label>
            <input type="number" class="form-control" id="tlp" name="tlp" value="<?= $data['pesanan']['tlp'] ?? ''; ?>" required>
        </div>

        <div class="input-group mb-3">
        <label class="input-group-text" for="cara_bayar">Options</label>
        <select class="form-control" id="cara_bayar">
            <option selected>Choose...</option>
            <option value="dp">DP</option>
            <option value="lunas">Lunas</option>
    </select>
    </div>

    <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $data['pesanan']['jumlah'] ?? ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="totalharga" class="form-label">Total Harga</label>
            <input type="number" class="form-control" id="totalharga" name="totalharga" value="<?= $data['pesanan']['totalharga'] ?? ''; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL; ?>/pesanan" class="btn btn-secondary">Batal</a>
    </form>
</div>
