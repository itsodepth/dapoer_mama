<?php
session_start(); // Memulai sesi

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate form fields
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        echo "All fields are required!";
        exit();
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username already exists in the database
    $sql_check = "SELECT * FROM user WHERE username = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        echo "Username already taken!";
        exit();
    }

    // Simpan data ke sesi untuk digunakan di langkah berikutnya
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['hashed_password'] = $hashed_password;
    $_SESSION['level'] = 1; // Default user level

    // Redirect to the second step
    header("Location: register_step2.php");
    exit();
}

$conn->close();
?>