<!-- Main Container -->
<main class="akun-container">

  <div class="fik-section-title2">
    <h4>Bimbingan</h4>
  </div>

  Nama &nbsp&nbsp: <?= $mhsbyid['name'] ?> <br>
  NIM &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhsbyid['nim'] ?> <br>
  Prodi &nbsp&nbsp&nbsp&nbsp: <?= $mhsbyid['prodi'] ?>
  <br>
  <br>

  <input type="hidden" value="siap_sidang" />
  <?php
  for ($x = 1; $x <= 4; $x++) {
    if ($x - 1 == count($preview)) {
      echo '<button class="btn btn-sm btn-primary" style="color:#fff;margin-right:5px;" data-toggle="modal" data-target="#previewmodal">Preview ' . $x . '</button>';
    } else {
      echo '<button class="btn btn-sm btn-secondary" disabled style="color:#fff;margin-right:5px;">Preview ' . $x . '</button>';
    }
  }
  if (count($preview) == 4) {
    echo '<button type="submit" class="btn btn-sm btn-primary" style="color:#fff">Berikan Siap Sidang</button>';
  } else {
    echo '<button type="submit" class="btn btn-sm btn-secondary" disabled style="color:#fff">Berikan Siap Sidang</button>';
  }
  ?>
  <br>
  <br>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" style="width:35%;">Keterangan</th>
          <th scope="col">File</th>
          <th scope="col">View Dokumen</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($filebimbingan)) : ?>
          <td colspan="6" style="background-color: whitesmoke;text-align:center">Daftar permintaan bimbingan kosong</td>
        <?php else : ?>
          <?php $no = 0;
          foreach ($filebimbingan as $f) : ?>
            <tr>
              <th scope="row"><?= ++$no ?></th>
              <td>
                <?= $f['keterangan'] ?>
              </td>
              <td>
                <?php
                $file = explode(",", $f['pdf_file']);
                foreach ($file as $t) {
                  echo "$t <br>";
                }
                ?>
                <a href="#" class="btn badge badge-secondary">Unduh</a>
              </td>
              <td>
                <!-- <a href="</?= base_url('users/viewfilepdf/') . encrypt_url($f['id']); ?>">view </a> -->
                <!-- <a href="<?= base_url('thesis/view/' . $f['id']) ?>">view </a> -->
                <!-- <?= $f['id'] ?> <br> -->
                <!-- <a href="<?= base_url('thesis/' . $f['id']) ?>">view </a> -->
                <!-- <a href="<?= base_url('thesis') ?>">view </a> -->
                <form action="<?= base_url('thesis') ?>" method="post">
                  <input type="text" name="thesis_id" value="<?= $f['id'] ?>" hidden>
                  <button type="submit">lihat</button>
                </form>
              </td>
              <td>
                <a href="#" class="btn badge badge-success">Selesai</a>
                <a href="#" class="btn badge badge-danger">Revisi</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>
<!-- End Main Container -->

<!-- Modal Preview-->
<?php foreach ($preview as $t) : ?>
  <div class="modal fade bd-example-modal-sm" id="previewmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Kirim <?= $t['status'] ?> ?
        </div>
        <form action="deletelab" method="post" enctype="multipart/form-data">
          <div class="modal-footer">
            <!-- <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>"> -->
            <!-- <input type="hidden" id="image" name="image" value="<?= $t['images']; ?>"> -->
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="preview" class="btn btn-primary btn-sm">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>