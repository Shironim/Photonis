<section id="questv2">
	<?php include "modul/questionv2.php";?>
</section>
<section id="address">
	<div class="row pm">
        <?php
        include 'config/konek.php';

        $contact = mysqli_query($koneksi,"SELECT * FROM contact");
        $dcontact = mysqli_fetch_array($contact);
        ?>
		<div class="col xl6 l6 m12 s12">
			<div class="pl100 po ">
				<h2>Contacts</h2>
				<p class="pt lr"><b>Address:</b><?php echo $dcontact['alamat']; ?></p>
				<p class="lr"><b>We are open:</b> Mon – Sun, 24/7</p>
				<p class="lr"><b>Phone:</b> <a href="#"><?php echo $dcontact['no_telp']; ?></a></p>
				<p class="lr"><b>E-mail:</b> <a href="#"><?php echo $dcontact['email']; ?></a></p>
			</div>
		</div>
		<div class="col xl6 l6 m12 s12 po">
			<h2 class="bt20">Find us</h2>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.9546370013213!2d110.41712341424655!3d-7.014617894933035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b78c6884c7b%3A0x9ea689ac6eaaafe1!2saDMs+Foto+Video!5e0!3m2!1sid!2sid!4v1502121381421"width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
</section>
