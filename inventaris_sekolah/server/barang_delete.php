<?php
    include("../config/koneksi.php"); 

    $id = $_GET['id'];
    
    if (empty($id)) {
        http_response_code(400);
        exit;
    }

    $query = "DELETE FROM inventaris WHERE id_barang='$id'"; 
    
    if (mysqli_query($koneksi, $query)) {
        http_response_code(200);
    } else {
        http_response_code(500);
    }
?>