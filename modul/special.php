<div>
	<div class=" media">
      	<img class="responsive-img gb media" src="<?php echo $base_url;?>image/pass.jpg">
		<div class="absolute media pt90">
			<div>
				<h3 class="white-text">Making something special</h3>
				<p class="white-text">A photo can reveal more about a person than you might have thought.<br>Just like looking in the eyes, photography can reveal your soul.</p>
			</div>
			<div class="pm">
                <?php
                include 'config/konek.php';
                if (isset($_POST['subscribe'])) {
                    $email = $_POST['email'];
                    $queri = mysqli_query($koneksi,"INSERT INTO subscribe (email,tgl) VALUES ('$email',NOW())");}?>
			    <form method="post" action="" class="col s12">
				      <div class="col s9 media display-flex">
				        <div class="input-field col s8">
				          <input id="icon_prefix" name="email" type="text" class="validate">
                          <label for="icon_prefix">Email Anda</label>
				        </div>
				    </div>
                    <div class="display-flex media pt">
                        <input type="submit" name="subscribe" value="SUBSCRIBE">
                    </div>
				</form>
            <?php  ?>
			</div>
		</div>
	</div>
</div>
