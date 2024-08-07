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
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pengaturan Website</h1>
          </div>
		<div class="section-body">
			<h2 class="section-title">Pengaturan</h2>
			<p class="section-lead">
				Sesuaikan Form dibawah ini sesuai kebutuhan anda
			</p>
			<div class="card">
				<div class="card-header">
				<h4>Web Konten</h4>
				</div>
				<div class="card-body">
				<div class="card-body">
				<?php
				foreach($website as $web): ?>
					<form class="needs-validation" novalidate="" method="post" enctype="multipart/form-data" novalidate action="<?= base_url('updateApp') ?>">
							<div class="form-group">
								<label>Website</label>
								<input type="text" class="form-control" required placeholder="Nama Website" name="web" value="<?= $web->web ?>">
								<div class="invalid-feedback">
									Silahkan isi nama website anda , contoh : Tracer Study Alumni Teknologi Informasi
								</div>
							</div>
							<div class="form-row">
								<div class="col-lg-6 col-sm-12">
										<div class="form-group">
											<label>Universitas</label>
											<input type="text" class="form-control" required placeholder="Nama Universitas"  value="<?= $web->universitas?>" name="universitas">
											<div class="invalid-feedback">
												Silahkan isi nama universitas , contoh : Universitas Guna Jaya
											</div>
										</div>
								</div>
								<div class="col-lg-6 col-sm-12">
										<div class="form-group">
											<label>Prodi</label>
											<input type="text" class="form-control" required placeholder="Nama Prodi" name="prodi" value="<?= $web->prodi ?>">
											<div class="invalid-feedback">
												Silahkan isi nama prodi , contoh : Teknologi Informasi
											</div>
										</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-lg-6 col-sm-12">
									<div class="form-group">
										<label>Email</label>
										<input type="email" class="form-control" required placeholder="Email" name="email" value="<?= $web->email ?>">
										<div class="invalid-feedback">
											Silahkan isi email , contoh : tracerstudy@gmail.com
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12">
									<div class="form-group">
										<label>Tel</label>
										<input type="tel" class="form-control" placeholder="08XXXXXXXXXX" pattern="[0]{1}[8]{1}[0-9]{10}" required name="telp" value="<?= $web->telp ?>">
										<div class="invalid-feedback">
										Silahkan isi nomor telfon , contoh : 08xx xxxx xxxx
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-lg-6 col-sm-12">
									<div class="form-group">
										<label>Color 1</label>
										<input type="color" class="form-control" name="warna" value="<?= $web->warna ?>" required>
										<small>Disarankan warna gelap</small>
										<div class="invalid-feedback">
												Silahkan isi warna sesuai kebutuhan anda ,
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12">
									<div class="form-group">
										<label>Color 2</label>
										<input type="color" class="form-control" name="warna2" value="<?= $web->warna2 ?>" required>
										<small>Disarankan warna terang</small>
										<div class="invalid-feedback">
												Silahkan isi warna sesuai kebutuhan anda
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Logo</label>
								<input type="file" class="form-control" name="new_logo" accept="image/png, image/jpeg" />
								<input type="file" class="form-control" name="old_logo" value="<?= $web->logo?>" hidden>
								<small>Kosongkan bila tidak ingin mengganti</small>
								<div class="invalid-feedback">
									Silahkan upload logo format png
							</div>
							</div>
						<div class="card-footer text-right">
							<button class="btn btn-primary" type="submit">Ubah</button>
						</div>
					</form>
					<?php endforeach; ?>
				</div>
				</div>
			</div>
		</div>
</div>
