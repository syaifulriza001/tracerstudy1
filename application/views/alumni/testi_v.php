<div class="container-fluid page-body-wrapper">
	<div class="main-panel">
		<div class="content-wrapper">
			<div class="row">
				<div class="col-sm-12 mb-4 mb-xl-0">
					<div class="d-lg-flex align-items-center">
						<div class="my-3 ml-5">
							<h2 class="text-dark font-weight-bold mb-2">Testimoni</h2>
							<h3 class="font-weight-normal mb-2"> Berikut form testimoni  </h3>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<?php echo $this->session->flashdata('status') ?>
						<div class="card-body">
							<form class="forms-sample needs-validation" novalidate method="post">
								<div class="form-group">
									<label for="exampleTextarea1">Testimoni</label>
									<textarea class="form-control" maxlength="205" rows="4" name="testimoni"
										placeholder="Tuliskan Kesan anda selama kuliah maupun setelah lulus"
										required><?= $user->testimoni ?></textarea>
									<div class="invalid-feedback">
										Silahkan Isi Testimoni Anda !
									</div>
									<input type="number" name="id_user" value="<?= $user->id ?>" hidden>
								</div>
								<!-- <div class="form-group">
									<label for="exampleTextarea1">Kritik dan Saran</label>
									<textarea class="form-control" rows="4" name="kritik_saran"
										placeholder="Tuliskan kritik dan saran anda untuk para dosen dan staff agar meningkatkan kinerja dan perkembangan prodi"
										required><?= $user->kritik_saran ?></textarea>
									<div class="invalid-feedback">
										Silahkan Isi Kritik dan Saran Anda !
									</div>
								</div> -->
								<?php
                    if ($user->id_testi == NULL ){
                     ?>
								<button type="submit" formaction="<?= base_url('tambahTesti/'.$user->id) ?>"
									class="btn btn-primary mr-2">Kirim</button>
								<?php }else { ?>
								<button type="submit" formaction="<?= base_url('ubahTesti/'.$user->id) ?>"
									class="btn btn-primary mr-2">Ubah</button>
								<?php } ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
				'use strict';
				window.addEventListener('load', function () {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function (form) {
						form.addEventListener('submit', function (event) {
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
