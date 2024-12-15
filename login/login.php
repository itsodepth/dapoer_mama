<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
        .btn-primary {
            background-color: #b93f3f;
            /* Warna aksen yang diinginkan */
            border-color: #b93f3f;
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
                            <h2>Sign In</h2>
                        </div>
                        <div class="card-body">
                            <!-- Pesan error global -->
                            <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo htmlspecialchars($_GET['error']); ?>
                            </div>
                            <?php endif; ?>

                            <form action="login_proses.php" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required
                                        placeholder="Enter your username">
                                    <!-- Pesan error jika username salah -->
                                    <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_username'): ?>
                                    <div class="text-danger">Username tidak ditemukan.</div>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required
                                        placeholder="Enter your password">
                                    <!-- Pesan error jika password salah -->
                                    <?php if (isset($_GET['error']) && $_GET['error'] == 'invalid_password'): ?>
                                    <div class="text-danger">Password salah.</div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="../password/fpassword.php" class="text-decoration-none">Lupa Password?</a>
                                    <a href="register.php" class="text-decoration-none">Buat Akun</a>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 w-100">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

</html>