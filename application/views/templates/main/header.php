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
</head>

<body>


  <!-- Navbar -->
  <nav class="navbar fixed-top">
    <div class="container loss">

      <a class="menu-trigger show-mobile"><span class="fas fa-bars"></span></a>
      <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url('assets/img/logo/logo-dummy.png'); ?>" /></a>

      <div class="fik-navbar-menu">
        <ul class="center">
          <li><a href="<?= base_url() ?>">Home</a></li>
          <li><a href="<?= base_url('main/lab'); ?>">Lab</a></li>
          <li><a href="<?= base_url('Galery'); ?>">Gallery Karya</a></li>
          <li><a href="<?= base_url('main/peminjaman'); ?>">Peminjaman</a></li>
        </ul>
        <ul class="right">
          <div class="dropdown show fik-login-dropdown">
            <a class="btn btn-sm btn-pill btn-icon btn-icon-left dropdown-toggle" href="#" role="div" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="fa fa-user-circle"></span>
              <?php if (isset($_SESSION['id'])) : ?>
                <?= $this->session->userdata('name'); ?>
              <?php else : ?>
                Login
              <?php endif; ?>
            </a>
            <?php if (!isset($_SESSION['id'])) : ?>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-item regis-dropdown">
                  <form action="<?= base_url('auth/login') ?>" method="POST" id="loginForm2">
                    <h6>Login to Account</h6>
                    <div id="messages"></div>
                    <div class="custom-form">
                      <div class="form-group" style="margin-bottom:12px">
                        <input type="text" name="username" id="username" class="form-control" placeholder="" autocomplete="off" required='required' />
                        <label>Username</label>
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="" autocomplete="off" required='required  ' />
                        <label>Password</label>
                      </div>
                    </div>
                    <a href="<?= base_url('auth/forgotpassword') ?>"><b>I've forgotten my password</b></a>
                    <br>
                    <br>
                    <button class="btn btn-primary btn-sm btn-icon btn-icon-right" type="submit" id="loginText"><span class="fas fa-sign-in-alt"></span></button>

                    <div class="regis">
                      Don't have an account?
                      <a href="<?= base_url('auth/loadregister') ?>"><b><u>Register Here</u></b></a>
                    </div>
                  </form>
                </div>
              </div>
            <?php else : ?>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <div class="dropdown-item regis-dropdown">
                  <a class="dropdown-item" href="<?= base_url('auth/check') ?>">
                    <i class="fas fa-th-large fa-sm fa-fw mr-2 text-gray-400"></i>
                    Dashboard
                  </a>
                  <a class="dropdown-item" href="<?= base_url('main/helpdesk') ?>">
                    <i class="fas fa-life-ring fa-sm fa-fw mr-2 text-gray-400"></i>
                    Helpdesk
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <script>
    $(document).ready(function() {
      $('#loginText').html('Login <span class="fas fa-sign-in-alt"></span>');
      $('#loginForm2').submit(function(event) {
        event.preventDefault();
        var form = $(this);
        $('#loginText').html('Login <span class="fas fa-spinner fa-spin"></span>');
        $.ajax({
          url: form.attr('action'),
          type: form.attr('method'),
          data: form.serialize(),
          dataType: 'json',
          success: function(response) {
            if (response.success == true) {
              // $('#loginText').html('Login <span class="fas fa-sign-in-alt"></span>');
              $(".text-danger").remove();
              $(".form-group").removeClass('has-error').removeClass('has-success');
              setTimeout(function() {
                $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                  response.messages +
                  '</div>');
              }, 2000);
              setTimeout(function() {
                window.location.href = '<?= base_url() ?>auth/check';
              }, 3000);
            } else {
              $('#loginText').html('Login <span class="fas fa-sign-in-alt"></span>');
              if (response.messages instanceof Object) {
                $.each(response.messages, function(key, value) {
                  // $("#messages").remove();
                  var element = $("#" + key);
                  $(element)
                    .closest('.form-group')
                    .removeClass('has-error')
                    .removeClass('has-success')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger').remove();
                  $(element).after(value);
                });
              } else {
                $("#messages").html('<div class="alert alert-warning" role="alert" style="margin-top:15px;">' +
                  response.messages +
                  '</div>');
                $(".text-danger").remove();
                $(".form-group").removeClass('has-error').removeClass('has-success');
              }
            }
          } //Succes
        }); //Ajax
        return false;
      });
    });
  </script>