<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$cek = $conn->query("SELECT * FROM users WHERE email='$email'");
if ($cek->num_rows > 0) {
    echo "Email sudah terdaftar";
    exit;
}

$conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'user')");
echo "Register berhasil";
?>