<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pengajuan Pinjaman</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Pengajuan Pinjaman</button>

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
                  <form method="post" action="<?= base_url('app/add_pengajuan_pinjaman') ?>">

                    <div class="form-group">
                      <label>Nama Anggota</label>
                      <select class="form-control" name="anggota">
                        <option>-- Pilih anggota --</option>
                        <?php foreach ($anggota as $data) { ?>
                          <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Jml Pinjaman</label>
                      <input type="text"  name="jml_pinjaman" value="" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label>Waktu Pinjaman</label>
                      <select class="form-control" name="waktu_pinjaman">
                        <option>-- Pilih Waktu Pinjaman --</option>
                        <?php 
                        for ($i=1; $i < 13 ; $i++) { 
                          ?>

                          <option value="<?= $i ?>"><?= $i ?> Bulan</option>
                        <?php } ?>

                      </select>
                    </div>


                    <label>Bunga</label>
                    <div class="input-group mb-3">
                      <input type="text" name="bunga" class="form-control" required>
                      <span class="input-group-text" id="basic-addon2">%</span>
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
                  <th>Anggota</th>
                  <th>Jml Pinjaman</th>
                  <th>Waktu Pinjaman</th>
                  <th>Tgl Mulai</th>
                  <th>Tgl Berakhir</th>
                  <th>Bunga</th>
                  <th>Total Pembayaran</th>
                  <th>Sisa Pembayaran</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>

                <?php 
                $no = 1;
                foreach ($ajuan as $data) {
                  ?>
                  <?php 
                  if($data['total_pembayaran'] == 0){ ?>
                    <tr style="background-color: orange;">
                    <?php }else{ ?>
                      <tr>
                      <?php } ?>
                      <td><?= $no++ ?></td>
                      <td>
                        <?php
                        $nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $data['id_anggota']])->row_array();
                        echo $nama['nama'];
                        ?>

                      </td>
                      <td><?= $data['jml_pinjaman'] ?></td>
                      <td><?= $data['waktu_pinjaman'] ?> Bulan</td>
                      <td><?= $data['tgl_mulai'] ?></td>
                      <td><?= $data['tgl_berakhir'] ?></td>
                      <td><?= $data['bunga'] ?>%</td>
                      <td>
                        <?php 
                        $a =  ($data['bunga']/100) * $data['jml_pinjaman'];
                        echo $total_pembayaran = $data['jml_pinjaman'] + $a;
                        ?>
                      </td>
                      <td><?= $data['total_pembayaran'] ?></td>
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
                        <?php 
                        if($data['total_pembayaran'] == 0){
                          if($data['status_hasil'] == 0){
                            ?>


                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modallunas<?= $data['id'] ?>">Lunas</button>

                          <?php } } ?>
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?= $data['id'] ?>">Hapus</button>

                          <?php 
                          if($data['status'] == 1){ ?>

                            <a href="<?= base_url('app/detail_pembayaran?id=') ?><?= $data['id_anggota'] ?>" class="btn btn-primary btn-sm">Detail</a>

                            <?php   
                          }else{ ?>

                           <a href="<?= base_url('app/setujui_anggota2?id=') ?><?= $data['id'] ?>" class="btn btn-primary btn-sm">Setujui</a>    

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
                                <form method="post" action="<?= base_url('app/hapus_pengajuan_pinjaman') ?>">
                                 <input type="hidden" name="id" value="<?= $data['id'] ?>">

                                 <H5>Apakah anda ingin menghapus data ini ?</H5>
                               </div>
                               <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Hapus</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Modal Hapus-->
                      <div class="modal fade" id="modallunas<?= $data['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Pesan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="post" action="<?= base_url('app/add_hasilpinjam') ?>">
                               <input type="hidden" name="id" value="<?= $data['id_anggota'] ?>">
                               <input type="hidden" name="bunga" value="<?= $data['bunga'] ?>">
                               <input type="hidden" name="jml_pinjaman" value="<?= $data['jml_pinjaman'] ?>">
                               <h4>Pembaryan lunas, masukan ke untungan anda di data keuangan
                                 <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                  <button type="submit" class="btn btn-primary">Yes</button>
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
</div>