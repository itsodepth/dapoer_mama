<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <div class="border-line"></div>
        <form action="verify_code_process.php" method="POST" onsubmit="showMessage()">
            <h2 style="color: black;">Forgot Password</h2>
            <div class="input-box">
                <input type="email" name="email" required="required">
                <span>Email Address</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="number" name="code_reset" required="required">
                <span>code_reset</span>
                <i></i>
            </div>
            <div class="imp-links">
                <a href="register.html">Sign up</a>
                <a href="login.html">Sign in</a>
            </div>
            <input type="submit" value="Reset Password" class="btn">
        </form>
    </div>
</body>
</html>
