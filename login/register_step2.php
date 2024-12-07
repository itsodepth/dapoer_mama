<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // If user_id is not set, redirect to the first step
    header("Location: register_process.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the additional form data
    $alamat = $_POST['alamat'];
    $tlp = $_POST['tlp'];
    $kode_pos = $_POST['kode_pos'];

    // Get the user ID from session
    $user_id = $_SESSION['user_id'];

    // Validate form fields
    if (empty($alamat) || empty($tlp) || empty($kode_pos)) {
        echo "All fields are required!";
        exit();
    }

    // Update the user record with the additional information
    $sql = "UPDATE user SET alamat = ?, tlp = ?, kode_pos = ? WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $alamat, $tlp, $kode_pos, $user_id);

    if ($stmt->execute()) {
        echo "Registration complete! You can now log in.";
        header("Location: login.php"); // Redirect to login page
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Step 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <form action="register_step2.php" method="POST">
            <h2>Complete Your Registration</h2>
            <div class="input-box">
                <input type="text" name="alamat" required="required">
                <span>Alamat Lengkap</span>
            </div>
            <div class="input-box">
                <input type="text" name="tlp" required="required">
                <span>No Telepon</span>
            </div>
            <div class="input-box">
                <input type="text" name="kode_pos" required="required">
                <span>Kode POS</span>
            </div>
            <input type="submit" value="register" class="btn">
        </form>
    </div>
</body>
</html>
