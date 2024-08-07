<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<?php echo $this->session->flashdata('status') ?>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
									<h1 class="card-title font-size-">Data Diri</h1>
									<h3 class="card-description mb-5">
										Silahkan lengkapi form data diri anda dibawah ini
									</h3>
								</div>
								<div class="col-6 text-right">
									<a href="<?= base_url(); ?>ubahpass">
										<button type="button" class="btn btn-outline-inverse-primary btn-icon-text m-2">
											Ubah Password
											<i class="mdi mdi-account-key btn-icon-append"></i>
										</button>
									</a>
									<button type="button" class="btn btn-outline-inverse-info btn-icon-text m-2" data-toggle="modal" data-target="#ubahemail">
										Ubah Email
										<i class="mdi mdi-email btn-icon-append"></i>
									</button>
								</div>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="ubahpass" tabindex="-1" role="dialog" aria-labelledby="ubahpassLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ubahpassLabel">Password</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<h3>Kami Akan Mengirim Email untuk Mengubah Password anda , Pastikan Email anda benar</h3>
											Mengirim ke <b> <?= $user->email ?></b> ?
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
											<a href="<?= base_url(); ?>ubahpass" type="button" class="btn btn-primary">Kirim</a>
										</div>
									</div>
								</div>
							</div>
							<!-- Modal -->
							<div class="modal fade" id="ubahemail" tabindex="-1" role="dialog" aria-labelledby="ubahemailLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ubahemailLabel">Email</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form action="<?= base_url('ubahEmail/' . $user->id) ?>" method="POST" class="forms-sample">
											<div class="modal-body">
												<div class="form-group">
													<label for="email">Silahkan Isi Email baru anda !</label>
													<input type="email" class="form-control" name="email" id="email" placeholder="Email" onkeyup="cekEmail()">
													<span id="pesan_email"></span>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
												<button type="submit" class="btn btn-primary" id="email_submit">Verifikasi</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<form class="forms-sample needs-validation" method="post" enctype="multipart/form-data" novalidate action="<?= base_url('updateProfil/' . $user->id) ?>">
								<div class="form-group form-row">
									<div class="col-lg-6">
										<label for="depan">Nama Depan</label>
										<input type="text" class="form-control" name="nama_depan" value="<?= $user->nama_depan ?>" id="depan" placeholder="Nama Depan" required>
										<div class="invalid-feedback">
											Silahkan Isi Nama Depan Anda !
										</div>
									</div>
									<div class="col-lg-6">
										<label for="belakang">Nama Belakang</label>
										<input type="text" class="form-control" id="belakang" name="nama_belakang" value="<?= $user->nama_belakang ?>" placeholder="Nama Belakang">
										<div class="invalid-feedback">
											Silahkan Isi Nama Belakang Anda !
										</div>
									</div>
								</div>
								<div class="form-group">
								</div>
								<div class="form-group">
									<label for="gender">Jenis Kelamin</label>
									<select class="form-control" name="jenis_kelamin" id="gender" required>
										<option value="<?= $user->jenis_kelamin ?>" selected><?= $user->jenis_kelamin ?></option>
										<option value="L">L</option>
										<option value="P">P</option>
									</select>
									<div class="invalid-feedback">
											Silahkan Pilih Jenis Kelamin Anda !
									</div>
								</div>
								<div class="form-group form-row">
									<div class="col-lg-6">
										<label for="tmp_lahir">Tempat Lahir</label>
										<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" id="datepicker" value="<?= $user->tempat_lahir ?>" placeholder="Tempat Lahir" required>
										<div class="invalid-feedback">
											Silahkan Isi Tempat Lahir Anda !
										</div>
									</div>
									<div class="col-lg-6">
										<label for="tgl_lahir">Tanggal Lahir</label>
										<input type="text" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" id="datepicker" value="<?= $user->tgl_lahir ?>" required>
										<div class="invalid-feedback">
											Silahkan Isi Tanggal Lahir Anda !
										</div>
									</div>
								</div>
								<div class="form-group form-row">
									<div class="col-lg-6">
										<label for="tmp_lahir">Angkatan</label>
										<input type="number" class="form-control" name="angkatan" id="datepicker2" value="<?= $user->angkatan ?>" placeholder="Angkatan" min="1980" max="<?= date("Y") ?>" required>
										<div class="invalid-feedback">
											Silahkan Isi Angkatan Anda ! ( Contoh : 2016 )
										</div>
									</div>
									<div class="col-lg-6">

										<label for="tahun_lahir">Tahun Lulus</label>
										<input type="number" class="form-control" name="tahun_lulus" id="datepicker1" value="<?= $user->tahun_lulus ?>" placeholder="Tahun Lulus" min="1980" max="<?= date("Y") ?>" required>
										<div class="invalid-feedback">
											Silahkan Isi Tahun Lulus Anda ! ( Contoh : 2021 )
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>File upload</label>
									<label for="nama_depan" class="form-control-label">Foto</label>
									<input type="file" class="form-control" name="new_foto">
									<input type="text" class="form-control" name="old_foto" value="<?= $user->foto ?>" hidden>
								</div>
								<div class="form-group form-row">
									<div class="col-lg-6">
										<label for="tmp_lahir">Alamat</label>
										<input type="text" class="form-control" name="alamat" value="<?= $user->alamat ?>" id="alamat" placeholder="Alamat" required>
										<div class="invalid-feedback">
											Silahkan Isi Alamat Anda !
										</div>
									</div>
									<div class="col-lg-6">
										<label for="tgl_lahir">No telepon</label>
										<input type="number" class="form-control" id="phone" placeholder="No Telepon" name="telp" value="<?= $user->telp ?>" required>
										<div class="invalid-feedback">
											Silahkan Isi no telepon Anda !
										</div>
									</div>
								</div>
								<input type="text" class="form-control" name="email" value="<?= $user->email ?>" hidden>
								<button type="submit" class="btn btn-primary mr-2" name="submit">Ubah</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- content-wrapper ends -->
		<script>
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
		</script>

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
							success: function(msg) {
								if (msg) {
									$('#pesan_email').html("Email telah terdaftar!");
									$('#pesan_email').css('color', 'red');
									error = 1;
								} else {
									$('#pesan_email').html("Email dapat digunakan!");
									$('#pesan_email').css('color', 'green');
									error = 0;
								}
							}
						});
					}
				}
			}

			$('#email_submit').click(function(){
				cekEmail();

				if(error == 1){
					event.preventDefault();
				}
			})


		</script>
