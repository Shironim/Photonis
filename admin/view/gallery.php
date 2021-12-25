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
	$base_url = "http://localhost/Project-dua/s-admin";
    $halaman = @$_GET['halaman'];
    $batas = 4;
    if (empty($halaman)) {
        $posisi = 0;
        $halaman = 1;
    }else{
        $posisi = ($halaman - 1)*$batas;
    }
 ?>
    <h1 class="title">Foto</h1>
    <div class="badan">
	<div class="container">
	<h4 class="sub-title">Daftar Foto</h4>
	<hr>
 	<a href="?page=gallery&act=tambah">
 	    <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
        <br>
        <span class="fan">input</span>
 	</a>
	<br>
 	<table class="table" id="table">
 		<tr class="tampil">
 			<th>No</th>
 			<th>Judul Foto</th>
 			<th>Fotographer</th>
 			<th>Stok</th>
 			<th>Terjual</th>
 			<th colspan="2">Aksi</th>
 		</tr>
 		<?php
 		include '../config/konek.php';
 		$query = mysqli_query($koneksi, "SELECT * FROM gallery ORDER BY nama LIMIT $posisi,$batas") or die (mysqli_error());
 		if (mysqli_num_rows($query) == 0) {
 			echo "<b>data tidak ada<b>";
 		}else {
 			$no = 1 + $posisi;
 			while($r = mysqli_fetch_array($query)):
 				?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['nama_fotographer']; ?></td>
			<td><?php echo $r['stok']; ?></td>
			<td><?php echo $r['dijual']?></td>
			<td><a href="<?php echo $base_url;?>?page=gallery&act=edit&id=<?php echo $r['id_gambar'];?>"><i class="fa fa-pencil" title="edit"
 title="hapus"></i></a></td>
			<td><a href="<?php echo $base_url;?>?page=gallery&act=hapus&id=<?php echo $r['id_gambar'];?>"><i class="fa fa-trash" title="edit"
 title="hapus"></i></a></td>
		</tr>
	<?php
	endwhile;
	}
	?>
 	</table>
    <div class="">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                    $hitungproduk = $koneksi->query("SELECT * FROM gallery");
                    $jmldata = mysqli_num_rows($hitungproduk);
                    $jmlhalaman = ceil($jmldata/$batas);
                    for ($i=1; $i <= $jmlhalaman; $i++) {
                        if ($i != $halaman) {
                            echo "<li><a href='?page=gallery&halaman=$i'>$i</a></li>";
                        }else {
                            echo "<li class='active'><a href='?page=gallery&halaman=$i'>$i</a></li>";
                        }
                    }
                ?>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
            </ul>
        </nav>
    </div>
	</div>
	</div>
	<?php }
?>
<?php function tambah(){
	include '../config/konek.php';
	?>
	<div>
		<form method="POST" action="" enctype="multipart/form-data">
			<table>
                <tr>
					<th>Judul</th>
					<td class="left"><input type="text" name="nama"></td>
				</tr>
				<tr>
				    <th>Fotographer</th>
				    <td class="left"><input type="text" name="fotographer"></td>
				</tr>
				<tr>
				    <th>Stok</th>
				    <td class="left"><input type="text" name="stok"></td>
				</tr>
				<tr>
					<th>Gambar</th>
					<td><input type="file" name="gambar"></td>
                </tr>
			</table>
			<hr>
			<input type="submit" name="tambah" value="Tambah">
			<button type="reset" value="batal">Batal</button>
		</form>
		<?php
			if (isset($_POST['tambah'])) {
			$gambar = $_FILES['gambar']['name'];
			$tmp = $_FILES['gambar']['tmp_name'];
			$nama = $_POST['nama'];
            $fotographer = $_POST['fotographer'];
            $stok = $_POST['stok'];
			$path = "../admin/image/".$gambar;

			move_uploaded_file($tmp, $path);
			$querytambah = mysqli_query($koneksi, "INSERT INTO gallery (gambar,nama,create_at,stok,nama_fotographer,create_at)
			VALUES('$gambar','$nama','$stok','$fotographer',NOW())") or die (mysqli_error());
			if ($querytambah){
				echo"<script>document.location.href='?page=gallery'</script>";
			}else{
				echo "yeeee anda belum beruntung, silakan coba lagi";
			}
		}
		?>
	</div>
	<?php }
?>
<?php function edit(){
	include"../config/konek.php";
	$id_gambar = $_GET['id'];
	$query = mysqli_query($koneksi,"SELECT * FROM gallery WHERE id_gambar = '".$_GET['id']."'");
	$res = mysqli_fetch_array($query);
 ?>
	<div>
	 	<form method="POST" action="" enctype="multipart/form-data">
	 		<table>
	 			<tr>
	 				<th>Judul</th>
	 				<td class="left"><input type="text" name="nama" value="<?php echo $res['nama']?>"></td>
	 			</tr>
	 			<tr>
				    <th>Fotographer</th>
				    <td class="left"><input type="text" name="fotographer" value="<?php echo $res['nama_fotographer']?>"></td>
				</tr>
				<tr>
				    <th>Stok</th>
				    <td class="left"><input type="text" name="stok" value="<?php echo $res['stok']?>"></td>
				</tr>
	 			<tr>
	 				<th>Gambar</th>
	 				<td class="left"><input class="col-md-6 m6" type="file" name="gambar"><img class="col-md-5 col5" src='http://localhost/Project-dua/admin/image/<?php echo $res['gambar']; ?>'width='100' height='100'></td>
	 			</tr>
	 			<?php
	 			if (isset($_POST['edit'])) {
	 			 	$nama = $_POST['nama'];
	 			 	$gambar = $_FILES ['gambar']['name'];
	 			 	$tmp = $_FILES ['gambar']['tmp_name'];
	 			 	$path = "../admin/image/".$gambar;

	 			 	if ($gambar !='') {
	 			 		move_uploaded_file($tmp,$path);
	 			 		$queryupdate = mysqli_query($koneksi,"UPDATE gallery SET
	 			 			nama = '$nama',
	 			 			gambar = '$gambar',
	 			 			update_at = NOW()
	 			 			WHERE id_gambar = '".$_GET['id']."'");
	 			 		if ($queryupdate) {
	 			 			echo "update berhasil";
                            echo"<script>document.location.href='?page=gallery'</script>";

	 			 		}else{
	 			 			echo "update gagal";
	 			 		}
	 			 	}else{
	 			 		$queryupdate = mysqli_query($koneksi,"UPDATE gallery SET
	 			 			nama = '$nama',
	 			 			update_at = NOW()
	 			 			WHERE id_gambar = '".$_GET['id']."'");
	 			 		if ($queryupdate) {
	 			 			echo "update berhasil";
                            echo"<script>document.location.href='?page=gallery'</script>";

	 			 		}else{
	 			 			echo "update gagal";
	 			 		}
	 			 	}
	 			 } ?>
	 		</table>
	 		<input type="submit" name="edit" value="Perbarui">
            <button type="reset" name="reset">Batal</button>
	 	</form>
 </div>
	<?php }
?>
<?php function hapus(){
	include"../config/konek.php";
	$id_gambar = $_GET['id'];
	$queryhapus = mysqli_query($koneksi, "DELETE FROM gallery WHERE id_gambar = '".$_GET['id']."'");
	if ($queryhapus) {
	 	echo "<script>document.location.href='?page=gallery'</script>";
	 }else{
	 	echo "hapus gagal";
	 }
	?>
	<?php }
?>
