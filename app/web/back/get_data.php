<?php
include 'db.php';

$email = $_GET['email'];
$role = $_GET['role'];
$waktu = $_GET['waktu'];
$umur_filter = $_GET['umur'];

$where = "";

switch ($waktu) {
    case "hari":
        $where .= " AND DATE(tanggal_input) = CURDATE()";
        break;
    case "minggu":
        $where .= " AND WEEK(tanggal_input) = WEEK(CURDATE())";
        break;
    case "bulan":
        $where .= " AND MONTH(tanggal_input) = MONTH(CURDATE())";
        break;
    case "tahun":
        $where .= " AND YEAR(tanggal_input) = YEAR(CURDATE())";
        break;
}

if ($umur_filter !== "all") {
    list($min, $max) = explode("-", $umur_filter);
    $where .= " AND umur BETWEEN $min AND $max";
}

if ($role !== "admin") {
    $where .= " AND email='$email'";
}

$result = $conn->query("SELECT * FROM data WHERE 1=1 $where ORDER BY tanggal_input DESC");

$data = [];
while ($row = $result->fetch_assoc()) {
    $row['input_by'] = $row['email'];
    $data[] = $row;
}

echo json_encode($data);
?>