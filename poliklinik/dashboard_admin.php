<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik Sidebar</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40; /* Warna gelap untuk sidebar */
            color: #fff;
            position: fixed;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057; /* Warna saat hover */
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center py-3">Poliklinik</h4>
        <a href="kelola_dokter.php">Kelola Dokter</a>
        <a href="kelola_pasien.php">Kelola Pasien</a>
        <a href="kelola_obat.php">Kelola Obat</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Selamat Datang di Dashboard</h1>
        <p>Silakan pilih menu di samping untuk mengelola data.</p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
