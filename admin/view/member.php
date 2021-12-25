    <?php
    if(empty($_GET['act'])){
        tampil();
    }else
    if($_GET['act']=='edit'){
        edit();
    }            
    ?>
<?php function tampil(){ 
$base_url = "http://localhost/Project-dua/s-admin";
?>
<h1 class="title">Member</h1>
<div class="badan">
<div class="container">
   <h4 class="sub-title">Daftar Member</h4>
   <hr>
    <form method="post" action="">
        <table id="table" class="table">
            <tr class="tampil">
                <th>NO</th>
                <th>Nama Member</th>
                <th>Blokir</th>
                <th>Action</th>
            </tr>
            <?php
            include "../config/konek.php";
            $no = 1;
            $data = mysqli_query($koneksi,"SELECT * FROM member ORDER BY nama");
            while($ddata = mysqli_fetch_array($data)){?>
                <tr>
                    <td>
                        <?php echo $no++;?>
                    </td>
                    <td>
                        <?php echo $ddata['nama']?>
                    </td>
                    <td>
                        <?php echo $ddata['blokir']?>
                    </td>
                    <td><a href='<?php echo $base_url?>?page=member&act=edit&id=<?php echo $ddata['id_member'];?>'><i class="fa fa-pencil" title="edit"></i></a></td>
                </tr>
                <?php }?>
        </table>
    </form>
</div>
</div>
<?php }?>
<div>
    <?php function edit(){
    $base_url = "http://localhost/Project-dua/s-admin";
    ?>
    <div>
        <?php
        include "../config/konek.php";
        $id = $_GET['id'];
        $data = mysqli_query($koneksi,"SELECT * FROM member WHERE id_member='$id'");
        $ddata = mysqli_fetch_array($data);?>
            <form action="" method="post">
                <table>
                    <tr>
                        <th class="mepet">Nama Member</th>
                        <td><input type="text" name="nama" value="<?php echo $ddata['nama']?>"></td>
                    </tr>
                    <tr>
                        <?php
                        if($ddata['blokir']=='Y'){
                            $cek = "checked";
                        }else{
                            $cek = "";
                        }
                        ?>
                        <td colspan="2"><input type="radio" name="blokir" value="Y" <?php echo $cek;?>>Ya  
                            <input type="radio" name="blokir" value="N" checked> Tidak</td>
                    </tr>
                </table>
                <br>
                <input type="submit" name="edit" value="Perbarui">
                <?php
            include "../config/konek.php";
            if(isset($_POST['edit'])){
                $nama = $_POST['nama'];
                $blokir = $_POST['blokir'];

                $update = mysqli_query($koneksi,"UPDATE member SET 
                nama = '$nama',
                blokir = '$blokir'
                WHERE id_member = $id");
                if($update){
                    echo "<script>document.location.href='?page=member'</script>";
                }else{
                    echo "Gagal Edit";
                }
            }
            ?>
            </form>
    </div>
    <?php }?>
</div>
