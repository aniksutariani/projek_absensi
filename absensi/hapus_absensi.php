<?php
// Lakukan koneksi ke database
$localhost = "localhost";
$username = "root";
$password = "";
$database = "absensi";

$conn = new mysqli($localhost, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID presensi yang dikirim dari permintaan POST
$idPresensi = $_POST['id_presensi'];

// Buat query untuk menghapus data berdasarkan ID presensi
$query = "DELETE FROM presensi WHERE id_presensi = '$idPresensi'";

if ($conn->query($query) === TRUE) {
    echo "Data berhasil dihapus"; // Berhasil menghapus data
} else {
    echo "Error: " . $query . "<br>" . $conn->error; // Gagal menghapus data, tampilkan pesan error
}

$conn->close();
?>
