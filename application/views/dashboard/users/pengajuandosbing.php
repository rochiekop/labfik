  <!-- Main Container -->
  <main class="akun-container">

    <div class="fik-section-title2">
      <h4>Pengajuan</h4>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <?php if (count($dosbing) < 2) : ?>
      <a data-toggle="modal" data-target="#exampleModal" class="btn btn-sm btn-secondary" style="color:#fff">Buat</a>
    <?php endif; ?>
    <br>
    <br>
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Dosen Pembimbing</th>
            <th scope="col">Tanggal Pengajuan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($dosbing)) : ?>
            <td colspan="5" style="background-color: whitesmoke;text-align:center">Daftar dosen pembimbing kosong</td>
          <?php else : ?>
            <?php $no = 0;
            foreach ($dosbing as $t) : ?>
              <tr>
                <th scope="row"><?= ++$no ?></th>
                <td><?= $t['nama_dosen'] ?></td>
                <td><?= format_indo($t['date'], date('d-m-Y')); ?></td>
                <td><?= $t['status'] ?></td>
                <?php if ($t['status'] == "Menunggu Persetujuan") : ?>
                  <td><a data-toggle="modal" data-target="#<?= encrypt_url($t['id']); ?>" class="badge badge-danger" style="color:white">Batalkan</a></td>
                <?php elseif ($t['status'] == "Sudah Disetujui") : ?>
                  <td><a href="#" class="badge badge-success">Bimbingan</a></td>
                <?php else : ?>
                  <td></td>
                <?php endif; ?>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- <?php var_dump($dosbing) ?> -->

  </main>
  <!-- End Main Container -->


  <!-- Modal Pengajuan -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="exampleModalLabel">Buat Pengajuan Dosen Pembimbing</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('users/pengajuandosbing') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" id="id_mhs" name="id_mhs" value="<?= $mhs['id'] ?>">
            <div class="form-group">
              <select class="form-control" id="dosbing" name="dosbing" title="Pilih Dosen Pembimbing" required>
                <option value="">Pilih Dosen Pembimbing</option>
                <?php foreach ($dosen as $d) : ?>
                  <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                <?php endforeach; ?>
              </select>
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

  <!-- <?php var_dump($dosen) ?> -->
  <!-- Modal Delete Pengajuan -->
  <?php foreach ($dosbing as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Batalkan Pengajuan ?
          </div>
          <form action="deletepengajuandosbing" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Batalkan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>