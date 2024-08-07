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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?= base_url('assets/login/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/login/js/main.js') ?>"></script>
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
                    <h1 class="card-title font-size-">Lupa Password</h1>
                    <h3 class="card-description mb-5">
                      Silahkan Masukkan password baru anda dibawah ini
                    </h3>
                  </div>
                </div>
                <form action="<?= base_url('login/ubahpass') ?>" method="POST" class="forms-sample">
                  <div class="form-group form-row">
                    <input type="text" name="id" id="id" hidden value="<?= $user->id ?>">
                    <div class="col-lg-12">
                      <label for="depan">Password Baru</label>
                      <input type="password" class="form-control" name="newPass" id="new_pass" placeholder="Password" onkeyup="cekNew()">
                      <span id="pesan_new_password"></span>
                    </div>
                    <div class="col-lg-12">
                      <label for="belakang">Ulangi Password</label>
                      <input type="password" class="form-control" name="repPass" id="rep_pass" placeholder="password" onkeyup="cekRep()">
                      <span id="pesan_rep_password"></span>
                    </div>
                  </div>
                  <button type="submit" id="submit" class="btn btn-primary mr-2">Ubah Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
        var error = 1;
        var new_error = 1;
        var rep_error = 1;

        function cekNew() {
          var new_pass = $('#new_pass').val();

          if (new_pass == "") {
            $('#pesan_new_password').html("Silahkan Isi Password Anda!");
            $('#pesan_new_password').css('color', 'red');
            new_error = 1;
          } else {
            if (new_pass.length < 8) {
              $('#pesan_new_password').html("Password Minimal 8 Karakter");
              $('#pesan_new_password').css('color', 'red');
              new_error = 1;
            } else {
              $('#pesan_new_password').html("");
              new_error = 0;
            }
          }
        }

        function cekRep() {
          var new_pass = $('#new_pass').val();
          var rep_pass = $('#rep_pass').val();

          if (rep_pass == "") {
            $('#pesan_rep_password').html('Silahkan Ulangi Password Anda').css('color', 'red');
            rep_error = 1;
          } else {
            if (new_pass == rep_pass) {
              $('#pesan_rep_password').html('Cocok').css('color', 'green');
              rep_error = 0;
            } else {
              $('#pesan_rep_password').html('Tidak Cocok').css('color', 'red');
              rep_error = 1;
            }
          }
        }

        $('#submit').click(function(e) {
          cekNew();
          cekRep();

          if (new_error == 0 && rep_error == 0) {
            error = 0;
          }
          if (error == 1) {
            e.preventDefault();
          }
        })
      </script>