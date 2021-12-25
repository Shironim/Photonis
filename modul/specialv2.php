<div id="parallax">
		<div class="parallax-container media">
		      <div class="parallax">
		      	<img src="<?php echo $base_url;?>image/parallax-specialv2.jpg">
		      </div>
		</div>
	<div>
		<div>
			<div class="absolute media pt90">
				<div>
					<h3 class="white-text">Making something special</h3>
					<h6 class="white-text">A photo can reveal more about a person than you might have thought.<br>Just like looking in the eyes, photography can reveal your soul.</h6>
				</div>
				<div>
                    <?php
                    include 'config/konek.php';

                    if (isset($_POST['send'])) {
                        $email = $_POST['email'];

                        $query = mysqli_query($koneksi,"INSERT INTO subscribe (email,tgl) VALUES ('$email',NOW())");
                    }
                    ?>
				    <form method="post" action="" class="col s12">
					      <div class="col s9 media display-flex">
					        <div class="input-field col s8">
					          <input id="email" type="text" class="validate" name="email">
					          <label for="email" class="white-text">Your Email</label>
					        </div>
					    </div>
                        <div class="display-flex media pt">
        					<input type="submit" name="send" value="SUBCRIBE">
        				</div>
					</form>
				</div>
			</div>
		</div>
	</div>
