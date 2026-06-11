<?php
session_start();

// Mengaktifkan pelaporan error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Panggil koneksi database
include 'connect.php';

if (isset($_POST['submit_register'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $plain_password = $_POST['password_user']; // mengambil password mentah

    // enkripsi password mentah menjadi hash BCRYPT yang aman
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO users (name, email, password_user)
    VALUES ('$username', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Akun Anda telah berhasil dibuat. Silakan login.');
        window.location.href = 'login.php';
        </script>";


    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>