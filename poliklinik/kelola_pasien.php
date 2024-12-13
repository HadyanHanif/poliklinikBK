<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pasien</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Kelola Pasien</h2>

        <!-- Form untuk menambah pasien -->
        <h3 class="mb-3">Tambah Data Pasien</h3>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pasien</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">No KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <button type="submit" class="btn btn-success w-100" name="submit_pasien">Tambah Pasien</button>
        </form>

        <!-- Tabel Data Pasien -->
        <h3 class="mt-5">Daftar Pasien</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>No KTP</th>
                    <th>No HP</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $conn = new mysqli("localhost", "root", "", "poliklinik");

                // Periksa koneksi
                if ($conn->connect_error) {
                    die("Koneksi gagal: " . $conn->connect_error);
                }

                // Menambah data pasien jika tombol submit ditekan
                if (isset($_POST['submit_pasien'])) {
                    $nama = $_POST['nama'];
                    $alamat = $_POST['alamat'];
                    $no_ktp = $_POST['no_ktp'];
                    $no_hp = $_POST['no_hp'];

                    // Query untuk menambah data pasien ke tabel pasien
                    $sql_insert = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp) VALUES (?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql_insert);
                    $stmt->bind_param("ssss", $nama, $alamat, $no_ktp, $no_hp);
                    $stmt->execute();
                    $stmt->close();
                }

                // Query untuk mendapatkan data pasien
                $sql = "SELECT * FROM pasien";
                $result = $conn->query($sql);
                $no = 1;

                if ($result->num_rows > 0) {
                    // Tampilkan data pasien
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['no_ktp'] . "</td>";
                        echo "<td>" . $row['no_hp'] . "</td>";
                        echo "<td>
                                <form method='POST' style='display:inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Belum ada data pasien</td></tr>";
                }

                // Hapus data pasien jika tombol delete ditekan
                if (isset($_POST['delete_id'])) {
                    $delete_id = $_POST['delete_id'];
                    $delete_sql = "DELETE FROM pasien WHERE id = ?";
                    $stmt = $conn->prepare($delete_sql);
                    $stmt->bind_param("i", $delete_id);
                    $stmt->execute();
                    echo "<script>window.location.reload();</script>";
                }

                // Tutup koneksi
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
