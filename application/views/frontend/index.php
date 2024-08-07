<?php
$s_message = $this->session->userdata['message'];
foreach ($website as $web) : ?>
	<main class="l-main">
		<?php
		if($s_message !== false) {
		?>
		<div class="alert alert-warning alert-dismissible" style="position: fixed; right: 9px; z-index: 99; top: 80px;">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	    <strong><?php echo $s_message; ?>
	  </div>
		<?php
		}
		?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script>
		//$('#alert').on('closed.bs.alert', function () {
		  $('#alert').alert('close')
	//	})
		</script>
		<style>
			figure.snip1192 blockquote {
				background-color: <?= $web->warna ?> !important;
			}

			figure.snip1192 blockquote h5 span {
				background-color: <?= $web->warna2 ?> !important;
			}

			.button {
				background-color: <?= $web->warna2 ?> !important;
				color: <?= $web->warna ?> !important;
			}

			.button:hover {
				background-color: <?= $web->warna ?> !important;
				color: white !important;
			}

			.scrolltop {
				background-color: <?= $web->warna2 ?> !important;
				color: <?= $web->warna ?> !important;
			}

			.scrolltop:hover {
				background-color: <?= $web->warna ?> !important;
				color: white !important;
			}
		</style>
		<!--========== HOME ==========-->
		<section class="home" id="home">
			<div class="home__container bd-container bd-grid">
				<div class="home__data">
					<h1 class="home__title" style="color:<?= $web->warna ?> ;"><?= $web->web ?></h1>
					<h2 class="home__subtitle">Segera daftarkan dirimu<br> sebagai alumni.</h2>
					<a href="<?= base_url('register/daftar') ?>" class="button">Registrasi Disini</a>
				</div>
				<img src="<?= base_url('assets') ?>/user/<?= $web->logo ?>" alt="" class="home__img">
			</div>
		</section>

		<!--========== TESTIMONI ==========-->
		<section class="menu section bd-container" id="testimoni">
			<span class="section-subtitle" style="color:<?= $web->warna ?> ;">Testimoni</span>
			<h2 class="section-title">Kesan & Pesan</h2>


			<div class="row">
				<?php foreach ($testimoni as $testi) : ?>
					<div class="col">
						<figure class="snip1192">
							<blockquote><?= $testi->testimoni ?></blockquote>
							<div class="author" style="color:<?= $web->warna ?> ;">
								<img src="<?= base_url(); ?>assets/backend/img/avatar-2.png" alt="sq-sample1" />
								<h5><?= $testi->nama_depan ?> <?= $testi->nama_belakang ?></h5>
							</div>
						</figure>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
		<hr>
		<section class="menu section bd-container" id="alumni">
			<span class="section-subtitle" style="color:<?= $web->warna ?> ;">Pengguna Alumni</span>
			<h2 class="section-title">Kuesioner Pengguna Alumni Universitas Muhammadiyah Jakarta</h2>
			<div class="row">
				<form action="http://localhost/tracerlumni/kues_pengguna/submitKuesionerPengguna" method="post" class="forms-sample needs-validation" novalidate="">

					<input type="text" class="form-control" value="1" name="pertanyaan1" hidden="" required="">

					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12 row pd-t-10">
									<h5 class="col-md-5">Nama Instansi/Perusahaan * </h5>
									<h5 class="col-md-1">:</h5>
									<input type="text" class="col-md-6" id="inp_nama_instansi" value="" name="inp_nama_instansi" required="">
								</div>
								<div class="col-lg-12 row pd-t-10">
									<h5 class="col-md-5">Nama Pengisi Kuesioner * </h5>
									<h5 class="col-md-1">:</h5>
									<input type="text" class="col-md-6" id="inp_nama_kues" value="" name="inp_nama_kues" required="">
								</div>
								<div class="col-lg-12 row">
									<h5 class="col-md-5">Jabatan * </h5>
									<h5 class="col-md-1">:</h5>
									<input type="text" class="col-md-6" id="inp_jabatan" value="" name="inp_jabatan" required="">
								</div>
								<div class="col-lg-12 row">
									<h5 class="col-md-5">Nama Alumni * </h5>
									<h5 class="col-md-1">:</h5>
									<input type="text" class="col-md-6" id="inp_nama_alumni" value="" name="inp_nama_alumni" required="">
								</div>
							</div>
						</div>
					</div>
					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12">
									<h4>Etika</h4>
									<h5>1. Memegang teguh etika dan moral dalam tindakannya dan tanggung jawab sosialnya sebagai profesional dan warga negara</h5>
									<div class="form-group form-check">
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="1-1" value="1" name="jawaban1" required="">
											<label class=" custom-control-label form-check-label" for="1-1">Sangat Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="1-2" value="2" name="jawaban1" required="">
											<label class=" custom-control-label form-check-label" for="1-2">Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="1-3" value="3" name="jawaban1" required="">
											<label class=" custom-control-label form-check-label" for="1-3">Cukup Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="1-4" value="4" name="jawaban1" required="">
											<label class=" custom-control-label form-check-label" for="1-4">Kurang<i class="input-helper"></i></label>
											<div class="invalid-feedback">
												Anda harus mengisi form untuk melanjutkan
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12">
									<h4>Keahlian pada bidang ilmu</h4>
									<h5>2. Kemampuan mengaplikasikan ilmu pengetahuan dan keahlian sesuai kompetensi di bidang ilmunya.</h5>
									<div class="form-group form-check">
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="2-1" value="1" name="jawaban2" required="">
											<label class=" custom-control-label form-check-label" for="2-1">Sangat Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="2-2" value="2" name="jawaban2" required="">
											<label class=" custom-control-label form-check-label" for="2-2">Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="2-3" value="3" name="jawaban2" required="">
											<label class=" custom-control-label form-check-label" for="2-3">Cukup Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="2-4" value="4" name="jawaban2" required="">
											<label class=" custom-control-label form-check-label" for="2-4">Kurang<i class="input-helper"></i></label>
											<div class="invalid-feedback">
												Anda harus mengisi form untuk melanjutkan
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12">
									<h4>Kemampuan berbahasa asing</h4>
									<h5>3. Kemampuan bahasa Inggris dan atau bahasa asing lainnya.</h5>
									<div class="form-group form-check">
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="3-1" value="1" name="jawaban3" required="">
											<label class=" custom-control-label form-check-label" for="3-1">Sangat Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="3-2" value="2" name="jawaban3" required="">
											<label class=" custom-control-label form-check-label" for="3-2">Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="3-3" value="3" name="jawaban3" required="">
											<label class=" custom-control-label form-check-label" for="3-3">Cukup Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="3-4" value="4" name="jawaban3" required="">
											<label class=" custom-control-label form-check-label" for="3-4">Kurang<i class="input-helper"></i></label>
											<div class="invalid-feedback">
												Anda harus mengisi form untuk melanjutkan
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12">
									<h4>Penggunaan Teknologi Informasi</h4>
									<h5>4. Kemampuan memanfaatkan dan menggunakan teknologi informasi untuk menunjang pekerjaan.</h5>
									<div class="form-group form-check">
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="4-1" value="1" name="jawaban4" required="">
											<label class=" custom-control-label form-check-label" for="4-1">Sangat Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="4-2" value="2" name="jawaban4" required="">
											<label class=" custom-control-label form-check-label" for="4-2">Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="4-3" value="3" name="jawaban4" required="">
											<label class=" custom-control-label form-check-label" for="4-3">Cukup Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="4-4" value="4" name="jawaban4" required="">
											<label class=" custom-control-label form-check-label" for="4-4">Kurang<i class="input-helper"></i></label>
											<div class="invalid-feedback">
												Anda harus mengisi form untuk melanjutkan
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12">
									<h4>Kemampuan berkomunikasi</h4>
									<h5>5. Kemampuan berkomunikasi dengan baik kepada atasan, rekan kerja, bawahan maupun konsumen/klien.</h5>
									<div class="form-group form-check">
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="5-1" value="1" name="jawaban5" required="">
											<label class=" custom-control-label form-check-label" for="5-1">Sangat Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="5-2" value="2" name="jawaban5" required="">
											<label class=" custom-control-label form-check-label" for="5-2">Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="5-3" value="3" name="jawaban5" required="">
											<label class=" custom-control-label form-check-label" for="5-3">Cukup Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="5-4" value="4" name="jawaban5" required="">
											<label class=" custom-control-label form-check-label" for="5-4">Kurang<i class="input-helper"></i></label>
											<div class="invalid-feedback">
												Anda harus mengisi form untuk melanjutkan
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12">
									<h4>Kerjasama tim</h4>
									<h5>6. Kemampuan bekerjasama dengan tim.</h5>
									<div class="form-group form-check">
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="6-1" value="1" name="jawaban6" required="">
											<label class=" custom-control-label form-check-label" for="6-1">Sangat Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="6-2" value="2" name="jawaban6" required="">
											<label class=" custom-control-label form-check-label" for="6-2">Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="6-3" value="3" name="jawaban6" required="">
											<label class=" custom-control-label form-check-label" for="6-3">Cukup Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="6-4" value="4" name="jawaban6" required="">
											<label class=" custom-control-label form-check-label" for="6-4">Kurang<i class="input-helper"></i></label>
											<div class="invalid-feedback">
												Anda harus mengisi form untuk melanjutkan
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12">
									<h4>Pengembangan diri</h4>
									<h5>7. Keinginan dan kemampuan untuk mengembangkan potensi diri.</h5>
									<div class="form-group form-check">
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="7-1" value="1" name="jawaban7" required="">
											<label class=" custom-control-label form-check-label" for="7-1">Sangat Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="7-2" value="2" name="jawaban7" required="">
											<label class=" custom-control-label form-check-label" for="7-2">Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="7-3" value="3" name="jawaban7" required="">
											<label class=" custom-control-label form-check-label" for="7-3">Cukup Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="7-4" value="4" name="jawaban7" required="">
											<label class=" custom-control-label form-check-label" for="7-4">Kurang<i class="input-helper"></i></label>
											<div class="invalid-feedback">
												Anda harus mengisi form untuk melanjutkan
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="card card-data sale-diffrence-border my-2 float-center">
						<div class="card-body">
							<div class="form-row">
								<div class="col-lg-12">
									<h4>Kemasyarakatan</h4>
									<h5>8. Kesiapan terjun di Masyarakat.</h5>
									<div class="form-group form-check">
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="8-1" value="1" name="jawaban8" required="">
											<label class=" custom-control-label form-check-label" for="8-1">Sangat Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="8-2" value="2" name="jawaban8" required="">
											<label class=" custom-control-label form-check-label" for="8-2">Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="8-3" value="3" name="jawaban8" required="">
											<label class=" custom-control-label form-check-label" for="8-3">Cukup Baik<i class="input-helper"></i></label>

										</div>
										<div class=" radio custom-control custom-radio p-0">

											<input type="radio" class="input-radio custom-control-input form-check-input" id="8-4" value="4" name="jawaban8" required="">
											<label class=" custom-control-label form-check-label" for="8-4">Kurang<i class="input-helper"></i></label>
											<div class="invalid-feedback">
												Anda harus mengisi form untuk melanjutkan
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>


					<input type="text" class="form-control" value="8" name="jlh" hidden="" required="">
					<input type="submit" class="btn btn-lg text-left float-right btn-primary btn-fw " name="save" value="Simpan">
				</form>
			</div>
		</section>
		</div>
	<?php endforeach;
	$this->session->userdata['message'] = false;
	?>
