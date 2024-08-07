
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
  <?php } ?>
<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <div class="d-lg-flex align-items-center">
                <div class="my-3" style="margin: auto;">
                  <h2 class="text-dark font-weight-bold mb-2" >Detail Survei</h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-12">

              <div class="card" style="width: 50%; margin: auto;">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4 class="card-title"><?= $survey->nama_survei ?></h4>
                     <p><?= $survey->deskripsi ?></p>
                     <div class="row col-lg-12 mt-3">
                       <div class="alert alert-success" role="alert">
                      <i class="fas fa-calendar-altr"></i> Periode Survei 
                    </div>
                    <div class="alert alert-warning ml-1" role="alert">
                      <b><?= date('d F Y',strtotime($survey->tgl_mulai) )?> - <?= date('d F Y',strtotime($survey->tgl_berahkir) ) ?></b>
                    </div>
                     </div>
                     
                    <?php 
                      if ($cekJawabanUser > 0) {
                    ?>
                      <span class="float-right"><a class="btn btn-secondary btn-sm disabled">Anda Sudah Mengerjakan Survey ini <span class="anu bx bx-wink-smile pt-1"></span></a></span>
                    <?php
                      }else if($cekPertanyaan == 0){
                    ?>
                      <span class="float-right"><a class="btn btn-secondary btn-sm disabled">Survey Belum tersedia</a></span>
											<?php
                      }else if(date('Y-m-d') < $survey->tgl_mulai || date('Y-m-d') > $survey->tgl_berahkir){
                    ?>
                      <span class="float-right"><a class="btn btn-secondary btn-sm disabled">Survey tidak tersedia sekarang</a></span>
                    <?php
                      }else{
                    ?>
                    <span class="float-right"><a href="<?= base_url('doSurvey/'.$title.'/'.$surveyPertanyaan->id) ?>" class="btn btn-primary btn-sm">Mulai Kerjakan <span class="anu bx bx-right-arrow pt-1"></span></a></span>
                    <?php
                      }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
							
            </div>
          </div>
        </div>
