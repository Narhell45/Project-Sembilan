<?php
session_start();
include("../config/koneksi.php");

if (!isset($_SESSION['username'])) {
    die(json_encode(["status" => "error", "message" => "Unauthorized"]));
}

if ($_SESSION['level'] !== 'admin') {
    die(json_encode(["status" => "error", "message" => "Hanya admin yang dapat mengedit data."]));
}

$id_barang = intval($_POST['id_barang']);
$nama_barang = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
$kode_barang = mysqli_real_escape_string($koneksi, $_POST['kode_barang']);
$jumlah = intval($_POST['jumlah']);
$kondisi = mysqli_real_escape_string($koneksi, $_POST['kondisi']);
$lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);

$query = "UPDATE inventaris SET 
            nama_barang='$nama_barang',
            kode_barang='$kode_barang',
            jumlah='$jumlah',
            kondisi='$kondisi',
            lokasi='$lokasi'
          WHERE id_barang='$id_barang'";

if (mysqli_query($koneksi, $query)) {
    echo json_encode(["status" => "success", "message" => "Data barang berhasil diperbarui."]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal memperbarui data: " . mysqli_error($koneksi)]);
}
?>
