<?php
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

    // Insert the basic data into the database
    $sql = "INSERT INTO user (username, email, password, level) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Set the default level (you can change this as per your requirements)
    $level = 1; // Default user level

    $stmt->bind_param("sssi", $username, $email, $hashed_password, $level);

    if ($stmt->execute()) {
        // Store the user's ID for the next step
        $user_id = $stmt->insert_id;  // Get the last inserted user ID
        session_start();
        $_SESSION['user_id'] = $user_id;

        // Redirect to the second step
        header("Location: register_step2.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
