<?php
include 'db.php';

$email = $_POST['email'];
$nama = $_POST['nama'];
$umur = $_POST['umur'];
$tinggi = $_POST['tinggi'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];
$ext = pathinfo($foto, PATHINFO_EXTENSION);
$nama_foto = uniqid() . '.' . $ext;

move_uploaded_file($tmp, "uploads/" . $nama_foto);

$conn->query("INSERT INTO data (email, nama, umur, tinggi, foto, tanggal_input) 
              VALUES ('$email', '$nama', '$umur', '$tinggi', '$nama_foto', NOW())");

echo "Data berhasil disimpan";
?>