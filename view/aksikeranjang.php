<?php

@ob_start();
@session_start();
$sid = session_id();
include 'config/konek.php';

if(@$_GET['act']=='tambahqty'){
    $id = $_POST['id'];
	$qty = $_POST['qty'];

	//Mengecek produk sudah siap
	//jika produk sudah di keranjang maka bertambah 1 , jika belum maka masuk ke record
     if (isset($_SESSION['items'][$id])) {
        $_SESSION['items'][$id] += $qty;
     } else {
        $_SESSION['items'][$id] = $qty; 
     }
	echo"<script>document.location.href='keranjang'</script>"; 

}
@ob_flush();
?>