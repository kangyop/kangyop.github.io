<?php
$host = "sql304.infinityfree.com";
$user = "if0_38905317";
$pass = "uHecVTJVUdrbw";
$db   = "if0_38905317_ganteng";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>