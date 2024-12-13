<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Obat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Kelola Obat</h2>

        <!-- Form Input Data -->
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" class="form-control" placeholder="Masukkan Nama Obat" required>
            </div>
            <div class="mb-3">
                <label for="kemasan" class="form-label">Kemasan</label>
                <input type="text" name="kemasan" id="kemasan" class="form-control" placeholder="Masukkan Kemasan" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga" required>
            </div>
            <button type="submit" name="submit" class="btn btn-success w-100">Simpan</button>
        </form>

        <!-- Tabel Data -->
        <h3 class="mt-5">Daftar Obat</h3>
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Kemasan</th>
                    <th>Harga</th>
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

                // Jika tombol submit ditekan
                if (isset($_POST['submit'])) {
                    $nama_obat = $_POST['nama_obat'];
                    $kemasan = $_POST['kemasan'];
                    $harga = $_POST['harga'];

                    // Insert data ke tabel obat
                    $sql = "INSERT INTO obat (nama_obat, kemasan, harga) VALUES (?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssi", $nama_obat, $kemasan, $harga);
                    $stmt->execute();
                }

                // Menampilkan data dari tabel obat
                $sql = "SELECT * FROM obat";
                $result = $conn->query($sql);
                $no = 1;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama_obat'] . "</td>";
                        echo "<td>" . $row['kemasan'] . "</td>";
                        echo "<td>" . $row['harga'] . "</td>";
                        echo "<td>
                                <form method='POST' style='display:inline;'>
                                    <input type='hidden' name='delete_id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Belum ada data obat</td></tr>";
                }

                // Hapus data jika tombol delete ditekan
                if (isset($_POST['delete_id'])) {
                    $delete_id = $_POST['delete_id'];
                    $sql = "DELETE FROM obat WHERE id = ?";
                    $stmt = $conn->prepare($sql);
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
