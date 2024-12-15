<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .btn-primary {
            background-color: #b93f3f;
            border-color: #b93f3f;
        }

        .form-label {
            color: #000;
            /* Warna teks untuk label agar kontras dengan background */
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
                            <h2>Form Registrasi</h2>
                        </div>
                        <div class="card-body">
                            <form action="register_process.php" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="../password/fpassword.php" class="text-decoration-none">Lupa Password?</a>
                                    <a href="login.php" class="text-decoration-none">Masuk</a>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 w-100">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>