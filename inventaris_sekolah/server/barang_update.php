<?php
    include("../config/koneksi.php"); 

    $id = $_GET['id'];
    $nama = $_GET['nama']; // Jika ada
    $jumlah = $_GET['jumlah']; // Jika ada
    $kondisi = $_GET['kondisi']; // Jika ada

    $set_clauses = [];
    if (!empty($nama)) $set_clauses[] = "nama_barang='$nama'";
    if (!empty($jumlah)) $set_clauses[] = "jumlah='$jumlah'";
    if (!empty($kondisi)) $set_clauses[] = "kondisi='$kondisi'";

    if (empty($set_clauses)) {
        http_response_code(400);
        exit;
    }
    
    $set_sql = implode(', ', $set_clauses);
    $query = "UPDATE inventaris SET $set_sql WHERE id_barang='$id'";
    
    if (mysqli_query($koneksi, $query)) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
?>