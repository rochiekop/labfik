<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <span class="fas fa-door-open zzzz"></span>
    <h5>Permintaan Peminjaman Tempat</h5>
  </div>
  <div class="input-group">
    <div class="input-group-append">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:5px 0 0 5px">Peminjam</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Dosen</a>
        <a class="dropdown-item" href="#">Mahasiswa</a>
      </div>
    </div>
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
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" style="width:20%;">Nama</th>
        <th scope="col">Ruangan</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Waktu</th>
        <th scope="col">Keterangan</th>
        <th scope="col">Status</th>
        <th scope="col" style="width:110px;text-align:center">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 0;
      foreach ($listbooking as $l) : ?>
        <tr>
          <th scope="row"><?= ++$no ?></th>
          <td><?= $l['role'] . ', ' . $l['name'] ?></td>
          <td><?= $l['kategori'] . ' - ' . $l['ruangan'] ?></td>
          <td><?= format_indo($l['date'], date('d-m-Y')); ?></td>
          <td><?= $l['time'] ?></td>
          <td><?= $l['keterangan'] ?></td>
          <td><?= $l['status'] ?></td>
          <?php if ($l['status'] == 'Menunggu Acc') : ?>
            <td class="action" style="width:110px;text-align:center;">
              <a href="<?= base_url('kaur/accepted/') . encrypt_url($l['id']); ?>" class="btn badge badge-success">Acc</a>
              <a data-toggle="modal" data-target="#declinedmodal<?= encrypt_url($l['id']); ?>" class="btn badge badge-danger" style="color: white;">Tolak</a>
            </td>
          <?php else : ?>
            <td></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</main>
<?php foreach ($listbooking as $t) : ?>
  <div class="modal fade bd-example-modal-sm" id="declinedmodal<?= encrypt_url($t['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-body">
          Tolak Peminjaman Tempat ?
        </div>
        <form action="kaur/changeDeclined" method="post" enctype="multipart/form-data">
          <div class="modal-footer">
            <input type="hidden" id="id" name="id" value="<?= $t['id'] ?>">
            <input type="hidden" id="date" name="date" value="<?= $t['date']; ?>">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
            <button type="submit" name="tolakpeminjaman" class="btn btn-danger btn-sm">Tolak</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>