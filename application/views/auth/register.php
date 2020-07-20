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
  <link rel="stylesheet" href="<?= base_url('assets/css/style-users1.css'); ?>">

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
      <h6>Register</h6>
      <div id="messages"></div>
      <form action="<?= base_url('auth/register'); ?>" method="post" id="registerForm" accept-charset="utf-8">
        <div class="custom-form">
          <div class="form-group">
            <div class="fas fa-user"></div>
            <input type="text" name="username" id="username" class="form-control" placeholder="" required="required" autocomplete="off" />
            <label>Username</label>
          </div>
          <div class="form-group">
            <div class="fas fa-user-tie"></div>
            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="" required="required" autocomplete="off" />
            <label>Full Name</label>
          </div>
          <div class="form-group">
            <div class="fas fa-envelope"></div>
            <input type="text" name="email" id="email" class="form-control" placeholder="" required="required" autocomplete="off" />
            <label>Email</label>
          </div>
          <div class="form-group">
            <div class="fas fa-key"></div>
            <input type="password" name="password" id="password" class="form-control" placeholder="" required="required" autocomplete="off" />
            <label>Password</label>
          </div>
        </div>
        <div class="form-check text-left" style="margin-bottom:28px;">
          <input type="checkbox" class="form-check-input" id="sayasetuju" checked=false;>
          <label class="form-check-label" for="sayasetuju">I'm agree with LAB FIK EULA</label>
        </div>
        <div class="login-actions">
          <button class="login-action btn btn-primary btn-lg btn-block btn-pill fs18px mobile-fs14px" id="regisText" type="submit" value="register">
          </button>
        </div>
      </form>
      <div class="login-extra">
        Have an Accoount? <a href="<?= base_url('auth'); ?>"><b>Login Here</b></a>
      </div>
    </div>
    <a href="<?= base_url() ?>" class="user-back" style="margin-top:-5px;"> <span class="fas fa-chevron-left"></span> Homepage</a>
  </div>

  <script src="<?= base_url('assets/js/tambahan.js'); ?>"></script>

  <style>
    .form-group-error {
      border-bottom: 1px solid red;
      border-radius: 0 !important;
      box-shadow: unset !important;
    }
  </style>

  <script>
    var check = document.getElementById('sayasetuju');
    var sendbtn = document.getElementById('regisText');
    check.onchange = function() {
      if (this.checked) {
        sendbtn.disabled = false;
      } else {
        sendbtn.disabled = true;
      }
    }
    $('#regisText').html('Daftar');
    $('#registerForm').submit(function(event) {
      event.preventDefault();
      var form = $(this);
      $('#regisText').html('Loading...');
      $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        dataType: 'json',
        success: function(response) {
          if (response.success == true) {
            $('#regisText').html('Redirect... ');
            // $("#messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
            //   response.messages +
            //   '</div>');
            // $("#registerForm")[0].reset();
            // $('#regisText').html('Daftar');
            $(".text-danger").remove();
            $(".form-group").removeClass('has-error').removeClass('has-success');
            setTimeout(function() {
              window.location.href = 'loginActivate';
            }, 2000);
          } else {
            $('#regisText').html('Daftar');
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
          }
        } //Succes
      }); //Ajax
      return false;
    });
  </script>
</body>

</html>