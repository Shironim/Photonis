<?php
include"../config/koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysql_query($koneksi,"SELECT*from akun WHERE username='$username' AND password='$password' AND status='A'");
$ketemu = mysql_num_rows($login);
$data= mysql_fetch_array($login);

if($ketemu>0){
session_start();
@$_SESSION['username_admin']=$data['username'];
@$_SESSION['password_admin']=$data['password'];

echo "<script>alert('Selamat Datang $data[username]');document.location.href='../../s-admin'</script>";
	}else{
	echo"<script>alert('Kata Sandi Tidak Sama! / akun anda diblokir');document.location.href='admin/view/login'</script>";
	}
?>
?>