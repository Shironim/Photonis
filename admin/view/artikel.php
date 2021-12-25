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
	elseif ($_GET['act'] == 'cari') {
		cari();
	}
 ?>
<?php function tampil(){
	$base_url = "http://localhost/Project-dua/s-admin";
    $halaman = @$_GET['halaman'];
    $batas = 5;
    if (empty($halaman)) {
        $posisi = 0;
        $halaman = 1;
    }else{
        $posisi = ($halaman - 1)*$batas;
    }
	 ?>
    <h1 class="title">Artikel</h1>
	<div class="badan">
	<div class="container">
	<h4 class="sub-title">Data Artikel</h4>
    <hr>
		<form class="right" action="?page=artikel&act=cari" method="post">
            <input type="text" name="keyword" placeholder="Cari Data">
            <input type="submit" name="cari" value="cari">
        </form>
		<a href="?page=artikel&act=tambah">
            <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
            <br>
            <span class="fan">input</span>
        </a>
		<br>
		<table id="table" class="table">
			<tr class="tampil">
				<th>No</th>
				<th>Judul</th>
                <th>Penulis</th>
				<th>Di buat</th>
				<th>Di edit</th>
                <th>Tanggal</th>
				<th class="mepet" colspan="2">Aksi</th>
			</tr>
				<?php
			include "../config/konek.php";
			$query = mysqli_query($koneksi, "SELECT * FROM artikel ORDER BY judul LIMIT $posisi,$batas") or die (mysqli_error());
			if(mysqli_num_rows($query) == 0){
			echo "<b>Tidak ada data</b>";
			}else{
            $no = 1 + $posisi;
            while($r = mysqli_fetch_array($query)): ?>

				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $r['judul'] ?></td>
                    <td><?php echo $r['penulis']; ?></td>
					<td><?php echo $r['create_at'] ?></td>
					<td><?php echo $r['update_at'] ?></td>
                    <td><?php echo $r['tgl']; ?></td>
					<td><a href="<?php echo $base_url;?>?page=artikel&act=edit&id=<?php echo $r['id'] ?>"><i class="fa fa-pencil" title="edit"
 title="hapus"></i></a></td>
					<td><a href="<?php echo $base_url;?>?page=artikel&act=hapus&id=<?php echo $r['id'] ?>"><i class="fa fa-trash" title="edit"
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
                        $hitungproduk = $koneksi->query("SELECT * FROM artikel");
                        $jmldata = mysqli_num_rows($hitungproduk);
                        $jmlhalaman = ceil($jmldata/$batas);
                        for ($i=1; $i <= $jmlhalaman; $i++) {
                            if ($i != $halaman) {
                                echo "<li><a href='?page=artikel&halaman=$i'>$i</a></li>";
                            }else {
                                echo "<li class='active'><a href='?page=artikel&halaman=$i'>$i</a></li>";
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
	<?php } ?>
<?php function cari(){
	$base_url = "http://localhost/Project-dua/s-admin";
	 ?>
	<h1 class="title">Artikel</h1>
	<div class="badan">
	<div class="container">
	<h4 class="sub-title">Data Artikel</h4>
    <hr>
		<form class="right" action="?page=artikel&act=cari" method="post">
            <input type="text" name="keyword" placeholder="Cari Data">
            <input type="submit" name="cari" value="cari">
        </form>
		<br>
		<table class="table" id="table">
			<tr class="tampil">
				<th>No</th>
				<th>Judul</th>
                <th>Penulis</th>
				<th>Di buat</th>
				<th>Di edit</th>
                <th>Tanggal</th>
				<th class="mepet" colspan="2">Aksi</th>
			</tr>
			<?php
			include "../config/konek.php";
			$keyword = $_POST['keyword'];
			if ($keyword != '') {
				$query = mysqli_query($koneksi, "SELECT * FROM artikel WHERE judul like '%".$keyword."%' OR isi like '%".$keyword."%'" );
			}else {
				$query = mysqli_query($koneksi, "SELECT * FROM artikel");
			}
			$no=1;
			while ($r = mysqli_fetch_array($query)){ ?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $r['judul'] ?></td>
                    <td><?php echo $r['penulis']; ?></td>
					<td><?php echo $r['create_at'] ?></td>
					<td><?php echo $r['update_at'] ?></td>
                    <td><?php echo $r['tgl']; ?></td>
					<td><a href="<?php echo $base_url;?>?page=artikel&act=edit&id=<?php echo $r['id'] ?>"><i class="fa fa-pencil" title="edit"
 title="hapus"></i></a></td>
					<td><a href="<?php echo $base_url;?>?page=artikel&act=hapus&id=<?php echo $r['id'] ?>"><i class="fa fa-trash" title="edit"
 title="hapus"></i></a></td>
				</tr>

			<?php
  	      }
	     ?>
		</table>
	</div>
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
		 			<td class="left"><input type="text" name="judul"></td>
		 		</tr>
		 		<tr>
		 			<td>Isi</td>
		 			<td class="left"><textarea name="isi" rows="8" cols="80"></textarea></td>
		 		</tr>
                <tr>
                    <td>Penulis</td>
                    <td class="left"><input type="text" name="penulis"></td>
                </tr>
		 		<tr>
		 			<td>Gambar</td>
		 			<td class="left"><input type="file" name="gambar"></td>
	 			</tr>
			</table>
			<br>
			<input type="submit" name="tambah" value="Tambah">
			<button type="reset" value="reset">batal</button>
		</form>
		<?php
		if (isset($_POST['tambah'])) {
			$judul = $_POST['judul'];
			$isi = $_POST['isi'];
            $penulis = $_POST['penulis'];
			$gambar = $_FILES['gambar']['name'];
			$tmp = $_FILES['gambar']['tmp_name'];
			$path = "../admin/image/".$gambar;

			move_uploaded_file($tmp, $path);
			$querytambah = mysqli_query($koneksi, "INSERT INTO artikel (judul,isi,gambar,penulis,create_at,tgl)
			VALUES('$judul','$isi','$gambar','$penulis',NOW(),NOW())") or die(mysqli_error());
			if($querytambah){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			echo"<script>document.location.href='?page=artikel'</script>"; // Redirect ke halaman index.php
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
					<td class="left"><input type="text" name="judul"  value="<?php echo $res['judul'] ?> " /></td>
				</tr>
				<tr>
					<th>Isi</th>
                    <td class="left"><textarea name="isi" rows="8" cols="80"><?php echo $res['isi'] ?></textarea></td>
				</tr>
                <tr>
                    <th>Penulis</th>
                    <td class="left"><input type="text" name="penulis" value="<?php echo $res['penulis'] ?> "></td>
                </tr>
				<tr>
					<th>Gambar</th>
					<td class="left"><input class="col-md-6 m6" type="file" name="gambar" /><img class="col-md-5 col5" src='http://localhost/Project-dua/admin/image/<?php echo $res['gambar']; ?>'width='100' height='100'></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="edit" value="Perbarui">
            <button type="reset" value="Reset">Reset</button>
		</form>
	</div>
	<?php
		if (isset($_POST['edit'])) {
				$judul = $_POST['judul'];
				$isi = $_POST['isi'];
                $penulis = $_POST['penulis'];
				$gambar = $_FILES['gambar']['name'];
				$tmp = $_FILES['gambar']['tmp_name'];
				$path = "../admin/image/";

				if($gambar != ''){
				 	move_uploaded_file($tmp, $path.$gambar);
				 	$queryupdate = mysqli_query($koneksi, "UPDATE artikel SET
				 		judul = '$judul',
				 		isi = '$isi',
				 		gambar = '$gambar',
                        penulis = '$penulis',
				 		update_at = NOW()
				 		WHERE id = '".$_GET['id']."'");
				 	if($queryupdate) {
				 		echo "berhasil update";
                        echo "<script>document.location.href='?page=artikel'</script>";
				 		}else{
				 		echo "gagal update";
				 		}
				 }else {
				 $queryupdate = mysqli_query($koneksi, "UPDATE artikel SET
				 		judul = '$judul',
				 		isi = '$isi',
                        penulis = '$penulis',
				 		update_at = NOW()
				 		WHERE id = '".$_GET['id']."'");
				 if($queryupdate) {
				 		echo "berhasil update";
                        echo "<script>document.location.href='?page=artikel'</script>";
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
	  echo"<script>document.location.href='?page=artikel'</script>";
		} else{
		echo "Upss Something wrong..";}
	}
?>
