<?php
    session_start();
    session_destroy();
    header("loation: inventaris_sekolah/public/index.html");
    exit;
?>