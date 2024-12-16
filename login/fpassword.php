<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="input__container">
        <div class="shadow__input"></div>
        <form action="verify_code_process.php" method="POST" onsubmit="showMessage()">
            <h2 style="color: black;">Forgot Password</h2>
            <div class="input__button__shadow">
                <input type="email" name="email" required="required">
                <span>Email Address</span>
                <i></i>
            </div>
            <div class="input__button__shadow">
                <input type="number" name="code_reset" required="required">
                <span>code_reset</span>
                <i></i>
            </div>
            <div class="imp-links">
                <a href="register.html">Sign up</a>
                <a href="login.html">Sign in</a>
            </div>
            <button type="submit" class="input__button__shadow"> reset password </button>
        </form>
    </>
</body>
</html>
