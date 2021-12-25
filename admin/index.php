<?php
include "../config/konek.php";
ob_start();
session_start();
if (empty($_SESSION['username_admin']) and empty($_SESSION['password_admin'])) {
	echo "<script>document.location.href='admin/view/login.php'</script>";
} else {
	$admin = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from akun WHERE username='$_SESSION[username_admin]' AND password='$_SESSION[password_admin]'"));
}
?>
<?php $base_url = "http://localhost/Project-dua/"; ?>
<!DOCTYPE html>
<html>

<head>

	<title>s-admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/bower_components/morris.js/morris.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/bower_components/jvectormap/jquery-jvectormap.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- <link rel="stylesheet" href="<?php echo $base_url; ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600|Lato:400,900" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>admin/dist/css/style.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header>
			<?php include 'view/header.php'; ?>
		</header>
		<main>
			<div>
				<?php include 'view/side-bar.php'; ?>
			</div>
			<div>
				<?php include 'view/body.php' ?>
			</div>
		</main>
	</div>
	<!-- /.control-sidebar -->
	<!-- Add the sidebar's background. This div must be placed
		       immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$('#table tr:odd').css('background', '#dbddf9');
		$('th').css('border', '1px solid #e0e6ea');
		$('td').css('border', '1px solid #e0e6ea');
	</script>
	<!-- jQuery 3 -->
	<script src="<?php echo $base_url; ?>admin/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo $base_url; ?>admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo $base_url; ?>admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="<?php echo $base_url; ?>admin/bower_components/raphael/raphael.min.js"></script>
	<script src="<?php echo $base_url; ?>admin/bower_components/morris.js/morris.min.js"></script>
	<!-- Sparkline -->
	<script src="<?php echo $base_url; ?>admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
	<!-- jvectormap -->
	<!-- <script src="<?php echo $base_url; ?>admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
	<!-- <script src="<?php echo $base_url; ?>admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
	<!-- jQuery Knob Chart -->
	<script src="<?php echo $base_url; ?>admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<!-- <script src="<?php echo $base_url; ?>admin/bower_components/moment/min/moment.min.js"></script> -->
	<script src="<?php echo $base_url; ?>admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<!-- datepicker -->
	<script src="<?php echo $base_url; ?>admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<!-- <script src="<?php echo $base_url; ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
	<!-- Slimscroll -->
	<script src="<?php echo $base_url; ?>admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo $base_url; ?>admin/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo $base_url; ?>admin/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo $base_url; ?>admin/dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo $base_url; ?>admin/dist/js/demo.js"></script>

</body>

</html>
<?php
mysqli_close($koneksi);
ob_end_flush();
?>