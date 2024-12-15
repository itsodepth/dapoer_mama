<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
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
                            <h2>Lupa Password</h2>
                        </div>
                        <div class="card-body">
                            <form action="verify_code_process.php" method="POST" onsubmit="showMessage()">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="code_reset" class="form-label">Reset Code</label>
                                    <input type="number" class="form-control" id="code_reset" name="code_reset"
                                        required>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="../login/register.php" class="text-decoration-none">Daftar</a>
                                    <a href="../login/login.php" class="text-decoration-none">Masuk</a>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3 w-100">Reset Password</button>
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