<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Laporan Hasil Tracer Study</h1>

		</div>
		<div class="section-body">
			<h2 class="section-title">Report Tracer Study</h2>
			<p class="section-lead">
				Silahkan Pilih Tracer Study Untuk Melihat
			</p>
			<div class="row">
				<?php
				foreach($survey as $s ){
					?>
				<div class="col-lg-6 col-sm-12">
					<div class="card 
					<?php
							 if(date('Y-m-d') < $s->tgl_mulai || date('Y-m-d') < $s->tgl_berahkir){
								?>
								card-success
								<?php
									}else{
								?>
								card-dark
								<?php } ?>
							
					">
						<div class="card-header">
							<h4><?=$s->nama_survei?></h4>
							<div class="card-header-action">
								<span class="badge badge-light">Responden : <?=$s->responden?></span>
								<a href="<?= base_url('admin/reportDetail/'.$s->id) ?>" class="btn btn-info">Lihat</a>
								<a data-collapse="#mycard-collapse<?=$s->id?>" class="btn btn-icon btn-warning"
									href="#"><i class="fas fa-plus"></i></a>
							</div>
						</div>
						<div class="collapse hide" id="mycard-collapse<?=$s->id?>">
							<div class="card-body">
								<?=$s->deskripsi?>
							</div>
							<div class="card-footer">
								<?php
							 if(date('Y-m-d') < $s->tgl_mulai || date('Y-m-d') < $s->tgl_berahkir){
								?>
								<span class="badge badge-success">Aktif</span>
								<?php
									}else{
								?>
								<span class="badge badge-light">Non Aktif</span>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<?php
				}
				?>
			</div>
	</section>
</div>
