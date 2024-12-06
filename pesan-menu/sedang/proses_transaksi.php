<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pembayaran = $_POST['pembayaran'];
    $totalHarga = $_POST['totalHarga'];
    $sisaPembayaran = ($pembayaran === 'DP') ? $totalHarga * 0.2 : 0;

    // Simpan transaksi
    $stmt = $conn->prepare("INSERT INTO transaksi (total_harga, pembayaran, sisa_pembayaran) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $totalHarga, $pembayaran, $sisaPembayaran);
    $stmt->execute();
    $transaksiId = $stmt->insert_id;

    // Simpan detail transaksi
    foreach ($_POST['detailPesanan'] as $detail) {
        $stmt = $conn->prepare("INSERT INTO transaksi_detail (id_transaksi, id_isian, id_minuman, qty, subtotal) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiii", $transaksiId, $detail['id_isian'], $detail['id_minuman'], $detail['qty'], $detail['subtotal']);
        $stmt->execute();
    }

    echo "Transaksi berhasil disimpan!";
}