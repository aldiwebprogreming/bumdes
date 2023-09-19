
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
        <h2 class="text-center mt-0">Data Pesanan anda</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5 ">

            <div class="col-sm-3">
            </div>

            <div class="col-sm-6">

                <table class="table">
                    
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Produk</th>
                      <th scope="col">Qty</th>
                      <th scope="col">Harga</th>
                      <th scope="col">Total</th>
                      <th scope="col">Status</th>
                  </tr>
              </thead>
              <tbody>

                <?php 
                $no = 1;
                foreach ($produk as $data) { ?>
                    <tr>
                       
                      <td><?= $no++ ?></td>
                      <td><?= $data['produk'] ?></td>
                      <td><?= $data['qty'] ?></td>
                      <td><?= $data['harga'] ?></td>
                      <td><?= $data['total_harga'] ?></td>
                      <td><?= $data['status'] ?></td>
                  </tr>

              <?php } ?>

          </tbody>
      </table>

  </div>

  <div class="col-sm-3">
  </div>


</div>
</div>
</section>



