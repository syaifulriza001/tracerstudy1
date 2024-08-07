<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-header">
		<a href="<?= base_url('admin/data') ?>"
				class="btn btn-icon btn-info btn-md float-left text-left mr-3" data-placement="bottom"
				data-toggle="tooltip" title="Kembali">
				<i class="fas fa-angle-left"></i>
			</a>
			<h1>Data Alumni</h1>
		</div>

		<div class="section-body">
			<?php foreach ($detail as $det): ?>
			<h2 class="section-title"><?= $det->nama_depan ?> <?= $det->nama_belakang?></h2>
			<p class="section-lead"><?= $det->nim ?></p>

			<div class="row">
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-primary">
						<div class="card-header">
							<h4>Data diri</h4>
						</div>
						<div class="card-body p-0">
							<table class="table table-borderless">
								<thead>
									<tr>
										<th scope="col">Angkatan <?= $det->angkatan ?></th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">Email</th>
										<td><?= $det->email ?></td>
									</tr>
									<tr>
										<th scope="row">Jenis Kelamin</th>
										<?php if ($det->jenis_kelamin == 'L'): ?>
										<td>Pria</td>
										<?php else: ?>
										<td>Wanita</td>
										<?php endif; ?>
									</tr>
									<tr>
										<th scope="row">Tempat, tanggal lahir</th>
										<td><?= $det->tempat_lahir ?>, <?= $det->tgl_lahir ?></td>
									</tr>
									<tr>
										<th scope="row">Tahun lulus</th>
										<td><?= $det->tahun_lulus ?></td>
									</tr>
									<tr>
										<th scope="row">Telepon</th>
										<td><?= $det->telp ?></td>
									</tr>
									<tr>
										<th scope="row">Alamat</th>
										<td><?= $det->alamat ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-6">
					<div class="card card-danger">
						<div class="card-header">
							<h4>Data Pekerjaan</h4>
						</div>
						<div class="card-body p-0">
							<table class="table table-borderless">
								<thead>
									<tr>
										<th scope="col">Bekerja di bidang <?= $det->bidang_pekerjaan ?></th>
										<th scope="col"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">Jabatan</th>
										<td><?= $det->jabatan ?></td>
									</tr>
									<tr>
										<th scope="row">Instansi</th>
										<td><?= $det->instansi ?></td>
									</tr>
									<tr>
										<th scope="row">Alamat</th>
										<td><?= $det->alamat_kerja ?></td>
									</tr>
									<tr>
										<th scope="row">Kota</th>
										<td><?= $det->kota ?></td>
									</tr>
									<tr>
										<th scope="row">Mulai bekerja</th>
										<td><?= $det->mulai_bekerja ?></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</section>
</div>
