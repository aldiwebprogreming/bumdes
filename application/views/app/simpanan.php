<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Simpanan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tamah Simpanan</button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post" action="<?= base_url('app/add_simpanan') ?>">
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" readonly name="kode" value="<?= $kode ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <select class="form-control" name="nama" required>
                        <option value="">-- Pilih Nama --</option>
                        <?php 
                        foreach ($anggota as $data) { ?>
                          <?php 
                          $nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $data['id_anggota']])->row_array();
                          ?>
                          <option value="<?= $data['id_anggota'] ?>"><?= $nama['nama'] ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Simpan</label>
                      <input type="date"  name="tgl" value="" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Jumlah Simpanan</label>
                      <input type="number"  name="simpanan" value="" class="form-control" required>
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
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Simpanan</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $no = 1;
              foreach ($simpanan as $data) {
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode'] ?></td>
                  <td><?= $data['nama'] ?></td>
                  <td><?= $data['tgl'] ?></td>
                  <td><?= $data['simpanan'] ?></td>
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
                            <form method="post" action="<?= base_url('app/hapus_simpanan') ?>">
                             <input type="hidden" name="id" value="<?= $data['id'] ?>">
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
                          <form method="post" action="<?= base_url('app/edit_simpanan') ?>">
                           <input type="hidden" name="id" value="<?= $data['id'] ?>">

                           <div class="form-group">
                            <label>Nama</label>
                            <select class="form-control" name="nama" required>
                              <option value="<?= $data['id_anggota'] ?>"><?= $data['nama'] ?></option>
                              <option value="">-- Pilih Nama --</option>
                              <?php 
                              foreach ($anggota as $dataa) { ?>
                                <?php 
                                $nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $dataa['id_anggota']])->row_array();
                                ?>
                                <option value="<?= $nama['id'] ?>"><?= $nama['nama'] ?></option>
                              <?php } ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Tanggal Simpan</label>
                            <input type="date"  name="tgl" value="<?= $data['tgl'] ?>" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Jumlah Simpanan</label>
                            <input type="number"  name="simpanan" value="<?= $data['simpanan'] ?>" class="form-control" required>
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