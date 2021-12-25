<?php ?>
<?php
	if (empty($_GET['act'])) {
		tampil();
	}
	elseif ($_GET['act'] == 'tambah'){
		tambah();
	}
	elseif ($_GET['act'] == 'edit') {
		edit();
	}
	elseif ($_GET['act'] == 'hapus') {
		hapus();
	}
?>

<?php function tampil(){
	$base_url = "http://localhost/Project-dua/s-admin";
	?>
	<h1 class="title">Contact</h1>
	<a href="?page=contact&act=tambah">
        <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
        <br>
        <span class="fan">input</span>
    </a>
	<div class="badan">
	<div class="container">
	<h4 class="sub-title">Edit Data Contact</h4>
    <br>
		<table class="table" id="table">
		<tr class="tampil">
			<th>No</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Email</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
	       include "../config/konek.php";
	         $query = mysqli_query($koneksi, "SELECT * FROM contact") or die (mysqli_error());
	       if(mysqli_num_rows($query) == 0){
	         echo "<b>Tidak ada data yang tersedia</b>";
	         }else{
	         $no=1;
	         while($r = mysqli_fetch_array($query)):     ?>
		<tr>
			<td><?php echo $no++; ?></td>
	        <td><?php echo $r['alamat'];?></td>
	        <td><?php echo $r['no_telp'];?></td>
	        <td><?php echo $r['email'];?></td>
	        <td><a href="<?php echo $base_url; ?>?page=contact&act=edit&id=<?php echo $r['id'] ?>"><i class="fa fa-pencil" title="edit"></i></a></td>
            <td><a href="<?php echo $base_url; ?>?page=contact&act=hapus&id=<?php echo $r['id'] ?>"><i class="fa fa-trash" title="hapus"></i></a></td>
		</tr>
		<?php
	      endwhile;
	      }
	     ?>
		</table>
	</div>
	</div>
	<?php } ?>
<?php function tambah(){
		include "../config/konek.php";
		if(isset($_POST['tambah'])){
		$alamat    = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$email  = $_POST['email'];

		$querytambah = mysqli_query($koneksi, "INSERT INTO contact (alamat,no_telp,email)
		VALUES('$alamat', '$no_telp', '$email')") or die(mysqli_error());
		if($querytambah) {
		echo"<script>document.location.href='?page=contact'</script>";
		} else{
		echo "Upss Something wrong..";}
	}?>
<div>
	<form method="POST" action="">
		<table>
			<tr>
				<th>Alamat</th>
				<td><input type="text" name="alamat"  placeholder="Masukkan alamat" /></td>
			</tr>
			<tr>
				<th>Telepon</th>
				<td><input type="text" name="no_telp"  placeholder="Masukkan no_telp" /></td>
			</tr>
			<tr>
				<th>Email</th>
				<td><input type="text" name="email"  placeholder="Masukkan email" /></td>
			</tr>
		</table>
		<br>
		<input type="submit" name="tambah" value="Tambah">
        <button type="reset" value="Reset">Reset</button>
	</form>
</div>
<?php } ?>
<?php function edit(){
	include "../config/konek.php";
	$id = $_GET['id'];

   $query = mysqli_query($koneksi, "SELECT * FROM contact WHERE id = '$id'");

   $res = mysqli_fetch_array($query);?>
	<div>
		<form method="POST" action="">
			<table>
				<tr>
					<th>Alamat</th>
					<td><input type="text" name="alamat"  value="<?php echo $res['alamat'] ?> " /></td>
				</tr>
				<tr>
					<th>Telepon</th>
					<td><input type="text" name="no_telp"  value="<?php echo $res['no_telp'] ?> " /></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><input type="text" name="email"  value="<?php echo $res['email'] ?> " /></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="edit" value="Perbarui">
            <button type="reset" value="Reset">Reset</button>
		</form>
	</div>
	<?php
	  if(isset($_POST['edit'])){
		$alamat    = $_POST['alamat'];
		$no_telp = $_POST['no_telp'];
		$email  = $_POST['email'];


	   $queryupdate = mysqli_query($koneksi, "UPDATE contact SET
	                           alamat    = '$alamat',
	                           no_telp = '$no_telp',
	                           email  = '$email'
	             			WHERE id = $id");

	   if($queryupdate){
	    echo"<script>document.location.href='?page=contact'</script>";
	  }else{
	   echo "Upss Something wrong..";
	  }
	  }

	   ?>
	<?php } ?>
<?php function hapus() {
	include "../config/konek.php";
	  $id = $_GET['id'];

	  $queryhapus = mysqli_query($koneksi, "DELETE FROM contact WHERE id = $id");

	  if($queryhapus) {
	  echo"<script>document.location.href='?page=contact'</script>";
		} else{
		echo "Upss Something wrong..";}
}?>
