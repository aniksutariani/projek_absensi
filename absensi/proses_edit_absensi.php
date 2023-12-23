<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai yang dikirimkan dari form
    $idPresensi = $_POST['id_presensi'];
    $tgl = $_POST['tgl'];
    $jamMasuk = $_POST['jam_masuk'];
    $jamPulang = $_POST['jam_pulang'];

    // Lakukan koneksi ke database
    $localhost = "localhost";
    $username = "root";
    $password = "";
    $database = "absensi";

    $conn = new mysqli($localhost, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk melakukan update data absensi berdasarkan ID presensi
    $query = "UPDATE presensi SET tgl='$tgl', jam_masuk='$jamMasuk', jam_pulang='$jamPulang' WHERE id_presensi='$idPresensi'";

    if ($conn->query($query) === TRUE) {
        // Jika update berhasil, redirect ke halaman index.php atau halaman lain
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
