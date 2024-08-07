<!-- alert berhasil tambah bidang -->
<?php if($this->session->flashdata('tambah-job')): ?>
<script>
	swal("<?= $this->session->flashdata('tambah-job') ?>", "", "success", {
		button: "OK",
	});

</script>
<!-- alert berhasil edit bidang -->
<?php elseif($this->session->flashdata('edit-job')): ?>
<script>
	swal("<?= $this->session->flashdata('edit-job') ?>", "", "success", {
		button: "OK",
	});

</script>
<!-- alert berhasil hapus bidang -->
<?php elseif($this->session->flashdata('hapus-job')): ?>
<script>
	swal("<?= $this->session->flashdata('hapus-job') ?>", "", "success", {
		button: "OK",
	});

</script>
<?php endif; ?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Bidang Pekerjaan</h1>
			<button data-toggle="modal" data-target="#tambahbidang"
				class="btn btn-icon btn-primary btn-md float-right text-right ml-auto" data-placement="bottom"
				data-toggle="tooltip" title="Tambah Bidang Pekerjaan">
				<i class="fas fas-lg fa-plus"></i>
			</button>
		</div>

		<div class="section-body">
			<p class="section-lead">Anda dapat menghapus atau mengganti bidang pekerjaan</p>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card">
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table table-striped table-md">
									<?php $nomor=1; ?>
									<tr>
										<th>No</th>
										<th>Bidang Pekerjaan</th>
										<th></th>
									</tr>
									<?php foreach ($bidang as $job): ?>
									<tr>
										<td><?= $nomor++; ?></td>
										<td><?= $job->nama ?></td>
										<td>
											<div class="btn-group">
												<a role="button" class="badge badge-warning btn-sm text-white"
													data-toggle="modal" data-target="#editbidang<?= $job->id ?>"
													style="cursor: pointer;">
													<i class="fas fa-pencil-alt"></i> Edit</a>
												<?php $no=1; foreach($user as $u): ?>
													<?php if($job->id == $u->id_bidang){ $no++;} ?>
												<?php endforeach ?>
												<?php 	if($no == 1){ ?>
														<a role="button" data-toggle="modal" data-target="#hapusbidang"
													data-idbidang="<?=$job->id?>" class="badge badge-danger btn-sm"
													style="cursor: pointer; color: white;">Hapus</a>
												<?php 	}else{ ?>
														<a role="button" data-toggle="tooltip" data-placement="right" title="Data Tidak Dapat Dihapus Karena Memiliki Relasi Dengan Data Pekerjaan Alumni" class="badge badge-secondary btn-sm"
													style="color: white;">Hapus</a>
												<?php 	} ?>
											</div>
										</td>
									</tr>
									<?php endforeach ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- modal tambah bidang pekerjaan-->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahbidang" style="z-index: 1041;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="post" action="<?= base_url('backend/dashboard/tambah_bdgPekerjaan'); ?>"
				class="needs-validation" novalidate="">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Bidang Pekerjaan</h5>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Bidang Pekerjaan</label>
						<input type="text" class="form-control" name="nama_bdg" autocomplete="off" required="">
						<div class="invalid-feedback">
							Kolom wajib diisi
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal -->

<!-- modal edit bidang pekerjaan-->
<?php foreach($bidang as $bdg): ?>
<div class="modal fade" tabindex="-1" role="dialog" id="editbidang<?= $bdg->id ?>" style="z-index: 1041;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="post" action="<?= base_url('backend/dashboard/edit_bdgPekerjaan/'.$bdg->id); ?>"
				class="needs-validation" novalidate="">
				<div class="modal-header">
					<h5 class="modal-title">Edit Bidang Pekerjaan</h5>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama Bidang Pekerjaan</label>
						<input type="text" class="form-control" name="nama_bdg" value="<?= $bdg->nama ?>"
							autocomplete="off" required="">
						<div class="invalid-feedback">
							Kolom wajib diisi
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

<!-- modal hapus bidang pekerjaan -->
<div class="modal fade" id="hapusbidang" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
			</div>
			<form action="<?= base_url('backend/dashboard/hapus_bdgPekerjaan') ?>" method="post">
				<div class="modal-body text-center">
					<h1 class="text-danger mb-5">Apakah Anda Yakin?</h1>
					<h5>Bidang pekerjaan akan dihapus</h5>
					<div class="form-group">
						<input type="text" class="form-control" id="recipient-name" name="idbidang" hidden>
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
		$('#hapusbidang').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('idbidang') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			// modal.find('.modal-title').text('Hapus ' + recipient)
			modal.find('.modal-body input').val(recipient)
		})
	});

</script>
