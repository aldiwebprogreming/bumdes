<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Anggota Simpanan</h3>
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
                <th>Total Simpanan</th>
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

                   <p class="text-success">Simpanan aktif</p>
                 </td>
                 <td>
                   <?php 
                   $this->db->select_sum('simpanan');
                   $this->db->where('id_anggota', $data['id_anggota']);
                   $total = $this->db->get('tbl_simpanan')->row_array();
                   echo "Rp " . number_format($total['simpanan'],2,',','.'); 
                   ?>
                 </td>
                 <td>
                  <!--   <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?= $data['id'] ?>">Hapus</button> -->

                  <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?= $data['id'] ?>">Tarik Simpanan</button>

                  <a href="<?= base_url('app/detail_simpanan?id=') ?><?= $data['id_anggota'] ?>" class="btn btn-primary btn-sm">Detail simpanan</a>

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
                          <form method="post" action="<?= base_url('app/tarik_simpanan') ?>">
                           <input type="hidden" name="id" value="<?= $data['id'] ?>">
                           <input type="hidden" name="id_anggota" value="<?= $data['id_anggota'] ?>">
                           <h5>Apakah anda ingin menarik simpanan anda ?</h5>
                           Total tabungan anda : <strong><?= "Rp " . number_format($total['simpanan'],2,',','.');  ?></strong>
                           anda akan di kenakan potongan <strong>3%</strong> dari jumlah tabungan anda, jumlah tabungan yang akan di terima adalah <strong>
                             <?php 
                             $a =  (3/100) * $total['simpanan'];
                             $hasil = $total['simpanan'] - $a;
                             echo "Rp " . number_format($hasil,2,',','.');  
                             ?>
                           </strong>

                           <input type="hidden" name="jml" value="<?= $a ?>">
                           <input type="hidden" name="pendapatan" value="penarikan simpanan">
                           <input type="hidden" name="keterangan" value="penarikan simpanan">
                         </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                          <button type="submit" class="btn btn-primary">Tarik</button>
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