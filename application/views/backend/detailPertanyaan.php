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
  <div class="modal fade" tabindex="-1" role="dialog" id="tambah" style="z-index: 1041;">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Pertanyaan Tracer Study</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?= base_url('backend/survey_jawaban/tambah/'.$surveyPertanyaan->id_survei.'/'.$titlePertanyaan) ?>" class="forms-sample needs-validation" method="post" enctype="multipart/form-data" novalidate >
					<div class="form-group">
						<label>Pilihan Jawaban</label>
						<input type="text" class="form-control" required placeholder="Isi Jawaban" name="jawaban">
							<div class="invalid-feedback">
							Silahkan isi form Jawaban !
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
		  <a href="<?= base_url('admin/surveiDetail/'.$surveyPertanyaan->id_survei) ?>"
				class="btn btn-icon btn-info btn-md float-left text-left" data-placement="bottom"
				data-toggle="tooltip" title="Kembali">
				<i class="fas fa-angle-left"></i>
			</a>
            <h5 class="ml-3"><?=$surveyPertanyaan->pertanyaan?></h5>
			<button data-toggle="modal" data-target="#tambah" class="btn btn-icon btn-primary btn-lg float-right text-right ml-auto" ><i data-placement="bottom" data-toggle="tooltip" title="Tambah Survei" class="fas fas-lg fa-plus"></i></button>
          </div>
		<div class="section-body">
			<div class="card px-2">
				<div class="card-header">
					<h4>Daftar Pilihan</h4>
				</div>
				<div class="card-body p-0">
					<div class="table-responsive">
					<table class="table table-hover table-striped" id="mySurvei">
						<thead>
						<tr class="bg-default text-light text-center text-white">
								<th>No</th>
								<th>Pilihan Jawaban</th>
								<th class="w-25">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $no=1; foreach($surveyJawaban as $survey): ?>
							<tr class="text-center">
								<td><?= $no++ ?></td>
                              <td><?= $survey->jawaban ?></td>
                              <td class="text-center">
                                <a class="btn btn-success text-white" data-toggle="modal" data-target="#edit<?= $survey->id ?>"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('backend/survey_jawaban/delete/'.$titlePertanyaan.'/'.$survey->id) ?>" class="btn btn-danger" onclick="return confirm('anda yakin ingini menghapus data tersebut ?')"><i class="fa fa-trash"></i></a>
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
  foreach ($surveyJawaban as $survey): ?>
<div class="modal fade" id="edit<?=$survey->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title">Tambah Pertanyaan Tracer Study</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form action="<?= base_url('backend/survey_jawaban/update/'.$surveyPertanyaan->id_survei.'/'.$titlePertanyaan.'/'.$survey->id) ?>" class="forms-sample needs-validation" method="post" enctype="multipart/form-data" novalidate >
				<div class="form-group">
					<label>Pilihan Jawaban</label>
					<input type="text" class="form-control" required placeholder="Isi Pertanyaan" name="jawaban" value="<?= $survey->jawaban ?>">
					<div class="invalid-feedback">
						Silahkan isi form Jawaban !
					</div>
				</div>
				<div class="modal-footer bg-whitesmoke br">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Ubah</button>
				</div>
			</form>
		</div>
  	</div>
</div>
</div>
<?php 
endforeach; ?>

<script>
$(document).ready(function(){
$('#mySurvei').DataTable();
});
</script>
