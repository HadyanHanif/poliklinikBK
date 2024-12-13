<?php
session_start();
if (!isset($_SESSION['nama'])) {
    // Jika tidak ada sesi, arahkan kembali ke login
    header("Location: login_pasien.php");
    exit;
}

// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$database = "poliklinik";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data pasien berdasarkan nama dari sesi
$nama = $_SESSION['nama'];
$sql = "SELECT no_rm FROM pasien WHERE nama = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nama);
$stmt->execute();
$result = $stmt->get_result();

// Periksa apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $no_rm = $row['no_rm'];
} else {
    $no_rm = "Tidak ditemukan";
}

// Tutup koneksi
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Pasien</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Tombol Logout -->
    <a href="logout.php" class="btn btn-danger logout-btn">Logout</a>

    <div class="container mt-5 text-center">
        <h1>Selamat Datang, <?php echo htmlspecialchars($_SESSION['nama']); ?></h1>
        <p class="mt-3"><strong>No Rekam Medis Anda:</strong> <?php echo htmlspecialchars($no_rm); ?></p>
    </div>
</body>
</html>
