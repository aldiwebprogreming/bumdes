<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pengajuan Simpanan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Anggota Simpanan</button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/add_pengajuan_simpanan') ?>">
                    <div class="form-group">
                      <label>Kode Simpanan</label>
                      <input type="text" readonly name="kode" value="<?= $kode ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Nama Anggota</label>
                      <select class="form-control" name="anggota">
                        <option>-- Pilih anggota --</option>
                        <?php foreach ($anggota as $data) { ?>
                          <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                        <?php } ?>
                      </select>
                    </div>


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>


          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Anggota</th>
                <th>Status</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $no = 1;
              foreach ($ajuan as $data) {
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode'] ?></td>
                  <td>
                    <?php
                    $nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $data['id_anggota']])->row_array();
                    echo $nama['nama'];
                    ?>

                  </td>
                  <td>
                    <?php 
                    if($data['status'] == 1){
                      echo "Aktif";
                    }else{
                      echo "Tidak Aktif";
                    }
                    ?>
                  </td>
                  <td>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?= $data['id'] ?>">Hapus</button>

                    <?php 
                    if($data['status'] == 1){ ?>

                      <a href="<?= base_url('app/detail_simpanan?id=') ?><?= $data['id_anggota'] ?>" class="btn btn-primary btn-sm">Detail simpanan</a>

                      <?php   
                    }else{ ?>

                     <a href="<?= base_url('app/setujui_anggota?id=') ?><?= $data['id'] ?>" class="btn btn-primary btn-sm">Setujui</a>    

                     <?php   
                   }
                   ?>



                   <!-- Modal Hapus-->
                   <div class="modal fade" id="modalhapus<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?= base_url('app/hapus_pengajuan_simpanan') ?>">
                           <input type="hidden" name="id" value="<?= $data['id'] ?>">
                           <H5>Apakah anda ingin menghapus data ini ?</H5>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--    <button class="btn btn-warning btn-sm " data-toggle="modal" data-target="#modaledit<?= $data['id'] ?>">Edit</button> -->


                  <!-- Modal Edit-->
                  <div class="modal fade" id="modaledit<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit data</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="post" action="<?= base_url('app/edit_pengajuan_simpanan') ?>">
                           <input type="hidden" name="id" value="<?= $data['id'] ?>">

                           <div class="form-group">
                            <label>Kode Simpanan</label>
                            <input type="text" readonly name="kode" value="<?= $data['kode'] ?>" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Nama Anggota</label>
                            <select class="form-control" name="anggota">
                              <?php 
                              $nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $data['id_anggota']])->row_array();
                              ?>
                              <option value="<?= $nama['id'] ?>"><?= $nama['nama'] ?></option>
                              <option>-- Pilih anggota --</option>
                              <?php foreach ($anggota as $data) { ?>
                                <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                              <?php } ?>
                            </select>
                          </div>


                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </td>
            <?php } ?>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</div>
</div>
</div>