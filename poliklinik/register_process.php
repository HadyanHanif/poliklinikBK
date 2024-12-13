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

// Mendapatkan data dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$no_ktp = $_POST['ktp'];
$no_hp = $_POST['hp'];

// Validasi data (opsional)
if (empty($nama) || empty($alamat) || empty($no_ktp) || empty($no_hp)) {
    echo "Semua field wajib diisi!";
    exit;
}

// Generate nomor rekam medis (no_rm)
$tahun_bulan = date("Ym"); // Format tahun dan bulan (YYYYMM)

// Ambil jumlah pasien yang terdaftar pada bulan ini
$query = "SELECT COUNT(*) as total FROM pasien WHERE no_rm LIKE '$tahun_bulan%'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
$urutan = $row['total'] + 1;

// Format no_rm: TahunBulanUrutan
$no_rm = $tahun_bulan . str_pad($urutan, 4, "0", STR_PAD_LEFT);

// Insert data ke tabel pasien
$sql = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp', '$no_rm')";

if ($conn->query($sql) === TRUE) {
    echo "Pendaftaran berhasil! Nomor Rekam Medis Anda: $no_rm";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
