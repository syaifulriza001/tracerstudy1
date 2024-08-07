<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
              	<?php echo $this->session->flashdata('status') ?>
                <div class="card-body">
                  <h1 class="card-title font-size-">Data Pekerjaan</h1>
                  <h3 class="card-description mb-5">
                    Silahkan lengkapi form data pekerjaan anda dibawah ini
									</h3>
									<form class="forms-sample needs-validation" novalidate method="post" action="<?= base_url('updatePekerjaan/'.$user->id) ?>">
										<div class="form-group form-row">
											<div class="col-lg-6">
												<label for="depan">Nama Instansi</label>
												<input type="text" class="form-control" id="instansi" name="instansi" value="<?= $user->instansi ?>" placeholder="Instansi" >
											</div>
											<div class="col-lg-6">
												<label for="belakang">Jabatan</label>
												<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user->jabatan ?>" placeholder="Jabatan" >
												<div class="invalid-feedback">
													Silahkan Isi Jabatan Anda !
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="gender">Bidang Pekerjaan</label>
											<select class="form-control" id="id_bidang" name="id_bidang" required>
												<?php foreach($bidang_pekerjaan as $bp):
												if($bp->id == $user->id_bidang){
												?>
												<option value="<?= $bp->id ?>" selected><?= $bp->nama ?></option>
												<?php }else{
												?>
												<option value="<?= $bp->id ?>"><?= $bp->nama ?></option>
												<?php } endforeach ?>
											</select>
											<div class="invalid-feedback">
													Silahkan Isi bidang atau status pekerjaan anda !
												</div>
										</div>
										<div class="form-group form-row">
											<div class="col-lg-6">
												<label for="tmp_lahir">Mulai Bekerja</label>
												<input type="date" class="form-control" id="mulai_kerja" value="<?= $user->mulai_bekerja ?>" name="mulai_bekerja" placeholder="Tahun Mulai Bekerja">
												<div class="invalid-feedback">
													Silahkan Isi kapan Anda mulai bekerja !
												</div>
											</div>
										</div>
										<div class="form-group form-row">
											<div class="col-lg-6">
												<label for="tmp_lahir">Alamat pekerjaan</label>
												<input type="text" class="form-control" id="alamat_kerja" value="<?= $user->alamat_kerja ?>" name="alamat" placeholder="Alamat pekerjaan">
												<div class="invalid-feedback">
													Silahkan Isi Alamat pekerjaan Anda ! ( Contoh : 2016 )
												</div>
											</div>
											<div class="col-lg-6">

												<label for="kota">Kota Tempat Bekerja</label>
												<input type="text" class="form-control" id="kota" name="kota" value="<?= $user->kota ?>" placeholder="kota">
												<div class="invalid-feedback">
													Silahkan Isi Kota Tempat Anda Bekerja ! ( Contoh : 2021 )
												</div>
											</div>
										</div>
                    <button type="submit" class="btn btn-primary mr-2">Ubah</button>
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
