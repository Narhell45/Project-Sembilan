<?php
    include("../config/koneksi.php"); 
    
    header('Content-Type: application/json');

    if (!$koneksi) {
        echo json_encode([]);
        exit;
    }

    $query = "SELECT id_barang, nama_barang, kode_barang, jumlah, kondisi, lokasi, tanggal_input, id_user FROM inventaris ORDER BY id_barang DESC"; 
    $result = mysqli_query($koneksi, $query);

    $data_barang = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_barang[] = [
                'id' => $row['id_barang'], 
                'nama' => $row['nama_barang'], 
                'jumlah' => $row['jumlah'],
                'kondisi' => $row['kondisi']
            ];
        }
    }
    echo json_encode($data_barang);
?>