<?php 
    if($this->session->flashdata('login')){
  ?>
    <script>
      swal("Berhasil Login !", "<?= $this->session->flashdata('login') ?>", "success", {
        button: "OK",
      });
    </script>
  <?php
    }
  ?>
 <?php 
    if($this->session->flashdata('msg')){
      if($this->session->flashdata('kondisi')=='1'){
  ?>
    <script>
      swal("Sukses !", "<?= $this->session->flashdata('msg') ?>", "success", {
        button: "OK",
      });
    </script>
  <?php
    }else{
  ?>
  <script>
      swal("Gagal !", "<?= $this->session->flashdata('msg') ?>", "failed", {
        button: "OK",
      });
  </script>
  <?php } } ?>
<?php 
    if($this->session->flashdata('status')){
      if($this->session->flashdata('kondisi')=='1'){
  ?>
    <script>
      swal("Sukses !", "<?= $this->session->flashdata('status') ?>", "success", {
        button: "OK",
      });
    </script>
  <?php
    }else{
  ?>
  <script>
      swal("Gagal !", "<?= $this->session->flashdata('status') ?>", "failed", {
        button: "OK",
      });
  </script>
  <?php } } ?>

 <!-- partial -->
	<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
				<?php if($this->session->flashdata('kondisi')): if($this->session->flashdata('kondisi')=="1"){ ?>
					<div class="alert alert-success alert-dismissible fade show" id="alertAlumni" role="alert">
					
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<?php }else{ ?>
					<div class="alert alert-danger alert-dismissible fade show" id="alertAlumni" role="alert">
					<?= $this->session->flashdata('msg') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					</div>
					<?php } endif;?>
					<div class="row">
						<div class="col-sm-12 mb-4 mb-xl-0">
							<div class="d-lg-flex align-items-center">
								<div class="my-3 ml-5">
									<h2 class="text-dark font-weight-bold mb-2">Halo <?= ucfirst($user->nama_depan)?> <?= ucfirst($user->nama_belakang)?> !</h2>
									<h3 class="font-weight-normal mb-2"> Selamat Datang </h3>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6  col-sm-12 mb-5">
							<div class="card sale-diffrence-border">
								<div class="card-body row">
									<div class="col-6">
										<h4 class="card-title mb-2"><?= $total_loker[0]->total?> Lowongan Pekerjaan</h4>
									<small class="text-mute mt-2d">Tersedia</small>
									</div>
									<div class="col-6 text-right">
										<a href="<?= base_url()?>loker" type="button" class="btn btn-outline-inverse-info btn-icon-text">
											Lihat Selengkapnya
											<i class="mdi mdi-message-outline btn-icon-append"></i>                          
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6  col-sm-12 mb-5">
							<div class="card sale-visit-statistics-border">
								<div class="card-body row">
									<div class="col-6">
										<h4 class="card-title mb-2"><?= $total_survey[0]->total?> Trace Study</h4>
									<small class="text-mute mt-2d">Tersedia</small>
									</div>
									<div class="col-6 text-right">
										<a  href="<?= base_url()?>tracer_study"type="button" class="btn btn-outline-inverse-info btn-icon-text">
											Lihat Selengkapnya
											<i class="mdi mdi-message-outline btn-icon-append"></i>                          
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-sm-12 flex-column d-flex stretch-card">
							<div class="row flex-grow">
								<div class="col-sm-12 grid-margin stretch-card">
									<div class="card card-data">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-8">
													<h3 class="font-weight-bold text-dark"><?= ucfirst($user->nama_depan)?> <?= ucfirst($user->nama_belakang)?></h3>
													<p class="text-dark"><?= $user->nim?></p>
													<div class="d-lg-flex align-items-baseline mb-3">
														<table class="mt-3">
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Email</h3></td>
															<td><h3 class="text-dark"> <?= $user->email?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Jenis Kelamin</h3></td>
															<td><h3 class="text-dark"> <?= $user->jenis_kelamin?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Tempat Lahir</h3></td>
															<td><h3 class="text-dark"> <?= $user->tempat_lahir?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Tanggal Lahir</h3></td>
															<td><h3 class="text-dark"> <?= $user->tgl_lahir?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">No Telepon</h3></td>
															<td><h3 class="text-dark"> <?= $user->telp?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Angkatan</h3></td>
															<td><h3 class="text-dark"><?= $user->angkatan?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Periode Wisuda</h3></td>
															<td><h3 class="text-dark"> <?= $user->tahun_lulus?> </h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Alamat Rumah</h3></td>
															<td><h3 class="text-dark"><?= $user->alamat?></h3></td>
														</tr>
													</table>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="position-relative">
														<img src="<?= base_url('assets')?>/user/<?= $this->session->userdata('foto')?>" class="w-100" alt="">
														<!-- <div class="live-info badge badge-success">Live</div> -->
													</div>
												</div>
												<a href="<?= base_url()?>data" type="button" class="btn btn-lg text-right position-absolute btn-inverse-primary btn-fw">Ubah</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 d-flex grid-margin stretch-card">
						<div class="row flex-grow">
								<div class="col-sm-12 grid-margin stretch-card">
									<div class="card card-data">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-12">
													<h3 class="font-weight-bold text-dark">Data Pekerjaan</h3>
													<p class="text-dark">data pekerjaan anda</p>
													<div class="d-lg-flex align-items-baseline mb-3">
														<table class="mt-3">
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Nama Perusahaan</h3></td>
															<td><h3 class="text-dark"><?=$user->instansi?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Jabatan</h3></td>
															<td><h3 class="text-dark"><?=$user->jabatan?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Alamat</h3></td>
															<td><h3 class="text-dark"><?=$user->alamat_kerja?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Bidang Pekerjaan</h3></td>
															<td><h3 class="text-dark"><?=$user->bidang_pekerjaan?></h3></td>
														</tr>
														<tr class="">
															<td class="py-2"><h3 class="text-mute font-weight-bold mr-3">Mulai Bekerja</h3></td>
															<td><h3 class="text-dark"><?=date("d F Y", strtotime($user->mulai_bekerja))?></h3></td>
														</tr>
														
													</table>
													</div>
												</div>
												<a  href="<?= base_url()?>pekerjaan" type="button" class="btn btn-lg text-right position-absolute btn-inverse-primary btn-fw">Ubah</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->
