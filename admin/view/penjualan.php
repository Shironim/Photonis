<?php
    if(empty($_GET['act'])){
        tampil();
    }else
    if($_GET['act']=='hapus'){
        hapus();
    }
?>


<?php function tampil(){
$base_url = "http://localhost/Project-dua/s-admin";
?>
    <h1 class="title">Penjualan</h1>
    <div class="badan">
        <div class="container">
            <h4 class="sub-title">Data Penjualan Foto</h4>
            <hr>
            <form action="" method="post">
                <table class="table" id="table">
                    <tr class="tampil">
                        <th>NO</th>
                        <th>Nama Member</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Petugas Kasir</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    include "../config/konek.php";
                    //menampilkan data pasok
                    $no = 1;
                    $penjualan =  mysqli_query($koneksi,"SELECT * from penjualan");
                    while($dpenjualan = mysqli_fetch_array($penjualan)){
                        $dmember = mysqli_fetch_array(mysqli_query($koneksi,"SELECT nama FROM member 
                        WHERE id_member = '$dpenjualan[id_member]'"));
                        $dkasir = mysqli_fetch_array(mysqli_query($koneksi,"SELECT username FROM akun 
                        WHERE id = '$dpenjualan[id_kasir]'"));
                        //status
                        if ($dpenjualan['status']=='MP') {
                            $status = "Menunggu Pembayaran";
                        }elseif ($dpenjualan['status']=='B') {
                            $status = "Blokir";
                        }elseif ($dpenjualan['status']=='PR') {
                            $status = "Proses";
                        }elseif ($ddata['status']=='TD') {
                            $status = "Tidak Dibayar";
                        }elseif ($ddata['status']=='TY'){
                            $status = "Telah Dibayar";
                        }
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $dmember['nama']?></td>
                        <td><?php echo $dpenjualan['alamat']?></td>
                        <td><?php echo $dpenjualan['tanggal']?></td>
                        <td><?php echo $dpenjualan['status']?></td>
                        <td><?php echo $dkasir['username']?></td>
                        <td><a href="<?php echo $base_url;?>?page=penjualan&act=hapus&id=<?php echo $dpenjualan['id_penjualan']?>"><i class="fa fa-trash" title="hapus"></i></a></td>
                    </tr>
                    <?php }?>
                </table>
            </form>
        </div>
    </div>
<?php }?>
<?php function hapus(){
    
    include "../config/konek.php";
    $id = $_GET['id'];
    $hapus = mysqli_query($koneksi,"DELETE FROM penjualan WHERE id_penjualan = '$id'");
    if($hapus){
        echo "<script>alert('Berhasil Menghapus');document.location.href='?page=penjualan'</script>";
    }else{
        echo "Gagal";
    }
    }
?>