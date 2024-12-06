<?php

session_start(); // Start the session

$sessionId = session_id(); // Get the session ID

/* if ($_SESSION['role'] !== 'admin') {
    header("Location: /unauthorized");
    exit;
} */

require_once '../app/init.php';

$app = new App;
?>