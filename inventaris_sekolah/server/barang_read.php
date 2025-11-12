<?php
session_start();
include("../config/koneksi.php");
header("Content-Type: application/json");

if (!isset($_SESSION['username'])) {
    echo json_encode(["status" => "error", "message" => "Unauthorized"]);
    exit;
}

$query = "SELECT i.id_barang, i.nama_barang, i.kode_barang, i.jumlah, i.kondisi, i.lokasi, i.tanggal_input, u.nama_lengkap 
          FROM inventaris i 
          LEFT JOIN user u ON i.id_user = u.id_user
          ORDER BY i.id_barang DESC";

$result = mysqli_query($koneksi, $query);
$data = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(["status" => "error", "message" => "Query gagal dijalankan: " . mysqli_error($koneksi)]);
}
?>
