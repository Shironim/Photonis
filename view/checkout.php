<div class="container">
<?php
    $base_url = "http://localhost/Project-dua/";
    include "config/konek.php";
	@session_start();
	if (empty($_SESSION['email_member']) AND empty($_SESSION['password_member'])) {
		echo"<script>document.location.href='login'</script>";
	}else{

	$member = mysqli_fetch_array(mysqli_query($koneksi,"SELECT*from member WHERE email='$_SESSION[email_member]' AND password='$_SESSION[password_member]'"));
?>
	<h3 class="title-h1">Checkout</h3>
	<div class="row">
		&nbsp;
	</div>
	<div class="row">
		<div class="col s12">
			<div class="">
            <h3 class="panel-title">Informasi Pembayaran</h3>
			  <form method="post" action="pesanan">
                <div class="col s12">
                    <div class="col s4">
                        <label>Nama Lengkap</label>
                        <input type="hidden" name="id" value="<?php echo $member['id_member']; ?>">
                        <input type="text" name="nama" class="form-control" value="<?php echo $member['nama']; ?>" readonly="">
                    </div>
                    <div class="col s4">
                        <label>Alamat Email</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $member['email']; ?>" readonly="">
                    </div>
                    <div class="col s4">
                        <label>Nomor Telephone</label>
                        <input type="text" name="nama" class="form-control" value="<?php echo $member['telepon']; ?>" readonly="">
                    </div>
                </div>
			    <div class="row">
			    	&nbsp;
			    </div>
			    <div class="row">
                    <div class="col s12">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?php echo $member['alamat']; ?>" readonly=""><br>
                        <label>Alamat Lain (isi alamat ini jika ingin mengirim ke alamat lain. Format : alamat,kelurahan,kecamatan,kota,provinsi)</label>
                        <input type="text" name="alamat2" class="form-control" placeholder="isi alamat ini jika ingin mengirim ke alamat lain. Format : alamat,kelurahan,kecamatan,kota,provinsi"><br>
                    </div>
			    </div>
			    <div class="row">
			    	&nbsp;
			    </div>
			    <div class="row">
			    	<div class="col s6">
			    	<label>Kota</label>
                        <?php
                            include "config/konek.php";
                            $kota = mysqli_query($koneksi,"SELECT*from kota WHERE id='$member[id_kota]'");
                            $dtkota = mysqli_fetch_array($kota);
                                echo"<input type='text' class='form-control' name='kota' value='$dtkota[name]' readonly=''>";
                        ?>
			    	</div>
			    	<div class="col s6">
			    	<label>Provinsi</label>
                        <?php
                            include "config/konek.php";
                            $provinsi = mysqli_query($koneksi,"SELECT*from provinsi WHERE id='$member[id_provinsi]'");
                            $dtprovinsi = mysqli_fetch_array($provinsi);
                                echo"<input type='text' class='form-control' name='kota' value='$dtprovinsi[name]' readonly=''>";
                        ?>
			    	</div>
			    </div>
			  </div>
			</div>

			<div class="col s10">
					<h4>Keranjang</h4>
				<div class="panel-body">
					<table class="table">
						<thead>
			        		<tr>
			        			<th class="td">Judul Gambar</th>
			        			<th class="td">Harga Satuan</th>
			        			<th>Jumlah</th>
			        			<th class="td">Subtotal</th>
			        		</tr>
			        	</thead>
			        	<tbody>
			        	<?php 
                        include "config/konek.php";
		                $jml = count($_SESSION);
		                //jika keranjang kosong maka terlihat tabel
		                if ($jml == 0) {
		                    echo"<tr><td colspan='6'><center>Keranjang Anda Kosong!</center></td></tr>";
		                    $ongkir_rp = 0;
		                    $gtotal_rp = 0;
		                    $kondisi = "disabled";
		                }else{
		                	$kondisi = "";
		                    $a = 1;
		            		foreach ($_SESSION['items'] as $key => $val) {
		            			$gambar = mysqli_query($koneksi,"SELECT * from gallery WHERE id_gambar='$key'");
                                $dgambar = mysqli_fetch_array($gambar);
		    					$harga = $dgambar['harga_pokok'];
                                $diskon = $dgambar['diskon'] * $harga / 100;
                                $harga_total = $harga - $diskon;
                                $harga_rp = number_format($harga,2,",",".");
		    					$harga_total_rp = number_format($harga_total,2,",",".");
		    					$subtotal = $harga_total*$val;
		    					$subtotal_rp = number_format($subtotal,2,",",".");
		    					$ongkir = $totalqty*5000; //ongkir nanti diubah
		    					$ongkir_rp = number_format($ongkir,2,",",".");
		    					$gtotal = $ongkir + $total;
		    					$gtotal_rp = number_format($gtotal,2,",",".");
                            ?>
	            		<tr>
	            			<td class="td">
                                <a href="?page=lihatgambar&id=<?php echo $dgambar['id_gambar']?>" target='new'>
                                    <h4 class="judul-keranjang"><?php echo $dgambar['nama']?></h4>
                                </a>
                                <?php 
                                    img("http://localhost/Project-dua/admin/image/$dgambar[gambar]",$dgambar['nama'],'','','foto materialboxed')
                                ?>
                            </td>
	            			<td class="td">
                                Rp <?php echo $harga_rp?>
                            </td>
	            			<td width='75px' align='center'>
                                <?php echo $val?>
                            </td>
	            			<td class="td">
                                Rp <?php echo $subtotal_rp?>
                            </td>
	            		</tr>
	            		<?php 
	            			}
                            $a++;
	            		}
			        	?>
			        	<tr>
			        		<td colspan="2" class="left left-align">
			        			*) Silahkan Lanjutkan transaksi <br>
			        			*) Pengiriman menggunakan JNE <br>
			        			*) Ongkos kirim perbuku Rp. 5000 , Seluruh Indonesia <br>
			        			*) Transfer uang maksimal 1 hari setelah pembelian, jika tidak pengiriman batal <br>
			        			<img class="gambar" src="<?php echo $base_url;?>admin/image/mandiri.jpg"><br>
			        			*) No. Rek : 094401003368500 <br>
			        			<img class="gambar" src="<?php echo $base_url;?>admin/image/BNI.png"><br>
			        			*) No. Rek : 094401003368500 <br>
			        			
			        			
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
			        			<input type="hidden" name="gtotal" value="<?php echo @$gtotal; ?>">
			        		</td>
			        	</tr>
			        	<tr>
			        		<td align="right" colspan="6">
			        			<button class="btn btn-hitam" <?php echo $kondisi; ?> data-toggle="modal" data-target="#myModal">Konfirmasi Pesanan</button>
			        		</td>
			        	</tr>
			        	</tbody>
					</table>
					 </form>
			</div>
		</div>
	</div>
	<?php } ?>
</div>