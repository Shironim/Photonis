<div class="row center media po">
	<h3>Testimonials</h3>
	<div class="mt">
        <?php
            include 'config/konek.php';
            $testi = mysqli_query($koneksi,"SELECT * FROM testimoni");
            while ($dtesti = mysqli_fetch_array($testi)) {
        ?>
		<div class="col xl6 l7 m12 s12 border-right">
			<figure>
                <?php img("http://localhost/Project-dua/admin/image/$dtesti[gambar]",$dtesti['nama'],'','testimony','');?>
			</figure>
			<figcaption class="center media">
				 <i class="material-icons">format_quote</i>
				<p><?php echo $dtesti['isi']; ?></p>
				<h5><?php echo $dtesti['nama']; ?></h5>
			</figcaption>
		</div>
    <?php } ?>
	</div>
</div>
