  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Peminjaman Tempat</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:5px 0 0 5px">Filter</button>
        <div class="dropdown-menu">
          <?php if (!empty($kruangan)) : ?>
            <?php foreach ($kruangan as $k) : ?>
              <a class="dropdown-item" href="#"><?= $k['kategori']; ?></a>
            <?php endforeach; ?>
          <?php else : ?>
            <a class="dropdown-item" href="#">Diterima</a>
            <a class="dropdown-item" href="#">Ditolak</a>
          <?php endif; ?>
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
    <div class="table-responsive admin-list">
      <table class="table">
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
            foreach ($booking as $l) : ?>
              <tr>
                <th scope="row"><?= ++$no ?></th>
                <td><?= $l['role'] . ', ' . $l['name'] ?></td>
                <td><?= $l['kategori'] . ' - ' . $l['ruangan'] ?></td>
                <td><?= format_indo($l['date'], date('d-m-Y')); ?></td>
                <td><?= $l['time'] ?></td>
                <td><?= $l['keterangan'] ?></td>
                <td><b><?= $l['status'] ?></b></td>
                <td class="action">
                  <a data-toggle="modal" data-target="#<?= encrypt_url($l['id']) ?>"><span class="fas fa-trash"></span></a>
                  <a href="<?= base_url('admin/editpeminjaman/') . encrypt_url($l['id']) ?>"><span class="fas fa-edit"></span></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </table>
    </div>
  </main>
  <!-- End Main Container -->

  <?php foreach ($booking as $t) : ?>
    <div class="modal fade bd-example-modal-sm" id="<?= encrypt_url($t['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-body">
            Hapus Peminjaman Tempat?
          </div>
          <form action="deletebooking" method="post" enctype="multipart/form-data">
            <div class="modal-footer">
              <input type="hidden" id="id" name="id" value="<?= $t['id']; ?>">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="deletedata" class="btn btn-danger btn-sm">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>