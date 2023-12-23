<?php
$localhost = "localhost"; // Ganti dengan nama host database Anda
$username = "root"; // Ganti dengan nama pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda
$database = "absensi"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$conn = new mysqli($localhost, "root", "", "absensi");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
