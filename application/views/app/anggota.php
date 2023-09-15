<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Anggota Simpan Pinjam</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Anggota</button>

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
                  <form method="post" action="<?= base_url('app/add_anggota') ?>">
                    <div class="form-group">
                      <label>Kode Anggota</label>
                      <input type="text" readonly name="kode" value="<?= $kode ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text"  name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jk" required="">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option>Laki - Laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <label>Tempat Lahir</label>
                      <input type="text"  name="tempat_lahir" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Tanggal Lahir</label>
                      <input type="date"  name="tgl_lahir" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>NO KTP</label>
                      <input type="number"  name="no_ktp" class="form-control" required>
                    </div>


                    <div class="form-group">
                      <label>NO HP</label>
                      <input type="number"  name="no_hp" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Alamat</label>
                      <textarea class="form-control" name="alamat"></textarea>
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
                <th>JK</th>
                <th>Tempat Lahir </th>
                <th>Tgl Lahir</th>
                <th>No KTP</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $no = 1;
              foreach ($anggota as $data) {
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode'] ?></td>
                  <td><?= $data['nama'] ?></td>

                  <td><?= $data['jk'] ?></td>
                  <td><?= $data['tempat_lahir'] ?></td>
                  <td><?= $data['tgl_lahir'] ?></td>
                  <td><?= $data['no_ktp'] ?></td>
                  <td><?= $data['no_hp'] ?></td>
                  <td><?= $data['alamat'] ?></td>
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
                            <form method="post" action="<?= base_url('app/hapus_anggota') ?>">
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

                  <button class="btn btn-warning btn-sm mt-2" data-toggle="modal" data-target="#modaledit<?= $data['id'] ?>">Edit</button>


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
                          <form method="post" action="<?= base_url('app/edit_anggota') ?>">
                           <input type="hidden" name="id" value="<?= $data['id'] ?>">
                           
                           <div class="form-group">
                            <label>Nama</label>
                            <input type="text"  name="nama" value="<?= $data['nama'] ?>" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jk" required="">
                              <option><?= $data['jk'] ?></option>
                              <option value="">-- Pilih Jenis Kelamin --</option>
                              <option>Laki - Laki</option>
                              <option>Perempuan</option>
                            </select>
                          </div>


                          <div class="form-group">
                            <label>Tempat Lahir</label>
                            <input type="text" value="<?= $data['tempat_lahir'] ?>"  name="tempat_lahir" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date"value="<?= $data['tgl_lahir'] ?>"  name="tgl_lahir" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>NO KTP</label>
                            <input type="number" value="<?= $data['no_ktp'] ?>"  name="no_ktp" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>NO HP</label>
                            <input type="number"  name="no_hp" value="<?= $data['no_hp'] ?>"   class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat"><?= $data['alamat'] ?></textarea>
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