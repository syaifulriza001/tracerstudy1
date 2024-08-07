<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="<?= base_url(); ?>assets_alumni/images/favicon.png" />
	<title>Sistem Informasi Tracer Study</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
		integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- Font Icon -->
	<link rel="stylesheet"
		href="<?= base_url('assets/login/') ?>fonts/material-icon/css/material-design-iconic-font.min.css">
	<link rel="shortcut icon" href="<?= base_url(); ?>assets_admin/images/favicon.ico" />
	<!-- Main css -->
	<link rel="stylesheet" href="<?= base_url('assets/login/') ?>css/style.css">
</head>

<body>

	<div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<?php
                if ($this->session->flashdata('login')) :
                ?>
				<div class="alert alert-danger" id="alertLogin" role="alert">
					<?= $this->session->flashdata('login') ?>
				</div>
				<?php endif ?>
				<?php
                if ($this->session->flashdata('gagal')) :
                ?>
				<div class="alert alert-danger" id="alertgagal" role="alert">
					<?= $this->session->flashdata('gagal') ?>
				</div>
				<?php endif ?>
				<div class="signin-content">
					<div class="signin-image m-0 w-75">
						<figure><img src="<?= base_url('assets/login/') ?>images/signin.svg" alt="sing up image">
						</figure>
						<a href="<?= base_url() ?>" class="signup-image-link"><b>Kembali ke Beranda</b></a>
					</div>

					<div class="signin-form">
						<h3 class="form-title"><b>Akses Tracer Study</b></h3>
						<form action="<?= base_url('login/doLogin') ?>" method="POST" class="register-form"
							id="login-form">
							<div class="form-group">
								<label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="email" name="your_email" id="your_email" placeholder="Email Aktif"
									autocomplete="off" />
							</div>
							<div class="form-group">
								<label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
								<input type="password" name="your_pass" id="your_pass" placeholder="PIN" />
							</div>
							<div class="form-group form-button">
								<input type="submit" name="signin" id="signin" class="form-submit" value="Masuk" />
							</div>
						</form>
						<a class="signup-image-link my-2 text-left" data-toggle="modal" data-target="#ubahpass"
							style="cursor: pointer;">
							<div class="small">Lupa Password ? Klik disini</div>
						</a>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="ubahpass" tabindex="-1" role="dialog" aria-labelledby="ubahpassLabel"
						aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="ubahpassLabel">Lupa Password</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="<?= base_url('login/lupapass') ?>" method="POST" class="forms-sample">
									<div class="modal-body">
										<div class="form-group">
											<input type="email" class="form-control" name="email" id="email"
												placeholder="Isi Email Anda yang sudah Terdaftar" onkeyup="cekEmail()">
											<span id="pesan_email"></span>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Tutup</button>
										<button type="submit" id="email_submit" class="btn btn-primary">Kirim Konfirmasi
											Ubah Password</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>

	<!-- JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
		integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
		integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
	</script>
	<script>
		window.setTimeout(function () {
			$("#alertLogin").fadeTo(500, 0).slideUp(500, function () {
				$(this).remove();
			});
		}, 4000);
		window.setTimeout(function () {
			$("#alertGagal").fadeTo(500, 0).slideUp(500, function () {
				$(this).remove();
			});
		}, 4000);

	</script>
	<script src="<?= base_url('assets/login/') ?>vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('assets/login/') ?>js/main.js"></script>
	<script type="text/javascript">
		var error = 1;

		function cekEmail() {
			var email = $('#email').val();
			var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;

			if (email == "") {
				$('#pesan_email').html("Silahkan Isi Email Anda!");
				$('#pesan_email').css('color', 'red');
				error = 1;
			} else {
				if (filter.test(email) == false) {
					$('#pesan_email').html("Email Tidak Valid!");
					$('#pesan_email').css('color', 'red');
					error = 1;
				} else {
					$.ajax({
						url: "<?= base_url('register/cekemail') ?>",
						data: 'email=' + email,
						type: 'POST',
						success: function (msg) {
							if (msg) {
								$('#pesan_email').html("Email terdaftar!");
								$('#pesan_email').css('color', 'green');
								error = 0;
							} else {
								$('#pesan_email').html("Email tidak terdaftar!");
								$('#pesan_email').css('color', 'red');
								error = 1;
							}
						}
					});
				}
			}
		}

		$('#email_submit').click(function () {
			cekEmail();

			if (error == 1) {
				event.preventDefault();
			}
		})

	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
