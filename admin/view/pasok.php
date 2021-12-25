<?php
    if(empty($_GET['act'])){
        tampil();
    }else
    if($_GET['act']=='edit'){
        edit();
    }else
    if($_GET['act']=='tambah'){
        tambah();
    }
?>
<?php function tampil(){
$base_url = "http://localhost/Project-dua/s-admin";
?>
<h1 class="title">Pasok</h1>
<div class="badan">
   <div class="container">
      <h4 class="sub-title">Data Pasok</h4>
      <hr>
      <a href="?page=pasok&act=tambah">
        <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
        <br>
        <span class="fan">input</span>
      </a>
      <form action="" method="post">
          <table class="table" id="table">
              <tr class="tampil">
                  <th>No</th>
                  <th>Nama Fotographer</th>
                  <th>Judul Buku</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                  <th>Action</th>
              </tr>
              <?php
                $no = 1;
                include "../config/konek.php";
                $pasok = mysqli_query($koneksi,"SELECT * FROM pasok");
                while($dpasok = mysqli_fetch_array($pasok)){
                $fotographer = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM distributor WHERE id_fotographer = '$dpasok[id_fotographer]'"));
                $gambar = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM gallery WHERE id_gambar = '$dpasok[id_gambar]'"));
              ?>
              <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $fotographer['nama_fotographer']?></td>
                  <td><?php echo $gambar['nama']?></td>
                  <td><?php echo $dpasok['jumlah']?></td>
                  <td><?php echo $dpasok['tanggal']?></td>
                  <td><a href="<?php echo $base_url;?>?page=pasok&act=edit&id=<?php echo $dpasok['id_pasok']?>"><i class="fa fa-pencil" title="edit"></i></a></td>
              </tr>
              <?php }?>
          </table>
      </form>
   </div>
</div>
<?php }?>
<?php function tambah(){?>
    <h1 class="title">Pasok</h1>
    <div class="badan">
   <div class="container">
      <h4 class="sub-title">Data Pasok</h4>
      <hr>
      <form action="" method="post">
        <div class="col-md-4">
            <label class="lebel">Nama Fotographer</label>
            <select name="fotographer" id="" class="pad5 long">
              <option value="">Pilih Fotographer</option>
                <?php 
                    include "../config/konek.php";
                    $fotographer = mysqli_query($koneksi,"SELECT * FROM distributor");
                    while($dfotographer = mysqli_fetch_array($fotographer)){?>
                    <option value="<?php echo $dfotographer['id_fotographer']?>"><?php echo $dfotographer['nama_fotographer']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="lebel">Judul Gambar</label>
            <select name="gambar" id="" class="pad5 long">
              <option value="">Pilih gambar</option>
                <?php 
                    include "../config/konek.php";
                    $foto = mysqli_query($koneksi,"SELECT * FROM gallery");
                    while($dfoto = mysqli_fetch_array($foto)){?>
                    <option value="<?php echo $dfoto['id_gambar']?>"><?php echo $dfoto['nama']?></option>
                <?php }?>
            </select>
        </div>
        <div class="col-md-4">
            <label class="lebel">Jumlah</label>
            <input type="number" name="jumlah" placeholder="Jumlah Barang" class="pad5 long">
        </div>
        <div class="col-md-2 right">
            <input type="submit" name="submit" value="Tambah Data" class="m5">
        </div>
      </form>
      <?php
        include "../config/konek.php";
        if(isset($_POST['submit'])){
            $fotographer = $_POST['fotographer'];
            $gambar = $_POST['gambar'];
            $jumlah = $_POST['jumlah'];
            $data = mysqli_query($koneksi,"INSERT INTO pasok (id_fotographer,id_gambar,jumlah,tanggal) 
            VALUES ('$fotographer','$gambar','$jumlah',NOW())");
            mysqli_query($koneksi,"UPDATE gallery SET stok = stok + $jumlah WHERE id_gambar = $gambar");
            
            if($data){
                echo "<script>alert('Berhasil Menambah Pasok');document.location.href='?page=pasok'</script>";
            }else{
                echo "Gagal";
            }
        }
       ?>
    </div>
</div>
<?php }?>
<?php function edit(){
    include "../config/konek.php";
    $id = $_GET['id'];
    $pasok = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM pasok WHERE id_pasok = '$id'"));
?>
<h1 class="title">Pasok</h1>
<div class="badan">
   <div class="container">
      <h4 class="sub-title">Data Pasok</h4>
      <hr>
      <form action="" method="post">
          <div class="col-md-3">
              <label class="lebel">Pilih Fotographer</label>  
              <select name="fotographer" id="" class="pad5 long">
                  <option value="">Pilih Fotographer</option>
                  <?php 
                    include"../config/konek.php";
                    $fotographer = mysqli_query($koneksi,"SELECT * FROM distributor");
                    while($dfotographer = mysqli_fetch_array($fotographer)){
                        if($pasok['id_fotographer'] == $dfotographer['id_fotographer']){
                        echo "<option value='$dfotographer[id_fotographer]' selected >$dfotographer[nama_fotographer]</option>";
                        }else{
                        echo "<option value='$dfotographer[id_fotographer]'>$dfotographer[nama_fotographer]</option>";
                        }
                    }
                  ?>
              </select>
          </div>
          <div class="col-md-3">
             <label class="lebel">Pilih Gambar</label>
              <select name="gambar" id="" class="pad5 long">
                  <option value="">Pilih Gambar</option>
                  <?php
                  include "../config/konek.php";
                    $gambar = mysqli_query($koneksi,"SELECT * FROM gallery");
                    while($dgambar = mysqli_fetch_array($gambar)){
                    if($pasok['id_gambar'] == $dgambar['id_gambar']){
                        echo "<option value='$dgambar[id_gambar]' selected >$dgambar[nama]</option>";
                        }else{
                        echo "<option value='$dgambar[id_gambar]'>$dgambar[nama]</option>";
                        }
                    }
                  ?>
              </select>
          </div>
          <div class="col-md-3">
              <label class="lebel">Tambah Pasok</label>
              <input type="number" name="tambah" placeholder="Tambah Pasok">
          </div>
          <div class="col-md-3">
              <label class="lebel">Kurangi Pasok</label>
              <input type="number" name="kurang" placeholder="Kurangi Pasok">
          </div>
          <div class="col-md-2">
              <input type="submit" name="submit" value="Perbarui">
          </div>
      </form>
      <?php
       include "../config/konek.php";
        if(isset($_POST['submit'])){
            $foto = $_POST['fotographer'];
            $gambar = $_POST['gambar'];
            $tambah = $_POST['tambah'];
            $kurang = $_POST['kurang'];
            
            if($tambah !=''){
                $sql = mysqli_query($koneksi,"UPDATE pasok SET 
                id_fotographer = '$foto',
                id_gambar = '$gambar',
                jumlah = jumlah+$tambah,
                tanggal = NOW()
                WHERE id_pasok = '$id'");
                
                mysqli_query($koneksi,"UPDATE gallery SET stok = stok + $tambah WHERE id_gambar = '$gambar'");
                if($sql){
                    echo "<script>alert('Berhasil Memperbarui Data Dan Menambah Pasokan');document.location.href='?page=pasok'</script>";
                }else{
                    echo "Gagal";
                }
            }else 
            if($kurang !=''){
                $sql = mysqli_query($koneksi,"UPDATE pasok SET 
                id_fotographer = '$foto',
                id_gambar = '$gambar',
                jumlah = jumlah-$kurang,
                tanggal = NOW()
                WHERE id_pasok = '$id'");
                
                mysqli_query($koneksi,"UPDATE gallery SET stok = stok - $kurang WHERE id_gambar = '$gambar'");
                if($sql){
                    echo "<script>alert('Berhasil Memperbarui Data Dan Mengurangi Pasokan');document.location.href='?page=pasok'</script>";
                }else{
                    echo "Gagal";
                }
            }else{
                $sql = mysqli_query($koneksi,"UPDATE pasok SET 
                id_fotographer = '$foto',
                id_gambar = '$gambar',
                tanggal = NOW()
                WHERE id_pasok = '$id'");
                
                if($sql){
                    echo "<script>alert('Berhasil Memperbarui Data');document.location.href='?page=pasok'</script>";
                }else{
                    echo "Gagal";
                }
            }
        }
       ?>
    </div>
</div>
<?php }?>