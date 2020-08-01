<main class="akun-container">
  <div class="fik-section-title2">
    <span class="fas fa-door-open zzzz"></span>
    <h5>List Request Token Aktivasi</h5>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <div class="input-group">
    <div class="input-group-append">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">A-Z</a>
        <a class="dropdown-item" href="#">Terbaru</a>
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
            <th scope="col">Username</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col" class="action">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($user)) : ?>
            <td colspan="6" style="background-color: whitesmoke;text-align:center">List Request Token kosong</td>
          <?php else : ?>
            <?php $no = 0;
            foreach ($user as $t) : ?>
              <tr>
                <td scope="row" style="width:60px"><?= ++$no ?></td>
                <td style="width:90px">
                </td>
                <td><?= $t['username'] ?></td>
                <td><?= $t['name'] ?></td>
                <td><?= $t['email'] ?></td>
                <td class="action">
                  <a data-toggle="modal" data-target="#deletemodal<?= encrypt_url($t['id']); ?>"><span class="fas fa-times"></span></a>
                  <a data-toggle="modal" data-target="#sendtokenmodal<?= encrypt_url($t['id']); ?>"><span class="fas fa-check"></span></a>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </table>
  </div>
</main>
<!-- Modal for send token -->
<?php foreach ($user as $t) : ?>
  <div class="modal fade bd-example-modal-sm" id="sendtokenmodal<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Kirim token ke <?= $t['email'] ?> ?
        </div>
        <form action="../auth/sendtoken" method="post" enctype="multipart/form-data">
          <div class="modal-footer">
            <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
            <input type="hidden" id="email" name="email" value="<?= $t['email']; ?>">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="sendtoken" class="btn btn-primary btn-sm">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>
<!-- Modak for delete -->
<?php foreach ($user as $t) : ?>
  <div class="modal fade bd-example-modal-sm" id="deletemodal<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Tolak request token <?= $t['name'] ?> ?
        </div>
        <form action="deletetokenrequest" method="post" enctype="multipart/form-data">
          <div class="modal-footer">
            <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="deletetoken" class="btn btn-danger btn-sm">Tolak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>