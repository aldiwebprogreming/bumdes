<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Level</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Level</button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal input</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/act_level') ?>">
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" readonly name="kode" value="<?= $kode ?>" class="form-control" required>
                    </div> 
                    <div class="form-group">
                      <label>Level</label>
                      <input type="text"  name="level" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Hak Akses</label>
                    </div>

                    <?php foreach ($menu as $mm) { ?>
                      <div class="form-check">
                        <input class="form-check-input" name="menu[]" value="<?= $mm['id'] ?>" type="checkbox" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          <?= $mm['title'] ?>
                        </label>
                      </div>

                    <?php } ?>


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
                <th>Level</th>
                <th>Hak Akses</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $no = 1;
              foreach ($level as $data) {
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode'] ?></td>
                  <td><?= $data['level'] ?></td>
                  <td></td>
                  <td>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?= $data['id'] ?>">Hapus</button>

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
                            <form method="post" action="<?= base_url('app/hapus_level') ?>">
                             <input type="hidden" name="id" value="<?= $data['id'] ?>">
                             <input type="hidden" name="level" value="<?= $data['level'] ?>">
                             <h4>Apakah anda ingin menghapus data ini ?</h4>
                           </div>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?= $data['id'] ?>">Edit</button>


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
                          <form method="post" action="<?= base_url('app/edit_level') ?>">
                           <input type="hidden" name="id" value="<?= $data['id'] ?>">
                           <div class="form-group">
                            <label>Kode</label>
                            <input type="text" readonly name="kode" value="<?= $data['kode'] ?>" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Level</label>
                            <input type="text"  name="level" value="<?= $data['level'] ?>" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Hak Akses</label>
                          </div>

                          <?php foreach ($menu as $mm) { ?>

                            <?php 
                            $this->db->where('level', $data['level']);
                            $this->db->where('id_menu', $mm['id']);
                            $cek = $this->db->get('tbl_hak_akses')->row_array();
                            ?>
                            <div class="form-check">
                              <input class="form-check-input" name="menu[]" <?= $cek == true ? 'checked' : '' ?> value="<?= $mm['id'] ?>" type="checkbox" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                <?= $mm['title'] ?>
                              </label>
                            </div>

                          <?php } ?>


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