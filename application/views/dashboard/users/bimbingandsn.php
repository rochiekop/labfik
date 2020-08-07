<!-- Main Container -->
<main class="akun-container">
  <div class="fik-section-title2">
    <h4>Bimbingan</h4>
  </div>
  <div class="input-group">
    <div class="input-group-append">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-left:1px solid rgba(0,0,0,.1);">Urutkan</button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">A-Z</a>
        <a class="dropdown-item" href="#">NIM</a>
        <a class="dropdown-item" href="#">Nama</a>
        <a class="dropdown-item" href="#">Prodi</a>
        <a class="dropdown-item" href="#">Judul</a>
      </div>
    </div>
    <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Pencarian">
  </div><br>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col" style="width:60px">#</th>
          <th scope="col" style="width:160px">Aksi</th>
          <th scope="col">Mahasiswa</th>
          <th scope="col">NIM</th>
          <th scope="col">Prodi</th>
          <th scope="col">Judul</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($bimbingan)) : ?>
          <td colspan="6" style="background-color: whitesmoke;text-align:center">Daftar bimbingan kosong</td>
        <?php else : ?>
          <?php $no = 0;
          foreach ($bimbingan as $t) : ?>
            <tr>
              <th scope="row" style="width:60px"><?= ++$no ?></th>
              <td class="action" style="width:160px">
                <a href="<?= base_url('users/progressbimbingan/') . encrypt_url($t['id_guidance']); ?>" class="btn badge badge-primary">Lihat Progres</a>
              </td>
              <td><?= $t['nama_mhs'] ?></td>
              <td><?= $t['nim'] ?></td>
              <td><?= $t['prodi'] ?></td>
              <td><?= $t['judul'] ?></td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
        <!-- <tr>
          <th scope="row" style="width:60px">1</th>
          <td class="action" style="width:160px">
            <a href="#" class="btn badge badge-primary">Lihat Progress (1)</a>
          </td>
          <td>Near Sakarin</td>
          <td>0123456789</td>
          <td>Desain Komunikasi Visual / Advertising</td>
        </tr>
        <tr>
          <th scope="row" style="width:60px">1</th>
          <td class="action" style="width:160px">
            <a href="#" class="btn badge badge-primary">Lihat Progress</a>
          </td>
          <td>Near Sakarin</td>
          <td>0123456789</td>
          <td>Desain Komunikasi Visual / Advertising</td>
        </tr> -->
      </tbody>
    </table>
  </div>
</main>
<!-- End Main Container -->
<!-- <?php var_dump($bimbingan) ?> -->