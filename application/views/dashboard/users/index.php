<!-- Main Container -->
<main class="akun-container">
  <?php if (validation_errors()) : ?>
    <div class="alert alert-danger" role="alert">
      <?= validation_errors(); ?>
    </div>
  <?php endif; ?>
  <?= $this->session->flashdata('message'); ?>
  <div class="row akun-overview">
    <div class="col-md-4">
      <div class="overview-one alert-warning">
        <b>Peminjaman Berlangsung</b>
        <ul>
          <li><a href="#"><span class="fas fa-door-open"></span> IK.04.04 | 06:30 - 09:30 <i>Menunggu Verifikasi</i></a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-4">
      <div class="overview-two alert-info">
        <b>Peminjaman Terakhir</b>
        <ul>
          <li><a href="#"><span class="fas fa-door-open"></span> IK.04.04 | 06:30 - 09:30 <i>Jumat, 12 Oktober 2019</i></a></li>
          <li><a href="#"><span class="fas fa-box-open"></span> Canon EOS 5D Mark II <i>Jumat, 18 Oktober 2019</i></a></li>
        </ul>
      </div>
    </div>
    <div class="col-md-4">
      <div class="overview-three alert-success">
        <b>Jumlah Peminjaman</b>
        <ul>
          <li><a href="#"><span class="fas fa-door-open"></span> 8 Tempat Dipinjam</a></li>
          <li><a href="#"><span class="fas fa-box-open"></span> 2 Barang Dipinjam</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="fik-rekomen">
    <div class="fik-section-title2">
      <span class="fas fa-door-open zzzz"></span>
      <h5>List Tempat</h5>
    </div>
    <div class="row grid-bartemp">
      <?php $i = 0;
      foreach ($dt_tempat as $t) : ?>
        <?php if ($this->session->userdata('role_id') == '4') : ?>
          <?php if ($t['akses'] != 'Dosen') : ?>
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
            <?php if ($i++ == 5) break; ?>
          <?php endif; ?>

        <?php elseif ($this->session->userdata('role_id') == '3') : ?>
          <?php if ($t['akses'] != 'Mahasiswa') : ?>
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
            <?php if ($i++ == 5) break; ?>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="fik-rekomen">
    <div class="fik-section-title2">
      <span class="fas fa-box-open zzzz"></span>
      <h5>List Barang</h5>
    </div>
    <div class="row grid-bartemp">
      <div class="col-md-2">
        <a href="#" class="trigger2"></a>
        <div class="img-wrapper">
          <img src="<?= base_url('assets/img/2.jpg') ?>" alt="">
        </div>
        <div class="info">
          <b>Canon EOS</b> <br> Tersedia
        </div>
      </div>
    </div>
  </div>
</main>
<!-- End Main Container -->