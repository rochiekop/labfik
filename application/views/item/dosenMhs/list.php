  <!-- Main Container -->
  <main class="akun-container">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>Semua Tempat</h5>
    </div>
    <div class="input-group">
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
      <?php foreach ($item as $i) : ?>
        <div class="col-md-2">
          <a href="<?= site_url('borrowing/addBorrowing/'.$i->id) ?>" class="trigger2"></a>
          <div class="img-wrapper">
            <img src="<?= site_url('uploads/item/'.$i->image)?>" alt="">
          </div>
          <div class="info">
            <b><?= $i->name ?></b> <br> <?= $i->description ?> <?= $i->quantity ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </main>
  <!-- End Main Container -->