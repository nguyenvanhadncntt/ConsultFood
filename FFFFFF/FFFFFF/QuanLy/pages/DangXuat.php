<?php
session_start();
    session_destroy();
    unset($_SESSION["taiKhoan"]);
    header("Location:DangNhap.php");
?>