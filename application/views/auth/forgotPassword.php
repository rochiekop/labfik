<!DOCTYPE html>
<html lang="en-id">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>

  <!-- Vendor -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free-5.13.0-web/css/all.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/owl-carousel/owl.carousel.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/moeicss-alpha.css'); ?>">

  <!-- FIKLAB Style -->
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style-users.css'); ?>">

  <!-- JQuery 3.3.1 -->
  <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

  <!-- JS Vendor -->
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/popper.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap-4.5.0-dist/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/owl-carousel/owl.carousel.min.js'); ?>"></script>
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
      <h6>Forgot your password?</h6>
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('auth/forgotpassword'); ?>" method="post" id="forgotpassword" accept-charset="utf-8">
        <div class="custom-form">
          <div class="form-group">
            <div class="fas fa-envelope"></div>
            <input type="text" name="email" id="email" value="<?= set_value('email') ?>" class="form-control" placeholder="" required="required" autocomplete="off" />
            <label>Email</label>
            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
          </div>
        </div>
        <a href="<?= base_url('auth') ?>"><b>Back to login</b></a>
        <div class="login-actions">
          <button class="login-action btn btn-primary btn-lg btn-block btn-pill fs18px mobile-fs14px" type="submit">Reset Password
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="<?= base_url('assets/js/tambahan.js'); ?>"></script>

</body>

</html>