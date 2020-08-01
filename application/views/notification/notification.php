  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Notifikasi</h5>
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
              <th scope="col" style="width:90px">&nbsp;</th>
              <th scope="col">&nbsp;</th>
              <th scope="col">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($notification)) : ?>
              <td colspan="6" style="background-color: whitesmoke;text-align:center">Notifikasi Kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($notification as $n) : ?>
                <?php if ($n->status == 'unread') : ?>
                <tr style='border-left: 10px solid #fb8c00'>
                <?php else : ?>
                <tr>
                <?php endif; ?>
                  <a href="<?= base_url('borrowing/listAllWaiting') ?>">
                    <td scope="row" style="width:60px"><?= ++$no ?></td>
                    <td style="width:90px">
                      <div class="img-wrapper">
                        <img src="<?= base_url('uploads/item/'.$n->image) ?>"/>
                        <?= $n->name ?>
                      </div>
                    </td>
                    <td>
                      <ul style="list-style-type:none;">
                          <li><?= $n->quantity ?> <?= $n->description ?></li>
                          <li><?= $n->date ?></li>
                      </ul>
                    </td>
                    <td>
                      <a href="<?= site_url('notification/changeStatusReadBorrowing/'.$n->id) ?>"><span class="fas fa-arrow-right"></span></a>
                    </td>
                  </a>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </table>
    </div>
  </main>
  <!-- End Main Container -->