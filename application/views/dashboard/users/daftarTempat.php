  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Semua Tempat</h5>
    </div>
    <div class="input-group">
      <div class="input-group-append">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius:5px 0 0 5px">Kategori</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Lab Cintiq</a>
          <a class="dropdown-item" href="#">Lab Bengkel</a>
          <a class="dropdown-item" href="#">Lab Batik</a>
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
    <br>
    <div class="row grid-bartemp">
      <?php foreach ($dt_tempat as $t) : ?>
        <div class="col-md-2">
          <a href="<?= base_url('booking/place/') . encrypt_url($t['id']); ?>" class="trigger2"></a>
          <div class="img-wrapper">
            <img src="<?= base_url('assets/img/ruangan/') . $t['images']; ?>" alt="">
          </div>
          <div class="info">
            <b><?= $t['ruangan'] ?></b> <br> <?= $t['kategori'] ?>
          </div>
          <input type="hidden" name="tipepinjam" value="tempat" class="form-control" placeholder="" required="required" autocomplete="off" />
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  <!-- End Main Container -->