<?php
	if (empty($_GET['act'])) {
		tampil();
	}
	elseif ($_GET['act'] == 'hapus') {
		hapus();
	}
?>

<?php function tampil(){
	$base_url = "http://localhost/Project-dua/s-admin";
	?>
	<h1 class="title">Pesan</h1>
	<div class="badan">
	<div class="container">
	<h4 class="sub-title">Data Pesan</h4>
	<hr>
		<table class="table" id="table">
		<tr class="tampil">
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
            <th>Tanggal</th>
			<th>Aksi</th>
		</tr>
		<?php
	       include "../config/konek.php";
	         $query = mysqli_query($koneksi, "SELECT * FROM pesan") or die (mysqli_error());
	       if(mysqli_num_rows($query) == 0){
	         echo "<b>Tidak ada data yang tersedia</b>";
	         }else{
	         $no=1;
	         while($r = mysqli_fetch_array($query)):     ?>
		<tr>
			<td><?php echo $no++; ?></td>
	        <td><?php echo $r['nama'];?></td>
	        <td><?php echo $r['email'];?></td>
            <td><?php echo $r['tgl']; ?></td>
	        <td>
	            <a href="<?php echo $base_url; ?>?page=pesan&act=hapus&id=<?php echo $r['id'] ?>"><i class="fa fa-trash" title="hapus"></i></a>
            </td>
		</tr>
		<?php
	      endwhile;
	      }
	     ?>
		</table>
	</div>
	</div>
	<?php } ?>
<?php function hapus() {
	include "../config/konek.php";
	  $id = $_GET['id'];

	  $queryhapus = mysqli_query($koneksi, "DELETE FROM pesan WHERE id = $id");

	  if($queryhapus) {
	  echo"<script>document.location.href='?page=pesan'</script>";
		} else{
		echo "Upss Something wrong..";}
}?>
