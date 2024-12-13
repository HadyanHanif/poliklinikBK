<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Dokter</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Kelola Dokter</h2>

        <!-- Tabel Data Dokter -->
        <h3 class="mt-5">Daftar Dokter</h3>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Dokter</th>
                    <th>Alamat</th>
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

                // Query untuk mendapatkan data dokter
                $sql = "SELECT * FROM dokter";
                $result = $conn->query($sql);
                $no = 1;

                if ($result->num_rows > 0) {
                    // Tampilkan data dokter
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
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
                    echo "<tr><td colspan='5' class='text-center'>Belum ada data dokter</td></tr>";
                }

                // Hapus data dokter jika tombol delete ditekan
                if (isset($_POST['delete_id'])) {
                    $delete_id = $_POST['delete_id'];
                    $delete_sql = "DELETE FROM dokter WHERE id = ?";
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
