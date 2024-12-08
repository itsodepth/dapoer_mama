<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="box">
        <div class="border-line"></div>
        <form action="login_proses.php" method="POST">
            <h2 style="color: black;">Sign in</h2>

            <!-- Pesan error global -->
            <?php if (isset($_GET['error'])): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>

            <div class="input-box">
                <input type="text" name="username" required="required">
                <span>Username</span>
                <i></i>
                <!-- Pesan error jika username salah -->
                <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_username'): ?>
                    <small style="color: red;">Username tidak ditemukan.</small>
                <?php endif; ?>
            </div>
            <div class="input-box">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
                <!-- Pesan error jika password salah -->
                <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_password'): ?>
                    <small style="color: red;">Password salah.</small>
                <?php endif; ?>
            </div>
            <div class="imp-links">
                <a href="fpassword.php">Forget Password</a>
                <a href="register.php">Sign up</a>
            </div>
            <input type="submit" value="Login" class="btn">
        </form>
    </div>
</body>

</html>