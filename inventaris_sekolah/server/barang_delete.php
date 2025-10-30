<?php
session_start();
include("../config/koneksi.php");

if (!isset($_SESSION['username'])) {
    die(json_encode(["status" => "error", "message" => "Unauthorized"]));
}

if ($_SESSION['level'] !== 'admin') {
    die(json_encode(["status" => "error", "message" => "Hanya admin yang dapat menghapus data."]));
}

$id_barang = intval($_POST['id_barang']);

$query = "DELETE FROM inventaris WHERE id_barang='$id_barang'";

if (mysqli_query($koneksi, $query)) {
    echo json_encode(["status" => "success", "message" => "Data barang berhasil dihapus."]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal menghapus data: " . mysqli_error($koneksi)]);
}
?>