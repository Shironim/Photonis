<?php
    include "config/konek.php";
	//alert
	if (empty($_GET['info'])) {
		NULL;
	}
?>
<?php
    include "config/konek.php";
	$base_url = "http://localhost/Project-dua/";
	@session_start();
	if (empty($_SESSION['email_member']) AND empty($_SESSION['password_member'])) {
		echo"<script>document.location.href='login'</script>";
	}else{
?>
<div class="row">
    <div class="col s4">
        <h4>BANK PEMBAYARAN</h4>
        <span class="td">
            <img class="gambar" src="<?php echo $base_url;?>admin/image/mandiri.jpg" style="margin: 10px;">
            <p><b>Nomor Rekening Kami</b></p>
            <p>094401003368500</p>
        </span>
        <span class="td">
            <img class="gambar" src="<?php echo $base_url;?>admin/image/BNI.png" style="margin: 10px;">
            <p><b>Nomor Rekening Kami</b></p>
            <p>094401003368500</p>
        </span>
    </div>

    <div class="col s8">
    <?php
		function tampil(){
            include "config/konek.php";
			$member = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*from member WHERE email='$_SESSION[email_member]' AND password='$_SESSION[password_member]'"));
			$kota = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*from kota WHERE id='$member[id_kota]'"));
			$provinsi = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*from provinsi WHERE id='$member[id_provinsi]'"));
	?>
    	<h4 class="title-h1">Dashboard</h4>
    	<div class="panel">
			  <div class="panel-body">
			  	<b style="color: grey;">Hallo , <?php echo $member['nama']; ?></b>
			  	<p>Melalui menu Profil anda dapat mengubah informasi tentang profil anda dan dapat melihat tentang aktivitas anda di The Books</p>
			  </div>
		 </div>

		 <div class="row">
		 	<div class="col s6">
		 		<h5 class="title-h1">Informasi Profil <span style="float: right;"><a href="editprofil-informasi"><i class="fa fa-pencil" title=" edit"></i></a></span></a></span></h5>
		 	</div>
		 	<div class="col s6">
                <h5>Alamat Profil<span class="right"><a href="editprofil-alamat"><i class="fa fa-pencil" title=" edit"></i></a></span></h5>
		 	</div>
		 <div class="row">
		 	<div class="col s12">
			 	<h5>Riwayat Pembelian</h5>
			 	<div class="panel">
			 		<div class="panel-body">
			 			Anda tidak dapat menghapus riwayat pembelian , status pembelian yang terblokir karena tidak dilakukan pembayaran lebih dari <i>1x24 jam</i>

			 			<table class="table">
			 				<thead>
			 					<tr>
			 						<th>No order</th>
			 						<th>Tanggal</th>
			 						<th>Atas nama</th>
			 						<th>Total</th>
			 						<th>Status</th>
			 						<th></th>
			 					</tr>
			 				</thead>
			 				<tbody>
			 				<?php
                                include "config/konek.php";
			 					$beli = mysqli_query($koneksi,"SELECT*from penjualan WHERE id_member='$member[id_member]'");
			 					while ($dbeli = mysqli_fetch_array($beli)) {
			 					$harga_rp = number_format($dbeli['total'],2,",",".");

			 					//status
			 					if ($dbeli['status']=='MP') {
                                    $status = "Menunggu Pembayaran";
                                }elseif ($dbeli['status']=='B') {
                                    $status = "blokir";
                                }elseif ($dbeli['status']=='PR') {
                                    $status = "Proses";
                                }elseif ($dbeli['status']=='TD') {
                                    $status = "Tidak Dibayar";
                                }elseif ($dbeli['status']=='TY'){
                                    $status = "Telah Dibayar";
                                }
			 					?>
		 						<tr>
		 							<td><?php echo $dbeli['id_penjualan'] ?></td>	
		 							<td><?php echo $dbeli['tanggal'] ?></td>
		 							<td><?php echo $member['nama'] ?></td>
		 							<td><?php echo "Rp ".$harga_rp ?></td>
		 							<td><?php echo $status ?></td>
		 							<td><a href="data-pembelian-<?php echo $dbeli['id_penjualan']?>">lihat</a></td>
		 						</tr>
			 					<?php
			 					}	
							 ?>
			 				</tbody>
			 			</table>
			 		</div>
			 	</div>
		 	</div>
		 </div>
		<?php } ?>

		<?php
			function tampilorder(){
            include "config/konek.php";
			@session_start();
            $mau_beli = mysqli_query($koneksi,"SELECT*from penjualan WHERE id_penjualan='$_GET[id]'");
			$beli = mysqli_fetch_array($mau_beli);
			$member = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*from member WHERE email='$_SESSION[email_member]' AND password='$_SESSION[password_member]'"));
			//status
				if ($beli['status']=='MP') {
					$status = "Menunggu Pembayaran";
				}elseif ($beli['status']=='B') {
					$status = "blokir";
				}elseif ($beli['status']=='PR') {
					$status = "Proses";
				}elseif ($beli['status']=='TD') {
                    $status = "Tidak Dibayar";
                }elseif ($beli['status']=='TY'){
                    $status = "Telah Dibayar";
                }
		?>
			<div>
				<h4>Data Pembelian Buku</h4>
				<div>
					<div>
						<p>
							<!--menampilkan data penjualan-->
							Data dikirim dengan data sebagai berikut :<br>
							<table>
								<tr>
									<td class="left">Nama :</td>
									<td class="left"> <?php echo $member['nama']; ?></td>
								</tr>
								<tr>
									<td class="left">Alamat :</td>
									<td class="left"> <?php echo $beli['alamat']; ?></td>
								</tr>
								<tr>
									<td class="left">Tanggal :</td>
									<td class="left"> <?php echo $beli['tanggal']; ?></td>
								</tr>
								<tr>
									<td class="left">Status Pengiriman :</td>
									<td class="left"> <?php echo $status; ?></td>
								</tr>
							</table>
						</p>
						<hr>
						<table class="table">
							<thead>
								<tr>
									<th></th>
									<th>Judul Gambar</th>
									<th>Harga Satuan</th>
									<th>Jumlah</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php
                                include "config/konek.php";
								$id = $_GET['id'];
								$detail_beli = mysqli_query($koneksi,"SELECT*from detail_penjualan WHERE id_penjualan='$id'");
								while ($ddetail_beli = mysqli_fetch_array($detail_beli)) {
		            			$dgambar = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * from gallery WHERE id_gambar='$ddetail_beli[id_gambar]'"));
		    					$harga = $dgambar['harga_pokok'];
                                $diskon =$dgambar['diskon'] * $harga/100;
                                $harga_total = $harga - $diskon;
		    					$harga_rp = number_format($harga_total,2,",",".");
		    					$subtotal = $harga_total*$ddetail_beli['jumlah'];
		    					$subtotal_rp = number_format($subtotal,2,",",".");
		    					@$totalqty = $totalqty + $ddetail_beli['jumlah'];
		    					$ongkir = $totalqty*5000; //ongkir nanti diubah
		    					$ongkir_rp = number_format($ongkir,2,",",".");
		    					@$total = $total + $subtotal;
		    					$total_rp = number_format($total,2,",",".");
		    					$gtotal = $ongkir + $total;
		    					$gtotal_rp = number_format($gtotal,2,",",".");
						      ?>
                                <tr>
                                    <td width='120px'><img src="http://localhost/project-dua/admin/image/<?php echo $dgambar['gambar']?>" width='100px' title='<?php echo $dgambar['nama']?>'></td>
                                    <td><a href="lihatgambar-<?php echo $dgambar['id_gambar']?>.html" target='new'><?php echo $dgambar['nama']?></td>
                                    <td width='120px'><?php echo "Rp ".$harga_rp;?></td>
                                    <td width='75px' align='center'><?php echo "$ddetail_beli[jumlah]"?></td>
                                    <td width='120px'><?php echo "Rp ".$subtotal_rp;?></td>
                                </tr>
                        <?php
	            		}?>
	            			<tr>
			        		<td colspan="2">
			        		</td>
			        		<td align="right" colspan="2">
			        			Total :<br>
			        			Ongkir :<br>
			        			&nbsp;:<br>
			        			Grand Total :
			        		</td>
			        		<td>
			        			<b> <?php echo "Rp $total_rp"; ?></b><br>
			        			<b> <?php echo "($totalqty x Rp.5000)"; ?></b><br>
			        			<b> <?php echo "Rp $ongkir_rp"; ?></b><br>
			        			<u><h6> <?php echo "Rp $gtotal_rp"; ?></h6></u>
			        		</td>
			        	</tr>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php
			function edit_informasi(){
                include "config/konek.php";
				$member = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*from member WHERE email='$_SESSION[email_member]' AND password='$_SESSION[password_member]'"));
		?>
			<div class="row">
				<h4 class="title-h1">Edit Data Profil</h4>
				<div class="row">&nbsp;</div>
				<form method="POST" action="">
				<div class="col s4">
					<label>Nama</label>
					<input type="text" required="" name="nama" placeholder="Nama" value="<?php echo $member['nama']; ?>">
				</div>
				<div class="col s4">
					<label>Email</label>
					<input type="text" required="" name="email" placeholder="email" value="<?php echo $member['email']; ?>">
				</div>
				<div class="col s4">
					<label>Telepon</label>
					<input type="text" required="" name="telepon" placeholder="telepon" value="<?php echo $member['telepon']; ?>">
				</div>

				<div class="row">&nbsp;</div><div class="row">&nbsp;</div>
				<div class="col s6">
					<label>Password</label>
					<input type="password" name="password" placeholder="isi password jika ingin diganti">
				</div>
				<div class="col s6">
					<label>Confirm-Password</label>
					<input type="password" name="cpassword" placeholder="isi password jika ingin diganti">
				</div>

				<div class="row">&nbsp;</div><div class="row">&nbsp;</div>
				<div class="col s12">
					<center><input type="submit" name="edit" value="Perbarui Informasi Profil"></center>
				</div>
				</form>

				<?php
                    include "config/konek.php";
					if (isset($_POST['edit'])) {
						$nama = $_POST['nama'];
						$email = $_POST['email'];
						$telepon = $_POST['telepon'];
						$password = md5($_POST['password']);
						$cpassword = md5($_POST['cpassword']);

						if (isset($_POST['password']) AND isset($_POST['cpassword'])) {
							if ($password == $cpassword) {
								mysqli_query($koneksi,"UPDATE member set nama='$nama' , email='$email' , telepon='$telepon' , password='$password' WHERE id_member='$member[id_member]'");
								echo"<script>alert('Data Berhasil Diperbarui, silahkan login kembali');document.location.href='logout';</script>";
							}else{
								echo"<script>alert('Password Tidak Sama');</script>";
							}
						}else{
							mysqli_query($koneksi,"UPDATE member set nama='$nama' , email='$email' , telepon='$telepon' WHERE id_member='$member[id_member]'");
								echo"<script>alert('Data Berhasil Diperbarui, silahkan login kembali');document.location.href='logout.php';</script>";
						}
						
					}
				?>
			</div>
		<?php } ?>

		<?php
			function edit_alamat(){
            include "config/konek.php";
				$member = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*from member WHERE email='$_SESSION[email_member]' AND password='$_SESSION[password_member]'"));
		?>
			<div class="row">
				<h4 class="title-h1">Edit Alamat Profil</h4>
				<div class="row">&nbsp;</div>
				<form method="POST" action="">
				<div class="col s12">
					<label>Alamat</label>
					<input type="text" required="" class="form-control" name="alamat" placeholder="alamat lengkap" value="<?php echo $member['alamat']; ?>">
				</div>
				<div class="col s6 bt20">
					<label class="lebel">Kota</label>
					<br>
					<select name="kota" required="" tabindex="2" style="display:block">
						<?php 
                        include "config/konek.php";
						$kota = mysqli_query($koneksi,"SELECT * from kota ORDER BY name");
						while ($dkota = mysqli_fetch_array($kota)) {
							if ($dkota['id'] == $member['id_kota']) {
								echo"<option value='$dkota[id]' selected>$dkota[name]</option>";
							}else{
								echo"<option value='$dkota[id]'>$dkota[name]</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="col s6 bt20">
					<label class="lebel">Provinsi</label>
					<br>
					<select name="provinsi" required="" tabindex="2" style="display:block">
						<?php 
                        include "config/konek.php";
						$provinsi = mysqli_query($koneksi,"SELECT * from provinsi ORDER BY name");
						while ($dprovinsi = mysqli_fetch_array($provinsi)) {
							if ($dprovinsi['id'] == $member['id_provinsi']) {
								echo"<option value='$dprovinsi[id]' selected>$dprovinsi[name]</option>";
							}else{
								echo"<option value='$dprovinsi[id]'>$dprovinsi[name]</option>";
							}
						}
						?>
					</select>
				</div>
                <br>
				<div class="col s12">
					<center><input type="submit" name="edit" value="Perbarui Informasi Profil"></center>
				</div>
				</form>

				<?php
                    include "config/konek.php";
					if (isset($_POST['edit'])) {
						$alamat = $_POST['alamat'];
						$kota = $_POST['kota'];
						$provinsi = $_POST['provinsi'];

						$edit = mysqli_query($koneksi,"UPDATE member set alamat='$alamat' , id_kota='$kota' , id_provinsi='$provinsi' ,tanggal=NOW() WHERE id_member='$member[id_member]'");
						
						if ($edit) {
							echo"<script>alert('Data Berhasil Diperbarui, silahkan login kembali');document.location.href='logout';</script>";
						}else{
							echo"<script>alert('Data Gagal Diperbarui, silahkan login kembali');document.location.href='logout';</script>";
						}
						
					}
				?>
			</div>
		<?php } ?>

		<?php
			//fungi OOP
	    	if (empty($_GET['act'])) {
	    		tampil();
	    	}elseif($_GET['act']=='lihatorder'){
	    		tampilorder();
	    	}elseif($_GET['act']=='editprofilinfo'){
	    		edit_informasi();
	    	}elseif($_GET['act']=='editprofilalamat'){
	    		edit_alamat();
	    	}
		?>
    </div>
<?php } ?>
</div>