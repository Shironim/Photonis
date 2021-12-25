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
<h1 class="title"></h1>
<div class="badan">
    <div class="container">
        <h4 class="sub-title"></h4>
        <hr>
        <a href="?page=kasir&act=tambah">
            <i class="fa fa-pencil-square-o fa-3x far" aria-hidden="true"></i>
            <br>
            <span class="fan">input</span>
        </a>
        <form action="" method="post">
            <table class="table" id="table">
                <tr class="tampil">
                    <th>No</th>
                    <th>Nama Kasir</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php
                include "../config/konek.php";
                $no = 1;
                $data = mysqli_query($koneksi,"SELECT * FROM akun WHERE akses = 'kasir'");
                while($ddata = mysqli_fetch_array($data)){?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $ddata['username']?></td>
                    <td><?php echo $ddata['status']?></td>
                    <td><?php echo $ddata['email']?></td>
                    <td><a href="<?php echo $base_url;?>?page=kasir&act=edit&id=<?php echo $ddata['id']?>"><i class="fa fa-pencil"></i></a></td>
                </tr>
                <?php }?>
            </table>
        </form>
    </div>
</div>
<?php }?>
<?php function tambah(){?>
<h1 class="title"></h1>
<div class="badan">
    <div class="container">
        <h4 class="sub-title"></h4>
        <hr>
        <form action="" method="post">
            <table>
                <tr>
                    <th>Nama Kasir</th>
                    <td><input type="text" name="nama" placeholder="Nama Anda"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="mail" placeholder="dimas@gmail.com"></td>
                </tr>
                <tr> 
                    <th>Password</th>
                    <td><input type="password" name="password" placeholder="******"></td>
                </tr>
            </table>
                <tr>
                    <td><input type="submit" name="tambah" value="Tambah"></td>
                </tr>
            <?php
            include "../config/konek.php";
            if(isset($_POST['tambah'])){
            $nama = $_POST['nama'];
            $email = $_POST['mail'];
            $pass = $_POST['password'];
                        
            $sql = mysqli_query($koneksi,"INSERT INTO akun (username,password,email,status,akses) VALUES ('$nama','$pass','$email','A','kasir')");
            
            if($sql){
                echo "<script>alert('Data Kasir Berhasil Ditambahkan');document.location.href='?page=kasir'</script>";
            }else{
                echo "Gagal";
            }
            }
            ?>
        </form>
    </div>
</div>
<?php }?>
<?php function edit(){?>
<h1 class="title"></h1>
<div class="badan">
    <div class="container">
        <h4 class="sub-title"></h4>
        <hr>
        <form action="" method="post">
            <?php
            include "../config/konek.php";
            $id = $_GET['id'];
            $data = mysqli_query($koneksi,"SELECT * FROM akun WHERE id='$id'");
            $ddata = mysqli_fetch_array($data);?>
            <table>
                <tr>
                    <th>Nama Kasir</th>
                    <td><input type="text" name="nama" value="<?php echo $ddata['username']?>"></td>
                </tr>
                <tr>
                    <th>Status</th>
                        <?php
                        if($ddata['status']=='A'){
                            $cek = "checked";
                        }else{
                            $cek = "";
                        }
                        ?>
                    <td colspan="2"><input type="radio" name="blokir" value="A" <?php echo $cek;?>>Ya  
                        <input type="radio" name="blokir" value="B" checked> Tidak</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="mail" value="<?php echo $ddata['email']?>"></td>
                </tr>
                <tr> 
                    <th>Password</th>
                    <td><input type="password" name="password" value="<?php echo $ddata['password']?>"></td>
                </tr>
            </table>
                <tr>
                    <td><input type="submit" name="edit" value="Perbarui"></td>
                </tr>
                <?php
            include "../config/konek.php";
            if(isset($_POST['edit'])){
                $nama = $_POST['nama'];
                $email = $_POST['mail'];
                $pass = $_POST['password'];
                $blokir = $_POST['blokir'];

                $update = mysqli_query($koneksi,"UPDATE akun SET 
                username = '$nama',
                password = '$pass',
                email = '$mail',
                status = '$blokir'
                WHERE id = $id");
                if($update){
                    echo "<script>document.location.href='?page=kasir'</script>";
                }else{
                    echo "Gagal Edit";
                }
            }
            ?>
        </form>
    </div>
</div>
<?php }?>