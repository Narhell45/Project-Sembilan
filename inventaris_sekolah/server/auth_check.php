<?php
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: inventaris_sekolah/public/index.html");
        exit;
    }
?>