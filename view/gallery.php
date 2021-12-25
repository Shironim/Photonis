<section id="gal">
	<div class="row">
		<div class="relative media">
			<img class="im" src="<?php echo $base_url;?>image/popo.jpg">
		</div>
		<div class="absolute media center ">
			<h3 class="white-text po">Our Gallery</h3>
		</div>
		<div class="media pt90 pb">
			<div class="lr">
                <?php
                    include 'config/konek.php';
                    $album = mysqli_query($koneksi,"SELECT * FROM album");
                    while ($dalbum = mysqli_fetch_array($album)) {?>
				<div class="col xl4 l4 m12 s12 pm p0 lr15">
					<figure class="">
                        <?php img("http://localhost/Project-dua/admin/image/$dalbum[gambar]",$dalbum['nama'],$dalbum['caption'],'gal','mg materialboxed') ?>
					</figure>
				</div>
            <?php } ?>
			</div>
		</div>
	</div>
</section>
