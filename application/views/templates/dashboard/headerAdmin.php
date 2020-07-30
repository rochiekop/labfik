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

  <!-- JS Vendor -->
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/owl-carousel/owl.carousel.min.js') ?>"></script>

</head>

<body>


  <!-- Navbar -->
  <nav class="navbar fixed-top">
    <div class="container loss">
      <a class="db-menu-trigger show-mobile"><span class="fas fa-th-large"></span></a>
      <div class="navbar-brand akun">
        <a href="<?= base_url() ?>"><img src="<?= base_url('assets/img/logo/logo-dummy.png') ?>" /></a>
      </div>
      <div class="fik-navbar-menu">
        <ul class="left akun fik-username hide-mobile">
          <li>
            <img src="<?= base_url('assets/img/profile/') . $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row()->images; ?>">
          </li>
          <li>
            <b><?= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row()->name; ?></b>
            <span><?= $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row()->role; ?></span>
          </li>
        </ul>
        <ul class="right akun">
          <!-- <div class="not-dropdown" style="margin-right:14px">
            <a class="btn btn-icon" href="</?= base_url('Notification/listBorrowingNotification/respond/'.$this->session->userdata('id')) ?>">
              <span class="fas fa-bell"></span>
            </a>
          </div>
          <div class="not-dropdown">
            <a class="btn btn-icon" href="#">
              <span class="fas fa-cog"></span>
            </a>
          </div> -->
          <div class="dropdown show fik-login-dropdown" style="margin-right:14px">
            <?php if (empty($notification)) : ?>
              <span>Tidak ada notifikasi</span>
            <?php else : ?>
                <?php foreach ($notification as $n) : ?>
                  <a href="<?= site_url('notification/changeStatusRead/'.$n->subject.'/'.$n->id) ?>" class="list-group-item">

                      <?php if ($n->status == 'unread') : ?>
                          <span class="fas fa-bell"></span> &nbsp;
                      <?php else if ($n->status == 'read') : ?>
                          <span class="far fa-bell"></span> &nbsp;
                      <?php endif; ?>

                      <b><?= $n->subject ?></b> <br>

                      <?php if ($n->subject == 'Peminjaman Barang') : ?>
                          <?php if ($n->description == 'waiting') : ?>
                              <?= $n->user_name ?> ingin meminjam <?= $n->item_name ?>
                              <?= $n->date ?> 
                          <?php else if ($n->description == 'approved') : ?>
                              Kepala Urusan memberikan anda izin untuk meminjam <?= $n->item_name ?>
                              <?= $n->date ?>
                          <?php else if ($n->description == 'declined') : ?>
                              Kepala Urusan tidak memberikan anda izin untuk meminjam <?= $n->item_name ?>
                              <?= $n->date ?>
                          <?php endif; ?>
                      
                      <?php else if ($n->subject == 'Peminjaman Tempat') : ?>
                          <?php if ($n->description == 'waiting') : ?>
                              <?= $n->user_name ?> ingin meminjam <?= $n->room_name ?>
                              <?= $n->date ?>
                          <?php else if ($n->description == 'approved') : ?>
                              Kepala Urusan memberikan anda izin untuk meminjam <?= $n->room_name ?>
                              <?= $n->date ?>
                          <?php else if ($n->description == 'declined') : ?>
                              Kepala Urusan tidak memberikan anda izin untuk meminjam <?= $n->room_name ?>
                              <?= $n->date ?>
                          <?php endif; ?>

                      <?php else if ($n->subject == 'Unggah Karya') : ?>
                          <?php if ($n->description == 'waiting') : ?>
                              <?= $n->user_name ?> ingin mengunggah karyanya berjudul <?= $n->creation_name ?>
                              <?= $n->date ?>
                          <?php else if ($n->description == 'approved') : ?>
                              Karya anda telah terpajang di halaman lab karya
                              <?= $n->date ?>
                          <?php else if ($n->description == 'declined') : ?>
                              Kepala Urusan tidak mengizinkan karya anda untuk dipajang di halaman lab karya. Silahkan kontak admin jika menurut anda ini merupakan kesalahan.
                              <?= $n->date ?>
                          <?php endif; ?>

                      <?php else if ($n->subject == 'Informasi') : ?>
                          Informasi baru mengenai <?= $n->title ?>
                          <?php $n->date ?>
                      
                      <?php else if ($n->subject == 'Helpdesk') : ?>
                          Anda dihubungi oleh <?= $n->sender_name ?>, lihat dan tanggapi
                          <?php $n->date ?>
                      
                      <?php else if ($n->subject == 'Tugas Akhir') : ?>
                          <?php if ($n->description == 'correction') : ?>
                              Tugas Akhir anda dikoreksi oleh dosen pembimbing, lihat dan tanggapi
                          <?php else if ($n->description == 'ready') : ?>
                              Anda telah dinyatakan siap sidang. lihat selengkapnya
                          <?php endif ?>

                      <?php endif; ?>
                  </a>
                <?php endforeach; ?>
              <?php endif; ?>
          </div>

        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->