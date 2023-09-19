<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data User</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah User</button>

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
                  <form method="post" action="<?= base_url('app/act_user') ?>">
                    <div class="form-group">
                      <label>Kode</label>
                      <input type="text" readonly name="kode" value="<?= $kode ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text"  name="nama" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select class="form-control" name="jk">
                        <option>-- Pilih Jenis Kelamin --</option>
                        <option>Laki - laki</option>
                        <option>Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Tgl Lahir</label>
                      <input type="date"  name="tgl_lahir" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Email</label>
                      <input type="email"  name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>No Hp</label>
                      <input type="number"  name="nohp" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Jabatan</label>
                      <select class="form-control" name="jabatan">
                        <option> -- Pilih Jabatan --</option>
                        <?php foreach ($jabatan as $data) { ?>
                          <option><?= $data['jabatan'] ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Username</label>
                      <input type="text"  name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password"  name="password" class="form-control" required>
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
                <th>Tgl lahir</th>
                <th>JK</th>
                <th>Email</th>
                <th>Nohp</th>
                <th>Jabatan</th>
                <th>Username</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              $no = 1;
              foreach ($user as $data) {
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode'] ?></td>
                  <td><?= $data['nama'] ?></td>
                  <td><?= $data['tgl_lahir'] ?></td>
                  <td><?= $data['jk'] ?></td>
                  <td><?= $data['email'] ?></td>
                  <td><?= $data['nohp'] ?></td>
                  <td><?= $data['jabatan'] ?></td>
                  <td><?= $data['username'] ?></td>
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
                            <form method="post" action="<?= base_url('app/hapus_user') ?>">
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
                          <form method="post" action="<?= base_url('app/edit_user') ?>">
                           <input type="hidden" name="id" value="<?= $data['id'] ?>">
                           <div class="form-group">

                            <label>Kode</label>
                            <input type="text" readonly name="kode" value="<?= $kode ?>" class="form-control" required>
                          </div>
                          <div class="form-group">
                            <label>Nama</label>
                            <input type="text" value="<?= $data['nama'] ?>"  name="nama" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="jk">
                              <option><?= $data['jk'] ?></option>
                              <option>-- Pilih Jenis Kelamin --</option>
                              <option>Laki - laki</option>
                              <option>Perempuan</option>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Tgl Lahir</label>
                            <input type="date" value="<?= $data['tgl_lahir'] ?>"  name="tgl_lahir" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" value="<?= $data['email'] ?>" name="email" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>No Hp</label>
                            <input type="number" value="<?= $data['nohp'] ?>"  name="nohp" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Jabatan</label>
                            <select class="form-control" name="jabatan">
                              <option><?= $data['jabatan'] ?></option>
                              <option> -- Pilih Jabatan --</option>
                              <?php foreach ($jabatan as $data2) { ?>
                                <option><?= $data2['jabatan'] ?></option>
                              <?php } ?>
                            </select>
                          </div>

                          <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="<?= $data['username'] ?>" name="username" class="form-control" required>
                          </div>

                          <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password"  name="password"  class="form-control" required>
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