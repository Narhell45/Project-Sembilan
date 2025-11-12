<?php
    session_start();
    include("../config/koneksi.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];

        if ($data['level'] == 'admin') {
            header("Location: ../public/dashboard_admin.html");
        } else {
            header("Location: ../public/dashboard_petugas.html");
        }
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='../public/index.html';</script>";
    }
?>