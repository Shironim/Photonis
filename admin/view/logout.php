<?php

    session_start();
    $_SESSION['akun_id'];
    $_SESSION['akun_username'];

    unset($_SESSION['akun_id']);
    unset($_SESSION['akun_username']);

    session_unset();
    session_destroy();

    header("location:login.php?berhasil-logout")
?>
