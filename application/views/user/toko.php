  <section class="page-section bg-primary" id="about" >
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 text-center">
             <!--    <h2 class="text-white mt-0">Apa Itu Bumde Desa Sungai Ular</h2> -->
             <!--   <hr class="divider divider-light" /> -->



             <img src="<?= base_url('assets_user/img/store.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
             <p class="text-white-75 mb-4">
             Yukkk belanja mudah dan cepat di Toko BUMDES Sungai Ular</p>


         </div>
     </div>
 </div>
</section>

<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Produk kami</h2>
        <hr class="divider" />
        <div class="d-flex justify-content-end">
            <a href="<?= base_url('user/data_pesanan') ?>" class="btn btn-primary"  style="margin-right: 10px"><i class="fas fa-cart-shopping"></i></a>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModallist"><i class="fas fa-bag-shopping"></i></button>


            <div class="modal fade" id="exampleModallist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Keranjang belanja</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <?php foreach ($this->cart->contents() as $items) { ?>
                                <div class="col-sm-4">
                                    <p><?= $items['name'] ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <p>Qty : <?= $items['qty'] ?></p>
                                </div>

                                <div class="col-sm-4">
                                    <p>Harga : <?= $items['price'] ?>/<?= $items['price'] * $items['qty'] ?></p>
                                    <a href="<?= base_url('user/remove_cart?id=') ?><?= $items['rowid'] ?>"><i class="fas fa-trash"></i></a>
                                </div>
                                <hr>

                            <?php } ?>
                        </div>
                        <h5 class="text-center mb-4">Total pembayaran : <?=  "Rp " . number_format($this->cart->total(),0,',','.'); ?></h5>
                        <a href="<?= base_url('user/checkout') ?>"  class="btn btn-primary w-100">Checkout</a>

                    </div>
                </div> 
            </div>
        </div>







    </div>

    <div class="row gx-4 gx-lg-5 mt-5">
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

                    <form method="post" action="<?= base_url('user/cart') ?>">
                        <input type="hidden" name="nama" value="<?= $data['nama_produk'] ?>">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <input type="hidden" name="harga" value="<?= $data['harga'] ?>">

                        <center>
                            <a class="btn btn-primary mx-2" id="min<?= $data['id'] ?>">-</a><input type="text" class="text-center" name="qty" readonly value="1" id="val<?= $data['id'] ?>" style="width : 50px"><a class="btn btn-primary mx-2" id="plus<?= $data['id'] ?>">+</a>
                        </center>
                        <br>

                        <button type="submit" class="btn btn-primary w-100">Order sekarang</button>
                    </form>
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


