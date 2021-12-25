<?php
    include 'config/konek.php';
    $id = @$_GET['id'];
    $blog = mysqli_query($koneksi,"SELECT * FROM artikel WHERE id = '$id'");
    $dblog = mysqli_fetch_array($blog);
?>
<section>
    <div class="row container">
        <div class="col s12">
            <div class="">
                <span class="left"><?php echo $dblog['tgl']; ?></span>
                <span class="right"><?php echo $dblog['penulis']; ?></span>
                <div class="title col s12 center">
                    <h4>
                        <?php echo $dblog['judul']; ?>
                    </h4>
                </div>
                <div class="">
                    <figure>
                        <?php img("http://localhost/Project-dua/admin/image/$dblog[gambar]",$dblog['judul'],'','gal','foto mg materialboxed') ?>
                    </figure>
                    <div class="">
                        <p>
                            <?php echo $dblog['isi']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
