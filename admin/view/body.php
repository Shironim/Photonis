<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        //memanggil file file yang sudah dibuat
        if (empty($_GET['page'])) {
            include "view/dashboard.php";
        }else
        if ($_GET['page']=='dashboard') {
            include 'view/dashboard.php';
        }else
        if ($_GET['page']=="metadata") {
            include "view/metadata.php";
        }else
        if ($_GET['page']=="artikel") {
            include "view/artikel.php";
        }else
        if ($_GET['page']=="content") {
            include "view/content.php";
        }else
        if ($_GET['page']=="gallery") {
            include "view/gallery.php";
        }else
        if ($_GET['page']=="navigasi") {
            include "view/navigasi.php";
        }else
        if ($_GET['page']=="pesan") {
            include 'view/pesan.php';
        }else
        if ($_GET['page']=="testimoni") {
            include 'view/testimoni.php';
        }else
        if ($_GET['page']=="album") {
            include 'view/album.php';
        }else
        if ($_GET['page']=='subscribe') {
            include 'view/subscribe.php';
        }else
        if ($_GET['page']=='contact') {
            include 'view/contact.php';
        }else
        if ($_GET['page']=='member') {
            include 'view/member.php';
        }else
        if ($_GET['page']=='pesanan') {
            include 'view/pesanan.php';
        }else
        if ($_GET['page']=='distributor') {
            include 'view/distributor.php';
        }else
        if ($_GET['page']=='pasok') {
            include 'view/pasok.php';
        }else
        if ($_GET['page']=='penjualan') {
            include 'view/penjualan.php';
        }else
        if ($_GET['page']=='konfirmasi') {
            include 'view/konfirmasi.php';
        }else
        if ($_GET['page']=='kasir') {
            include 'view/kasir.php';
        }
    //    include "".$_GET['page'].".php";
     ?>
    </section>


    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
