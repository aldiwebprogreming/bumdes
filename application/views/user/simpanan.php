
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
                   Mohon maaf untuk melakukan simpanan anda harus login telebih dahuku</p>
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
                     Untuk melakuakn simpanan anda harus mengajukan simpanan telebih dahulu </p>
                     <a class="btn btn-light btn-xl mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajukan Simpanan</a>

                 <?php }elseif($pengajuan['status'] == 0){ ?>

                     <img src="<?= base_url('assets_user/img/menunggu.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
                     <p class="text-white-75 mb-4">
                         Pengajuan simpanan anda masih belum aktif<br /> mohon untuk menunggu </p>
                         <a class="btn btn-light btn-xl mt-3" data-bs-toggle="modal" data-bs-target="#exampleModalsimpan">RP 0,00</a>

                     <?php }elseif($pengajuan['status'] == 1){?>
                         <img src="<?= base_url('assets_user/img/bank.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
                         <p class="text-white-75 mb-4">
                             Pengajuan simpanan anda sudah aktif<br /> silahkan simpan uang anda</p>
                             <a class="btn btn-light btn-xl mt-3" data-bs-toggle="modal" data-bs-target="#exampleModallist"><?=  "Rp " . number_format( $simpanan['simpanan'],2,',','.'); ?></a>
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
                             <form method="post" action="<?= base_url('user/pengajuan_simpanan') ?>">
                                 <input type="hidden" name="id_anggota" value="<?= $this->session->id_anggota ?>">
                                 <input type="hidden" name="nama" value="<?= $this->session->nama ?>">
                                 <h5 class="text-center text-success">Hay, <?= $this->session->nama ?> apakah anda ingin mengajukan simpanan</h5>

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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data simpanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tanggal</th>
                              <th scope="col">Jumlah</th>

                          </tr>
                      </thead>
                      <tbody>

                        <?php
                        $no = 1;
                        foreach ($list as $data) { ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $data['tgl'] ?></td>
                                <td><?=  "Rp " . number_format( $data['simpanan'],0,',','.'); ?></td>

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

