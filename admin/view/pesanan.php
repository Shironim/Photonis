<?php
    if(empty($_GET['act'])){
        tampil();
    }else
    if($_GET['act']=='terima'){
        terima();
    }
    ?>
    <?php function tampil(){ 
$base_url = "http://localhost/Project-dua/s-admin";
?>
    <h1 class="title">Pesanan</h1>
    <div class="badan">
        <div class="container">
            <h4 class="sub-title">Data Pesanan</h4>
            <hr>
            <form method="post" action="">
               <br>
                <table id="table" class="table">
                    <tr class="tampil">
                        <th>NO</th>
                        <th>Nama Member</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
            include "../config/konek.php";
            $no = 1;
            $data = mysqli_query($koneksi,"SELECT * FROM penjualan ORDER BY tanggal ");
            while($ddata = mysqli_fetch_array($data)){
            $member = mysqli_fetch_array(mysqli_query($koneksi,"SELECT nama FROM member WHERE id_member = '$ddata[id_member]'"));
            $total = number_format($ddata['total'],0,".",".");
                if ($ddata['status']=='MP') {
                    $status = "Menunggu Pembayaran";
                }elseif ($ddata['status']=='B') {
                    $status = "Blokir";
                }elseif ($ddata['status']=='PR') {
                    $status = "Proses";
                }elseif ($ddata['status']=='TD') {
                    $status = "Tidak Dibayar";
                }elseif ($ddata['status']=='TY'){
                    $status = "Telah Dibayar";
                }
            ?>
                        <tr>
                            <td>
                                <?php echo $no++;?>
                            </td>
                            <td>
                                <?php echo $member['nama']?>
                            </td>
                            <td>
                                <?php echo $ddata['tanggal']?>
                            </td>
                            <td>
                                <?php echo $ddata['jam']?>
                            </td>
                            <td>
                                <?php echo $total?>
                            </td>
                            <td>
                                <?php echo $status?>
                            </td>
                            <td><a href='<?php echo $base_url?>?page=pesanan&act=terima&id=<?php echo $ddata['id_penjualan']?>'><i class="fa fa-pencil" title="edit"></i></a></td>
                        </tr>
                        <?php }?>
                </table>
            </form>
        </div>
    </div>
    <?php }?>
