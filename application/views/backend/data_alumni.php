<!-- alert berhasil hapus alumni -->
<?php if($this->session->flashdata('hapus-alumni')): ?>
<script>
	swal("<?= $this->session->flashdata('hapus-alumni') ?>", "", "success", {
		button: "OK",
	});

</script>
<?php endif; ?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Alumni</h1>
		</div>

		<div class="section-body">
			<h2 class="section-title">Alumni Terdaftar</h2>
			<?php 
			foreach($website as $web): ?>
			<p class="section-lead"><?=$web->prodi?> - <?=$web->universitas?></p>
			<?php endforeach; ?>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card p-3">
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table table-striped table-md" id="myAlumni">
									<?php $nomor=1; ?>
									<thead>
										<tr>
											<th>No</th>
											<th>NIM</th>
											<th>Nama</th>
											<th>Tahun Lulus</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($data as $key): ?>
										<tr>
											<td><?= $nomor++; ?></td>
											<td><?= $key->nim ?></td>
											<td><?= $key->nama_depan ?> <?= $key->nama_belakang ?></td>
											<td><?= $key->tahun_lulus ?></td>
											<td>
												<a data-toggle="tooltip"
													href="<?= base_url('backend/dashboard/det_data/'.$key->id) ?>"
													role="button" class="btn btn-icon btn-sm icon-left btn-primary">
													<i class="fas fa-info-circle"></i> detail
												</a>
												<a role="button" data-toggle="modal" data-target="#hapusalumni"
													data-idalumni="<?=$key->id?>" class="btn btn-icon btn-sm btn-danger"
													style="cursor: pointer;">
													<i class="far fa-trash-alt text-white" data-toggle="tooltip"
														title="Hapus"></i>
												</a>
											</td>
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- modal hapus alumni -->
<div class="modal fade" id="hapusalumni" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"></h5>
			</div>
			<form action="<?= base_url('backend/dashboard/hapus_alumni') ?>" method="post">
				<div class="modal-body text-center">
					<h1 class="text-danger mb-5">Apakah Anda Yakin?</h1>
					<h5>Alumni terdaftar beserta datanya akan terhapus</h5>
					<div class="form-group">
						<input type="text" class="form-control" id="recipient-name" name="idalumni" hidden>
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
		$('#hapusalumni').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('idalumni') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			// modal.find('.modal-title').text('Hapus ' + recipient)
			modal.find('.modal-body input').val(recipient)
		})

		$('#myAlumni').DataTable();
	});

</script>
