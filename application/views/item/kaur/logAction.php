  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>List Semua Barang</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">A-Z</a>
          <a class="dropdown-item" href="#">Terbaru</a>
          <a class="dropdown-item" href="#">Dosen</a>
          <a class="dropdown-item" href="#">Mahasiswa</a>
        </div>
      </div>
      <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">
      <table class="table">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" style="width:48px">No</th>
              <th scope="col">Peminjam</th>
              <th scope="col">Akses</th>
              <th scope="col">Awal Peminjaman</th>
              <th scope="col">Akhir Peminjaman</th>
              <th scope="col">Tujuan</th>
              <th scope="col">Barang</th>
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">Kuantitas</th>
              <th scope="col">Status</th>
              <th scope="col" class="action">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($borrowing)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">List kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($borrowing as $b) : ?>
                <tr>
                  <td scope="row" style="width:60px"><?= ++$no ?></td>
                  <td><?= $b->user_name ?></td>
                  <td><?= $b->access ?></td>
                  <td><?= $b->start ?></td>
                  <td><?= $b->end ?></td>
                  <td><?= $b->reason ?></td>
                  <td><?= $b->item_name ?></td>
                  <td style="width:90px">
                    <div class="img-wrapper">
                      <img src="<?= base_url('uploads/item/'.$b->image) ?>"/>
                    </div>
                  </td>
                  <td><?= $b->quantity ?></td>
                  <td><?= $b->status ?></td>
                  <td class="action">
                    <!-- <a data-toggle="modal" data-target=".bd-example-modal-sm"><span class="fas fa-trash"></span></a> -->
                    <!-- <a href="</?= base_url('item/edit').$i['id'] ?>"><span class="fas fa-edit"></span></a> -->
                    <a href="<?= site_url('borrowing/changeStatusAccepted/'.$b->borrowing_id.'/'.$b->user_id) ?>"><span class="fas fa-check"></span></a>
                    <a href="<?= site_url('borrowing/changeStatusDeclined/'.$b->borrowing_id.'/'.$b->user_id) ?>"><span class="fas fa-times"></span></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </table>
    </div>
  </main>
  <!-- End Main Container -->

  <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Hapus Barang ini?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
          <a type="button" class="btn btn-danger btn-sm">Hapus</a>
        </div>
      </div>
    </div>
  </div>