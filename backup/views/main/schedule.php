<!DOCTYPE html>
<html lang="en-id">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laboratorium FIK</title>

  <!-- CSS Vendor -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free-5.13.0-web/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/owl-carousel/owl.carousel.css'); ?>">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- Lab. FIK Main Style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

  <!-- JQuery 3.3.1 -->
  <script src="<?= base_url('assets/vendor/jquery.min.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

  <!-- JS Vendor -->
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/owl-carousel/owl.carousel.min.js') ?>"></script>

  <!-- Owl Carousel Animation -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.compat.css" />


  <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo/favicon.png" type="image/gif">
</head>


<body>


  <div onclick="window.location.href='<?= base_url() ?>'" style="position:fixed;top:20px;right:24px;cursor:pointer;" title="Tutup Layar Penuh">
    <i class="fas fa-times fa"></i>
  </div>

  <div class="fik-jadwal-ruangan">
    <div class="container">
      <div class="fik-section-title text-center">
        <h3>INFORMASI RUANGAN</h3>
        <p>Informasi terbaru mengenai ruangan yang terisi maupun yang masih available</p>
      </div>
      <div class="owl-carousel owl-theme fik-carousel-schedule">
        <?php $start = 0; ?>
        <?php $xIteration = ceil(count($dt_schedule) / 10);
        $iteration = 0;
        while ($iteration < $xIteration) : ?>
          <div class="item">
            <div class="fik-custom-table">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Ruangan</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Peminjam</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">
                      <div style="margin-left: 110px;">Status</div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0;
                  $display = 10; ?>
                  <?php foreach (array_slice($dt_schedule, $start, $display) as $d) : ?>
                    <tr>
                      <?php if ($d['status'] == 'Diterima' or $d['status'] == 'Menunggu Acc') : ?>
                        <td><b><?= $d['ruangan'] ?></b></td>
                        <td><?= substr($d['time'], 0, 8) ?><?= substr($d['time'], -5) ?></td>
                        <td><?= $d['name'] ?></td>
                        <td><?= $d['keterangan'] ?></td>
                        <td class="status">
                          <div class="badge badge-danger badge-pill">Tidak Tersedia</div>
                        </td>
                      <?php elseif ($d['status'] == 'Ditolak') : ?>
                        <td><b><?= $d['ruangan'] ?></b></td>
                        <td><?= substr($d['time'], 0, 8) ?><?= substr($d['time'], -5) ?></td>
                        <td></td>
                        <td></td>
                        <td class="status">
                          <div class="badge badge-success badge-pill">Tersedia</div>
                        </td>
                      <?php endif; ?>
                      <?php $temp = $no++;
                      if ($temp == $display - 1) {
                        $start += $temp + 1;
                      }
                      ?>
                    </tr>
                  <?php
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php $iteration++ ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

  <!-- <?php var_dump($dt_schedule) ?> -->
</body>
<script src="<?= base_url('assets/js/tambahan.js'); ?>"></script>
<script>
  $('.fik-carousel-schedule').owlCarousel({
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    margin: 0,
    margin: 0,
    loop: true,
    autoplay: true,
    autoplayTimeout: 15000,
    items: 1,
    dots: false,
  });
</script>

</html>