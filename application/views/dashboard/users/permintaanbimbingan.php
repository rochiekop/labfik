<!-- Main Container -->
<main class="akun-container">

  <div class="fik-section-title2">
    <h4>Permintaan Bimbingan</h4>
  </div>
  <?= $this->session->flashdata('message'); ?>
  <div class="input-group">
    <div class="input-group-append">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">A-Z</a>
        <a class="dropdown-item" href="#">NIM</a>
        <a class="dropdown-item" href="#">Nama</a>
        <a class="dropdown-item" href="#">Prodi</a>
        <a class="dropdown-item" href="#">Judul</a>
        <a class="dropdown-item" href="#">Status</a>
      </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
  </div><br>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Mahasiswa</th>
          <th scope="col">NIM</th>
          <th scope="col">Prodi</th>
          <th scope="col">Judul TA</th>
          <th scope="col">Status</th>
          <th scope="col" style="width:130px">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($pbimbingan)) : ?>
          <td colspan="7" style="background-color: whitesmoke;text-align:center">Daftar permintaan bimbingan kosong</td>
        <?php else : ?>
          <?php $no = 0;
          foreach ($pbimbingan as $t) : ?>
            <tr>
              <th scope="row"><?= ++$no ?></th>
              <td><?= $t['nama_mhs'] ?></td>
              <td><?= $t['nim'] ?></td>
              <td><?= $t['prodi'] ?></td>
              <td><?= $t['judul'] ?></td>
              <?php if ($t['status'] == "Menunggu Persetujuan") : ?>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;~</td>
                <td class="action" style="width:130px">
                  <a href="<?= base_url('users/acceptedbimbingan/') . $t['id'] ?>" class="btn badge badge-success">Terima</a>
                  <a data-toggle="modal" data-target="#<?= encrypt_url($t['id']); ?>" class="badge badge-danger" style="color:white">Tolak</a>
                </td>
              <?php elseif ($t['status'] == "Sudah Disetujui") : ?>
                <td>Diterima</td>
                <td> <a data-toggle="modal" data-target="#<?= encrypt_url($t['id']); ?>" class="badge badge-danger" style="color:white">Batalkan</a></td>
              <?php else : ?>
                <td>Ditolak</td>
                <td></td>
              <?php endif; ?>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</main>
<!-- End Main Container -->

<!-- Modal Tolak Permintaan -->
<?php foreach ($pbimbingan as $t) : ?>
  <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Tolak Permintan Bimbingan ?
        </div>
        <form action="tolakpermintaanbimbingan" method="post" enctype="multipart/form-data">
          <div class="modal-footer">
            <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Tolak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>