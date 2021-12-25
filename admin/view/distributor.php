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
<h1 class="title">Fotographer</h1>
<div class="badan">
   <div class="container">
      <h4 class="sub-title">Data Fotographer</h4>
      <hr>
      <a href="?page=distributor&act=tambah">
        <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
        <br>
        <span class="fan">input</span>
      </a>
      <form action="" method="post">
          <table class="table" id="table">
              <tr class="tampil">
                  <th>No</th>
                  <th>Nama Fotographer</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Action</th>
              </tr>
              <?php
              $no = 1;
              include "../config/konek.php";
              $data = mysqli_query($koneksi,"SELECT * FROM distributor");
              while($ddata = mysqli_fetch_array($data)){?>
              <tr>
                  <td><?php echo $no++;?></td>
                  <td><?php echo $ddata['nama_fotographer']?></td>
                  <td><?php echo $ddata['alamat']?></td>
                  <td><?php echo $ddata['telepon']?></td>
                  <td><a href="<?php echo $base_url;?>?page=distributor&act=edit&id=<?php echo $ddata['id_fotographer']?>"><i class="fa fa-pencil" title="edit"></i></a></td>
              </tr>
              <?php }?>
          </table>
      </form>
       
   </div>
</div>
<?php }?>
<?php function edit(){
include "../config/konek.php";
$id = $_GET['id'];
$ddata = mysqli_fetch_array(mysqli_query($koneksi,"SELECT * FROM distributor WHERE id_fotographer = '$id'"));
?>
<h1 class="title">Fotographer</h1>
<div class="badan">
   <div class="container">
      <h4 class="sub-title">Data Fotographer</h4>
      <hr>
      <form action="" method="post">
          <table class="table">
              <div class="col-md-6">
                  <label class="lebel">Nama Fotographer</label>
                  <input class="long" type="text" name="nama_fotographer" value="<?php echo $ddata['nama_fotographer']?>">
              </div>
              <div class="col-md-6">
                  <label class="lebel">Nomor Telepon</label>
                  <input class="long" type="text" name="telepon" value="<?php echo $ddata['telepon']?>">
              </div>
              <div class="col-md-12">
                  <label class="lebel">Alamat</label>
                  <input class="long" type="text" name="alamat" value="<?php echo $ddata['alamat']?>">
              </div>
          </table>
          <div class="col-md-2">
            <input class="long" type="submit" name="submit" value="Perbarui">  
          </div>
      </form>
      <?php
        if(isset($_POST['submit'])){
            $nama = $_POST['nama_fotographer'];
            $nohp = $_POST['telepon'];
            $alamat = $_POST['alamat'];
            
            $edit = mysqli_query($koneksi, "UPDATE distributor SET 
            nama_fotographer = '$nama',
            telepon = '$nohp',
            alamat = '$alamat'
            WHERE id_fotographer = $id");
            
            if($edit){
                echo "<script>alert('Berhasil Memperbarui Data');document.location.href='?page=distributor'</script>";
            }else{
                echo "Gagal";
            }
        }
       ?>
    </div>
</div>
<?php }?>
<?php function tambah(){?>
    <h1 class="title">Distributor</h1>
    <div class="badan">
       <div class="container">
          <h4 class="sub-title">Data Distributor</h4>
          <hr>
          <form action="" method="post">
              <table class="table">
                  <div class="col-md-6">
                      <label class="lebel">Nama Fotographer</label>
                      <input class="long" type="text" name="nama_fotographer" placeholder="Nama...">
                  </div>
                  <div class="col-md-6">
                      <label class="lebel">Nomor Telepon</label>
                      <input class="long" type="text" name="telepon" placeholder="0891238*****">
                  </div>
                  <div class="col-md-12">
                      <label class="lebel">Alamat</label>
                      <input class="long" type="text" name="alamat" placeholder="Jalan Semarang Indah">
                  </div>
              </table>
              <div class="col-md-2">
                <input class="long" type="submit" name="submit" value="Tambah">  
              </div>
          </form>
          <?php
            include "../config/konek.php";
           if(isset($_POST['submit'])){
               $nama = $_POST['nama_fotographer'];
               $nohp = $_POST['telepon'];
               $alamat = $_POST['alamat'];
               
               $tambah = mysqli_query($koneksi,"INSERT INTO distributor (nama_fotographer,telepon,alamat) VALUES ('$nama','$nohp','$alamat')");
               if($tambah){
                   echo "<script>alert('Berhasil Menambahkan Data');document.location.href='?page=distributor'</script>";
               }else{
                   echo "Gagal";
               }
           }
           ?>
        </div>
    </div>
<?php }?>