<?php function terima(){
    include "../config/konek.php";
    //data login
    $datalogin = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM akun WHERE username = '$_SESSION[username_admin]' AND password = '$_SESSION[password_admin]'"));
    // tampil data pesanan
    $pesanan = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM penjualan WHERE id_penjualan='$_GET[id]'"));
    $member = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM member WHERE id_member = '$pesanan[id_member]'"));
    //jika sudah Diproses
        if($pesanan['status']=='PR'){
            $disabled = "disabled";
            $blok = "readonly";
        }
    ?>
    <h1 class="title">Pesanan</h1>
    <div class="badan">
        <div class="container">
            <h4 class="sub-title">Data Pesanan</h4>
            <hr>
            <form action="" method="post">
                <div class="col-md-12">
                    <div class="col-md-3 batas">
                        <label class="lebel">Nomor Order</label>
                        <input type="text" class="input" value="<?php echo $pesanan['id_penjualan'];?>" readonly>
                    </div>
                    <div class="col-md-3 batas">
                        <label class="lebel">Tanggal</label>
                        <input type="text" class="input" value="<?php echo $pesanan['tanggal'];?>" readonly>
                    </div>
                    <div class="col-md-3 batas">
                        <label class="lebel">Keputusan</label>
                        <select name="status" id="">
                            <option value="" <?php if(empty($pesanan['status'])){echo"selected";}?>>Menunggu Pembayaran</option>
                            <option value="PR" <?php if($pesanan['status']=='PR'){echo"selected";}?>>Proses</option>
                        </select>
                    </div>
                    <div class="col-md-3 batas">
                        <label class="lebel">&nbsp;</label>
                        <input type="submit" name="perbarui" value="Perbarui" <?php echo @$disabled;?>                        
                    </div>
                </div>
            </form>
            <?php
                include "../config/konek.php";
                if(isset($_POST['perbarui'])){
                    $status = $_POST['status'];
                    $no = $pesanan['id_penjualan'];
                    if($status == 'TD'){
                        NULL;
                    }else{
                        //stok berkurang
                        $data = mysqli_query($koneksi,"SELECT * FROM detail_penjualan WHERE id_penjualan = '$no'");
                        while($ddata = mysqli_fetch_array($data)){
                            $gambar = mysqli_query($koneksi,"SELECT * FROM gallery WHERE id_gambar = '$ddata[id_gambar]'");
                            while($dgambar = mysqli_fetch_array($gambar)){
                                $stok = $dgambar['stok'];
                                $stok_kurang = $stok - $ddata['jumlah'];
                                $dijual = $dgambar['dijual'] + $ddata['jumlah'];
                                
                                mysqli_query($koneksi,"UPDATE gallery SET 
                                stok='$stok_kurang',
                                dijual='$dijual'
                                WHERE id_gambar = '$ddata[id_gambar]'");
                            }
                        }
                    }
                    $update = mysqli_query($koneksi,"UPDATE penjualan SET 
                    status = '$status',
                    id_kasir = '$datalogin[id]'
                    WHERE id_penjualan = '$no'");
                    if($status == 'PR'){
                        $status = "Proses";
                    }
                    if($update){
                        echo "<script>alert('No Order $no $status');document.location.href='?page=pesanan'</script>";
                    }else{
                        echo "Gagal";
                    }
                }
            ?>
            <table class="table" id="table">
                <tr class="tampil">
                    <th>No</th>
                    <th>Judul Gambar</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
                <?php
                    $no = 1;
                    include "../config/konek.php";
                    $detail = mysqli_query($koneksi,"SELECT * FROM detail_penjualan WHERE id_penjualan = '$_GET[id]'");
                    while($ddetail = mysqli_fetch_array($detail)){
                        $dgambar = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM gallery WHERE id_gambar = '$ddetail[id_gambar]'"));
                        $harga = $dgambar['harga_pokok'];
                        $harga_rp = number_format($harga,0,0,".");
                        $sub_total_harga = $ddetail['total_harga'];
                        $sub_total_harga_rp = number_format($sub_total_harga,0,0,".");
                        $total_harga = $pesanan['total'];
                        $total_harga_rp = number_format($total_harga,0,".",".");
                        $qty = $ddetail['jumlah'];
                ?>
                <tr>
                    <th>
                        <?php echo $no++;?>
                    </th>
                    <th>
                        <?php echo $dgambar['nama']?>
                    </th>
                    <th>
                        <?php echo $ddetail['jumlah']." Bingkai"?>
                    </th>
                    <th>
                        <?php echo "Rp. $harga_rp"?>
                    </th>
                    <th>
                        <?php echo "Rp. $sub_total_harga_rp"?>
                    </th>
                </tr>
                <?php }?>
                <tr>
                    <td colspan="3"></td>
                    <td>Total + Ongkir</td>
                    <td><?php echo $total_harga_rp?></td>
                </tr>
            </table>
            <br>
            <table class="table" id="table">
                <tr>
                    <th class="mepet">Nama Member :</th>
                    <th class="left"><?php echo $member['nama']?></th>
                </tr>
                <tr>
                    <th class="mepet">Alamat Pengiriman :</th>
                    <th class="left"><?php echo $member['alamat']?></th>
                </tr>
                <tr>
                    <th class="mepet">Email :</th>
                    <th class="left"><?php echo $member['email']?></th>
                </tr>
                <tr>
                    <th class="mepet">Nomor Telepon :</th>
                    <th class="left"><?php echo $member['telepon']?></th>
                </tr>
            </table>
        </div>
    </div>
<?php }?>