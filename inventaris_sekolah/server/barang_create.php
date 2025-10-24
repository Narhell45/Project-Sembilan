<?php
    include("../config/koneksi.php"); 

    $nama = $_GET['nama'];
    $jumlah = $_GET['jumlah'];
    $kondisi = $_GET['kondisi'];

    if (empty($nama) || empty($jumlah) || empty($kondisi)) {
        http_response_code(400);
        exit;
    }

    $query = "INSERT INTO inventaris (nama_barang, jumlah, kondisi) VALUES ('$nama', '$jumlah', '$kondisi')"; 
    
    if (mysqli_query($koneksi, $query)) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
?>