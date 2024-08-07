<!-- Main Content -->
<div class="main-content">
	<!-- Alert berhasil aktivasi -->
	<?php if($this->session->flashdata('aktif')): ?>
	<div class="alert alert-success" role="alert">
		<h6><?= $this->session->flashdata('aktif') ?></h6>
	</div>
	<?php endif; ?>
	<!-- End alert -->
	<section class="section">
		<div class="section-header">
			<h1>Notifikasi</h1>
		</div>

		<div class="section-body">
			<h2 class="section-title">Pemberitahuan</h2>
			<p class="section-lead">Aktivasi akun alumni</p>

			<div class="row">
				<div class="col-12 col-md-12 col-lg-12">
					<div class="card">
						<!-- <div class="card-header">
                            <h4>Full Width</h4>
                        </div> -->
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table table-striped table-md">
									<?php $nomor=1; ?>
									<tr>
										<th>No</th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Tahun Lulus</th>
										<th>Status</th>
										<th></th>
									</tr>
									<?php foreach ($data as $key): ?>
									<tr>
										<td><?= $nomor++; ?></td>
										<td><?= $key->nim ?></td>
										<td><?= $key->nama_depan ?> <?= $key->nama_belakang ?></td>
										<td><?= $key->tahun_lulus ?></td>
										<td>
											<div class="badge badge-danger"><?= $key->status ?></div>
										</td>
										<td>
											<a href="<?= base_url('backend/dashboard/aktiv_akun/'.$key->id); ?>"
												class="badge badge-success" data-toggle="tooltip" title="Aktifkan"
												data-placement="right">
												<i class="fas fa-user-check"></i>
											</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
