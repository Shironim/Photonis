<?php  ?>
<?php
 if(empty($_GET['act'])) {
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
 ?>
 <h1 class="title">Navigasi</h1>
 <div class="badan">
 <div class="container">
 <h4 class="sub-title">Data Menu</h4>
  	<hr>
 	<a href="?page=navigasi&act=tambah">
 	    <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
        <br>
        <span class="fan">input</span>
 	</a>
	<br>
 	<table class="table" id="table">
 		<tr class="tampil">
 			<th>No</th>
 			<th>Nama</th>
 			<th>Id menu</th>
 			<th>Up menu</th>
 			<th>Link</th>
 			<th>Type</th>
 			<th colspan="2">Aksi</th>
 		</tr>
 		<?php
 		include '../config/konek.php';
 		$query = mysqli_query($koneksi, "SELECT * FROM navigasi") or die (mysqli_error());
 		if (mysqli_num_rows($query) == 0) {
	         echo "<b>Tidak ada data yang tersedia</b>";
 		}else{
 		$no=1;
 		while($r = mysqli_fetch_array($query)): ?>
 		 <tr>
 		 	<td><?php echo $no++ ?></td>
 		 	<td><?php echo $r['nama'] ?></td>
            <th><?php echo $r['id']?></th>
 		 	<td><?php echo $r['up_menu']?></td>
 		 	<td><?php echo $r['link'] ?></td>
 		 	<td><?php echo $r['type'] ?></td>
 		 	<td><a href="<?php echo $base_url;?>?page=navigasi&act=edit&id=<?php echo $r['id']?>"><i class="fa fa-pencil" title="edit"></i></a></td>
 		 	<td><a href="<?php echo $base_url;?>?page=navigasi&act=hapus&id=<?php echo $r['id']?>"><i class="fa fa-trash" title="hapus"></i></a></td>
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
	include"../config/konek.php";
    //$id = $_GET['id'];
    //$content = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM content where id_menu = '$id'"));
    //$tambah_content = mysqli_num_rows($content);
    //if ($type == "content") {
    //    mysqli_query($koneksi,"INSERT INTO content (link) VALUES ('$id')");
    //}
    ?>
	<div>
		<form method="POST" action="">
			<table class="table">
				<tr>
		 			<td>Nama</td>
		 			<td class="left"><input type="text" name="nama"></td>
		 		</tr>
		 		<tr>
		 		    <td>Upmenu</td>
		 		    <td class="left"><input type="text" name="upmenu"></td>
		 		</tr>
		 		<tr>
		 			<td>Type</td>
		 			<td class="left">
		 				<select name="type">
		 					<option>content</option>
		 					<option>halaman</option>
		 				</select>
		 			</td>
	 			</tr>
			</table>
			<hr>
			<input type="submit" name="tambah" value="Tambah">
			<button type="reset" value="reset">Reset</button>
		</form>
		<?php
		if (isset($_POST['tambah'])) {
			$nama = $_POST['nama'];
			$link = strtolower(str_replace(' ','_',$_POST['nama']));
			$type = $_POST['type'];
            $upmenu = $_POST['upmenu'];
			$querytambah = mysqli_query($koneksi, "INSERT INTO navigasi (nama,link,type,up_menu)
			VALUES('$nama', '$link','$type','$upmenu')") or die(mysqli_error());
			if($querytambah){ // Cek jika proses simpa$link = $_POST['link'];n ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			echo"<script>document.location.href='?page=navigasi'</script>"; // Redirect ke halaman index.php
			}else{
			echo "Upss Something wrong..";
		}
		}
		?>
	</div>
<?php } ?>
<?php function edit(){
	include "../config/konek.php";
	$id = $_GET['id'];

   $query = mysqli_query($koneksi, "SELECT * FROM navigasi WHERE id = '$id'");

   $res = mysqli_fetch_array($query);?>
	<div>
		<form method="POST" action="">
			<table>
				<tr>
					<th>Nama</th>
					<td><input type="text" name="nama"  value="<?php echo $res['nama'] ?>"/></td>
				</tr>
				<tr>
				    <th>Upmenu</th>
				    <td><input type="text" name="upmenu" value="<?php echo $res['up_menu']?>"></td>
				</tr>
			</table>
			<br>
			<input type="submit" name="edit" value="Perbarui">
            <button type="reset" value="Reset">Reset</button>
		</form>
	</div>
	<?php
	  if(isset($_POST['edit'])){
		$nama  = $_POST['nama'];
        $upmenu = $_POST['upmenu'];

	   $queryupdate = mysqli_query($koneksi, "UPDATE navigasi SET
	                           nama    = '$nama',
                               up_menu = '$upmenu'
	             			WHERE id = '".$_GET['id']."'");

	   if($queryupdate){
	    echo"<script>document.location.href='?page=navigasi'</script>";
	  }else{
	   echo "Upss Something wrong..";
	  }
	  }

	   ?>
	<?php } ?>
<?php function hapus() {
	include "../config/konek.php";
	  $id = $_GET['id'];

	  $queryhapus = mysqli_query($koneksi, "DELETE FROM navigasi WHERE id = $id");

	  if($queryhapus) {
	  echo"<script>document.location.href='?page=navigasi'</script>";
		} else{
		echo "Upss Something wrong..";}
}?>
