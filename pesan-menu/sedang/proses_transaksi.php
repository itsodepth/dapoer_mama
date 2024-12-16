<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form dengan nama field yang sesuai
    $idUser = isset($_POST['id_user']) ? $_POST['id_user'] : null;
    $isi1 = isset($_POST['isi_1']) ? $_POST['isi_1'] : null;
    $isi2 = isset($_POST['isi_2']) ? $_POST['isi_2'] : null;
    $isi3 = isset($_POST['isi_3']) ? $_POST['isi_3'] : null;
    $isi4 = isset($_POST['isi_4']) ? $_POST['isi_4'] : null;
    $isi5 = isset($_POST['isi_5']) ? $_POST['isi_5'] : null;
    $minuman = isset($_POST['minuman']) ? $_POST['minuman'] : null;
    $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : null;
    $harga = isset($_POST['harga']) ? $_POST['harga'] : null;
    $dp = isset($_POST['dp']) ? $_POST['dp'] : null;

    // Validasi data
    if ($idUser && $isi1 && $isi2 && $isi3 && $isi4 && $isi5 && $minuman && $jumlah && $harga && $dp) {
        // Koneksi ke database
        $conn = new mysqli("localhost", "root", "", "catering");

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        try {
            // Mendapatkan id_size untuk box large
            $sizeQuery = "SELECT id_size FROM size_box WHERE size = 'medium' LIMIT 1";
            $sizeResult = $conn->query($sizeQuery);
            $sizeRow = $sizeResult->fetch_assoc();
            $idSize = $sizeRow['id_size']; // Ini akan berisi nilai 3 sesuai data yang Anda berikan

            // Prepare statement untuk insert dengan menambahkan id_size
            $stmt = $conn->prepare("INSERT INTO pesanan (id_user, id_size, isi_1, isi_2, isi_3, isi_4, isi_5, minuman, jumlah, harga, dp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            
            // Bind parameter dengan tipe data yang sesuai
            $stmt->bind_param("iissssssiis", 
                $idUser,    // integer
                $idSize,    // integer (id_size untuk large)
                $isi1,      // string
                $isi2,      // string
                $isi3,      // string
                $isi4,      // string
                $isi5,      // string
                $minuman,   // string
                $jumlah,    // integer
                $harga,     // integer
                $dp         // string (enum)
            );

            // Eksekusi query
            if ($stmt->execute()) {
                echo "<script>
                    alert('Transaksi berhasil disimpan!');
                    window.location.href = '../pesan.php';
                </script>";
            } else {
                echo "Gagal menyimpan transaksi: " . $stmt->error;
            }

            $stmt->close();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        $conn->close();
    } else {
        echo "Semua data wajib diisi. Silakan periksa kembali form Anda.";
    }
}
?>