<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_user'])) {
    header("Location: ../../login.php");
    exit();
}

// Ambil ID pengguna yang sedang login
$id_user = $_SESSION['id_user'];

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering";

$host = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($host->connect_error) {
    die("Koneksi gagal: " . $host->connect_error);
}

// Ambil data history berdasarkan id_user
$sql = "SELECT nama_menu, isi_1, isi_2, isi_3, isi_4, isi_5, minuman, jumlah, harga, dp 
        FROM history 
        WHERE id_user = ?";
$stmt = $host->prepare($sql);

if (!$stmt) {
    die("Error preparing statement: " . $host->error);
}

// Bind parameter id_user untuk query
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>History Pemesanan</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #b93f3f">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Dapoer Mama</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="../../index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link active" href="#">History</a></li>
                        <li class="nav-item"><a class="nav-link" href="../../logout.php">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-5">
        <h1 class="mb-4">History Pemesanan</h1>
        <?php if ($result->num_rows > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Menu</th>
                        <th>Isi 1</th>
                        <th>Isi 2</th>
                        <th>Isi 3</th>
                        <th>Isi 4</th>
                        <th>Isi 5</th>
                        <th>Minuman</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>DP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $counter = 1;
                    while ($row = $result->fetch_assoc()): 
                        // Konversi nilai DP menjadi "Lunas" atau "80%"
                        $dp_status = ($row['dp'] === "lunas") ? "Lunas" : "80%";
                    ?>
                        <tr>
                            <td><?= $counter++; ?></td>
                            <td><?= htmlspecialchars($row['nama_menu']); ?></td>
                            <td><?= htmlspecialchars($row['isi_1']); ?></td>
                            <td><?= htmlspecialchars($row['isi_2']); ?></td>
                            <td><?= htmlspecialchars($row['isi_3']); ?></td>
                            <td><?= htmlspecialchars($row['isi_4']); ?></td>
                            <td><?= htmlspecialchars($row['isi_5']); ?></td>
                            <td><?= htmlspecialchars($row['minuman']); ?></td>
                            <td><?= htmlspecialchars($row['jumlah']); ?></td>
                            <td>Rp<?= number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td><?= $dp_status; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info">Belum ada data history pemesanan.</div>
        <?php endif; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
$stmt->close();
$host->close();
?>
