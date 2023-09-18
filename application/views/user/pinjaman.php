
<?php 
if ($this->session->id_anggota == null) {
    ?>
    <section class="page-section bg-primary" id="about" style="height: 100%;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                 <!--    <h2 class="text-white mt-0">Apa Itu Bumde Desa Sungai Ular</h2> -->
                 <!--   <hr class="divider divider-light" /> -->



                 <img src="<?= base_url('assets_user/img/money.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
                 <p class="text-white-75 mb-4">
                 Mohon maaf untuk melakukan pinjaman anda harus login telebih dahulu</p>
                 <a class="btn btn-light btn-xl mt-3" href="<?= base_url('user/login') ?>">Login Anggota</a>


             </div>
         </div>
     </div>
 </section>

<?php }else{ ?>

    <section class="page-section bg-primary" id="about" style="height: 100%;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                   <!--    <h2 class="text-white mt-0">Apa Itu Bumde Desa Sungai Ular</h2> -->
                   <!--   <hr class="divider divider-light" /> -->


                   <?php 
                   if ($pengajuan == null) {
                       ?>

                       <img src="<?= base_url('assets_user/img/money.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
                       <p class="text-white-75 mb-4">
                       Untuk melakuakn pinjaman anda harus mengajukan pinjaman telebih dahulu </p>
                       <a class="btn btn-light btn-xl mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajukan Pinjaman</a>

                   <?php }elseif($pengajuan['status'] == 0){ ?>

                       <img src="<?= base_url('assets_user/img/menunggu.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
                       <p class="text-white-75 mb-4">
                         Pengajuan pinjaman anda masih belum aktif<br /> mohon untuk menunggu </p>
                         <div class="d-flex justify-content-between text-light">
                           <h5>Pengajuan Pinjaman <br>  <?=  "Rp " . number_format($pengajuan['jml_pinjaman'],0,',','.');  ?></h5>
                           <h5>Bunga<br>
                            <?= $pengajuan['bunga'] ?>%</h5>

                            <h5>Total Pembayaran <br> <?=  "Rp " . number_format($pengajuan['total_pembayaran'],0,',','.');  ?></h5>
                        </div>
                    <?php }elseif($pengajuan['status'] == 1){?>
                       <img src="<?= base_url('assets_user/img/bank.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
                       <p class="text-white-75 mb-4">
                         Pengajuan pinjaman anda sudah aktif<br /> silahkan bayar pinjaman anda</p>
                         <a class="btn btn-light btn-xl mt-3" data-bs-toggle="modal" data-bs-target="#exampleModallist">
                             <?php 
                             if ($pengajuan['sisa_pembayaran'] == 0) {
                                echo "<p class='text-success'>Lunas</p>";
                            }else{

                                echo "Rp " . number_format($pengajuan['sisa_pembayaran'],0,',','.'); 
                            }
                            ?>
                        </a>
                    <?php } ?>


                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan simpanan</h1>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                   </div>
                   <div class="modal-body">
                       <form method="post" action="<?= base_url('user/add_pengajuan_pinjaman') ?>">



                          <div class="form-group">
                              <label>Jml Pinjaman</label>
                              <input type="text"  name="jml_pinjaman" value="" class="form-control" required>
                          </div>

                          <div class="form-group mt-3">
                              <label>Waktu Pinjaman</label>
                              <select class="form-control" name="waktu_pinjaman">
                                <option>-- Pilih Waktu Pinjaman --</option>
                                <?php 
                                for ($i=1; $i < 13 ; $i++) { 
                                  ?>

                                  <option value="<?= $i ?>"><?= $i ?> Bulan</option>
                              <?php } ?>

                          </select>
                      </div>


                      <label class="mt-3">Bunga</label>
                      <div class="input-group mb-3">
                          <input type="text" name="bunga" value="3" readonly class="form-control" required>
                          <span class="input-group-text" id="basic-addon2">%</span>
                      </div>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                    <button type="submit" class="btn btn-primary">YES</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModallist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Data pembayaran</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class="d-flex justify-content-between">
             <p>Pengajuan Pinjaman <br>  <?=  "Rp " . number_format($pengajuan['jml_pinjaman'],0,',','.');  ?></p>
             <p>Bunga<br>
                <?= $pengajuan['bunga'] ?>%</p>

                <p>Total Pembayaran <br> <?=  "Rp " . number_format($pengajuan['total_pembayaran'],0,',','.');  ?></p>
            </div>

            <hr>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Bayar</th>
                  <th scope="col">Sisa Pinjaman</th>

              </tr>
          </thead>
          <tbody>

            <?php
            $no = 1;
            foreach ($list as $data) { ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['tgl'] ?></td>
                    <td><?= "Rp " . number_format(  $data['jml_pembayaran'],0,',','.'); ?></td>
                    <td>

                        <?php 
                        if ($data['sisa_pembayaran'] == 0) {
                            echo "<p class='text-success'>Lunas</p>";
                        }else{

                            echo  "Rp " . number_format( $data['sisa_pembayaran'],0,',','.');
                        }
                        ?>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

</form>
</div>
</div>
</div>






</section>


<?php } ?>

