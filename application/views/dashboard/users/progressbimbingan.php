<!-- Main Container -->
<main class="akun-container">

  <div class="fik-section-title2">
    <h4>Bimbingan</h4>
  </div>

  Nama : <?= $mhsbyid['name'] ?> <br>
  NIM : <?= $mhsbyid['nim'] ?> <br>
  Prodi : <?= $mhsbyid['prodi'] ?>
  <br>
  <br>
  <form action="#">
    <input type="hidden" value="siap_sidang" />
    <button type="submit" class="btn btn-sm btn-primary" style="color:#fff">Berikan Siap Sidang</button>
  </form>
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
                <?= $f['pdf_file'] ?> <br>
                <a href="#" class="btn badge badge-secondary">Unduh</a>
              </td>
              <td>
                <!-- <a href="</?= base_url('users/viewfilepdf/') . encrypt_url($f['id']); ?>">view </a> -->
                <!-- <a href="<?= base_url('thesis/view/' . $f['id']) ?>">view </a> -->
                <!-- <?= $f['id'] ?> <br> -->
                <!-- <a href="<?= base_url('thesis/'. $f['id']) ?>">view </a> -->
                <!-- <a href="<?= base_url('thesis') ?>">view </a> -->
                <form action="<?= base_url('thesis') ?>" method="post">
                  <input type="text" name="thesis_id" value="<?=$f['id']?>" hidden>
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
  <!-- <?php var_dump($filebimbingan) ?> -->

</main>
<!-- End Main Container -->

<!-- Modal Bimbingan - Dosen -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Upload Feedback untuk Mahasiswa</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#">
        <div class="modal-body">
          <input type="hidden" id="nama_mahasiswa" value="Fulan Bin Fulan">
          <input type="hidden" id="nim_mahasiswa" value="0123456789">
          <div class="form-group">
            <label for="exampleFormControlFile1">Pilih Dokumen</label>
            <input type="file" class="form-control" id="exampleFormControlFile1" style="padding:13px 16px">
          </div>
          <div class="form-group" style="margin-bottom:0;">
            <label for="ketbim">Pesan Singkat</label>
            <textarea class="form-control" style="padding:12px" rows="5" id="ketbim" aria-describedby="keterangan" placeholder="Pesan ..." maxlength="160"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
          <button type="submit" class="btn btn-sm btn-primary">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>