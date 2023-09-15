<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pembayaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Pembayaran</button>

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
                  <form method="post" action="<?= base_url('app/add_pembayaran') ?>">

                   <div class="form-group">
                    <label>Kode</label>
                    <input type="text" name="kode" value="<?= $kode ?>" readonly class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label>Nama Anggota</label>
                    <select class="form-control" name="id_anggota">
                      <option>-- Pilih anggota --</option>
                      <?php foreach ($anggota as $data) { ?>
                       <?php 
                       $nama = $this->db->get_where('tbl_anggota_simpanpinjam', ['id' => $data['id_anggota']])->row_array();
                       ?>
                       <option value="<?= $nama['id'] ?>"><?= $nama['nama'] ?></option>
                     <?php } ?>
                   </select>
                 </div>

                 <div class="form-group">
                  <label>Jml Pembayaran</label>
                  <input type="text" name="jml_pembayaran" value="" class="form-control" required>
                </div>


                <div class="form-group">
                  <label>Tanggal Pembayaran</label>
                  <input type="date" name="tgl" value="" class="form-control" required>
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
              <th>Anggota</th>
              <th>Jml Pembayaran</th>
              <th>Sisa Pinjaman</th>
              <th>Tanggal</th>

            </tr>
          </thead>
          <tbody>

            <?php 
            $no = 1;
            foreach ($pembayaran as $data) {
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
                <td><?= $data['jml_pembayaran'] ?></td>
                <td><?= $data['sisa_pembayaran'] ?></td>
                <td><?= $data['tgl'] ?></td>
                
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