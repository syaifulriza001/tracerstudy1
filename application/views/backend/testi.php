<!-- Main Content -->
<div class="main-content">
	<?php if($this->session->flashdata('publish-testi')): ?>
	<!-- alert berhasil publish testi -->
	<div class="alert alert-success" role="alert">
		<h6><?= $this->session->flashdata('publish-testi') ?></h6>
	</div>
	<?php elseif($this->session->flashdata('unpublish-testi')): ?>
	<!-- alert berhasil unpublish testi -->
	<div class="alert alert-warning" role="alert">
		<h6><?= $this->session->flashdata('unpublish-testi') ?></h6>
	</div>
	<?php endif; ?>
	<section class="section">
		<div class="section-header">
			<h1>Testimoni</h1>
		</div>

		<div class="section-body">
			<h2 class="section-title">Daftar Testimoni Alumni</h2>
			<?php foreach ($website as $web):?>
			<p class="section-lead">Pengalaman alumni selama berkuliah di <?=$web->prodi?> - <?=$web->universitas?></p>
			<?php endforeach; ?>
			<div class="row">
				<?php foreach ($testi as $t): ?>
				<div class="col-12 col-md-6 col-lg-4">
					<div class="card card-primary">
						<div class="card-header">
							<h4><?= $t->nama_depan ?> <?= $t->nama_belakang ?></h4>
							<div class="card-header-action">
								<?php if($t->status == 'unpublish'): ?>
								<a href="<?= base_url('backend/dashboard/publish_testi/'.$t->id_testi); ?>"
									class="btn btn-success" data-toggle="tooltip" title="posting">
									<i class="fas fa-arrow-up"></i>
								</a>
								<?php elseif($t->status == 'publish'): ?>
								<a href="<?= base_url('backend/dashboard/unpublish_testi/'.$t->id_testi); ?>"
									class="btn btn-danger" data-toggle="tooltip" title="turunkan">
									<i class="fas fa-arrow-down"></i>
								</a>
								<?php endif; ?>
							</div>
						</div>
						<div class="card-body">
							<?php if($t->status == 'publish'): ?>
							<h5 class="badge badge-success">diposting</h5>
							<?php elseif($t->status == 'unpublish'): ?>
							<h5 class="badge badge-danger">tidak diposting</h5>
							<?php endif; ?>
							<p><?= $t->testimoni?></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</div>
