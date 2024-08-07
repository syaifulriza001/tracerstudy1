 <!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alumni - Dashboard</title>
    <!-- base:css -->
    <link rel="stylesheet" href="<?=base_url();?>assets_alumni/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets_alumni/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
		  <!-- Vendor CSS Files -->
			<link href="<?= base_url('assets/frontend/alumni')?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/aos/aos.css" rel="stylesheet">
    <!-- End plugin css for this page -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
    <!-- inject:css -->
    <link rel="stylesheet" href="<?=base_url();?>assets_alumni/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?=base_url();?>assets_alumni/images/favicon.png" />

    <script src="<?= base_url('assets/login/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/login/js/main.js') ?>"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <div class="container-scroller">
				<div class="pro-banner" id="pro-banner">
						<div class="card pro-banner-bg border-0 rounded-0">
							<div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
								<p class="mb-0 text-white font-weight-medium mb-2 mb-lg-0 mb-xl-0">Silahkan lengkapi data pekerjaan anda dan isi tracer study yang tersedia </p>
								<div class="d-flex">
									<a href="<?=base_url();?>data" target="_blank" class="btn btn-outline-light mr-2">Lengkapi Data Diri</a>
									<a href="<?=base_url();?>pekerjaan" target="_blank" class="btn btn-outline-light mr-2 bg-white text-dark">Isi Tracer Study</a>
									<button id="bannerClose" class="btn border-0 p-0">
										<i class="mdi mdi-close text-white"></i>
									</button>
								</div>
						</div>
					</div>
				</div>
		<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container-fluid">
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <ul class="navbar-nav navbar-nav-left">

            </ul>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center mt-3">
                <a class="navbar-brand brand-logo text-center" href="<?=base_url();?>dashboard">
                  <?php foreach($website as $web) : ?>
					<h3>Tracer Study</h3><p><?= $web->prodi." - ".$web->universitas ?></p>
        <?php endforeach; ?>
				</a>
                <a class="navbar-brand brand-logo-mini text-left" href="<?=base_url();?>dashboard">
				<h3>Tracer Study</h3>
				</a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link dropdown-toggle" href="<?=base_url();?>assets_alumni/#" data-toggle="dropdown" id="profileDropdown">
                    <span class="nav-profile-name"><?= $this->session->userdata('nama_depan')?> <?= $this->session->userdata('nama_belakang')?></span>
                    <!-- <span class="online-status"></span> -->
                    <img src="<?= base_url('assets')?>/user/<?= $this->session->userdata('foto')?>" alt="profile"/>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item" href="<?= base_url('login/logout') ?>">
                        <i class="mdi mdi-logout text-primary"></i>
                        Logout
                      </a>
                  </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>
      <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link active" href="<?=base_url();?>dashboard">
                  <i class="mdi mdi-file-document-box menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url();?>data" class="nav-link">
                    <i class="mdi mdi-cube-outline menu-icon"></i>
                    <span class="menu-title">Data</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="submenu">
                      <ul>
                          <li class="nav-item"><a class="nav-link" href="<?=base_url();?>data">Update Data Diri</a></li>
                          <li class="nav-item"><a class="nav-link" href="<?=base_url();?>pekerjaan">Update Data Pekerjaan</a></li>
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url();?>loker" class="nav-link">
                    <i class="mdi mdi mdi-briefcase menu-icon"></i>
                    <span class="menu-title">Loker</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url();?>tracer_study" class="nav-link">
                    <i class="mdi mdi mdi-account-search menu-icon"></i>
                    <span class="menu-title">Survei Tracer Study</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="<?=base_url();?>testi" class="nav-link">
                    <i class="mdi mdi-message-reply-text menu-icon"></i>
                    <span class="menu-title">Testimoni</span>
                    <i class="menu-arrow"></i>
                  </a>
              </li>
            </ul>
        </div>
      </nav>
    </div>
