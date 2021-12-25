<div class="row col s12 po media">
	<div class="center">
		<h3>Latest Projects</h3>
	</div>
		<div class="lr">
            <?php
                include 'config/konek.php';
                $artikel = mysqli_query($koneksi, "SELECT * FROM artikel LIMIT 3");
                while ($dartikel = mysqli_fetch_array($artikel)) { ?>
    			<div class="col xl4 l4 m10 s12 pd">
    				<div>
    					<h5><?php echo $dartikel['judul']; ?></h5>
    				</div>
    				<a href="blog">
                        <div>
                    	<?php img ("http://localhost/Project-dua/admin/image/$dartikel[gambar]",$dartikel['judul'],'','artikel','') ?>
        				</div>
    				</a>
    				<figcaption>
    					<?php echo $dartikel['isi']; ?>
    				</figcaption>
    			</div>
            <?php } ?>
		</div>
</div>
