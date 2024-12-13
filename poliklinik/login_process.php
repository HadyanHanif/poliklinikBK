<?php
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

// Cek tipe login atau penyimpanan data
if (isset($_POST['username']) && isset($_POST['password'])) {
    // Login Admin
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi login admin
    if ($username === 'adminpoli' && $password === 'admin123') {
        // Login admin berhasil
        header("Location: dashboard_admin.php");
        exit;
    } else {
        // Login admin gagal
        echo '<script>alert("Nama atau password admin salah!"); window.location.href="index.php";</script>';
    }
} elseif (isset($_POST['nama']) && isset($_POST['ktp'])) {
    // Login Pasien
    $nama = $_POST['nama'];
    $no_ktp = $_POST['ktp'];

    // Validasi input pasien
    if (empty($nama) || empty($no_ktp)) {
        echo '<script>alert("Nama dan No KTP harus diisi!"); window.location.href="index.php";</script>';
        exit;
    }

    // Query untuk memeriksa data pasien
    $sql = "SELECT * FROM pasien WHERE nama = ? AND no_ktp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nama, $no_ktp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Login pasien berhasil
        session_start();
        $_SESSION['nama'] = $nama;
        header("Location: home_pasien.php");
        exit;
    } else {
        // Login pasien gagal
        echo '<script>alert("Nama atau No KTP salah!"); window.location.href="index.php";</script>';
    }

    // Tutup koneksi untuk pasien
    $stmt->close();
} elseif (isset($_POST['nama']) && isset($_POST['alamat']) && isset($_POST['no_hp'])) {
    // Menyimpan Data Dokter
    $nama = $conn->real_escape_string($_POST['nama']);
    $alamat = $conn->real_escape_string($_POST['alamat']);
    $no_hp = $conn->real_escape_string($_POST['no_hp']);

    // Validasi input dokter
    if (empty($nama) || empty($alamat) || empty($no_hp)) {
        echo '<script>alert("Semua field harus diisi!"); window.location.href="index.php";</script>';
        exit;
    }

    // Query untuk menyimpan data ke tabel dokter
    $sql = "INSERT INTO dokter (nama, alamat, no_hp) VALUES ('$nama', '$alamat', '$no_hp')";
    if ($conn->query($sql) === TRUE) {
        // Penyimpanan berhasil, redirect ke dashboard dokter
        header("Location: dashboard_dokter.php");
        exit();
    } else {
        echo '<script>alert("Terjadi kesalahan saat menyimpan data!"); window.location.href="index.php";</script>';
    }
}

// Tutup koneksi database
$conn->close();
?>
