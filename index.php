<?php
session_start();
$sid = session_id();

$base_url = "http://localhost/Project-dua/";
include 'config/config.php';
include 'config/konek.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equive="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Dua</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600|Lato:400,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body>
    <header>
        <?php
        include "view/header.php"; ?>
        <?php
        @$jml = count($_SESSION['items']);
        if ($jml == 0) {
            $total_rp = 0;
            $totalqty = 0;
        } else {
            foreach ($_SESSION['items'] as $key => $val) {
                $gambar = mysqli_query($koneksi, "SELECT * from gallery WHERE id_gambar='$key'");
                $dgambar = mysqli_fetch_array($gambar);
                $qty = $val;
                @$totalqty = $totalqty + $qty;
                $harga = $dgambar['harga_pokok'];
                $diskon = $dgambar['diskon'] * $harga / 100;
                $harga_total = $harga - $diskon;
                $harga_rp = number_format($harga_total, 2, ",", ".");
                $subtotal = $harga_total * $val;
                $subtotal_rp = number_format($subtotal, 2, ",", ".");
                @$total = $total + $subtotal;
                @$total_rp = number_format($total, 2, ",", ".");
            }
        }
        ?>
        <div style="text-align:right;padding-right:30px;">
            <b>Selamat Datang Di Toko gambar Kami</b><br>
            <?php echo "Rp $total_rp"; ?>(s) -
            <?php echo "$totalqty gambar"; ?>
        </div>
    </header>
    <main>
        <section>
            <?php include "modul/navigasi.php"; ?>
        </section>
        <?php
        include 'config/konek.php';
        $page = $_GET['page'];
        $query = mysqli_query($koneksi, "SELECT id FROM navigasi where link = '$page'");
        $datcontent = mysqli_fetch_array($query);

        $content = mysqli_query($koneksi, "SELECT * FROM content where id_menu = '$datcontent[id]'");
        $type = mysqli_fetch_array(mysqli_query($koneksi, "SELECT type from navigasi where link = '$page'"));
        if ($type['type'] == 'content') {
            include 'content.php';
        } else {
            include 'view/' . $page . '.php';
        }


        // if (empty($_GET['page'])||$_GET['page']=="home") {
        //  	include "view/home.php";
        //  }else
        // if ($_GET['page']=="about-us") {
        //  	include 'view/about.php';
        //  }else
        // if ($_GET['page']=="service") {
        // 	include 'view/service.php';
        // }else
        // if ($_GET['page']=="gallery") {
        // 	include 'view/gallery.php';
        // }else
        // if ($_GET['page']=="blog") {
        // 	include 'view/blog.php';
        // }else
        // if ($_GET['page']=="contact-us") {
        // 	include 'view/contact.php';
        // }else
        // if ($_GET['page']=="lihat") {
        //     include 'view/lihatblog.php';
        // }else
        // if ($_GET['page']=="logout") {
        //     include 'logout.php';
        // }else
        // if ($_GET['page']=="lihatgambar") {
        //     include 'view/lihatgambar.php';
        // }
        ?>
    </main>
    <footer>
        <?php
        include "view/footer.php";
        ?>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url; ?>assets/js/style.js"></script>

</body>

</html>