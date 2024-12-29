<?php
$host = "localhost";  // Ganti dengan host Anda
$user = "root";       // Ganti dengan username Anda
$pass = "";           // Ganti dengan password Anda
$dbname = "akuntansi"; 

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
