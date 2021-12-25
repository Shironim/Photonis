<div class="media">
	<div id="parallax" class="media">
		<div class="parallax-container media">
		      <div class="parallax">
		      	<img src="<?php echo $base_url;?>image/questionv2.png">
		      </div>

			<div class="center relative white-text">
				<h3 class="po">Have Some Questions?</h3>
				<h5>Send us a message</h5>
			</div>
			<div class="display-flex">
                <?php
                include 'config/konek.php';

                if (isset($_POST['send'])) {
                    $nama = $_POST['nama'];
                    $email = $_POST['email'];
                    $isi = $_POST['isi'];
                    if ($nama == '' || $email == '' || $isi == '') { ?>
                        <script type="text/javascript">
                            alert("data masih ada yang kosong");
                        </script>
                    <?php }
                    $queri = mysqli_query($koneksi,"INSERT INTO pesan (nama,email,isi,tgl) VALUES ('$nama','$email','$isi',NOW())");
                }
                ?>
			    <form method="post" action="" class="col s12">
			     	 <div class="row">
				        <div class="input-field col s12">
				          <input id="nama" type="text" name="nama" class="validate" required>
				          <label for="nama">Nama Anda (Diperlukan)</label>
				        </div>
				        <div class="input-field col s12">
				          <input id="email" type="tel" name="email" class="validate" required>
				          <label for="email">Email Anda (Diperlukan)</label>
				        </div>
				        <div class="input-field col s12">
				          <input id="isi" type="tel" name="isi" class="validate" required>
				          <label for="isi">Pesan Anda (Diperlukan)</label>
				        </div>
			    	  </div>
                      <div class="display-flex">
          		  	<input type="submit" name="send" value="SEND MESSAGE">
          		  	</div>
			    </form>
		  	</div>
		</div>
	</div>
</div>
