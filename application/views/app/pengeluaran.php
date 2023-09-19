<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pengeluaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Pengeluaran</button>

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
                  <form method="post" action="<?= base_url('app/add_pengeluaran') ?>">
                    <div class="form-group">
                      <label>Nama pengeluran</label>
                      <input type="text"  name="nama_pengeluaran" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="keterangan" required></textarea>
                    </div>
                    <div class="form-group">
                      <label>Jumlah</label>
                      <input type="number"  name="jml" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date"  name="tgl" class="form-control" required>
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
                <th>Nama Pengeluaran</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $no = 1;
              foreach ($pengeluaran as $data) {
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['nama_pengeluaran'] ?></td>
                  <td><?= $data['keterangan'] ?></td>
                  <td><?= $data['jml'] ?></td>
                  <td><?= $data['tgl'] ?></td>
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
                            <form method="post" action="<?= base_url('app/hapus_pengeluaran') ?>">
                              <input type="hidden" name="id" value="<?= $data['id'] ?>">
                              <input type="hidden" name="jml" value="<?= $data['jml'] ?>">
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
                            <form method="post" action="<?= base_url('app/edit_pengeluaran') ?>">
                              <input type="hidden" name="id" value="<?= $data['id'] ?>">
                              <input type="hidden" name="jml2" value="<?= $data['jml'] ?>">

                              <div class="form-group">
                                <label>Nama pengeluaran</label>
                                <input type="text"  name="nama_pengeluaran" value="<?= $data['nama_pengeluaran'] ?>" class="form-control" required>
                              </div>

                              <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" required><?= $data['keterangan'] ?></textarea>
                              </div>
                              <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number"  name="jml" class="form-control" value="<?= $data['jml'] ?>" required>
                              </div>


                              <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date"  name="tgl" class="form-control" value="<?= $data['tgl'] ?>" required>
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

          <h5 class="mt-4">Total pendapatan anda : Rp <?= $total['jml'] ?>  || Total saldo anda : Rp <?= $saldo['total'] ?> </h5>
        </div>

      </div>
    </div>
  </div>
</div>