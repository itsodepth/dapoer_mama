<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <div class="border-line"></div>
        <form action="<?= BASEURL; ?>/auth/register" method="POST">
            <h2 style="color: black;">Sign Up</h2>
            <div class="input-box">
                <input type="text" name="username" required="required">
                <span>Username</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="email" name="email" required="required">
                <span>Email</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" required="required">
                <span>Password</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" required="required">
                <span>Confirm Password</span>
                <i></i>
            </div>
            <div class="imp-links">
                <a href="fpassword.html">Forget Password</a>
                <a href="login.html">Sign In</a>
            </div>
            <input type="submit" value="Register" class="btn">
        </form>
        
    </div>
</body>
</html>