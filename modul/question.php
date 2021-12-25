<div class="media po pb grey lighten-4">
	<div class="center">
		<h3>Have Some Questions?</h3>
		<h5>Send us a message</h5>
	</div>
    <?php
        include 'config/konek.php';
        if (isset($_POST['send'])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $isi = $_POST['isi'];

            $queri = mysqli_query($koneksi,"INSERT INTO pesan (nama,email,isi,tgl) VALUES ('$nama','$email','$isi',NOW())");}?>
	<div class="display-flex">
	    <form class="col s12" method="post" action="">
	      <div class="row">
	        <div class="input-field col s12">
	          <input id="nama" name="nama" type="text" class="validate" required>
	          <label for="nama">Nama</label>
	        </div>
	        <div class="input-field col s12">
	          <input id="email" type="email" name="email" class="validate" required>
	          <label for="email">Email</label>
	        </div>
	        <div class="input-field col s12">
	          <textarea name="isi" rows="8" cols="80" style="border-top: none;border-left: none;border-bottom: 2px solid cadetblue;" required></textarea>
              <label for="isi">Pesan</label>
	        </div>
	      </div>
          <div class="display-flex">
              <input type="submit" name="send" value="SEND MESSAGE">
          </div>
	    </form>
  	</div>
</div>
