<?php
    include 'config/konek.php';
    ob_start();
	@session_start();
    $sid = session_id();
	if (empty($_SESSION['email_member']) AND empty($_SESSION['password_member'])) {
		echo"<script>document.location.href='login'</script>";
	}else{
		$member = mysqli_fetch_array(mysqli_query($koneksi,"SELECT id_member from member WHERE email='$_SESSION[email_member]' AND password='$_SESSION[password_member]'"));
    }
    ?>
<?php
	@session_start();
	$sid = session_id();
	include"aksikeranjang.php";
    include"config/konek.php";

    //update qty
    if (@$_GET['act']=='hapus') {
        $id = $_GET['id'];
        if (isset($_GET['id'])) {
                if (isset($_SESSION['items'][$id])) {
                    unset($_SESSION['items'][$id]);
                }
            }
        echo"<script>document.location.href='keranjang'</script>";
    }elseif (@$_GET['act']=='perbarui') {
        $id = $_POST['id'];
        @$jmldata = count(@$id);
        @$qty = $_POST['qty']; //ini kuantiti

        for ($i=0; $i < $jmldata; $i++) {
            $jml = $_POST['qty'][$i];
            $id = $_POST['id'][$i];
            $_SESSION['items'][$id] = $jml;
        }
        echo"<script>document.location.href='keranjang'</script>";
    }
?>
    <div class="container row">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr class="center">
                    <th>Judul gambar</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <form method="post" action="perbarui">
                    <?php
                $jml = count(@$_SESSION['items']);
                //jika keranjang kosong maka terlihat tabel
                if ($jml == 0) {
                    echo"<tr><td colspan='6'><center>Keranjang Anda Kosong!</center></td></tr>";
                }else{
                    $a = 1;
                    //print_r($_SESSION['items']);
            		foreach ($_SESSION['items'] as $key => $val) {
                        $gambar = mysqli_query($koneksi,"SELECT * from gallery WHERE id_gambar='$key'");
            			$dgambar = mysqli_fetch_array($gambar);
    					$harga = $dgambar['harga_pokok'];
                        $diskon = $dgambar['diskon']*$harga/100;
                        $harga_total = $harga - $diskon;
                        $harga_total_rp = number_format($harga_total,2,",",".");
    					$subtotal = $harga_total*$val;
    					$subtotal_rp = number_format($subtotal,2,",",".");
                        $ongkir = ($totalqty*5000);
                        $ongkir_rp = number_format($ongkir,2,",",".");
                        $total_semua = number_format($ongkir + @$total,2,",",".");
                        ?>

                        <tr>
                            <td class="td center">
                              <a href="lihatgambar-<?php echo $dgambar['id_gambar'];?>.html">
                                    <h4 class="judul-keranjang"><?php echo $dgambar['nama'];?></h4>
                              </a>
                               <?php 
                                    img("http://localhost/Project-dua/admin/image/$dgambar[gambar]",$dgambar['nama'],'','','foto materialboxed')
                                ?>
                            </td>
                            <td class="td">Rp
                                <?php echo $harga_total_rp?>
                            </td>
                            <td width='100px'><input type='number' name='qty[]' min='1' max="<?php echo $dgambar['stok']?>" value="<?php echo $val ?>" class='form-control'></td>
                            <input type='hidden' name='id[]' min='0' value="<?php echo $dgambar['id_gambar']?>">
                            <td class="td">Rp
                                <?php echo $subtotal_rp?>
                            </td>
                            <td width='30px'><a href='hapusgambar-<?php echo $dgambar['id_gambar']?>'><span class='fa fa-trash'></span></a></td>
                        </tr>
                        <?php
            		}
                    $a++;
                }
        	?>
                    <tr>
                        <th class="lebar"><a href=''><button class='btn btn-info'>Perbarui Keranjang</button></a></form></span>
                        <th class="lebar"><a href='home'><button class='btn btn-primary'>Lanjut Belanja</button></a></span>
                        <th class="lebar"><a href='checkout'><button class='btn btn-success'>Selesai Belanja</button></a></span>
                    </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col s8">

            </div>
            <div class="col s4">
                <table class="table table-bordered table-inverse">
                    <tr class="border">
                        <td>Subtotal : </td>
                        <td>
                            <?php echo "Rp $total_rp"; ?>
                        </td>
                    </tr>
                    <tr class="border">
                        <td>Ongkos Kirim : </td>
                        <td>
                            <?php echo "Rp ".@$ongkir_rp; ?>
                        </td>
                    </tr>
                    <tr class="border">
                        <td>Total : </td>
                        <td>
                            <?php echo "Rp".@$total_semua; ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
<?php
    mysqli_close($koneksi);
    ob_end_flush();
?>
