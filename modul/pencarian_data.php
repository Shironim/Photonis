<?php ?>
<?php
	if (empty($_GET['act'])) {
		tampil();
	}
	elseif ($_GET['act'] == 'tambah') {
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
	$base_url = "http://localhost/Project-dua/s-admin/";
	 ?>
	<div>
        <?php ?>
		<form action="?cari-data" method="post">
            <input type="text" name="keyword" placeholder="Cari Data">
            <input type="submit" name="cari" value="cari">
        </form>
		<a href="artikel/tambah"><i class="fa fa-plus" aria-hidden="true"></i></a>
		<br>
		<table border="1" cellspacing="10" cellpadding="10">
			<tr>
				<th>No</th>
				<th>Judul</th>
				<th>Isi</th>
				<th>Gambar</th>
				<th>Di buat</th>
				<th>Di edit</th>
				<th>Aksi</th>
			</tr>
				<?php
				include "../config/konek.php";
                if (isset($_POST['cari'])) {
                    $_SESSION['session-pencarian'] = $_POST['keyword'];
                    $keyword = $_SESSION['session-pencarian'];
                }else {
                    $keyword = $_SESSION['session-pencarian'];
                }
                $query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE judul LIKE '%$keyword%' AND isi LIKE '%$keyword%' ORDER BY judul ASC");
                if(mysqli_num_rows($query) == 0){
                echo "<b>Tidak ada data yang tersedia</b>";
                }else{
                $no=1;
                while($r = mysqli_fetch_array($query)): ?>

				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $r['judul'] ?></td>
					<td><?php echo $r['isi'] ?></td>
					<td><img src='http://localhost/Project-dua/admin/image/<?php echo $r['gambar']; ?>'width='100' height='100'></td>
					<td><?php echo $r['create_at'] ?></td>
					<td><?php echo $r['update_at'] ?></td>
					<td><a href="<?php echo $base_url;?>artikel/edit/<?php echo $r['id'] ?>">Edit</a></td>
					<td><a href="<?php echo $base_url;?>artikel/hapus/<?php echo $r['id'] ?>">Hapus</a></td>
				</tr>

			<?php
	      endwhile;
	      }
	     ?>
		</table>
	</div>
	<?php } ?>
<?php function tambah(){
	// Load file koneksi.php
	include "../config/konek.php";
	?>
	<div>
		<form method="POST" action="" enctype="multipart/form-data">
			<table>
				<tr>
		 			<td>Judul</td>
		 			<td><input type="text" name="judul"></td>
		 		</tr>
		 		<tr>
		 			<td>Isi</td>
		 			<td><input type="textarea" name="isi"></td>
		 		</tr>
		 		<tr>
		 			<td>Gambar</td>
		 			<td><input type="file" name="gambar"></td>
	 			</tr>
			</table>
			<hr>
			<input type="submit" name="tambah" value="tambah">
			<button type="reset" value="reset">batal</button>
		</form>
		<?php
		if (isset($_POST['tambah'])) {
			$judul = $_POST['judul'];
			$isi = $_POST['isi'];
			$gambar = $_FILES['gambar']['name'];
			$tmp = $_FILES['gambar']['tmp_name'];
			$path = "../admin/image/".$gambar;

			move_uploaded_file($tmp, $path);
			$querytambah = mysqli_query($koneksi, "INSERT INTO artikel (judul,isi,gambar,create_at)
			VALUES('$judul','$isi','$gambar',NOW())") or die(mysqli_error());
			if($querytambah){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			echo"<script>document.location.href='../artikel'</script>"; // Redirect ke halaman index.php
			}else{
			echo "Upss Something wrong..";
		}
		}
	?>
	</div>
	<?php } ?>
<?php function edit() {
	include "../config/konek.php";
	$id = $_GET['id'];
	$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE id = '".$_GET['id']."'");
	$res = mysqli_fetch_array($query);
	?>
	<div>
		<form method="POST" action="" enctype="multipart/form-data">
			<table>
				<tr>
					<th>Judul</th>
					<td><input type="text" name="judul"  value="<?php echo $res['judul'] ?> " /></td>
				</tr>
				<tr>
					<th>Isi</th>
					<td><input type="textarea" name="isi"  value="<?php echo $res['isi'] ?> " /></td>
				</tr>
				<tr>
					<th>Gambar</th>
					<td><input type="file" name="gambar" /></td>
				</tr>
				<tr>
					<th>
					<input type="submit" name="edit" value="edit">
				    <button type="reset" value="Reset">Reset</button>
				    </th>
				</tr>
			</table>
		</form>
	</div>
	<?php
		if (isset($_POST['edit'])) {
				$judul = $_POST['judul'];
				$isi = $_POST['isi'];
				$gambar = $_FILES['gambar']['name'];
				$tmp = $_FILES['gambar']['tmp_name'];
				$path = "../admin/image/";

				if($gambar != ''){
				 	move_uploaded_file($tmp, $path.$gambar);
				 	$queryupdate = mysqli_query($koneksi, "UPDATE artikel SET
				 		judul = '$judul',
				 		isi = '$isi',
				 		gambar = '$gambar',
				 		update_at = NOW()
				 		WHERE id = '".$_GET['id']."'");
				 	if($queryupdate) {
				 		echo "berhasil update";
				 		}else{
				 		echo "gagal update";
				 		}
				 }else{
				 $queryupdate = mysqli_query($koneksi, "UPDATE artikel SET
				 		judul = '$judul',
				 		isi = '$isi',
				 		update_at = NOW()
				 		WHERE id = '".$_GET['id']."'");
				 if($queryupdate) {
				 		echo "berhasil update";
				 		}else{
				 		echo "gagal update";
				 		}
				 }
			}
	?>
	<?php } ?>
<?php function hapus() {
	include "../config/konek.php";
	  $id = $_GET['id'];

	  $queryhapus = mysqli_query($koneksi, "DELETE FROM artikel WHERE id = '".$_GET['id']."'");
	  if($queryhapus) {
	  echo"<script>document.location.href='../../artikel'</script>";
		} else{
		echo "Upss Something wrong..";}
	}
?>
