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
                <h5 class="modal-title">Tambah Pertanyaan Tracer Study</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= base_url('backend/survey_pertanyaan/tambah/'.$title) ?>" class="forms-sample needs-validation" method="post" enctype="multipart/form-data" novalidate >
					<div class="form-group">
						<label>Pertanyaan</label>
						<input type="text" class="form-control" required placeholder="Isi Pertanyaan" name="pertanyaan">
							<div class="invalid-feedback">
							Silahkan isi form Pertanyaanmu !
						</div>
					</div>
					<div class="modal-footer bg-whitesmoke br">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
				</form>
              </div>
            </div>
          </div>
        </div>
  <div class="main-content">
        <section class="section">
          <div class="section-header">
		  <a href="<?= base_url('admin/survei') ?>"
				class="btn btn-icon btn-info btn-md float-left text-left mr-3" data-placement="bottom"
				data-toggle="tooltip" title="Kembali">
				<i class="fas fa-angle-left"></i>
			</a>
            <h1><?= $survey->nama_survei ?></h1>
			<button data-toggle="modal" data-target="#tambah" class="btn btn-icon btn-primary btn-lg float-right text-right ml-auto" ><i data-placement="bottom" data-toggle="tooltip" title="Tambah Survei" class="fas fas-lg fa-plus"></i></button>
          </div>
		<div class="section-body">
			<h2 class="section-title">Survei Tracer Study</h2>
			<p class="section-lead">
			<?= $survey->deskripsi ?>
			</p>
			<div class="card px-2">
				<div class="card-header">
					<h4>Daftar Pertanyaan</h4>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
					<table class="table table-hover table-striped" id="mySurvei">
						<thead>
						<tr class="bg-default text-light text-center text-white">
								<th>No</th>
								<th>Pertanyaan</th>
								<th class="w-25">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $no=1; foreach($surveyPertanyaan as $survey): ?>
							<tr class="text-center">
								<td><?= $no++ ?></td>
								<td><?= $survey->pertanyaan ?></td>
								<td class="text-center">
									<a href="<?= base_url('admin/pertanyaanDetail/'.$survey->id) ?>" class="btn btn-warning "><i data-placement="bottom" data-toggle="tooltip" title="detail" class="fa fa-eye"></i></a>
									<a class="btn btn-success text-white" data-toggle="modal" data-target="#edit<?= $survey->id ?>"><i data-placement="bottom" data-toggle="tooltip" title="edit" class="fa fa-edit"></i></a>
									<a href="<?= base_url('backend/survey_pertanyaan/delete/'.$survey->id.'/'.$survey->id_survei) ?>" class="btn btn-danger " onclick="return confirm('anda yakin ingini menghapus data tersebut ?')"><i data-placement="bottom" data-toggle="tooltip" title="hapus" class="fa fa-trash"></i></a>
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
		</div>
</div>
<?php
foreach($surveyPertanyaan as $survey): ?>
<div class="modal fade" id="edit<?=$survey->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form action="<?=base_url('backend/survey_pertanyaan/update/'.$survey->id.'/'.$survey->id_survei)?>" class="forms-sample needs-validation" method="post" enctype="multipart/form-data" novalidate >
      <div class="modal-body">
				<div class="form-group">
					<label>Pertanyaan</label>
					<input type="text" rows="3" class="form-control " required placeholder="Isi Pertanyaan" name="pertanyaan" value="<?= $survey->pertanyaan ?>">
						<div class="invalid-feedback">
						Silahkan isi form Pertanyaanmu !
					</div>
				</div>
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
$(document).ready(function(){
$('#mySurvei').DataTable();
});
</script>
