<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Produk</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Produk</button>

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
                  <form method="post" action="<?= base_url('app/add_produk') ?>" enctype="multipart/form-data">

                   <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode" value="<?= $kode ?>" readonly class="form-control" required>
                  </div>



                  <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" value="" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea class="form-control" name="keterangan"></textarea>
                  </div>


                  <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" value="" class="form-control" required>
                  </div>


                  <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" value="" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Gambar produk</label>
                    <input type="file" name="gambar" value="" class="form-control" required>
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

        <div class="table-responsive-sm">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Keterangan</th>
                <th>Gambar</th>
                <th>Opsi</th>

              </tr>
            </thead>
            <tbody>

              <?php 
              $no = 1;
              foreach ($produk as $data) {
                ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data['kode'] ?></td>
                  <td>
                    <?= $data['nama_produk'] ?>

                  </td>
                  <td><?= $data['harga'] ?></td>
                  <td><?= $data['stok'] ?></td>
                  <td><?= $data['keterangan'] ?></td>
                  <td><img src="<?= base_url('assets/produk/') ?><?= $data['gambar'] ?>" class="img-resvonsip" style="height: 100px;"></td>
                  <td>
                   <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?= $data['id'] ?>">Edit</button>
                   <!-- Modal Edit-->


                   <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?= $data['id'] ?>">Hapus</button>
                   <!-- Modal Hapus-->

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
                          <form method="post" action="<?= base_url('app/hapus_produk') ?>">
                           <input type="hidden" name="id" value="<?= $data['id'] ?>">
                           
                           <h4>Aapakah anda ingin menghapus data ini ? </h4>
                           <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


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
                        <form method="post" action="<?= base_url('app/edit_produk') ?>" enctype="multipart/form-data">
                         <input type="hidden" name="id" value="<?= $data['id'] ?>">




                         <div class="form-group">
                          <label>Nama Produk</label>
                          <input type="text" name="nama_produk" value="<?= $data['nama_produk'] ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label>Keterangan</label>
                          <textarea class="form-control" name="keterangan"><?= $data['keterangan'] ?></textarea>
                        </div>


                        <div class="form-group">
                          <label>Stok</label>
                          <input type="number" name="stok" value="<?= $data['stok'] ?>" class="form-control" required>
                        </div>


                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" name="harga" value="<?= $data['harga'] ?>" class="form-control" required>
                        </div>

                        <div class="form-group">
                          <label>Gambar produk</label>
                          <input type="file" name="gambar" value="" class="form-control">
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
</div>