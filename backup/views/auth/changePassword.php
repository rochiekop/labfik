<!DOCTYPE html>
<html lang="en-id">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LABFIK | Ganti Password</title>

  <!-- Vendor -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free-5.13.0-web/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/owl-carousel/owl.carousel.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/moeicss-alpha.css'); ?>">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- FIKLAB Style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style-users1.css'); ?>">

  <!-- JQuery 3.3.1 -->
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

  <!-- JS Requirement -->
  <!-- <script src="<?= base_url('assets/js/login.js'); ?>"></script> -->

  <!-- JS Vendor -->
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/popper.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/owl-carousel/owl.carousel.min.js'); ?>"></script>
  <link rel="icon" href="<?php echo base_url(); ?>assets/img/logo/favicon.png" type="image/gif">
</head>

<body>

  <div class="user-overlay"></div>
  <div class="user-overlay-circle"></div>
  <div class="user-overlay-circle2"></div>

  <div class="account-container stacked">
    <div class="clear"></div>
    <div class="content custom-form custom-form-icon icon-left">
      <div class="login-banner"><img src="<?= base_url('assets/img/8.jpg') ?>" alt=""></div>
      <img src="<?= base_url('assets/img/logo/logo-dummy.png'); ?>" alt="" />
      <h6>Change your password</h6>
      <p class="mt-1"><?= $this->session->userdata('reset_password') ?></p>
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth/changepassword'); ?>" method="post" id="forgotpassword" accept-charset="utf-8">
        <div class="custom-form">
          <div class="form-group">
            <div class="fas fa-key"></div>
            <input type="password" name="password1" id="password1" class="form-control" placeholder="" autocomplete="off" required='required' />
            <label>Password</label>
            <?= form_error('password1', '<small class="text-danger" style="margin-left:-54px">', '</small>'); ?>
          </div>
          <div class="form-group">
            <div class="fas fa-key"></div>
            <input type="password" name="password2" id="password2" class="form-control" placeholder="" autocomplete="off" required='required' />
            <label>Repeat Password</label>
            <?= form_error('password2', '<small class="text-danger" style="margin-left:-13px">', '</small>'); ?>
          </div>
        </div>
        <div class="login-actions">
          <button class="login-action btn btn-primary btn-lg btn-block btn-pill fs18px mobile-fs14px" type="submit">Change Password
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="<?= base_url('assets/js/tambahan.js'); ?>"></script>

</body>

</html>