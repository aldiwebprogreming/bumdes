<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Order Produk</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


          <div class="table-responsive-sm">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>No KTP</th>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Total Harga</th>
                  <th>Alamat Pengantaran</th>
                  <th>Bukti</th>
                  <th>Status</th>
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
                      <?= $data['nama'] ?>

                    </td>
                    <td><?= $data['noktp'] ?></td>
                    <td><?= $data['produk'] ?></td>
                    <td><?= $data['harga'] ?></td>
                    <td><?= $data['qty'] ?></td>
                    <td><?= $data['total_harga'] ?></td>
                    <td><?= $data['alamat_pengantaran'] ?></td>

                    <td>
                      <a href="<?= base_url('assets/bukti/').$data['bukti'] ?>" target="_blank">
                        <img src="<?= base_url('assets/bukti/').$data['bukti'] ?>" style="height: 100px;">
                      </a>
                    </td>
                    <td><?= $data['status'] ?></td>
                    <td>
                      <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?= $data['id'] ?>">Setujui</button>


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
                              <form method="post" action="<?= base_url('app/setujui_pembayaran') ?>">
                               <input type="hidden" name="id" value="<?= $data['kode'] ?>">
                               <h5>Apakah anda ingin menyetujui pembayaran ini ?</h5>

                             </div>
                             <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-primary">Yes</button>
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