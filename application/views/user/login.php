

<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Login Anggota</h2>
        <hr class="divider" />
        <div class="row gx-4 gx-lg-5 ">

            <div class="col-sm-3">
            </div>

            <div class="col-sm-6">

                <form method="post" action="<?= base_url('user/act_login') ?>">

                    <div class="form-floating mb-3">
                        <input type="text" name="nama" class="form-control" id="phone"  required="" data-sb-validations="required" />
                        <label for="phone">Nama</label>

                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="no_ktp" class="form-control" id="phone" required=""  placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">No KTP</label>

                    </div>


                    <button type="submit" class="btn btn-danger w-100">Login Anggota</button> 

                    <a href="<?= base_url('user/anggota') ?>" class="btn btn-danger w-100 mt-3">Daftar Anggota</a>             

                </form>
            </div>

            <div class="col-sm-3">
            </div>


        </div>
    </div>
</section>



