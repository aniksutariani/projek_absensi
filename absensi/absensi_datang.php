<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_karyawan = $_POST['id_karyawan'];

    // Query untuk mendapatkan data karyawan
    $query = "SELECT nama, jabatan FROM pegawai WHERE id_pegawai = $id_pegawai";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Jika data karyawan ditemukan
        $row = $result->fetch_assoc();
        $nama = $row['nama'];
        $jabatan = $row['jabatan'];

        // Tampilkan nama dan jabatan karyawan
        echo "Nama: " . $nama . "<br>";
        echo "Jabatan: " . $jabatan . "<br>";

        // Simpan data absensi ke dalam tabel absensi
        $query_absen = "INSERT INTO absensi (id_karyawan, waktu_absen) VALUES ($id_karyawan, NOW())";
        if ($conn->query($query_absen) === TRUE) {
            echo "Absensi berhasil disimpan.";
        } else {
            echo "Error: " . $query_absen . "<br>" . $conn->error;
        }
    } else {
        echo "Karyawan tidak ditemukan.";
    }
}

$conn->close();
?>
