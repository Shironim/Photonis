<?php

    include 'config/konek.php';
    $page = $_GET['page'];
    $content = mysqli_query($koneksi,"SELECT * FROM content WHERE link = '$page'");
    $datcontent = mysqli_fetch_array($content);

    echo $datcontent['isi'];
?>
