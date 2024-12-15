<?php
session_start(); // Memulai sesi
if (!isset($_SESSION['username']) || !isset($_SESSION['email']) || !isset($_SESSION['hashed_password'])) {
    // Jika data dari langkah pertama tidak tersedia, arahkan kembali ke langkah pertama
    header("Location: register_process.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering"; 

// Create connection
$host = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($host->connect_error) {
    die("Connection failed: " . $host->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the additional form data
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    $kode_pos = $_POST['kode_pos'];

    // Validate form fields
    if (empty($alamat) || empty($tlp) || empty($kode_pos)) {
        echo "All fields are required!";
        exit();
    }

    // Get data from session (from step 1)
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $hashed_password = $_SESSION['hashed_password'];
    $level = $_SESSION['level'];

    // Insert the complete data into the database
    $sql = "INSERT INTO user (username, email, password, level, alamat, tlp, kode_pos) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $host->prepare($sql);
    $stmt->bind_param("sssisds", $username, $email, $hashed_password, $level, $alamat, $tlp, $kode_pos);

    if ($stmt->execute()) {
        echo "Registration complete! You can now log in.";
        // Clear session data after successful registration
        session_unset();
        session_destroy();

        // Redirect to login page
        header("Location: login.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$host->close();
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register - Step 2</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .btn-primary {
            background-color: #b93f3f;
            /* Warna aksen yang diinginkan */
            border-color: #b93f3f;
        }

        .card-header,
        .btn-primary {
            background-color: #b93f3f;
            border-color: #b93f3f;
        }

        .card-header {
            color: #fff;
            /* Warna teks untuk header card */
        }
        </style>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow">
                        <div class="card-header text-center">
                            <h2>Lengkapi Registrasi Kamu</h2>
                        </div>
                        <div class="card-body">
                            <form action="register_step2.php" method="POST">
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tlp" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="tlp" name="tlp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kode_pos" class="form-label">Kode POS</label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" required>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>