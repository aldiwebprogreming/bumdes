  <section class="page-section bg-primary" id="about" >
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
               <!--    <h2 class="text-white mt-0">Apa Itu Bumde Desa Sungai Ular</h2> -->
               <!--   <hr class="divider divider-light" /> -->



               <img src="<?= base_url('assets_user/img/store.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
               <p class="text-white-75 mb-4">
               Yukkk belanja mudah dan cepat di Toko BUMDES Sungai Ular</p>
               <a class="btn btn-light btn-xl mt-3" href="<?= base_url('user/login') ?>">Login Anggota</a>


           </div>
       </div>
   </div>
</section>

<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Produk kami</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5">
            <?php 
            foreach ($produk as $data) {
                ?>

                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                      <img src="<?= base_url('assets/produk/') ?><?= $data['gambar'] ?>" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?= $data['nama_produk'] ?></h5>
                        <p><?=  "Rp " . number_format($data['harga'],0,',','.');   ?> / pcs</p>
                        <p class="card-text"><?= $data['keterangan'] ?></p>

                        <center>
                            <button class="btn btn-primary mx-2" id="min<?= $data['id'] ?>">-</button><input type="text" class="text-center" name="" readonly value="1" id="val<?= $data['id'] ?>" style="width : 50px"><button class="btn btn-primary mx-2" id="plus<?= $data['id'] ?>">+</button>
                        </center>
                        <br>
                        <a href="#" class="btn btn-primary w-100">Order sekarang</a>
                    </div>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


            <script>
                $(document).ready(function(){
                    $("#plus<?= $data['id'] ?>").click(function(){

                        var qty = $("#val<?= $data['id'] ?>").val();
                        var val = Number(qty) + 1;
                        $("#val<?= $data['id'] ?>").val(val);
                    });

                    $("#min<?= $data['id'] ?>").click(function(){

                        var qty = $("#val<?= $data['id'] ?>").val();
                        if(qty == 1){


                        }else{
                           var val = Number(qty) - 1;
                           $("#val<?= $data['id'] ?>").val(val);

                       }



                   })
                })
            </script>



        <?php } ?>
    </div>


</div>
</div>
</section>


