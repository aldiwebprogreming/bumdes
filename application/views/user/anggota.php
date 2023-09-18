
<?php 
if($alert){ ?>

    <section class="page-section bg-primary" id="about" style="height: 100%;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                   <!--    <h2 class="text-white mt-0">Apa Itu Bumde Desa Sungai Ular</h2> -->
                   <!--   <hr class="divider divider-light" /> -->

                   <img src="<?= base_url('assets_user/img/sukses.png') ?>" class="img-fluid" alt="..." style="height: 100px;">
                   <p class="text-white-75 mb-4">
                   Selamat anda berhasil login sebgai anggota BUMDES Desa Sungai Ular, Silahkan pilih apa kebutuhan anda </p>
                   <a class="btn btn-light btn-xl mt-3" href="<?= base_url('user/simpanpinjam') ?>">Simpan Pinjam</a>
                   <a class="btn btn-light btn-xl mt-3" href="<?= base_url('user/tokoonline') ?>">Toko Online</a>
               </div>
           </div>
       </div>
   </section>
<?php }else{ ?>
    <!-- Services-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Hello, Yuk daftar sebagai anggota Bumdes </h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <a class="btn btn-light btn-xl" href="#services">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Daftar Anggota</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5 ">

                <form method="post" action="<?= base_url('user/add_anggota') ?>">

                    <div class="form-floating mb-3">
                        <input type="text" name="nama" class="form-control" id="phone"  required="" data-sb-validations="required" />
                        <label for="phone">Nama</label>

                    </div>

                    <div class="form-floating mb-3">

                        <select class="form-control" name="jk" id="phone">
                            <option>Pilih Jenis Kelamin</option>
                            <option>Laki - Laki</option>
                            <option>Perempuan</option>
                        </select>


                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="tempat_lahir" class="form-control" id="phone" required=""  placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Tempat lahir</label>

                    </div>

                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_lahir" class="form-control" id="phone" required=""  placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Tanggal lahir</label>

                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="no_ktp" class="form-control" id="phone" required="" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Nomor KTP</label>

                    </div>

                    <div class="form-floating mb-3">
                        <input name="no_hp" class="form-control" id="phone" type="tel" required="" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Nomor Hp</label>

                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="alamat" required="" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Alamat</label>
                    </div> 

                    <button class="btn btn-danger btn-block">Daftar Anggota</button>              

                </form>

            </div>
        </div>
    </section>

<?php } ?>


