<?php
    session_start();

    if(isset($_SESSION['username'])) {
        header("Location: ../public/index.html");
        exit();
    }
?>