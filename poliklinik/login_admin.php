<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh; margin: 0;">
    <div class="card shadow-sm p-4" style="width: 350px;">
        <h2 class="text-center mb-4 fw-bold">Selamat Datang Admin</h2>
        <form action="login_process.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nama</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan nama" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <!-- Link Bootstrap JS (Optional for interactivity, not mandatory) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
