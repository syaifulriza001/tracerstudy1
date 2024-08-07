
<?php 
      if($this->session->flashdata('berhasil')){
  ?>
    <script>
      swal("Sukses !", "<?= $this->session->flashdata('berhasil') ?>", "success", {
        button: "OK",
      });
    </script>
  <?php
    }elseif($this->session->flashdata('gagal')){
  ?>
  <script>
      swal("Gagal !", "<?= $this->session->flashdata('gagal') ?>", "failed", {
        button: "OK",
      });
  </script>
  <?php } ?><!-- modal tambah loker-->
<div class="modal fade" role="dialog" id="tambahloker">
	<div class="modal-dialog p-3 modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="post" action="<?= base_url('alumni/dashboard/tambah_loker'); ?>" class="needs-validation"
				novalidate="">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Loker</h5>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Nama Pekerjaan</label>
							<input type="text" name="jdl" class="form-control" autocomplete="off" required>
							<div class="invalid-feedback">
								Nama pekerjaan wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Nama Instansi</label>
							<input type="text" name="inst" class="form-control" autocomplete="off" required>
							<div class="invalid-feedback">
								Nama instansi wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Kota</label>
							<input type="text" name="kota" class="form-control" autocomplete="off" required>
							<div class="invalid-feedback">
								Kota wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Email perekrut</label>
							<input type="email" name="email" class="form-control" autocomplete="off" required>
							<div class="invalid-feedback">
								Email perekrut wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6 col-12">
							<label>Deskripsi</label>
							<input type="text" name="desk" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Deskripsi wajib diisi
							</div>
						</div>
						<div class="form-group col-md-6 col-12">
							<label>Waktu tutup pendaftaran</label>
							<input type="date" name="tgl_tutup" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Waktu tutup wajib diisi
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-12 col-12">
							<label>Persyaratan</label>
							<input type="text" name="syarat" class="form-control" autocomplete="off" required="">
							<div class="invalid-feedback">
								Persyaratan wajib diisi
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
<!-- modal loker saya-->
<div class="modal fade" role="dialog" id="myloker">
	<div class="modal-dialog p-3 modal-lg modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="post" action="<?= base_url('alumni/dashboard/tambah_loker'); ?>" class="needs-validation"
				novalidate="">
				<div class="modal-header">
					<h5 class="modal-title">Loker Saya</h5>
				</div>
				<div class="modal-body">
					<div class="row">
					<?php foreach($myloker as $l):?> 
						<div class="col-lg-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-header">
									<?php if($l->status == 'publish'){?>
									<span class="badge badge-primary">publish</span>
									<?php }else{ ?>
										<span class="badge badge-warning">unpublish</span>
									<?php } ?>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12">
											<h4 class="card-title"><?=$l->judul?></h4>
											<p class="text-mute"><?=$l->instansi?></p>
											<p class=""><?=$l->kota?></p>
											<a href="<?= base_url('alumni/dashboard/hapus_loker/'.$l->id_loker); ?>" type="button" class="btn btn-inverse-danger btn-fw" >Hapus</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach ?>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end modal -->
<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
				<div class="row">
						<div class="col-sm-12 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div class="my-3 ml-5">
									<h2 class="text-dark font-weight-bold mb-2">Lowongan Pekerjaan</h2>
									<h3 class="font-weight-normal mb-2"> Berikut daftar lowongan kerja yang tersedia </h3>
								</div>
								<div class="ml-auto">
								<button type="button" data-toggle="modal" data-target="#tambahloker" class="btn btn-primary btn-icon-text ml-5">
								<i class="mdi mdi-plus btn-icon-prepend"></i>
								Tambah Loker
								</button>
								<button type="button" class="btn btn-inverse-info btn-icon-text mr-5" data-toggle="modal" data-target="#myloker">
								<i class="mdi mdi-file-check btn-icon-prepend"></i>
								Loker Saya
								</button>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-4">
					<?php foreach($loker as $loker):?> 
						<div class="col-lg-4 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12">
											<h4 class="card-title"><?=$loker->judul?></h4>
											<p class="text-mute"><?=$loker->instansi?></p>
											<p class=""><?=$loker->kota?></p>
											<!-- <h4 class="mt-3 mb-3 font-weight-bold"> Deskripsi pekerjaan :
											</h4>
											<?=$loker->deskripsi?>
												<h4 class="mt-3 mb-3 font-weight-bold"> Syarat :
											</h4>
											<?=$loker->syarat?>
											<h4 class="mt-3 mb-3 font-weight-bold"> Kontak : 
											</h4>
											<a class="mt-2" href="mailto: <?=$loker->email?>"><?=$loker->email?></a> -->
											<h4 class="mt-3 mb-3 font-weight-bold"> Tenggat Waktu : 
											</h4>
											<p><?=$loker->tgl_akhir?></p>
											<h4 class="mt-3 mb-3 font-weight-bold"> Di Publish Oleh : 
											</h4>
											<p>Admin</p>
											<button type="button" class="btn btn-inverse-success btn-fw" data-toggle="modal" data-target="#exampleModalScrollable">Detail</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Modal -->
							<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
							<div class="modal-dialog w-100 modal-dialog-scrollable" role="document">
								<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title" id="exampleModalScrollableTitle"><b><?=$loker->judul?></b></h3> <br>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								<p class="text-mute"><?=$loker->instansi?></p><br>
									<p class=""><?=$loker->kota?></p>
									<h4 class="mt-3 mb-3 font-weight-bold"> Deskripsi pekerjaan :
									</h4>
									<?=$loker->deskripsi?>
										<h4 class="mt-3 mb-3 font-weight-bold"> Syarat :
									</h4>
									<?=$loker->syarat?>
									<h4 class="mt-3 mb-3 font-weight-bold"> Kontak : 
									</h4>
									<a class="mt-2" href="mailto: <?=$loker->email?>"><?=$loker->email?></a>
									<h4 class="mt-3 mb-3 font-weight-bold"> Tenggat Waktu : 
									</h4>
									<p><?=$loker->tgl_akhir?></p>
									<h4 class="mt-3 mb-3 font-weight-bold"> Di Publish Oleh : 
									</h4>
									<p>Admin</p>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
								</div>
							</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>


<script>
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
