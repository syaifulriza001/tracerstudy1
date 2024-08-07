<?php 
    if($this->session->flashdata('berhasil')){
  ?>
<script>
	swal("Berhasil !", "<?= $this->session->flashdata('berhasil') ?>", "success", {
		button: "OK",
	});

</script>
<?php
    }
  ?>
<?php 
    if($this->session->flashdata('gagal')){
  ?>
<script>
	swal("Gagal !", "<?= $this->session->flashdata('gagal') ?>", "danger", {
		button: "OK",
	});

</script>
<?php
    }
  ?>

<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambah" style="    z-index: 1041;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Tracer Study</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('backend/survey/tambah/')?>" class="forms-sample needs-validation" method="post"
					enctype="multipart/form-data" novalidate>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" required placeholder="Isi Nama Survei" name="nama_survei">
						<div class="invalid-feedback">
							Silahkan isi Nama Tracer Study ! contoh : tracer study 2019
						</div>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" required height="200px" name="deskripsi" placeholder="Deskripsi Trace Study"
							id="" cols="30"></textarea>
						<div class="invalid-feedback">
							Silahkan isi keterangan Tracer Study !
						</div>
					</div>
					<div class="form-group">
						<label>Mulai Pada</label>
						<input type="date" class="form-control" required name="tgl_mulai" min="<?= date('Y-m-d') ?>">
						<div class="invalid-feedback">
							Silahkan isi tanggal mulai Tracer Study !
						</div>
					</div>
					<div class="form-group">
						<label>Berakhir Pada</label>
						<input type="date" class="form-control" required name="tgl_berahkir" min="<?= date('Y-m-d') ?>">
						<div class="invalid-feedback">
							Silahkan isi tanggal berakhir Tracer Study !
						</div>
					</div>
					<input type="date" class="form-control" required name="tgl_update" value="<?= date('Y-m-d') ?>" hidden>
					<div class="modal-footer bg-whitesmoke br">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- main section -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tracer Study</h1>
			<button data-toggle="modal" data-target="#tambah"
				class="btn btn-icon btn-primary btn-lg float-right text-right ml-auto"><i data-placement="bottom"
					data-toggle="tooltip" title="Tambah Survei" class="fas fas-lg fa-plus"></i></button>
		</div>
		<div class="section-body">
			<h2 class="section-title">Survei Tracer Study</h2>
			<p class="section-lead">
				Silahkan tambah dan edit tracer study
			</p>
			<div class="card px-2">
				<div class="card-header">
					<h4>Daftar Tracer Study</h4>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
						<table class="table table-hover table-striped" id="mySurvei">
							<thead>
								<tr class="bg-default text-light text-center text-white">
									<th>#</th>
									<th>Nama Tracer Study</th>
									<th>Mulai</th>
									<th>Tanggal Akhir</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
						$i=1;
						foreach($survei as $survey): ?>
								<tr class="text-center">
									<th scope="row"><?=$i++?></th>
									<td><?=$survey->nama_survei?></td>
									<td><?=$survey->tgl_mulai?></td>
									<td><?=$survey->tgl_berahkir?></td>
									<td class="text-center">
										<a href="<?= base_url('admin/surveiDetail/'.$survey->id) ?>" class="btn btn-icon btn-primary mx-1 "
											data-placement="bottom" data-toggle="tooltip" title="Lihat Detail"><i
												class="fas fa-sm fa-eye"></i></a>
										<a class="btn btn-icon btn-success mx-1" data-toggle="modal"
											data-target="#edit<?= $survey->id ?>"><i data-placement="bottom" data-toggle="tooltip"
												title="Edit" class="fas fa-sm fa-edit text-white"></i></a>
										<a href="#" class="btn btn-icon btn-danger mx-1" data-toggle="modal" data-target="#hapus"
											title="Hapus" data-idsurvei="<?=$survey->id?>"><i data-placement="bottom" data-toggle="tooltip"
												class="fas fa-sm fa-trash"></i></a>
									</td>
								</tr>
								<?php
						endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer text-right">
				</div>
			</div>
		</div>
	</section>
</div>

<!-- modal hapus -->
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('backend/survey/delete') ?>" method="post">
				<div class="modal-body text-center">
					<h1 class="text-danger mb-5">Apakah Anda Yakin Ingin Menghapus ?</h1>
					<h5>Semua Data Terkait Tracer Study Ini Akan Terhapus</h5>
					<div class="form-group">
						<input type="text" class="form-control" id="recipient-name" name="idsurvei" hidden>
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

<!-- modal edit -->
<?php
foreach($survei1 as $survey): ?>
<div class="modal fade" id="edit<?=$survey->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?=base_url('backend/survey/update/'.$survey->id)?>" class="forms-sample needs-validation"
				method="post" enctype="multipart/form-data" novalidate>
				<div class="modal-body">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" required placeholder="Isi Nama Survei"
							value="<?=$survey->nama_survei?>" name="nama_survei">
						<div class="invalid-feedback">
							Silahkan isi Nama Tracer Study ! contoh : tracer study 2019
						</div>
					</div>
					<div class="form-group">
						<label>Keterangan</label>
						<textarea class="form-control" required height="200px" name="deskripsi" placeholder="Deskripsi Trace Study"
							cols="30"><?=$survey->deskripsi?></textarea>
						<div class="invalid-feedback">
							Silahkan isi keterangan Tracer Study !
						</div>
					</div>
					<div class="form-group">
						<label>Mulai Pada</label>
						<?php
					$mulai = date('Y-m-d',strtotime($survey->tgl_mulai));
					?>
						<input type="date" class="form-control" required name="tgl_mulai" value="<?=$mulai?>"
							min="<?= date('Y-m-d') ?>">
						<div class="invalid-feedback">
							Silahkan isi tanggal mulai Tracer Study !
						</div>
					</div>
					<div class="form-group">
						<label>Berakhir Pada</label>
						<?php
					$akhir = date('Y-m-d',strtotime($survey->tgl_berahkir));
					?>
						<input type="date" class="form-control" min="<?=date('Y-m-d')?>" required name="tgl_berahkir"
							value="<?=$akhir?>">
						<div class="invalid-feedback">
							Silahkan isi tanggal berakhir Tracer Study !
						</div>
					</div>
					<input type="date" class="form-control" min="<?=date('Y-m-d')?>" required name="tgl_update"
						value="<?= date('Y-m-d') ?>" hidden>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
					<button type="submit" class="btn btn-danger">Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php endforeach; ?>
<script>
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();


		$('#hapus').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('idsurvei') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			// modal.find('.modal-title').text('Hapus ' + recipient)
			modal.find('.modal-body input').val(recipient)
		})

		$('#mySurvei').DataTable();
	});
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

</script>
