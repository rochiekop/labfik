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

  <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo/favicon.png" type="image/gif">

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
            <img src="<?= base_url('assets/img/7.jpg') ?>">
          </li>
          <li>
            <b><?= $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row()->name; ?></b>
            <span><?= $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row()->role; ?></span>
          </li>
        </ul>
        <ul class="right akun">
          <div class="fik-login-dropdown hide-mobile" style="margin-right:22px">
            <a class="btn btn-sm btn-pill btn-icon btn-icon-left" href="<?= base_url('main/helpdesk') ?>">
              <span class="fas fa-life-ring"></span> Helpdesk
            </a>
          </div>
          <div class="not-dropdown" style="margin-right:14px" id="active">
            <!-- <a class="btn btn-icon" href="<?= base_url('Notification/listBorrowingNotification/request/' . $this->session->userdata('id')) ?>"> -->
            <a class="btn btn-icon" href="<?= base_url('Notification') ?>">
              <span class="fas fa-bell"></span>
            </a>
          </div>

          <div class="dropdown not-dropdown">
            <a class="btn btn-icon" id="active" data-toggle="dropdown" href="#">
              <span class="fas fa-cog"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-item regisdropdown">
                <a class="dropdown-item" href="#">
                  <i class="fa fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#logout">
                  <i class="fa fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400 icon"></i>
                  Logout
                </a>
              </div>
            </div>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <style>
    #active:focus {
      color: #fb8c00;
    }
  </style>