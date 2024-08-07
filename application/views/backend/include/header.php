<?php
  $notif = $this->Admin_model->getAll('nonaktifuser_v')->num_rows();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Dashboard &mdash; Admin</title>
	<link rel="shortcut icon" href="<?=base_url();?>assets/backend/img/favicon.png" />

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- Template CSS -->
	<link rel="stylesheet" href="<?=base_url();?>assets/backend/css/style.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/backend/css/components.css">

	<!-- Template JS File -->
	<script src="<?=base_url();?>assets/backend/js/scripts.js"></script>
	<script src="<?=base_url();?>assets/backend/js/custom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js"
		integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ=="
		crossorigin="anonymous" referrerpolicy="no-referrer">
	</script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>

			<!-- Header -->
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
									class="fas fa-bars"></i></a></li>
					</ul>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="nav-item">
						<h6>
							<a href="<?= base_url(); ?>notifikasi" class="nav-link nav-link-lg">
								<i class="far fa-bell"></i>
								<span class="badge badge-danger"><?= $notif ?></span>
							</a>
						</h6>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown"
							class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="<?=base_url();?>assets/backend/img/avatar-1.png"
								class="rounded-circle mr-1">
							<div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama_depan') ?>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="<?= base_url(); ?>profile" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profil
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?=base_url();?>logout" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Keluar
							</a>
						</div>
					</li>
				</ul>
			</nav>
