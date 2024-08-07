<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Log Aktivitas Tracer Study</h1>

		</div>
		<div class="section-body">
			<h2 class="section-title">Log Aktivitas Tracer Study</h2>
			<p class="section-lead">
				Silahkan Pilih Tanggal Untuk Melihat Aktifitas
				<?php echo form_open('backend/history/search') ?>
				<form action="">
					<div class="row">
						<div class="col">
					<div class="form-group">
                     
                      <input type="date" name="keyword" value="<?= set_value('keyword'); ?>" class="form-control" required max=
     <?php
         echo date('Y-m-d');
     ?>>
                 	</div>
                 </div>
                 <div class="col">
					<div class="form-group">
                      <button type="submit" class="btn btn-primary">Lihat</button>
                 	</div>
                 </div>
                 	</div>
						 
				</form>
				<?php echo form_close() ?>
			</p>
			<div class="section-body">
				<?php foreach ($tanggal as $tgl) : ?>
					
					<h2 class="section-title"><?= date('l, d F Y',strtotime($tgl->waktu) )?></h2>

				<?php endforeach ?>
				<div class="row">
					<div class="col-12">
						<div class="activities">
							<?php foreach ($log as $l): ?>
							<div class="activity">
								<div class="activity-icon bg-primary text-white shadow-primary">
									<?php if($l->aksi == 'loker_delete'): ?>
									<i class="fas fa-trash"></i>
									<?php elseif($l->aksi == 'loker_new' OR $l->aksi == 'testi_new'): ?>
									<i class="fas fa-plus"></i>
									<?php elseif($l->aksi == 'testi_update'): ?>
									<i class="fas fa-pen-alt"></i>
									<?php elseif($l->aksi == 'registrasi'): ?>
									<i class="fas fa-sign-in-alt"></i>
									<?php elseif($l->aksi == 'do_survei'): ?>
									<i class="fas fa-file-signature"></i>
									<?php endif; ?>
								</div>
								<div class="activity-detail">
									<div class="mb-2">
										<span class="text-job text-primary"><?= date('H:i:s',strtotime($l->waktu) )?></span>
										<span class="bullet"></span>
										<a class="text-job"
											href="<?= base_url('backend/dashboard/det_data/'.$l->id_user) ?>"><?=$l->nama_depan?>
											<?=$l->nama_belakang?></a>

									</div>
									<?php if($l->aksi == 'loker_delete'): ?>
									<p>Menghapus Lowongan Pekerjaan</p>
									<?php elseif($l->aksi == 'loker_new'): ?>
									<p>Menambahkan <a href="<?= base_url('admin/loker') ?>">Lowongan Pekerjaan</a>.</p>
									<?php elseif($l->aksi == 'testi_update'): ?>
									<p>Mengubah <a href="<?= base_url('admin/testi')?>">Testimoni</a>.</p>
									<?php elseif($l->aksi == 'testi_new'): ?>
									<p>Menambahkan <a href="<?= base_url('admin/testi')?>">Testimoni</a>.</p>
									<?php elseif($l->aksi == 'registrasi'): ?>
									<p>Melakukan <a href="<?=base_url();?>notifikasi">Registrasi</a>.</p>
									<?php elseif($l->aksi == 'do_survei'): ?>
									<p>Telah Mengisi <a href="<?= base_url('admin/report')?>">Survei</a>.</p>
									<?php endif; ?>
								</div>
							</div>
							<?php endforeach; ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
