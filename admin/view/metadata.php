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
	<h1 class="title">Metadata</h1>
	<div class="badan">
	<div class="container">
	<h4 class="sub-title">Data Metadata</h4>
    <hr>
		<a href="?page=metadata&act=tambah">
		    <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
            <br>
            <span class="fan">input</span>
		</a>
		<br>
		<table class="table" id="table">
		<tr class="tampil">
			<th>No</th>
			<th>Slogan</th>
			<th>Judul</th>
			<th>Deskribsi</th>
			<th>Keyword</th>
			<th>Footer</th>
			<th colspan="2">Aksi</th>
		</tr>
		<?php
	       include "../config/konek.php";
	         $query = mysqli_query($koneksi, "SELECT * FROM metadata") or die (mysqli_error());
	       if(mysqli_num_rows($query) == 0){
	         echo "<b>Tidak ada data yang tersedia</b>";
	         }else{
	         $no=1;
	         while($r = mysqli_fetch_array($query)):     ?>
		<tr>
			<td><?php echo $no++; ?></td>
	        <td><?php echo $r['slogan'];?></td>
	        <td><?php echo $r['judul'];?></td>
	        <td><?php echo $r['deskribsi'];?></td>
	        <td><?php echo $r['keyword'];?></td>
	        <td><?php echo $r['footer'];?></td>
	        <td><a href="<?php echo $base_url; ?>?page=metadata&act=edit&id=<?php echo $r['id'] ?>"><i class="fa fa-pencil" title="edit"></i></a></td>
            <td><a href="<?php echo $base_url; ?>?page=metadata&act=hapus&id=<?php echo $r['id'] ?>"><i class="fa fa-trash" title="hapus"></i></a></td>
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
		$slogan    = $_POST['slogan'];
		$judul = $_POST['judul'];
		$deskribsi  = $_POST['deskribsi'];
		$keyword  = $_POST['keyword'];
		$footer  = $_POST['footer'];

		$querytambah = mysqli_query($koneksi, "INSERT INTO metadata (slogan,judul,deskribsi,keyword,footer)
		VALUES('$slogan', '$judul', '$deskribsi', '$keyword', '$footer')") or die(mysqli_error());
		if($querytambah) {
		echo"<script>document.location.href='?page=metadata'</script>";
		} else{
		echo "Upss Something wrong..";}
	}?>
<div>
	<form method="POST" action="">
		<table class="table">
			<tr>
				<th>Slogan</th>
				<td class="left"><input type="text" name="slogan"  placeholder="Masukkan slogan" /></td>
			</tr>
			<tr>
				<th>Judul</th>
				<td class="left"><input type="text" name="judul"  placeholder="Masukkan judul" /></td>
			</tr>
			<tr>
				<th>Deskribsi</th>
				<td class="left"><input type="text" name="deskribsi"  placeholder="Masukkan deskribsi" /></td>
			</tr>
			<tr>
				<th>Keyword</th>
				<td class="left"><input type="text" name="keyword"  placeholder="Masukkan keyword" /></td>
			</tr>
			<tr>
				<th>Footer</th>
				<td class="left"><input type="text" name="footer"  placeholder="Masukkan footer" /></td>
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

   $query = mysqli_query($koneksi, "SELECT * FROM metadata WHERE id = '$id'");

   $res = mysqli_fetch_array($query);?>
	<div>
		<form method="POST" action="">
			<table>
				<tr>
					<th>Slogan</th>
					<td><input type="text" name="slogan"  value="<?php echo $res['slogan'] ?> " /></td>
				</tr>
				<tr>
					<th>Judul</th>
					<td><input type="text" name="judul"  value="<?php echo $res['judul'] ?> " /></td>
				</tr>
				<tr>
					<th>Deskribsi</th>
					<td><input type="text" name="deskribsi"  value="<?php echo $res['deskribsi'] ?> " /></td>
				</tr>
				<tr>
					<th>Keyword</th>
					<td><input type="text" name="keyword"  value="<?php echo $res['keyword'] ?> " /></td>
				</tr>
				<tr>
					<th>Footer</th>
					<td><input type="text" name="footer"  value="<?php echo $res['footer'] ?> " /></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="edit" value="Perbarui">
            <button type="reset" value="Reset">Reset</button>
		</form>
	</div>
	<?php
	  if(isset($_POST['edit'])){
		$slogan    = $_POST['slogan'];
		$judul = $_POST['judul'];
		$deskribsi  = $_POST['deskribsi'];
		$keyword  = $_POST['keyword'];
		$footer  = $_POST['footer'];


	   $queryupdate = mysqli_query($koneksi, "UPDATE metadata SET
	                           slogan    = '$slogan',
	                           judul = '$judul',
	                           deskribsi  = '$deskribsi',
	                           keyword  = '$keyword',
	                           footer  = '$footer'
	             			WHERE id = $id");

	   if($queryupdate){
	    echo"<script>document.location.href='?page=metadata'</script>";
	  }else{
	   echo "Upss Something wrong..";
	  }
	  }

	   ?>
	<?php } ?>
<?php function hapus() {
	include "../config/konek.php";
	  $id = $_GET['id'];

	  $queryhapus = mysqli_query($koneksi, "DELETE FROM metadata WHERE id = $id");

	  if($queryhapus) {
	  echo"<script>document.location.href='?page=metadata'</script>";
		} else{
		echo "Upss Something wrong..";}
}?>
