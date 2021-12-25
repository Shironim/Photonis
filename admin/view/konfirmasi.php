<?php
if(empty($_GET['act'])){
    tampil();
}else
if($_GET['act']=='confirm'){
    konfirmasi();
}
?>

<?php function tampil(){
    $base_url = "http://localhost/Project-dua/s-admin";
?>
<h1 class="title">Konfirmasi</h1>
<div class="badan">
    <div class="container">
        <h4 class="sub-title">Data Konfirmasi</h4>
        <hr>
        <form action="" method="post">
            <table id="table" class="table">
                <tr class="tampil">
                    <th>No</th>
                    <th>Penjual</th>
                    <th>Status</th>
                    <th>Konfirmasi</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                <?php
                $no = 1;
                include "../config/konek.php";
                $data = mysqli_query($koneksi,"SELECT * FROM penjualan WHERE status = 'PR' OR status = 'TY'");
                while($ddata = mysqli_fetch_array($data)){
                $akun = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM akun WHERE id = '$ddata[id_kasir]'"));
                    if ($ddata['status']=='MP') {
                        $status = "Menunggu Pembayaran";
                    }elseif ($ddata['status']=='B') {
                        $status = "Blokir";
                    }elseif ($ddata['status']=='PR') {
                        $status = "Proses";
                        $konfirmasi = "Belum Dikonfirmasi";
                    }elseif ($ddata['status']=='TY'){
                        $status = "Telah Dibayar";
                        $konfirmasi = "Terkonfirmasi";
                    }
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $akun['username']?></td>
                    <td><?php echo $status?></td>
                    <td><?php echo $konfirmasi;?></td>
                    <td><?php echo $ddata['tanggal']?></td>
                    <td><a href="<?php echo $base_url;?>?page=konfirmasi&act=confirm&id=<?php echo $ddata['id_penjualan']?>"><i class="fa fa-pencil"></i></a></td>
                </tr>
                <?php }?>
            </table>
        </form>
    </div>
</div>
<?php }?>
<?php function konfirmasi(){?>
<h1 class="title">Konfirmasi</h1>
<div class="badan">
    <div class="container">
        <h4 class="sub-title">Data Konfirmasi</h4>
        <hr>
        <form action="" method="post">
           <?php
                $no = 1;
                include "../config/konek.php";
                $id = $_GET['id'];
                $ddata = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM penjualan WHERE id_penjualan = '$id'"));
                $akun = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM akun WHERE id = '$ddata[id_kasir]'"));
                    if ($ddata['status']=='MP') {
                        $status = "Menunggu Pembayaran";
                    }elseif ($ddata['status']=='B') {
                        $status = "Blokir";
                    }elseif ($ddata['status']=='PR') {
                        $status = "Proses";
                    }elseif ($ddata['status']=='TD') {
                        $status = "Tidak Dibayar";
                        $konfirmasi = "Belum Dikonfirmasi";
                    }elseif ($ddata['status']=='TY'){
                        $status = "Telah Dibayar";
                        $konfirmasi = "Terkonfirmasi";
                    }
                ?>
            <div class="col-md-3">
                <label class="lebel">Penjual</label>
                <input type="text" name="penjual" value="<?php echo $akun['username']?>" disabled>
            </div>
            <?php
                if($ddata['status']=='TY'){
                    $kondisi = 'disabled';
                }
                ?>
            <div class="col-md-3">
                <label class="lebel">Status</label>
                <select name="status" <?php echo $kondisi?>>
                    <option value="PR"<?php if(empty($ddata)){echo "selected";}?>>Proses</option>
                    <option value="TY"<?php if($ddata['status']=='TY'){echo "selected";}?>>Telah Dibayar</option>
                </select>
            </div>
            <div class="col-md-3">
               <label class="lebel">Konfirmasi</label>
               <select name="konfirmasi" id="" <?php echo $kondisi?>>
                   <option value="TY" >Terkonfirmasi</option>
               </select>
            </div>
            <div class="col-md-3">
                <input type="submit" name="update" value="Perbarui">
            </div>
        </form>
        <?php
            if(isset($_POST['update'])){
                $status = $_POST['status'];
                
                $update = mysqli_query($koneksi,"UPDATE penjualan SET status = '$status' WHERE id_penjualan = '$id'");
                                
                if($update){
                    echo "<script>alert('Data Berhasil Di Konfirmasi');document.location.href='?page=konfirmasi'</script>";
                }else{
                    echo "gagal";
                }
            }
            ?>
    </div>
</div>
<?php }?>