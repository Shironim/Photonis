<?php
    include 'config/konek.php';
    $id = @$_GET['id'];
    $gambar = mysqli_query($koneksi,"SELECT * FROM gallery WHERE id_gambar = '$id'");
    $dgambar = mysqli_fetch_array($gambar);

    //jumlah pengunjung
    $pengunjung = mysqli_query($koneksi,"SELECT * FROM pengunjung WHERE id_gambar = '$id'");
    $dpengunjung = mysqli_fetch_array($pengunjung);
    $jumlah_pengunjung = mysqli_num_rows($pengunjung);
    if ($jumlah_pengunjung == 0) {
        mysqli_query($koneksi,"INSERT INTO pengunjung (id_gambar,jumlah) values ('$id','1')");
    }else {
        mysqli_query($koneksi,"UPDATE pengunjung SET jumlah = jumlah + 1 WHERE id_gambar = '$id'");
    }

    //mengambil data dari keranjang jumlah barang
    $jumlah_barang = @$_SESSION['items'][$id];
    $max_jumlah = $dgambar['stok'] - $jumlah_barang;

    //mengambil data dari database
    $gori = mysqli_query($koneksi,"SELECT id_kategori,nama from kategori WHERE id_kategori=$dgambar[id_kategori]");
    $kategori = mysqli_fetch_array($gori);

    // membuat format ribu
    $harga = $dgambar['harga_pokok'];
    $diskon = $harga*$dgambar['diskon']/100;
    $ppn = $harga*$dgambar['ppn']/100;

    $total_harga = $harga;
    $harga_jual = $harga - $diskon;
    $total_rp = number_format($total_harga,2,",",".");
    $total_jual_rp = number_format($harga_jual,2,",",".");

?>
    <section>
        <div class="row">
            <div class="col s12">
                <div class="col s8">
                    <div class="title col s12">
                        <h3 class="center">
                            <?php echo $dgambar['nama']; ?>
                        </h3>
                    </div>
                    <div class="">
                        <figure>
                           <?php img("http://localhost/Project-dua/admin/image/$dgambar[gambar]",$dgambar['nama'],$dgambar['nama'],'gallery','foto');?>
                        </figure>
                    </div>
                </div>
                <div class="col s4 tinggi">
                    
                </div>
                <div class="col s4">
                    <span class="p5 col s12">Taken By: <?php echo $dgambar['nama_fotographer']; ?></span>
                    <span class="p5 col s12">No Gambar : <?php echo $dgambar['no_gambar'];?></span>
                    <p class="p5 col s12"><b><?php if($dgambar['stok']>0){echo "Tersedia";}else{echo "Tidak Tersedia"; @$disabled = "disabled";}?></b></p>
                    <span class="col s2"><i class="fa fa-eye" aria-hidden='true'></i>
                        <?php echo $dpengunjung['jumlah'];?>
                    </span>
                    <span class="col s10"><i class="fa fa-shopping-cart" aria-hidden="true"></i><?php echo $dgambar['dijual'];?></span>
                    <p class="p5 col s12">
                        <?php 
                        if($dgambar['diskon']>0)
                        {
                            echo "Hemat $dgambar[diskon]% <span class='price'><strike>Rp $total_rp </strike></span>";
                        }
                        ?>
                        <h3 class="harga col s12">
                           Rp <?php echo $total_jual_rp?>
                        </h3>
                    </p>
                    
                    
                    <form  method="post" action="beli">
                        <div class="col s8">
                            <input type="hidden" name="id" value="<?php echo $dgambar['id_gambar']?>" />
                            <input type="number" min="0" max="<?php echo $max_jumlah?>" name="qty" class="form-control" required value="1" />
                        </div>
                        <div class="col s5 form-control">
                            <button <?php echo @$disabled;?>> BELI</button>
                        </div>
                    </form>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </section>
