<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Jika login berhasil, set session dan redirect ke halaman dashboard atau halaman selanjutnya
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: ../index.php"); // Ganti dengan halaman tujuan setelah login
        exit;
    } else {
        $error = "Username atau password salah!";
       
        header('Location: login.php?error=1');
    exit();
    }
}
?>

