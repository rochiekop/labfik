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

  <!-- Lab. FIK Main Style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

  <!-- JQuery 3.3.1 -->
  <script src="<?= base_url('assets/vendor/jquery.min.js'); ?>"></script>

  <!-- JS Vendor -->
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/popper.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/owl-carousel/owl.carousel.min.js') ?>"></script>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url('public')?>/components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('public')?>/components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url('public')?>/components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('public')?>/dist/css/AdminLTE.min.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="<?=base_url('public')?>/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=base_url('public')?>/plugins/pace/pace.min.css">

    <style>
        .fileDiv {
        position: relative;
        overflow: hidden;
        }
        .upload_attachmentfile {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
        }
        .btnFileOpen {margin-top: -50px; }

        .direct-chat-warning .right>.direct-chat-text {
            background: #d2d6de;
            border-color: #d2d6de;
            color: #444;
            text-align: right;
        }
        .direct-chat-primary .right>.direct-chat-text {
            background: #3c8dbc;
            border-color: #3c8dbc;
            color: #fff;
            text-align: right;
        }
        .spiner{}
        .spiner .fa-spin { font-size:24px;}
        .attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
    </style>

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
          <div class="not-dropdown" style="margin-right:14px">
            <a class="btn btn-icon" href="#">
              <span class="fas fa-bell"></span>
            </a>
          </div>
          <div class="not-dropdown">
            <a class="btn btn-icon" href="#">
              <span class="fas fa-cog"></span>
            </a>
          </div>
          <div class="fik-login-dropdown hide-mobile" style="margin-left:22px">
            <a class="btn btn-sm btn-pill btn-icon btn-icon-left" href="akun-helpdesk.html">
              <span class="fas fa-life-ring"></span> Helpdesk
            </a>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->