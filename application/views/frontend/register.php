<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="<?= base_url(); ?>assets_alumni/images/favicon.png" />
	<title>Website Tracer Study Alumni</title>
	<!-- Font Icon -->
	<link rel="stylesheet"
		href="<?= base_url('assets/login/fonts/material-icon/css/material-design-iconic-font.min.css') ?>">
	<link href="<?= base_url('assets/frontend/alumni') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Main css -->
	<link rel="stylesheet" href="<?= base_url('assets/login/css/style2.css') ?>">

	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
		type="text/css" /> -->
	<style>
		.form-control {
			border: none !important;
			padding-left: 30px;
		}

	</style>
	<!-- JS -->
	<script src="<?= base_url('assets/login/vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?= base_url('assets/login/js/main.js') ?>"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"
		type="text/javascript"></script> -->
	<script>
		$(function () {
			$("#datepicker").datepicker({
				autoclose: true,
				format: 'dd MM yyyy'
			});
			$("#datepicker1").datepicker({
				autoclose: true,
				minViewMode: 'years',
				format: 'yyyy'
			});
			$("#datepicker2").datepicker({
				autoclose: true,
				minViewMode: 'years',
				format: 'yyyy'
			});
			$("#datepicker3").datepicker({
				autoclose: true,
				minViewMode: 'years',
				format: 'yyyy'
			});
		});

	</script>
</head>

