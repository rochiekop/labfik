  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Riwayat Peminjaman Tempat</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">A-Z</a>
          <a class="dropdown-item" href="#">Tanggal</a>
          <a class="dropdown-item" href="#">Waktu</a>
        </div>
      </div>
      <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div class="table-responsive admin-list">

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
          </tr>
        </thead>
        <tbody>
          <?php $no = 0;
          foreach ($mybooking as $l) : ?>
            <tr>
              <th scope="row"><?= ++$no ?></th>
              <td><?= $l['name'] ?></td>
              <td><?= $l['kategori'] . ' - ' . $l['ruangan'] ?></td>
              <?php if ($l['status'] == 'Ditolak') : ?>
                <td><?= $l['date_declined'] ?></td>
              <?php else : ?>
                <td><?= $l['date'] ?></td>
              <?php endif; ?>
              <td><?= $l['time'] ?></td>
              <td><?= $l['keterangan'] ?></td>
              <td><b><?= $l['status'] ?></b></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </main>
  <!-- End Main Container -->