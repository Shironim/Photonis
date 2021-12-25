<?php $base_url = "http://localhost/Project-dua/";?>

<link rel="stylesheet" href="<?php echo $base_url;?>assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>assets/css/materialize.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>assets/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600|Lato:400,900" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<section>
    <?php
    if (empty($_GET['act'])) {
        tampil();
    }
    ?>
        <?php function tampil(){ ?>
        <div class="row col s12 body">
            <div class="login-page">
                <div class="form">
                    <form class="login-form" action="ceklogin" method="post">
                        <input type="text" name="email" placeholder="Email"/>
                        <input type="password" name="password" placeholder="password"/>
                        <button>login</button>
                        <p class="message">Belum Punya Akun? <a href="daftar">Buat Akun</a></p>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>
</section>
