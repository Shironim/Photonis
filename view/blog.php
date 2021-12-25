<section id="blog" class="row">
	<div class="container pt90">
        <?php
            include 'config/konek.php';

            $art = mysqli_query($koneksi,"SELECT * FROM artikel ORDER BY id DESC");
            $no = 1;
            while ($dart = mysqli_fetch_array($art)) {?>
			<div class="section col xl10">
				<h3><?php echo $dart['judul']; ?></h3>
				<p><i class="material-icons">date_range</i><?php echo $dart['tgl']; ?></p>
				<a href="lihatblog-<?php echo $dart['id']?>.html">
                    <figure style="width:100%">
    					<?php img("http://localhost/project-dua/admin/image/$dart[gambar]",$dart['judul'],'','artikel','img') ?>
    				</figure>
				</a>
				<p class="col xl11 pm">
					<?php echo $dart['isi']; ?>
				</p>
				<div class="pb pt">
					<a href="lihatblog-<?php echo $dart['id']?>.html"><b>MORE</b></a>
				</div>
				<div class="divider <?php echo $no++?>"></div>
			</div>
        <?php } ?>
	</div>
</section>
