<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: /test/Student-Dropout-Analysis-main/login.php");
        exit();
    }
?>