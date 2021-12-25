<?php

    if (empty($_GET['act'])) {
        tampil();
    }
    elseif ($_GET['act'] == 'tambah') {
        tambah();
    }
    elseif ($_GET['act'] == 'edit') {
        edit();
    }
    elseif ($_GET['act'] == 'hapus') {
        hapus();
    }

?>
<?php function tampil(){
    $base_url = "http://localhost/Project-dua/s-admin"
    ?>
    <h1 class="title">Testimoni</h1>
    <div class="badan">
    <div class="container">
       <h4 class="sub-title">Data Testimoni</h4>
       <hr>
        <a href="?page=testimoni&act=tambah">
            <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
            <br>
            <span class="fan">input</span>
        </a>
        <br>
        <form action="" method="post">
            <table class="table" id="table">
                <tr class="tampil">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Testimoni</th>
                    <th colspan="2" class="mepet">Aksi</th>
                </tr>
                <?php
                include '../config/konek.php';
                $query = mysqli_query($koneksi,"SELECT * FROM testimoni") or die(mysqli_error());
                if (mysqli_num_rows($query) == 0 ) {
                    echo "<b>Tidak ada data</b>";
                }else {
                    $no = 1;
                    while ($r = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $r['nama']; ?></td>
                        <td><?php echo $r['isi']; ?></td>
                        <td><a href="<?php echo $base_url;?>?page=testimoni&act=edit&id=<?php echo $r['id'] ?>"><i class="fa fa-pencil" title="edit"></i></a></td>
    					<td><a href="<?php echo $base_url;?>?page=testimoni&act=hapus&id=<?php echo $r['id'] ?>"><i class="fa fa-trash" title="hapus"></i></a></td>
                    </tr>
                    <?php
                endwhile;
                }
             ?>
            </table>
        </form>
    </div>
    </div>
<?php } ?>
<?php function tambah(){
    include '../config/konek.php'; ?>
    <div class="">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td class="left"><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <th>Testimoni</th>
                    <td class="left"><textarea name="isi" rows="8" cols="80"></textarea></td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td class="left"><input type="file" name="gambar"></td>
                </tr>
            </table>
            <input type="submit" name="tambah" value="Tambah"></input>
            <input type="reset" name="reset" value="Batal"></input>
        </form>
        <?php
            if (isset($_POST['tambah'])) {
                $nama = $_POST['nama'];
                $isi = $_POST['isi'];
                $gambar = $_FILES['gambar']['name'];
                $tmp = $_FILES['gambar']['tmp_name'];
                $path = "../admin/image/".$gambar;

                move_uploaded_file($tmp, $path);
                $query = mysqli_query($koneksi, "INSERT INTO testimoni (nama,isi,gambar,tgl)
                VALUES ('$nama','$isi','$gambar',NOW())") or die(mysqli_error());
                if ($query) { // jika query berhasil
                    echo "Berhasil Menambahkan";
                    echo "<script>document.location.href='?page=testimoni'</script>";
                }else {
                    echo "Gagal Menambahkan";
                }
            }
        ?>
    </div>
<?php } ?>
<?php function edit(){
    include '../config/konek.php';
    $id = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT * FROM testimoni WHERE id = '".$_GET['id']."'") or die(mysqli_error());
    $res = mysqli_fetch_array($query);
 ?>
 <div class="">
     <form action="" method="post" enctype="multipart/form-data">
         <table>
            <tr>
                 <th>Nama</th>
                 <td class="left"><input type="text" name="nama" value="<?php echo $res['nama'] ?> " /></td>
            </tr>
            <tr>
                <th>Testimoni</th>
                 <td class="left">
                     <textarea id='isi' name="isi" rows="8" cols="80"><?php echo $res['isi'] ?></textarea>
                 </td>
            </tr>
            <tr>
                <th>Gambar</th>
                <td class="left"><input class="col-md-6 m6" type="file" name="gambar"><img class="col-md-5 m5" src='http://localhost/Project-dua/admin/image/<?php echo $res['gambar']; ?>'width='100' height='100'></td>
            </tr>
         </table>
        <input type="submit" name="edit" value="Perbarui">
        <input type="reset" name="reset" value="Batal">
     </form>
     <?php
        if (isset($_POST['edit'])) {
            $nama = $_POST['nama'];
            $isi = $_POST['isi'];
            $gambar = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];
            $path = "../admin/image/".$gambar;

            if ($gambar != '') {
                move_uploaded_file($tmp,$path);
                $query = mysqli_query($koneksi,"UPDATE testimoni SET
                    nama = '$nama',
                    isi = '$isi',
                    gambar = '$gambar'
                    WHERE id = '".$_GET['id']."'");
                if ($query) {
                    echo "Berhasil Menambahkan";
                    echo "<script>document.location.href='?page=testimoni'</script>";
                }else {
                    echo "Gagal Menambahkan";
                }
            }else {
                $query = mysqli_query($koneksi,"UPDATE testimoni SET
                    nama = '$nama',
                    isi = '$isi'
                    WHERE id = '".$_GET['id']."'");
                    if ($query) {
                        echo "Berhasil Menambahkan";
                        echo "<script>document.location.href='?page=testimoni'</script>";
                    }else {
                        echo "Gagal Menambahkan";
                    }
            }
        }
     ?>
 </div>
 <?php } ?>
 <?php function hapus(){
     include '../config/konek.php';
     $id = $_GET['id'];
    $queryhapus = mysqli_query($koneksi,"DELETE FROM testimoni WHERE id = $id");
    if ($queryhapus) {
        echo "<script>document.location.href='?page=testimoni'</script>";
    }else {
        echo "Gagal Hapus";
    }
      ?>
<?php } ?>
