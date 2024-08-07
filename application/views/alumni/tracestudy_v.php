<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
				<div class="row">
						<div class="col-sm-12 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div class="my-3 ml-5">
									<h2 class="text-dark font-weight-bold mb-2">Tracer Study</h2>
									<h3 class="font-weight-normal mb-2"> Berikut daftar tracer study yang tersedia </h3>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-4">
				        <?php 
				            if(!empty($survey)){
				              foreach($survey as $survey): 
				          
				        ?>
						<div class="col-lg-12 grid-margin stretch-card">
							<div class="card card-data sale-visit-statistics-border">
								<div class="card-body">
									<div class="row">
										<div class="col-lg-12">
											<h4 class="card-title"><?= $survey->nama_survei ?></h4>
											<p class="description text-justify"><?= substr($survey->deskripsi,0,75) ?> ...</p>
											<p class="text-mute">Batas Waktu : <?= $survey->tgl_berahkir ?></p>
											<a type="button" href="<?= base_url('infoSurvey/'.$survey->id) ?>" class="btn btn-lg btn-inverse-primary btn-fw position-absolute">Selengkapnya</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; } ?>
					</div>
				</div>
