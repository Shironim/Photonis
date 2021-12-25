<nav>
    <div class="nav-wrapper">
        <ul id="nav-mobile" class="left hide-on-med-and-down">
            <?php
            include 'config/konek.php';
            $no = 1;
            $nav = mysqli_query($koneksi,"SELECT * FROM navigasi WHERE up_menu='0'");
            while ($dnav = mysqli_fetch_array($nav)) {
                $id = $dnav['id'];
                $submenu = mysqli_query($koneksi,"SELECT * FROM navigasi WHERE up_menu='$dnav[id]'");
                ?>
                <?php if(mysqli_num_rows($submenu)==0){?>
                <li <?php if (@$_GET['page']==$dnav['link']) {
                    echo "class='active'";} ?> ><a href="<?php echo $dnav['link']?>"><?php echo $dnav['nama']; ?></a></li>
                <?php }else{ ?>
                <li class="dropdown" <?php if(@$_GET['page']==$dnav['link']) {
                    echo "class='active'";} ?> ><a href="<?php echo $dnav['link']?>" class="dropdown-button" data-activates="dropdown<?php echo $id;?>"><?php echo $dnav['nama']; ?><i class="material-icons right">arrow_drop_down</i></a>
                    <ul id="dropdown<?php echo $id;?>" class="dropdown-content">
                        <?php
                        while($data_submenu = mysqli_fetch_array($submenu)){?>
                            <li><a href="<?php echo $data_submenu['link']?>"><?php echo $data_submenu['nama']?></a></li>
                        <?php }?>
                    </ul>
                </li>
            <?php }?>
            <?php }?>
            <?php
            if(empty($_SESSION['email_member'])){?>
            <li><a href="login">Login</a></li>
            <?php } else{?>
            <li><a href="logout">Logout</a></li>
            <?php }?>
        </ul>
    </div>
</nav>