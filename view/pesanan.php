<div class="container">
	<?php 
        include "config/konek.php";
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db   = "crud";
        $koneksi = mysqli_connect($host, $user, $pass, $db);
		@session_start();
		$id_member = $_POST['id'];
		$alamat1 = $_POST['alamat'];
		$alamat2 = $_POST['alamat2'];
		$gtotal = $_POST['gtotal'];

		if (isset($alamat2)) {
			$alamat = $_POST['alamat'];
		}else{
			$alamat = $_POST['alamat2'];
		}

		//memasukan data ke tabel penjualan
		mysqli_query($koneksi,"INSERT into penjualan (id_member,alamat,status,tanggal,total,jam)values('$id_member','$alamat','MP',NOW(),'$gtotal',NOW())");

		$id = mysqli_insert_id($koneksi);

		$sid = session_id();
		foreach ($_SESSION['items'] as $key => $val) {
			$dgambar = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * from gallery WHERE id_gambar='$key'"));
			$harga = $dgambar['harga_pokok'];
            $diskon = $dgambar['diskon']*$harga/100;
            $harga_total = $harga - $diskon;
			$subtotal = $harga_total*$val;
            
            mysqli_query($koneksi,"INSERT INTO detail_penjualan(id_penjualan, id_gambar, jumlah, harga, total_harga) VALUES ('$id','$key','$val','$harga','$subtotal')");
		}

		//hapus data keranjang
		unset($_SESSION['items']);
		
		echo"<script>document.location.href='profil-pembelian-$id'</script>";
	?>
</div>