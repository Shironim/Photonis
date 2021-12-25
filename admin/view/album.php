<?php  ?>
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
   <h1 class="title">Album</h1>
    <div class="badan">
    <div class="container">
       <h4 class="sub-title">Daftar Foto</h4>
       <hr>
        <a href="?page=album&act=tambah">
            <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
            <br>
            <span class="fan">input</span>
        </a>
        <br>
        <table class="table" id="table">
            <tr class="tampil">
                <th>No</th>
                <th>Nama</th>
                <th>caption</th>
                <th>Tanggal</th>
                <th colspan="2">Aksi</th>
            </tr>
            <?php
 		include '../config/konek.php';
 		$query = mysqli_query($koneksi, "SELECT * FROM album ORDER BY nama LIMIT $posisi,$batas") or die (mysqli_error());
 		if (mysqli_num_rows($query) == 0) {
 			echo "<b>data tidak ada<b>";
 		}else {
 			$no = 1 + $posisi;
 			while($r = mysqli_fetch_array($query)):
 				?>
                <tr>
                    <td>
                        <?php echo $no++ ?>
                    </td>
                    <td>
                        <?php echo $r['nama']; ?>
                    </td>
                    <td>
                        <?php echo $r['caption']; ?>
                    </td>
                    <td>
                        <?php echo $r['tgl']; ?>
                    </td>
                    <td><a href="<?php echo $base_url;?>?page=album&act=edit&id=<?php echo $r['id'];?>"><i class="fa fa-pencil" title="edit"></i></a></td>
                    <td><a href="<?php echo $base_url;?>?page=album&act=hapus&id=<?php echo $r['id'];?>"><i class="fa fa-trash" title="hapus"></i></a></td>
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
                    $hitungproduk = $koneksi->query("SELECT * FROM album");
                    $jmldata = mysqli_num_rows($hitungproduk);
                    $jmlhalaman = ceil($jmldata/$batas);
                    for ($i=1; $i <= $jmlhalaman; $i++) {
                        if ($i != $halaman) {
                            echo "<li><a href='?page=album&halaman=$i'>$i</a></li>";
                        }else {
                            echo "<li class='active'><a href='?page=album&halaman=$i'>$i</a></li>";
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
    <?php function tambah(){
	include '../config/konek.php';
	?>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <th class="left"><input type="text" name="nama"></th>
                </tr>
                <tr>
                    <th>Caption</th>
                    <th class="left"><input type="text" name="caption"></th>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <th><input type="file" name="gambar"></th>
                </tr>
            </table>
            <br>
            <input type="submit" name="tambah" value="Tambah">
            <button type="reset" value="batal">Batal</button>
        </form>
        <?php
			if (isset($_POST['tambah'])) {
			$gambar = $_FILES['gambar']['name'];
			$tmp = $_FILES['gambar']['tmp_name'];
			$nama = $_POST['nama'];
            $caption = $_POST['caption'];
			$path = "../admin/image/".$gambar;

			move_uploaded_file($tmp, $path);
			$querytambah = mysqli_query($koneksi, "INSERT INTO album (gambar,caption,nama,tgl)
			VALUES('$gambar','$caption','$nama',NOW())") or die (mysqli_error());
			if ($querytambah){
				echo"<script>document.location.href='?page=album'</script>";
			}else{
				echo "yeeee anda belum beruntung, silakan coba lagi";
			}
		}
		?>
    </div>
    <?php } ?>
    <?php function edit(){
	include "../config/konek.php";
	$id = $_GET['id'];
	$query = mysqli_query($koneksi,"SELECT * FROM album WHERE id = '".$_GET['id']."'");
	$res = mysqli_fetch_array($query); ?>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Nama</th>
                    <td><input type="text" name="nama" value="<?php echo $res['nama']?>"></td>
                </tr>
                <tr>
                    <th>Caption</th>
                    <td><input type="text" name="caption" value="<?php echo $res['caption']?>"></td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td class="left"><input class="col-md-6 col6" type="file" name="gambar"><img class="col-md-5 m5" src='http://localhost/Project-dua/admin/image/<?php echo $res['gambar']; ?>'width='100' height='100'></td>
                </tr>

                <?php
	 			if (isset($_POST['edit'])) {
	 			 	$nama = $_POST['nama'];
	 			 	$gambar = $_FILES ['gambar']['name'];
	 			 	$tmp = $_FILES ['gambar']['tmp_name'];
	 			 	$path = "../admin/image/".$gambar;
                    $caption = $_POST['caption'];

	 			 	if ($gambar !='') {
	 			 		move_uploaded_file($tmp,$path);
	 			 		$queryupdate = mysqli_query($koneksi,"UPDATE album SET
	 			 			nama = '$nama',
	 			 			gambar = '$gambar',
                            caption = '$caption'
	 			 			WHERE id = '".$_GET['id']."'");
	 			 		if ($queryupdate) {
	 			 			echo "update berhasil";
                            echo"<script>document.location.href='?page=album'</script>";

	 			 		}else{
	 			 			echo "update gagal";
	 			 		}
	 			 	}else{
	 			 		$queryupdate = mysqli_query($koneksi,"UPDATE album SET
	 			 			nama = '$nama',
                            caption = '$caption'
	 			 			WHERE id = '".$_GET['id']."'");
	 			 		if ($queryupdate) {
	 			 			echo "update berhasil";
                            echo"<script>document.location.href='?page=album'</script>";

	 			 		}else{
	 			 			echo "update gagal";
	 			 		}
	 			 	}
	 			 } ?>
            </table>
            <br>
            <input type="submit" name="edit" value="Perbarui">
            <button type="reset" name="reset">Batal</button>
        </form>
    </div>
    <?php } ?>
    <?php function hapus(){
	include"../config/konek.php";
	$id = $_GET['id'];
	$queryhapus = mysqli_query($koneksi, "DELETE FROM album WHERE id = '".$_GET['id']."'");
	if ($queryhapus) {
	 	echo "<script>document.location.href='?page=album'</script>";
	 }else{
	 	echo "hapus gagal";
	 }
	?>
    <?php } ?>
