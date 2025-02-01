<?php
$host = "localhost";
$user = "root";  // Sesuaikan dengan user MySQL Anda
$pass = "";       // Sesuaikan dengan password MySQL Anda
$dbname = "mahasiswa_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
