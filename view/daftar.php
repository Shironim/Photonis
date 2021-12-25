<?php $base_url = "http://localhost/Project-dua/";?>
<link rel="stylesheet" href="<?php echo $base_url;?>assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>assets/css/materialize.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>assets/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600|Lato:400,900" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="row col s12 body">    
    <div class="register-page">
        <form class="" action="" method="post">
            <div class="form-register">
                <h4 class="center">Halaman Daftar</h4>
                <div class="">
                    <div class="col s4 input-field">
                        <input class="validate" placeholder="Nama" type="text" name="nama" required>
                    </div>
                    <div class="col s4 input-field">
                        <input class="validate" placeholder="Email@gmail.com" type="email" name="email" required>
                    </div>
                    <div class="col s4 input-field">
                        <input class="validate" placeholder="081*****" type="text" name="telepon">
                    </div>
                    <div class="col s12 input-field">
                        <input class="validate" placeholder="Alamat" type="text" name="alamat">
                    </div>
                </div>
                <br/>
                <div class="">
                    <div class="col s6">
                        <p>KOTA</p>
                        <select style="display:block;" class="" name="kota"  tabindex="2" required>
                            <option value="">Pilih Kota</option>
                            <?php
                                include "../config/konek.php";
                                $kota = mysqli_query($koneksi,"SELECT * FROM kota order by name");
                                while ($dkota = mysqli_fetch_array($kota)) {
                                    echo "<option value='$dkota[id]'>$dkota[name]</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col s6">
                        <p>PROVINSI</p>
                        <select style="display:block" class="" name="provinsi" tabindex="2" required>
                            <option value="">Pilih Provinsi</option>
                            <?php
                            include "../config/konek.php";
                            $provinsi = mysqli_query($koneksi,"SELECT * FROM provinsi order by name");
                            while ($dprov = mysqli_fetch_array($provinsi)) {
                                echo "<option value='$dprov[id]'>$dprov[name]</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="">
                    <div class="input-field col s6">
                        <input type="password" name="password" placeholder="Password" class="validate" required>
                    </div>
                    <div class="input-field col s6">
                        <input type="password" name="cpassword" placeholder="Confirm password" class="validate" required>
                    </div>
                </div>
                <div class="col s12">
                    <input class="input" type="submit" name="daftar" value="DAFTAR">
                </div>
                <p class="message center">sudah daftar?  <a href="login">login</a></p>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];

    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    //cek email
    include 'config/konek.php';
    $mail = mysqli_query($koneksi,"SELECT email FROM member WHERE email='$email'");
    $cekemail = mysqli_fetch_array($mail);

    if ($cekemail['email']==$email) {
        echo "<script>alert('Email sudah terdaftar');</script>";
    }else {
        //mencocokan password
        if ($password == $cpassword) {
            include 'config/konek.php';
            $input = mysqli_query($koneksi,"INSERT INTO member(id_kota, id_provinsi, nama, password, email, telepon, alamat,tgl,blokir) VALUES ('$kota','$provinsi','$nama','$password','$email','$telepon','$alamat',NOW(),'N')");

            //jika berhasil
            if ($input) {
                echo "<script>alert('Selamat Bergabung');document.location.href='home'</script>";
                session_start();
                @$_SESSION['email_member']=$email;
                @$_SESSION['password_member']=$password;
            }
        }else {
            echo "<script>alert('Kata Sandi Tidak Sama');</script>";
        }
    }
}
?>
