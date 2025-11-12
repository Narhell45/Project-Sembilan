<?php
session_start();
include("../config/koneksi.php");

if (!isset($_SESSION['username'])) {
    die(json_encode(["status" => "error", "message" => "Unauthorized"]));
}

$nama_barang   = mysqli_real_escape_string($koneksi, $_POST['nama_barang']);
$kode_barang   = mysqli_real_escape_string($koneksi, $_POST['kode_barang']);
$jumlah        = intval($_POST['jumlah']);
$kondisi       = mysqli_real_escape_string($koneksi, $_POST['kondisi']);
$lokasi        = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
$id_user       = $_SESSION['id_user'];

if (empty($nama_barang) || empty($kode_barang) || empty($jumlah) || empty($kondisi) || empty($lokasi)) {
    die(json_encode(["status" => "error", "message" => "Semua field harus diisi."]));
}

$tanggal_input = date("Y-m-d");

$query = "INSERT INTO inventaris (nama_barang, kode_barang, jumlah, kondisi, lokasi, tanggal_input, id_user)
          VALUES ('$nama_barang', '$kode_barang', '$jumlah', '$kondisi', '$lokasi', '$tanggal_input', '$id_user')";

if (mysqli_query($koneksi, $query)) {
    echo json_encode(["status" => "success", "message" => "Barang berhasil ditambahkan."]);
} else {
    echo json_encode(["status" => "error", "message" => "Gagal menambah barang: " . mysqli_error($koneksi)]);
}


?>
