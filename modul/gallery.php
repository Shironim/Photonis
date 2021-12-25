<div class="row col s12 up">
	<div class="center">
				<h3>Capturing your most precious moments</h3>
				<p class="pt">Are you planning a special event ? We will make it a part of the history. <br>
					Experience the joyful moments of the special day again and again.</p>
	</div>
	<div class="lr">
		<div class="po">
            <?php
            include "config/konek.php";
                $foto = mysqli_query($koneksi, "SELECT * FROM gallery");
                while ($dfoto = mysqli_fetch_array($foto)) { 
                ?>
			<div class="col xl4 l4 m12 s12 pm lr15">
				<figure>
					<a href="service">
                        <?php img("http://localhost/Project-dua/admin/image/$dfoto[gambar]",$dfoto['nama'],$dfoto['nama'],'gallery','foto');?>
                    </a>
				</figure>
				<figcaption class="center bg">
                    <a href="lihatgambar-<?php echo $dfoto['id_gambar']?>.html">
                       <h4><?php echo $dfoto['nama']; ?></h4>
                       <span class="center beli">Beli</span>
                    </a>
				</figcaption>

			</div>
        <?php } ?>
		</div>
	</div>
</div>
