<?php
include "../config/konek.php";
//data member
$jumlah_member = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM member"));
//data pesanan
$jumlah_pesanan = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM penjualan"));
//jumlah foto
$jumlah_foto = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM gallery"));
//jumlah pengunjung
$pengunjung = mysqli_query($koneksi,"SELECT * FROM pengunjung");
while($visit = mysqli_fetch_array($pengunjung)){
    $jml = $visit['jumlah'];
    @$jumlah = $jumlah + $jml;
}
?>
<div class="badan" style="padding-top:30px;">
   <div class="col-md-12">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $jumlah_pesanan;?></h3>

                    <p>Pesanan</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $jumlah_foto;?></h3>

                    <p>Foto</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-image"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $jumlah_member;?></h3>

                    <p>Member</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-person-add"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $jumlah;?></h3>

                    <p>Pengunjung</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-people"></i>
                </div>
            </div>
        </div>
   </div>
