<?php

include "../config/konek.php";

if (isset($_POST['daftar'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$nama_depan = $_POST['nama_depan'];
	$nama_belakang = $_POST['nama_belakang'];
	if ($username == "" || $password == "" || $email == "" || $nama_depan == "" || $nama_belakang == "") {
		?><script>alert("Maaf Data Masih Ada Yang Kosong")</script><?php
	}else{
		$query = mysqli_query($koneksi, "INSERT INTO akun (username, password, email, nama_depan, nama_belakang) VALUES('$username','$password','$email','$nama_depan','$nama_belakang')") or die(mysqli_error());
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Selamat Datang Di S-Admin</title>
</head>
<body>
	<div>
		<form action="" method="post">
			<table>
				<tr>
					<th>Username</th>
				</tr>
				<tr>
					<td><input type="text" name="username" size="40" placeholder="Masukan Username Anda"></td>
				</tr>
				<tr>
					<th>Password</th>
				</tr>
				<tr>
					<td><input type="password" name="password" size="40" placeholder="Masukan Password Anda"></td>
				</tr>
				<tr>
					<th>Email</th>
				</tr>
				<tr>
					<td><input type="email" name="email" size="40" placeholder="Masukan Email Anda"></td>
				</tr>
				<tr>
					<th>Nama Depan</th>
				</tr>
				<tr>
					<td><input type="text" name="nama_depan" size="40" placeholder="Masukan Nama Depan Anda"></td>
				</tr>
				<tr>
					<th>Nama Belakang</th>
				</tr>
				<tr>
					<td><input type="text" name="nama_belakang" size="40" placeholder="Masukan Nama Belakang Anda"></td>
				</tr>
			</table>
			<hr>
			<input type="submit" name="daftar" value="Kirim">
			<input type="reset" name="reset" value="Batal">
			<tr>
				<td><a href="s-admin">Login</a></td>
			</tr>
		</form>
	</div>
</body>
</html>
