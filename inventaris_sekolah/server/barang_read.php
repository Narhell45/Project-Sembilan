<?php
session_start();
include("../config/koneksi.php");

// Pastikan user sudah login
if (!isset($_SESSION['username'])) {
    die(json_encode(["status" => "error", "message" => "Unauthorized"]));
}

// Ambil semua data inventaris
$query = "SELECT i.id_barang, i.nama_barang, i.kode_barang, i.jumlah, i.kondisi, i.lokasi, i.tanggal_input, u.nama_lengkap 
          FROM inventaris i 
          LEFT JOIN user u ON i.id_user = u.id_user
          ORDER BY i.id_barang DESC";

$result = mysqli_query($koneksi, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header("Content-Type: application/json");
echo json_encode($data);
?>
