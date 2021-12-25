<?php

    include '../config/konek.php';
    if (empty($_SESSION['email_member']) AND empty($_SESSION['password_member'])) {

        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $login = mysqli_query($koneksi,"SELECT * FROM member WHERE email='$email' AND password = '$password'");
        $ketemu = mysqli_num_rows($login);
        $data = mysqli_fetch_array($login);

        if ($ketemu > 0) {
            session_start();
            @$_SESSION['email_member']=$data['email'];
            @$_SESSION['password_member']=$data['password'];

            echo "<script>alert('Selamat Datang $data[nama]');document.location.href='home'</script>";
        }else {
            echo "<script>alert('Email atau kata sandi salah');window.history.back();</script>";
        }
    }else {
        echo "<script>alert('Anda Sudah Masuk');window.history.back();</script>";
    }


?>
