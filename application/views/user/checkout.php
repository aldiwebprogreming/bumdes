

<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Checkout</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5 ">

            <div class="col-sm-3">
            </div>

            <div class="col-sm-6">

                <?php 

                if ($alert == 'sukses') {
                    ?>
                    <center>
                        <img src="<?= base_url('assets_user/img/sukses.png') ?>" class="img-fluid" alt="..." style="height: 100px;">

                        <p class="text-center">Selamat pembayaran anda berhasil di ajukan silahkan menunggu persetujuan pembayaran anda</p>

                        <a href="<?= base_url('data_pesanan') ?>" style="text-decoration: none;">Lihat data pesanan anda</a>
                    </center>

                <?php }else{ ?>

                    <form method="post" action="<?= base_url('user/act_checkout') ?>" enctype="multipart/form-data">

                        <p class="text-center">Untuk pembayaran dapat di lakukan dengan Bank Transper dengan Nomor Rekening :<strong> BRI : 14424988923942</strong></p>
                        <p class="text-center">Pesanan akan kami proses apabila pembayaran anda selesai</p>

                        <div class="form-floating mb-3">
                            <input type="text" name="nama" value="<?= $this->session->nama ?>" class="form-control" id="phone"  required="" data-sb-validations="required" />
                            <label for="phone">Nama</label>

                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="noktp" value="<?= $this->session->no_ktp ?>" va class="form-control" id="phone" required=""  placeholder="(123) 456-7890" data-sb-validations="required" />
                            <label for="phone">No KTP</label>

                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="alamat"  data-sb-validations="required"></textarea>
                            <label for="phone">Alamat Pengantaran</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" name="total" value="<?= $this->cart->total() ?>" va class="form-control"  data-sb-validations="required" />
                            <label for="phone">Total Pembayaran</label>
                        </div>


                        <div class="form-floating mb-3">
                           <input type="number" name="norek"  class="form-control"  data-sb-validations="required" />
                           <label for="phone">Nomor Rekening Anda</label>
                       </div>



                       <div class="form-floating mb-3">
                        <input type="file" name="gambar" va class="form-control"  data-sb-validations="required" />
                        <label for="phone">Bukti Pembayaran</label>
                        <small>Masukan bukti pembyaran anda dengan format JPG, JPEG, dan PNG</small>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Bayar sekarang</button>              

                </form>

            <?php } ?>
        </div>

        <div class="col-sm-3">
        </div>


    </div>
</div>
</section>



