<?php
    session_start();
    include("inventaris_sekolah/config/koneksi.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$username' AND password='$password'");
    $data = mysqli_fetch_assoc($query);

    if ($data) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        if ($data['role'] == 'admin') {
            header("Location: inventaris_sekolah/public/dashboard_admin.html");
        } else {
            header("Location: inventaris_sekolah/public/dashboard_petugas.html");
        }
    } else {
        echo "<script>alert('Username atau Password salah!'); window.location='inventaris_sekolah/public/index.html</script>";
    }
?>