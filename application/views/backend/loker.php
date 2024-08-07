<!-- alert berhasil tambah loker -->
<?php if($this->session->flashdata('tambah-loker')): ?>
<script>
	swal("<?= $this->session->flashdata('tambah-loker') ?>", "", "success", {
		button: "OK",
	});

</script>
<!-- alert berhasil edit loker -->
<?php elseif($this->session->flashdata('edit-loker')): ?>
<script>
	swal("<?= $this->session->flashdata('edit-loker') ?>", "", "success", {
		button: "OK",
	});

</script>
<!-- alert berhasil hapus loker -->
<?php elseif($this->session->flashdata('hapus-loker')): ?>
<script>
	swal("<?= $this->session->flashdata('hapus-loker') ?>", "", "success", {
		button: "OK",
	});

</script>
<?php endif; ?>

<!-- Main Content -->
<div class="main-content">
	<?php if($this->session->flashdata('publish-loker')): ?>
	<!-- alert berhasil publish loker -->
	<div class="alert alert-success" role="alert">
		<h6><?= $this->session->flashdata('publish-loker') ?></h6>
	</div>
	<?php elseif($this->session->flashdata('unpublish-loker')): ?>
	<!-- alert berhasil unpublish loker -->
	<div class="alert alert-warning" role="alert">
		<h6><?= $this->session->flashdata('unpublish-loker') ?></h6>
	</div>
	<?php endif; ?>
	<section class="section">
		<div class="section-header">
			<h1>Loker</h1>
			<button data-toggle="modal" data-target="#tambahloker"
				class="btn btn-icon btn-primary btn-md float-right text-right ml-auto" data-placement="bottom"
				data-toggle="tooltip" title="Tambah Loker">
				<i class="fas fas-lg fa-plus"></i>
			</button>
		</div>

		<div class="section-body">
			<h2 class="section-title">Daftar Lowongan Pekerjaan</h2>
			<div class="row">
				<?php foreach ($loker as $l): ?>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-header">
							<h4><?= $l->judul ?></h4>
							<div class="card-header-action">
								<?php if($l->status == 'unpublish'): ?>
								<a href="<?= base_url('backend/dashboard/publish_loker/'.$l->id_loker); ?>"
									class="btn btn-success" data-toggle="tooltip" title="posting">
									<i class="fas fa-arrow-up"></i>
								</a>
								<?php elseif($l->status == 'publish'): ?>
								<a href="<?= base_url('backend/dashboard/unpublish_loker/'.$l->id_loker); ?>"
									class="btn btn-danger" data-toggle="tooltip" title="turunkan">
									<i class="fas fa-arrow-down"></i>
								</a>
								<?php endif; ?>
								<div class="dropdown">
									<a href="#" data-toggle="dropdown"
										class="btn btn-warning dropdown-toggle">Pilihan</a>
									<div class="dropdown-menu">
										<a role="button" data-toggle="modal"
											data-target="#detailloker<?= $l->id_loker ?>" class="dropdown-item has-icon"
											style="cursor: pointer;"><i class="fas fa-eye"></i> Detail</a>
										<a role="button" data-toggle="modal" data-target="#editloker<?= $l->id_loker ?>"
											class="dropdown-item has-icon" style="cursor: pointer;"><i
												class="far fa-edit"></i> Edit</a>
										<div class="dropdown-divider"></div>
										<a role="button" data-toggle="modal" data-target="#hapusloker"
											data-idloker="<?=$l->id_loker?>"
											class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"
												style="cursor: pointer;"></i>
											Hapus</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<?php if($l->status == 'publish'): ?>
							<h5 class="badge badge-success">diposting</h5>
							<?php elseif($l->status == 'unpublish'): ?>
							<h5 class="badge badge-danger">tidak diposting</h5>
							<?php endif; ?>
							<p>Dibuat oleh <b><?= $l->nama_depan ?> <?= $l->nama_belakang?></b> <br> pada
								<?= date('d-m-Y', strtotime($l->tgl_buat)) ?>
							</p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>

