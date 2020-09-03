<!DOCTYPE html>
<html lang="en-id">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LABFIK | Login</title>

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
      <div class="login-banner"><img src="<?= base_url('assets/img/8.jpg'); ?>" alt=""></div>
      <img src="<?= base_url('assets/img/logo/logo-dummy.png'); ?>" alt="" />
      <h6>Login</h6>
      <div id="messages"><?= $this->session->flashdata('message'); ?></div>
      <div id="messages"></div>
      <form action="<?= base_url('auth/login') ?>" method="post" id="loginForm1" accept-charset="utf-8">
        <div class="custom-form">
          <div class="form-group">
            <div class="fas fa-user"></div>
            <input type="text" name="username" id="username" class="form-control" placeholder="" autocomplete="off" required='required' />
            <label>Username</label>
          </div>
          <div class="form-group">
            <div class="fas fa-key"></div>
            <input type="password" name="password" id="password" class="form-control" placeholder="" autocomplete="off" required='required' />
            <label>Password</label>
          </div>
        </div>
        <a href="<?= base_url('auth/forgotpassword') ?>"><b>I've forgotten my password</b></a>
        <div class="login-actions">
          <button class="login-action btn btn-primary btn-lg btn-block btn-pill fs18px mobile-fs14px" type="submit" name="loginText" id="loginText" value="login">
          </button>
        </div>
      </form>
      <div class="login-extra">
        Don't have an Accoount? <a href="<?= base_url('auth/loadRegister'); ?>"><b>Register Here</b></a>
      </div>
    </div>
    <a href="<?= base_url() ?>" class="user-back"> <span class="fas fa-chevron-left"></span> Homepage</a>
  </div>

  <script src="<?= base_url('assets/js/tambahan.js'); ?>"></script>
  <script>
    $('#loginText').html('Login');
    $("#loginText").click(function() {
      $("#messageslogout").hide();
      // $("#messages").hide();
    });
    $('#loginForm1').submit(function(event) {
      event.preventDefault();
      // location.reload();
      var form = $(this);
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.success == true) {
            $('#loginText').html('Loading...');
            $(".text-danger").remove();
            $(".form-group").removeClass('has-error').removeClass('has-success');
            setTimeout(function() {
              $("#messages").html('<div class="alert alert-success" role="alert" style="margin-top:24px;">' +
                response.messages +
                '</div>');
              $('#loginText').html('Redirect...');
            }, 2000);
            setTimeout(function() {
              window.location.href = '<?= base_url() ?>auth/check';
            }, 3000);

          } else {
            if (response.messages instanceof Object) {
              $.each(response.messages, function(key, value) {
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
              $('#loginText').html('Loading...');
              $(".text-danger").remove();
              $(".form-group").removeClass('has-error').removeClass('has-success');
              setTimeout(function() {
                $("#messages").html('<div class="alert alert-warning" role="alert" style="margin-top:24px;">' +
                  response.messages +
                  '</div>');
                $('#loginText').html('Login');;
              }, 1000);
            }
          }
        } //Succes
      }); //Ajax
      return false;
    });
  </script>
</body>

</html>