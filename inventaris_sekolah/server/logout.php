<?php
    session_start();
    session_destroy();
    header("Location: /Website-Inventaris/inventaris_sekolah/public/index.html");
    exit;
?>