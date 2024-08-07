<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Alumni - Dashboard</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_alumni/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets_alumni/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/frontend/alumni') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni') ?>/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni') ?>/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni') ?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni') ?>/vendor/aos/aos.css" rel="stylesheet">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets_alumni/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets_alumni/images/favicon.png" />
  <script src="<?= base_url('assets/login/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/login/js/main.js') ?>"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-6">
                    <h1 class="card-title font-size-">Ubah Password</h1>
                    <h3 class="card-description mb-5">
                      Silahkan Masukkan password baru anda dibawah ini
                    </h3>
                  </div>
                </div>
                <form action="<?= base_url('gantipass') ?>" method="POST" class="forms-sample" id="ubahpass_form">
                  <div class="form-group form-row">
                    <div class="col-lg-12">
                      <label for="old_pass">Password Lama</label>
                      <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Password" onkeyup="cekOld()">
                      <span id="pesan_old_password"></span>
                    </div>
                    <div class="col-lg-12">
                      <label for="new_pass">Password Baru</label>
                      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Password" onkeyup="cekNew()">
                      <span id="pesan_new_password"></span>
                    </div>
                    <div class="col-lg-12">
                      <label for="rep_pass">Ulangi Password</label>
                      <input type="password" class="form-control" name="rep_password" id="rep_password" placeholder="Password" onkeyup="cekRep()">
                      <span id="pesan_rep_password"></span>
                    </div>
                  </div>
                  <a href="<?= base_url('data') ?>" class="btn btn-primary mr-2">Kembali</a>
                  <button type="submit" class="btn btn-primary mr-2" id="submit">Ubah Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        var error = 1;
        var new_error = 1;
        var old_error = 1;
        var rep_error = 1;

        function cekOld() {
          var old_pass = $('#old_password').val();

          if (old_pass == "") {
            $('#pesan_old_password').html("Silahkan Isi Password Anda!");
            $('#pesan_old_password').css('color', 'red');
          } else {
            if (old_pass.length < 8) {
              $('#pesan_old_password').html("Password Minimal 8 Karakter");
              $('#pesan_old_password').css('color', 'red');
            } else {
              $.ajax({
                url: "<?= base_url('cekpass') ?>",
                data: 'old_password=' + old_pass,
                type: 'POST',
                success: function(msg) {
                  if (msg) {
                    $('#pesan_old_password').html("Password lama benar.");
                    $('#pesan_old_password').css('color', 'green');
                    old_error = 0;
                  } else {
                    $('#pesan_old_password').html("Password lama salah!");
                    $('#pesan_old_password').css('color', 'red');
                  }
                }
              });
            }
          }
        }

        function cekNew() {
          var new_pass = $('#new_password').val();

          if (new_pass == "") {
            $('#pesan_new_password').html("Silahkan Isi Password Anda!");
            $('#pesan_new_password').css('color', 'red');
          } else {
            if (new_pass.length < 8) {
              $('#pesan_new_password').html("Password Minimal 8 Karakter");
              $('#pesan_new_password').css('color', 'red');
            } else {
              $('#pesan_new_password').html("");
              new_error = 0;
            }
          }
        }

        function cekRep() {
          var new_pass = $('#new_password').val();
          var rep_pass = $('#rep_password').val();

          if (rep_pass == "") {
            $('#pesan_rep_password').html('Silahkan Ulangi Password Anda').css('color', 'red');
          } else {
            if (new_pass == rep_pass) {
              $('#pesan_rep_password').html('Cocok').css('color', 'green');
              rep_error = 0;
            } else {
              $('#pesan_rep_password').html('Tidak Cocok').css('color', 'red');
            }
          }
        }

        $('#submit').click(function(e) {
          cekOld();
          cekNew();
          cekRep();

          if (new_error == 0 && old_error == 0 && rep_error == 0) {
            error = 0;
          }
          if (error == 1) {
            e.preventDefault();
          }
        })
      </script>
      <!-- content-wrapper ends -->
      <!-- <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
      </script> -->