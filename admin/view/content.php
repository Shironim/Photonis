<?php
//permession upload
$_SESSION['KCFINDER'] = array();
$_SESSION['KCFINDER']['disabled'] = false;
$_SESSION['KCFINDER']['uploadURL'] = "../image/"; //sesuaikan dengan direkory kalian
$_SESSION['KCFINDER']['uploadDir'] = "";
?>

<?php
if (empty($_GET['act'])) {
    tampil();
} elseif ($_GET['act'] == 'tambah') {
    tambah();
} elseif ($_GET['act'] == 'edit') {
    edit();
} elseif ($_GET['act'] == 'hapus') {
    hapus();
} elseif ($_GET['act'] == 'cari') {
    cari();
}
?>
<?php function tampil()
{
    $base_url = "http://localhost/Project-dua/s-admin";
    $halaman = @$_GET['halaman'];
    $batas = 5;
    if (empty($halaman)) {
        $posisi = 0;
        $halaman = 1;
    } else {
        $posisi = ($halaman - 1) * $batas;
    }

?>
    <h1 class="title">Content</h1>
    <div class="badan">
        <div class="container">
            <h4 class="sub-title">Data Content</h4>
            <hr>
            <form class="right" action="?page=content&act=cari" method="post">
                <input type="text" name="keyword" placeholder="Cari Data">
                <input type="submit" name="cari" value="cari">
            </form>
            <a href="?page=content&act=tambah">
                <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
                <br>
                <span class="fan">input</span>
            </a>
            <br>
            <table class="table" id="table">
                <tr class="tampil">
                    <th>No</th>
                    <th>Judul</th>
                    <th>Di buat</th>
                    <th>Di edit</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php
                include '../config/konek.php';
                $no = 1 + $posisi;
                $query = mysqli_query($koneksi, "SELECT * FROM content ORDER BY judul LIMIT $posisi,$batas");
                while ($r = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $r['judul']; ?>
                        </td>
                        <td>
                            <?php echo $r['create_at']; ?>
                        </td>
                        <td>
                            <?php echo $r['update_at']; ?>
                        </td>
                        <td><a href="<?php echo $base_url; ?>?page=content&act=edit&id=<?php echo $r['id']; ?>"><i class="fa fa-pencil" title="edit"></i></a></td>
                        <td><a href="<?php echo $base_url; ?>?page=content&act=hapus&id=<?php echo $r['id']; ?>"><i class="fa fa-trash" title="hapus"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
            <div class="">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php
                        $hitungproduk = $koneksi->query("SELECT * FROM content");
                        $jmldata = mysqli_num_rows($hitungproduk);
                        $jmlhalaman = ceil($jmldata / $batas);
                        for ($i = 1; $i <= $jmlhalaman; $i++) {
                            if ($i != $halaman) {
                                echo "<li><a href='?page=content&halaman=$i'>$i</a></li>";
                            } else {
                                echo "<li class='active'><a href='?page=content&halaman=$i'>$i</a></li>";
                            }
                        }
                        ?>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
<?php } ?>
<?php function cari()
{
    $base_url = "http://localhost/Project-dua/s-admin";
?>
    <h1 class="title">Content</h1>
    <div class="badan">
        <div class="container">
            <h4 class="sub-title">Data Content</h4>
            <hr>
            <form class="right" action="?page=content&act=cari" method="post">
                <input type="text" name="keyword" placeholder="Cari Data">
                <input type="submit" name="cari" value="cari">
            </form>
            <br>
            <table class="table" id="table">
                <tr class="tampil">
                    <th>No</th>
                    <th>Judul</th>
                    <th>Di buat</th>
                    <th>Di edit</th>
                    <th colspan="2">Aksi</th>
                </tr>
                <?php
                include "../config/konek.php";
                $keyword = $_POST['keyword'];
                if ($keyword != '') {
                    $query = mysqli_query($koneksi, "SELECT * FROM content WHERE judul like '%" . $keyword . "%' OR isi like '%" . $keyword . "%'");
                } else {
                    $query = mysqli_query($koneksi, "SELECT * FROM content");
                }
                $no = 1;
                while ($r = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $r['judul']; ?>
                        </td>
                        <td>
                            <?php echo $r['create_at']; ?>
                        </td>
                        <td>
                            <?php echo $r['update_at']; ?>
                        </td>
                        <td><a href="<?php echo $base_url; ?>?page=content&act=edit&id=<?php echo $r['id']; ?>"><i class="fa fa-pencil" title="edit"></i></a></td>
                        <td><a href="<?php echo $base_url; ?>?page=content&act=hapus&id=<?php echo $r['id']; ?>"><i class="fa fa-trash" title="hapus"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>
<?php } ?>
<?php function tambah()
{
    // Load file koneksi.php
    include "../config/konek.php"; ?>
    <!-- <script type="text/javascript" src="http://localhost/Project-dua/admin/tinymce/js/tinymce/tinymce.min.js"></script> -->
    <!-- <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            plugins: [
                " autolink lists link image preview hr anchor ",
                " wordcount code ",
                "insertdatetime media save table directionality",
                " template paste "
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor",
            image_advtab: true
        });
    </script> -->
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td>Judul</td>
                    <td class="left"><input type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>Isi</td>
                    <td class="left"><textarea name="isi" rows="8" cols="80"></textarea></td>
                </tr>
                <tr>
                    <td>Menu</td>
                    <td class="left">
                        <select class="" name="navigasi">
                            <option value="">Menu</option>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT id,nama from navigasi where type = 'content'");
                            while ($nav = mysqli_fetch_array($query)) { ?>
                                <option value=<?php echo $nav['id'] ?>><?php echo $nav['nama']; ?>
                                <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="file" name="gambar"></td>
                </tr>
            </table>
            <hr>
            <input type="submit" name="tambah" value="tambah">
            <button type="reset" value="reset">batal</button>
        </form>
        <?php
        if (isset($_POST['tambah'])) {
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $gambar = $_FILES['gambar']['name'];
            $tmp = $_FILES['gambar']['tmp_name'];
            $path = "../admin/image/" . $gambar;

            move_uploaded_file($tmp, $path);
            $querytambah = mysqli_query($koneksi, "INSERT INTO content (judul,isi,gambar,create_at)
			VALUES('$judul','$isi','$gambar',NOW())") or die(mysqli_error($koneksi));
            if ($querytambah) { // Cek jika proses simpan ke database sukses atau tidak
                // Jika Sukses, Lakukan :
                echo "<script>document.location.href='?page=content'</script>"; // Redirect ke halaman content
            } else {
                echo "Upss Something wrong..";
            }
        }
        ?>
    </div>
<?php } ?>
<?php function edit()
{
    include "../config/konek.php";
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM content WHERE id = '" . $_GET['id'] . "'");
    $res = mysqli_fetch_array($query);
?>
    <script type="text/javascript" src="http://localhost/Project-dua/admin/tinymce/js/tinymce/tinymce.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true
        });
    </script>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <table>
                <tr>
                    <th>Judul</th>
                    <td class="left"><input type="text" name="judul" value="<?php echo $res['judul'] ?> " /></td>
                </tr>
                <tr>
                    <th>Isi</th>
                    <td class="left"><textarea name="isi" rows="8" cols="80"><?php echo $res['isi'] ?></textarea></td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td class="left"><input class="col-md-6" type="file" name="gambar" /><img class="col-md-5" src='http://localhost/Project-dua/admin/image/<?php echo $res['gambar']; ?>' width='100' height='100'></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="edit" value="Perbarui">
            <button type="reset" value="Reset">Reset</button>
        </form>
    </div>
    <?php
    if (isset($_POST['edit'])) {
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $gambar = $_FILES['gambar']['name'];
        $tmp = $_FILES['gambar']['tmp_name'];
        $path = "../admin/image/";

        if ($gambar != '') {
            move_uploaded_file($tmp, $path . $gambar);
            $queryupdate = mysqli_query($koneksi, "UPDATE content SET
				 		judul = '$judul',
				 		isi = '$isi',
				 		gambar = '$gambar',
				 		update_at = NOW()
				 		WHERE id = '" . $_GET['id'] . "'");
            if ($queryupdate) {
                echo "berhasil update";
                echo "<script>document.location.href='?page=content'</script>";
            } else {
                echo "gagal update";
            }
        } else {
            $queryupdate = mysqli_query($koneksi, "UPDATE content SET
				 		judul = '$judul',
				 		isi = '$isi',
				 		update_at = NOW()
				 		WHERE id = '" . $_GET['id'] . "'");
            if ($queryupdate) {
                echo "berhasil update";
                echo "<script>document.location.href='?page=content'</script>";
            } else {
                echo "gagal update";
            }
        }
    }
    ?>
<?php } ?>
<?php function hapus()
{
    include "../config/konek.php";
    $id = $_GET['id'];

    $queryhapus = mysqli_query($koneksi, "DELETE FROM content WHERE id = '" . $_GET['id'] . "'");
    if ($queryhapus) {
        echo "<script>document.location.href='?page=content'</script>";
    } else {
        echo "Upss Something wrong..";
    }
}
?>