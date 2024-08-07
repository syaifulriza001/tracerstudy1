<!-- Main Content -->
<div class="main-content">
	<!-- Alert berhasil login -->
	<?php if($this->session->flashdata('login')): ?>
	<div class="alert alert-success" role="alert">
		<h6><?= $this->session->flashdata('login') ?></h6>
	</div>
	<?php endif; ?>
	<!-- End alert -->
	<section class="section">
		<div class="section-header">
			<h1>Dashboard</h1>
		</div>
		<!-- Info -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-primary">
						<i class="far fa-user"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Total Alumni</h4>
						</div>
						<div class="card-body">
							<?= $jlh_alumni ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-danger">
						<i class="fas fa-briefcase"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Loker</h4>
						</div>
						<div class="card-body">
							<?= $jlh_loker ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-warning">
						<i class="fas fa-tasks"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Survei</h4>
						</div>
						<div class="card-body">
							<?= $jlh_survei ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="card card-statistic-1">
					<div class="card-icon bg-success">
						<i class="fas fa-comment-alt"></i>
					</div>
					<div class="card-wrap">
						<div class="card-header">
							<h4>Testimoni</h4>
						</div>
						<div class="card-body">
							<?= $jlh_testimoni ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<!-- Statistic -->
			<div class="col-lg-6 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Statistics</h4>
					</div>
					<div class="card-body" id="piechart">
						<script type="text/javascript">
							// Load google charts
							google.charts.load('current', {
								'packages': ['corechart']
							});
							google.charts.setOnLoadCallback(drawChart);

							// Draw the chart and set the chart values
							function drawChart() {
								var data = google.visualization.arrayToDataTable([
									['Total', 'Survei'],
									['Sudah mengisi survei', <?= $sudahIsi ?> ],
									['Belum mengisi survei', <?= $jlh_alumni - $sudahIsi ?> ]
								]);

								// Optional; add a title and set the width and height of the chart
								var options = {
									'title': 'Overall summary of survey results',
									'width': 450,
									'height': 350
								};

								// Display the chart inside the <div> element with id="piechart"
								var chart = new google.visualization.PieChart(document.getElementById('piechart'));
								chart.draw(data, options);
							}

						</script>
							<!-- end -->

					</div>
					<table class="table table-striped table-md" id="myAlumni">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Lengkap</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$nomor = 1;
							foreach ($survey_pengguna as $key) : ?>
								<tr style="background: <?= $key->color ?>; color:white;">
									<td><?= $nomor++; ?></td>
									<td><?= $key->nama_depan ?></td>
									<td><b><?= $key->jawab ?></b></td>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<!-- Recent activities -->
			<div class="col-lg-6 col-md-12 col-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Aktivitas Baru</h4>
					</div>
					<div class="card-body">
						<ul class="list-unstyled list-unstyled-border">
							<?php foreach($aktivitas as $act):
                    date_default_timezone_set('Asia/Jakarta');
              ?>
							<li class="media">
								<img class="mr-3 rounded-circle" width="50"
									src="<?=base_url();?>assets/backend/img/avatar-1.png" alt="avatar">
								<div class="media-body">
									<div class="text-small float-right text-primary">
										<?= date('d F Y, H:i:s', strtotime($act->waktu)) ?>
									</div>
									<div class="media-title"><?= $act->nama_depan ?> <?= $act->nama_belakang ?></div>
									<span class="text-muted">
										<?php if($act->aksi == 'loker_delete'): ?>
										<p>Menghapus Lowongan Pekerjaan</p>
										<?php elseif($act->aksi == 'loker_new'): ?>
										<p>Menambahkan <a href="<?= base_url('admin/loker') ?>">Lowongan Pekerjaan</a>.
										</p>
										<?php elseif($act->aksi == 'user_delete'): ?>
										<p>Menghapus User</p>
										<?php elseif($act->aksi == 'testi_update'): ?>
										<p>Mengubah <a href="<?= base_url('admin/testi')?>">Testimoni</a>.</p>
										<?php elseif($act->aksi == 'testi_new'): ?>
										<p>Menambahkan <a href="<?= base_url('admin/testi')?>">Testimoni</a>.</p>
										<?php elseif($act->aksi == 'registrasi'): ?>
										<p>Melakukan <a href="<?=base_url();?>notifikasi">Registrasi</a>.</p>
										<?php elseif($act->aksi == 'do_survei'): ?>
										<p>Telah Mengisi <a href="<?= base_url('admin/report')?>">Survei</a>.</p>
										<?php endif; ?>
									</span>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
						<div class="text-center pt-1 pb-1">
							<a href="<?= base_url('backend/History');?>" class="btn btn-primary btn-lg btn-round">
								View All
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
