<!-- Main Content -->
<div class="main-content">
	<!-- Alert berhasil update profil -->
	<?php if($this->session->flashdata('profil')): ?>
	<div class="alert alert-success" role="alert">
		<h6><?= $this->session->flashdata('profil') ?></h6>
	</div>
	<?php endif; ?>
	<!-- End alert -->
	<section class="section">
		<div class="section-header">
			<h1>Profil</h1>
		</div>
		<div class="section-body">
			<h2 class="section-title">Hi, <?= $this->session->userdata('nama_depan') ?>!</h2>
			<p class="section-lead">
				Ubah data diri Anda disini
			</p>

			<div class="row mt-sm-4">
				<div class="col-12 col-md-12 col-lg-7">
					<div class="card profile-widget">
						<div class="profile-widget-header">
							<img alt="image" src="<?=base_url();?>assets/backend/img/avatar-1.png"
								class="rounded-circle profile-widget-picture">
							<form method="post" action="<?=base_url();?>update-profile" class="needs-validation"
								novalidate="">
								<div class="card-header">
									<h4>Edit Profil</h4>
								</div>
								<?php foreach ($data as $user): ?>
								<div class="card-body">
									<div class="row">
										<div class="form-group col-md-6 col-12">
											<label>Nama Depan</label>
											<input type="text" name="nama_depan" maxlength="10" class="form-control"
												value="<?= $user->nama_depan ?>" required="">
											<div class="invalid-feedback">
												Nama depan wajib diisi
											</div>
										</div>
										<div class="form-group col-md-6 col-12">
											<label>Nama Belakang</label>
											<input type="text" name="nama_belakang" maxlength="15" class="form-control"
												value="<?= $user->nama_belakang ?>" required="">
											<div class="invalid-feedback">
												Nama belakang wajib diisi
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group col-md-6 col-12">
											<label>Email</label>
											<input type="email" name="email" maxlength="30" class="form-control"
												value="<?= $user->email ?>" required="">
											<div class="invalid-feedback">
												Email wajib diisi
											</div>
										</div>
										<div class="form-group col-md-6 col-12">
											<label>Sandi</label>
											<input type="password" name="pass" maxlength="15" class="form-control"
												value="">
											<small class="form-text text-muted">Kosongkan kolom ini jika tidak ingin
												merubah password</small>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
								<div class="card-footer text-right">
									<button type="submit" class="btn btn-primary">Simpan perubahan</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</section>
</div>
