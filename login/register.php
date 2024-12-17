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
        <div class="input__container">
            <div class="shadow__input"></div>
            <form action="register_process.php" method="POST">
                <h2 style="color: black;">Sign Up</h2>
                <div class="input__button__shadow">
                    <input type="text" name="username" required="required">
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="input__button__shadow">
                    <input type="email" name="email" required="required">
                    <span>Email</span>
                    <i></i>
                </div>
                <div class="input__button__shadow">
                    <input type="password" name="password" required="required">
                    <span>Password</span>
                    <i></i>
                </div>
                <div class="input__button__shadow">
                    <input type="password" name="confirm_password" required="required">
                    <span>Confirm Password</span>
                    <i></i>
                </div>
                <div class="imp-links">
                    <a href="fpassword.php">Forget Password</a>
                    <a href="login.html">Sign In</a>
                </div>
                <button type="submit" class="input__button__shadow"> lanjut </button>
            </form>

        </div>
    </body>

</html>