<body>
	<div class="main">
		<!-- Sign up form -->
		<section class="signup">
			<div class="container">
				<?php
                if ($this->session->flashdata('login')) :
                ?>
				<div class="alert alert-danger" role="alert">
					<?= $this->session->flashdata('login') ?>
				</div>
				<?php endif; ?>
				<div class="signup-content">
					<div class="signup-form">
						<h2 class="form-title">Registrasi Alumni</h2>
						<form action="<?= base_url('register/aksidaftar') ?>" method="POST"
							class="forms-sample register-form" enctype="multipart/form-data" id="register-form">
							<div class="form-group">
								<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input class="form-control" type="text" name="nama_depan" id="nama_depan"
									placeholder="Nama depan" onkeyup="cekNamaDepan()" />
								<span id="pesan_nama_depan"></span>
							</div>
							<div class="form-group">
								<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input class="form-control" type="text" name="nama_belakang" id="nama_belakang"
									placeholder="Nama belakang" onkeyup="cekNamaBelakang()" />
								<span id="pesan_nama_belakang"></span>
							</div>
							<div class="form-group">
								<label for="nim"><i class="zmdi zmdi-graduation-cap"></i></label>
								<input class="form-control" type="nim" name="nim" id="nim" placeholder="Nomor Induk Mahasiswa"
									onkeyup="cekNim()" />
								<span id="pesan_nim"></span>
							</div>
							<div class="form-group">
								<label for="email"><i class="zmdi zmdi-email"></i></label>
								<input class="form-control" type="email" name="email" id="email" placeholder="Email Aktif"
									onkeyup="cekEmail()" />
								<span id="pesan_email"></span>
							</div>
							<div class="form-group">
								<label for="pass"><i class="zmdi zmdi-lock-outline"></i></label>
								<input class="form-control" type="password" name="password" id="password"
									placeholder="Password" onkeyup="cekPass()" />
								<span id="pesan_pass"></span>
							</div>
							<div class="form-group">
								<label for="pass"><i class="zmdi zmdi-case"></i></label>
								<select name="bidang_pekerjaan" class="form-control" id="bidang_pekerjaan"
									onchange="cekKerja()">
									<option value="" selected disabled>Pilih Bidang Pekerjaan</option>
									<?php foreach ($bidang_pekerjaan as $bp) :
                                        if ($bp->id == $user->bidang_pekerjaan) {
                                    ?>
									<option value="<?= $bp->id ?>" selected><?= $bp->nama ?></option>
									<?php } else {
                                        ?>
									<option value="<?= $bp->id ?>"><?= $bp->nama ?></option>
									<?php }
                                    endforeach ?>
								</select>
								<span id="pesan_kerja"></span>
							</div>
							<div class="form-group">
								<label for="foto"><i class="zmdi zmdi-camera"></i></label>
								<input class="form-control" type="file" name="foto" id="foto" placeholder="foto"
									onchange="cekFoto()" accept="image/png, image/jpeg" />
								<span id="pesan_foto"></span>
							</div>
							<div class="form-group form-button">
								<input type="submit" name="signup" id="signup" class="form-submit" value="Registrasi" />
							</div>
							<div class="signup-image">
								<figure><img
										src="<?= base_url('assets/login/images/signup.svg" alt="sing up image') ?>">
								</figure>
								<a href="<?= base_url('login') ?>" class="signup-image-link">Sudah punya akun ? Silahkan
									login!</a> <br>
								<a href="<?= base_url() ?>" class="signup-image-link"><b>Kembali ke Beranda</b></a>
							</div>
						</form>
					</div>
				</div>
		</section>
	</div>

	<script type="text/javascript">
		var error = 1;
		var nama_depan_error = 1;
		var nama_belakang_error = 1;
		var nim_error = 1;
		var email_error = 1;
		var pass_error = 1;
		var kerja_error = 1;
		var foto_error = 1;

		function cekNamaDepan() {
			var nama_depan = $('#nama_depan').val();

			if (nama_depan == "") {
				$('#pesan_nama_depan').html("Silahkan Isi Nama Depan Anda!");
				$('#pesan_nama_depan').css('color', 'red');
				nama_depan_error = 1;
			} else {
				$('#pesan_nama_depan').html("");
				nama_depan_error = 0;
			}
		}

		function cekNamaBelakang() {
			var nama_belakang = $('#nama_belakang').val();

			if (nama_belakang == "") {
				$('#pesan_nama_belakang').html("Silahkan Isi Nama Belakang Anda!");
				$('#pesan_nama_belakang').css('color', 'red');
				nama_belakang_error = 1;
			} else {
				$('#pesan_nama_belakang').html("");
				nama_belakang_error = 0;
			}
		}

		function cekNim() {
			var nim = $('#nim').val();

			if (nim == "") {
				$('#pesan_nim').html("Silahkan Isi Nim Anda!");
				$('#pesan_nim').css('color', 'red');
				nim_error = 1;
			} else if (nim.length > 15) {
				$('#pesan_nim').html("Nim tidak boleh lebih dari 15 digit.");
				$('#pesan_nim').css('color', 'red');
				nim_error = 1;
			} else {
				$.ajax({
					url: "<?= base_url('register/cekNim') ?>",
					data: 'nim=' + nim,
					type: 'POST',
					success: function (msg) {
						if (msg) {
							$('#pesan_nim').html("Nim telah terdaftar!");
							$('#pesan_nim').css('color', 'red');
							nim_error = 1;
						} else {
							$('#pesan_nim').html("Nim dapat digunakan!");
							$('#pesan_nim').css('color', 'green');
							nim_error = 0;
						}
					}
				});
			}
		}

		function cekEmail() {
			var email = $('#email').val();
			var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

			if (email == "") {
				$('#pesan_email').html("Silahkan Isi Email Anda!");
				$('#pesan_email').css('color', 'red');
				email_error = 1;
			} else {
				if (filter.test(email) == false) {
					$('#pesan_email').html("Email Tidak Valid!");
					$('#pesan_email').css('color', 'red');
					email_error = 1;
				} else {
					$.ajax({
						url: "<?= base_url('register/cekEmail') ?>",
						data: 'email=' + email,
						type: 'POST',
						success: function (msg) {
							if (msg) {
								$('#pesan_email').html("Email telah terdaftar!");
								$('#pesan_email').css('color', 'red');
								email_error = 1;
							} else {
								$('#pesan_email').html("Email dapat digunakan!");
								$('#pesan_email').css('color', 'green');
								email_error = 0;
							}
						}
					});
				}
			}
		}

		function cekPass() {
			var pass = $('#password').val();

			if (pass == "") {
				$('#pesan_pass').html("Silahkan Isi Password Anda!");
				$('#pesan_pass').css('color', 'red');
				pass_error = 1;
			} else {
				if (pass.length < 8) {
					$('#pesan_pass').html("Password Minimal 8 Karakter");
					$('#pesan_pass').css('color', 'red');
					pass_error = 1;
				} else {
					$('#pesan_pass').html("");
					pass_error = 0;
				}
			}
		}

		function cekKerja() {
			var kerja = $('#bidang_pekerjaan option:selected').attr('value');

			if (kerja == "") {
				$('#pesan_kerja').html("Silahkan Isi Bidang Pekerjaan Anda!");
				$('#pesan_kerja').css('color', 'red');
				kerja_error = 1;
			} else {
				$('#pesan_kerja').html("");
				kerja_error = 0;
			}
		}

		function cekFoto() {
			var foto = $('#foto').val();

			var fileExtension = foto.replace(/^.*\./, '');

			if (foto == "") {
				$('#pesan_foto').html("Silahkan Pilih Foto Anda!");
				$('#pesan_foto').css('color', 'red');
				foto_error = 1;
			} else {
				if (fileExtension == "jpg" || fileExtension == "png" || fileExtension == "jpeg") {
					$('#pesan_foto').html("");
					foto_error = 0;
				} else {
					$('#pesan_foto').html("Tipe Gambar Tidak Mendukung, Silahkan Pilih Foto Lain.");
					$('#pesan_foto').css('color', 'red');
					foto_error = 1;
				}
			}
		}

		$('#signup').click(function () {
			cekNamaDepan();
			cekNamaBelakang();
			cekNim();
			cekEmail();
			cekPass();
			cekKerja();
			cekFoto();

			if (nama_depan_error == 0 && nama_belakang_error == 0 && nim_error == 0 && email_error == 0 &&
				pass_error == 0 && kerja_error == 0 && foto_error == 0) {
				error = 0;
			}

			if (error == 1) {
				event.preventDefault();
			}
		})

	</script>

</body>

</html>
