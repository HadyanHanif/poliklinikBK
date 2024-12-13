<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik Sehat Bahagia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">

    <div class="container text-center">
        <h2 class="fw-bold mb-4">Selamat Datang Di Poliklinik Sehat Bahagia</h2>

        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <form action="login_process.php" method="post">
                    <div class="mb-3 text-start">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>
                    </div>
                    <div class="mb-3 text-start">
                        <label for="ktp" class="form-label">No KTP</label>
                        <input type="text" name="ktp" id="ktp" class="form-control" placeholder="Masukkan No KTP" required>
                    </div>
                    <div class="text-start mb-3">
                        <a href="regis_pasien.php" class="text-decoration-none">Belum Punya Akun?</a>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
