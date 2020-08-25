  <!-- Main Container -->
  <main class="akun-container">
    <?= $this->session->flashdata('message'); ?>
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Pendaftar Tugas Akhir</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" id="filter" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Filter</button>
        <div class="dropdown-menu">
          <a class="dropdown-item item">Semua</a>
          <a class="dropdown-item item">Lab</a>
          <a class="dropdown-item item">Kelas</a>
          <a class="dropdown-item item">Studio</a>
        </div>
      </div>
      <input type="text" class="form-control" id="keyword" aria-label="Text input with dropdown button" placeholder="Pencarian">
    </div>
    <div id="#">
      <div class="table-responsive admin-list">
        <table class="table">
          <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width:60px">#</th>
                <th scope="col">Nama</th>
                <th scope="col">NIM</th>
                <th scope="col">Prodi</th>
                <th scope="col">No. Hp</th>
                <th scope="col">Kosentrasi</th>
                <th scope="col">Dosen wali</th>
                <th scope="col" class="action">Aksi</th>
              </tr>
            </thead>
            <tbody id="container">
              <!-- <?php if (empty($mhs)) : ?>
                <td colspan="8" style="background-color: whitesmoke;text-align:center">Pendaftar tugas akhir kosong</td>
              <?php else : ?>
                <?php $no = 0;
                      foreach ($mhs as $k) : ?>
                  <tr>
                    <td scope="row" style="width:60px"><b><?= ++$no ?></b></td>
                    <td><?= $k['name'] ?></td>
                    <td><?= $k['nim'] ?></td>
                    <td><?= $k['prodi'] ?></td>
                    <td><?= $k['form_pendaftaran'] ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#view<?= encrypt_url($k['id']); ?>">view</a>
                    </td>
                    <td class="action">
                      <a data-toggle="modal" data-target="#deletemodal<?= encrypt_url($k['id']); ?>"><span class="fas fa-times" title="Tolak"></span></a>
                      <a href="<?= base_url('adminlaa/terimapendaftaran/') . encrypt_url($k['id']); ?>"><span class="fas fa-check" title="Terima"></span></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?> -->
            </tbody>
          </table>
        </table>
      </div>
    </div>
  </main>