<!-- modal tambah loker-->
<div class="modal fade" role="dialog" id="tambahloker">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="post" action="<?= base_url('backend/dashboard/tambah_loker'); ?>" class="needs-validation"
				novalidate="">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Loker</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Nama Pekerjaan</label>
							<input type="text" name="jdl" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Nama Instansi</label>
							<input type="text" name="inst" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Kota</label>
							<input type="text" name="kota" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Email perekrut</label>
							<input type="email" name="email" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Deskripsi</label>
							<input type="text" name="desk" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Waktu tutup pendaftaran</label>
							<input type="date" name="tgl_tutup" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12 col-12">
							<label>Persyaratan</label>
							<input type="text" name="syarat" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal -->

<!-- modal edit loker-->
<?php foreach($detLoker as $det): ?>
<div class="modal fade" role="dialog" id="editloker<?= $det->id_loker ?>">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="post" action="<?= base_url('backend/dashboard/edit_loker/'.$det->id_loker); ?>"
				class="needs-validation" novalidate="">
				<div class="modal-header">
					<h5 class="modal-title">Edit Loker</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Nama Pekerjaan</label>
							<input type="text" name="jdl" class="form-control" autocomplete="off"
								value="<?= $det->judul ?>" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Nama Instansi</label>
							<input type="text" name="inst" class="form-control" autocomplete="off"
								value="<?= $det->instansi ?>" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Kota</label>
							<input type="text" name="kota" class="form-control" autocomplete="off"
								value="<?= $det->kota ?>" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Email perekrut</label>
							<input type="email" name="email" class="form-control" value="<?= $det->email ?>"
								autocomplete="off" value="<?= $det->email ?>" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Deskripsi</label>
							<input type="text" name="desk" class="form-control" autocomplete="off"
								value="<?= $det->deskripsi ?>" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Waktu tutup pendaftaran</label>
							<input type="date" name="tgl_tutup" class="form-control" autocomplete="off"
								value="<?= $det->tgl_akhir ?>" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12 col-12">
							<label>Persyaratan</label>
							<input type="text" name="syarat" class="form-control" autocomplete="off"
								value="<?= $det->syarat ?>" required="">
							<div class="invalid-feedback">
								Kolom wajib diisi
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- end modal -->

<!-- modal detail loker -->
<?php foreach($detLoker as $det): ?>
<div class="modal fade" tabindex="-1" role="dialog" id="detailloker<?= $det->id_loker ?>" style="z-index: 1041;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="card card-primary">
					<div class="card-header text-center">
						<h3 class="text-primary" style="text-align: center;"><?= $det->judul ?></h3>
					</div>
					<div class="card-body">
						<h6 class="text-center"><?= $det->instansi ?> <br> <?= $det->kota ?></h6> <br>
						<p><?= $det->deskripsi ?></p>
						<p>Persyaratan: <br><?= $det->syarat ?></p>
						<p><i class="fas fa-envelope"></i> <b><?= $det->email ?></b></p>
						<p>Pendaftaran ditutup pada <?= date('d-m-Y', strtotime($det->tgl_akhir)); ?></p>
					</div>
					<div class="card-footer">
						<small>
							<i>Dibuat oleh <?= $det->nama_depan ?> <?= $det->nama_belakang ?>
								<br>pada <?= date('d-m-Y', strtotime($det->tgl_buat)); ?></i>

						</small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>
<!-- end modal -->

<!-- modal hapus loker -->
<div class="modal fade" id="hapusloker" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
			</div>
			<form action="<?= base_url('backend/dashboard/hapus_loker') ?>" method="post">
				<div class="modal-body text-center">
					<h1 class="text-danger mb-5">Apakah Anda Yakin?</h1>
					<h5>Loker yang sedang diposting akan terhapus</h5>
					<div class="form-group">
						<input type="text" class="form-control" id="recipient-name" name="idloker" hidden>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal -->

<script>
	$(document).ready(function () {
		$('#hapusloker').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('idloker') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			// modal.find('.modal-title').text('Hapus ' + recipient)
			modal.find('.modal-body input').val(recipient)
		})
	});

</script>
