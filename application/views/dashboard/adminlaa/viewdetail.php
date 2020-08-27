  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <h4>File Pendaftaran</h4>
    </div>
    <br>
    Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['name'] ?> <br>
    NIM &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['nim'] ?> <br>
    Prodi &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['prodi'] ?><br>
    Kosentrasi &nbsp&nbsp: <?= $mhs['peminatan'] ?> <br>
    Tahun &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?= $mhs['tahun'] ?>
    <br>
    <br>
    <div id="container">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" style="width:30px"></th>
              <th scope="col">Nama File</th>
              <th scope="col">File</th>
              <th scope="col">Lihat</th>
              <th scope="col">Action</th>
              <th scope="col">Status</th>
              <th scope="col">Alasan</th>
            </tr>
          </thead>
          <tbody id="bimbingan">
            <?php if (empty($file)) : ?>
              <td colspan="7" style="background-color: whitesmoke;text-align:center">List Bimbingan kosong</td>
            <?php else : ?>
              <?php $no = 0;
              foreach ($file as $f) : ?>
                <tr>
                  <td><?= ++$no ?></td>
                  <td></td>
                  <td><?= $f['nama'] ?></td>
                  <td> <a href="<?= base_url('assets/upload/thesis/') . $f['username'] . '/' . $f['file'] ?>" download title="Download File"><?= $f['file'] ?></a></td>
                  <td> <a data-toggle="modal" data-target="#exampleModal<?= $f['id'] ?>" class="btn badge badge-secondary" style="color: white;">Lihat</a></td>
                  <?php if ($f['status'] == "Dikirim" or $f['status'] == "Update File") : ?>
                    <td> <a href="<?= base_url('adminlaa/accfilependaftaran/') . encrypt_url($f['id']); ?>" class="btn badge badge-success">Acc</a>
                      <a data-toggle="modal" data-target="#tolak<?= $f['id'] ?>" class="btn badge badge-danger" style="color: white;">Tolak</a>
                    </td>
                    <td></td>
                    <td></td>
                  <?php elseif ($f['status'] == "Acc Admin LAA") : ?>
                    <td></td>
                    <td><b>Acc</b></td>
                    <td></td>
                  <?php elseif ($f['status'] == "Ditolak Admin LAA") : ?>
                    <td></td>
                    <td><b>Tolak</b></td>
                    <td><?= $f['komentar'] ?></td>
                  <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
  <!-- End Main Container -->

  <?php foreach ($file as $m) : ?>
    <div class="modal fade bd-example-modal-lg" id="exampleModal<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"><?= $m['nama'] ?></h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <embed src="<?= base_url('assets/upload/thesis/') . $m['username'] . '/' . $m['file'] ?>" width="100%" height="650px" type="application/pdf">
            </embed>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <?php foreach ($file as $f) : ?>
    <!-- Modal -->
    <div class="modal fade" id="tolak<?= $f['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel"> Tolak Dokumen <?= $f['nama'] ?> ?</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('adminlaa/tolakfilependaftaran') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="id" value="<?= $f['id'] ?>">
              <div class="form-group" style="margin-bottom:0;">
                <label for="exampleFormControlTextarea1"><b>Berikan Feedback</b></label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="komentar" rows="3" placeholder="Contoh: KSM Salah"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batalkan</button>
              <button type="submit" class="btn btn-sm btn-danger">Kirim</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  <?php endforeach; ?>