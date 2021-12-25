<?php
    ob_start();
    session_start();
    if(isset($_SESSION['username_admin'])) header("location:admin/index.php");
    include "../../config/konek.php";

	/* PROSES LOGIN*/

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$login = mysqli_query($koneksi, "select * from akun WHERE username='$username' AND password='$password' AND status='A'");

		if (mysqli_num_rows($login)>0) {
			$row_akun = mysqli_fetch_array($login);
			$_SESSION['id_admin'] = $row_akun['id'];
			@$_SESSION['username_admin'] = $row_akun['username'];
            @$_SESSION['password_admin'] = $row_akun['password'];
			header("location:../../s-admin");
		}else {
			header("location:login.php?gagal-login");
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>login</title>
		<link href="http://localhost/project-dua/assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
	</head>
	<body id="login" class="bod">
		<form action="" method="post" name="form1">
			<table class="tebel">
				<tr id="header">
					<td colspan="2"><h2 class="ha2">Login Disini</h2></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input class="inp" type="text" name="username" id="username" placeholder="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input class="inp" type="password" name="password" id="password" placeholder="password"></td>
				</tr>
				<?php
				if (isset($_GET['berhasil-logout'])) { ?>
					<tr>
						<td>
							<div>
								<p>Anda Berhasil Logout</p>
							</div>
						</td>
					</tr>
				<?php } ?>
				<?php
				if (isset($_GET['gagal-login'])) { ?>
					<tr>
						<td>
							<div>
								<p>Maaf username / password anda salah</p>
							</div>
						</td>
					</tr>
				<?php } ?>
				<tr>
					<td>&nbsp;</td>
					<td><input class="res" type="submit" name="login" value="Login">
						<input class="res" type="reset" name="reset" value="Reset"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
<?php
	mysqli_close($koneksi);
	ob_end_flush();
?>
