
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tracer Study IF UNLA</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/frontend')?>/img/logo.png" rel="icon">
  <link href="<?= base_url('assets/frontend/alumni')?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/frontend/alumni')?>/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/frontend/alumni')?>/css/style.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

  <!-- =======================================================
  * Template Name: iPortfolio - v1.3.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="<?= base_url('assets')?>/user/<?= $this->session->userdata('foto')?>" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><?= ucfirst($this->session->userdata('nama_depan'))?></h1>
        <h1 class="text-light"><?= ucfirst($this->session->userdata('nama_belakang'))?></h1>
      </div>

      <nav class="nav-menu">
        <ul>
          <li class="active"><a href="<?= base_url('alumni') ?>" id="home"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="<?= base_url('login/logout') ?>"><i class="bx bx-exit"></i> Log out</a></li>
        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Edit Profil</h2>
        </div>

        <div class="row" data-aos="fade-in">
            <div class="col-lg-12 d-flex align-items-stretch">
                <div class="info">
                    <form action="<?= base_url('updateProfil/'.$user->id.'/'.$user->id_user_grup) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nama Depan</label>
                            <input type="text" class="form-control" name="nama_depan" value="<?= $user->nama_depan ?>" >
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Belakang</label>
                            <input type="text" class="form-control" name="nama_belakang" value="<?= $user->nama_belakang ?>" >
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin" class="form-control-label">L/P</label>
                            <select name="jenis_kelamin" class="form-control">
                                <?php if($user->jenis_kelamin=="L"): ?>
                                <option value="L" selected>L</option>
                                <option value="P">P</option>
                                <?php else: ?>
                                <option value="P" selected>P</option>
                                <option value="L">L</option>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tgl_lahir" id="datepicker" value="<?= $user->tgl_lahir ?>" >
                        </div>
                        <div class="form-group">
                            <label for="nama_depan" class="form-control-label">Phone</label>
                            <input type="text" class="form-control" name="telp" value="<?= $user->telp ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_depan" class="form-control-label">E-mail</label>
                            <input type="text" class="form-control" name="email" value="<?= $user->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_depan" class="form-control-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $user->alamat ?>">
                        </div>
                        <div class="form-group">
                            <label for="nama_depan" class="form-control-label">Username</label>
                            <input type="text" class="form-control" name="username" value="<?= $user->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="Tahun lulus" class="form-control-label">Tahun Lulus</label>
                            <input type="text" class="form-control" name="tahun_lulus" id="datepicker1" value="<?= $user->tahun_lulus?>" placeholder="Tahun lulus" required/>
                        </div>
                        <div class="form-group">
                            <label for="Angkatan" class="form-control-label">Angkatan</label>
                            <input type="text" class="form-control" name="angkatan" id="datepicker2" value="<?= $user->angkatan?>" placeholder="Angkatan" required/>
                        </div>
                        <div class="form-group">
                            <label for="Angkatan" class="form-control-label">Mulai Kerja</label>
                            <input type="text" class="form-control" name="mulai_kerja" id="datepicker3" value="<?= $user->mulai_kerja?>" placeholder="Mukai Kerja Tahun" required/>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan" class="form-control-label">Konsentrasi</label>
                            <select name="konsentrasi" class="form-control" id="pekerjaan">
                                <?php foreach($konsentrasi as $k):
                                if($k->id == $user->konsentrasi){
                                ?>
                                <option value="<?= $k->id ?>" selected><?= $k->konsentrasi ?></option>
                                <?php }else{
                                ?>
                                <option value="<?= $k->id ?>"><?= $k->konsentrasi ?></option>
                                <?php } endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan" class="form-control-label">Bidang Pekerjaan</label>
                            <select name="bidang_pekerjaan" class="form-control" id="pekerjaan">
                                <?php foreach($bidang_pekerjaan as $bp):
                                if($bp->id == $user->bidang_pekerjaan){
                                ?>
                                <option value="<?= $bp->id ?>" selected><?= $bp->nama ?></option>
                                <?php }else{
                                ?>
                                <option value="<?= $bp->id ?>"><?= $bp->nama ?></option>
                                <?php } endforeach ?>
                            </select>
                            <input type="text" class="form-control" name="old_bidang_pekerjaan" value="<?= $user->bidang_pekerjaan ?>" hidden>
                        </div>
                        <div class="form-group">
                            <label for="Alamat" class="form-control-label">Alamat Kerja</label>
                            <input type="text area" name="alamat_kerja" class="form-control" value="<?= $user->alamat_kerja?>" id="alamat" placeholder="Alamat Kantor" required/>
                        </div>
                        <div class="form-group">
                            <label for="Kota" class="form-control-label"Kota>Kota</label>
                            <input type="text" name="kota" id="alamat" class="form-control" value="<?= $user->kota?>" placeholder="Kota" required/>
                        </div>
                        <div class="form-group">
                            <label for="nama_depan" class="form-control-label">Foto</label>
                            <input type="file" class="form-control" name="new_foto" ccept="image/png, image/jpeg" />>
                            <input type="text" class="form-control" name="old_foto" value="<?= $user->foto?>" hidden>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm float-right" name="submit" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Tracer Study 2020</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Bagja Septian M</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/jquery.easing/jquery.easing.min.js"></script>
  <!-- <script src="<?= base_url('assets/frontend/alumni')?>/vendor/php-email-form/validate.js"></script> -->
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/counterup/counterup.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/venobox/venobox.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/typed.js/typed.min.js"></script>
  <script src="<?= base_url('assets/frontend/alumni')?>/vendor/aos/aos.js"></script>
  <script>
        window.setTimeout(function() {
            $("#alertAlumni").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 2000);
  </script>
  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/frontend/alumni')?>/js/main.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script>
            ClassicEditor
                .create( document.querySelector( '#deskripsi' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
    </script>
    <script>
        $(function () {
            $("#datepicker").datepicker({ 
                    autoclose: true, 
                    format: 'dd MM yyyy'
            });
            $("#datepicker1").datepicker({ 
                    autoclose: true, 
                    minViewMode: 'years',
                    format: 'yyyy'
            });
            $("#datepicker2").datepicker({ 
                    autoclose: true, 
                    minViewMode: 'years',
                    format: 'yyyy'
            });
            $("#datepicker3").datepicker({ 
                    autoclose: true, 
                    minViewMode: 'years',
                    format: 'yyyy'
            });
        });
    </script>
    <!-- <script>
        $(document).ready(function(){
            $('#pekerjaan').change(function(){
                var id=$(this).val();
                if (id === "2") {
                    $('#bidang2').removeClass('d-none');
                    $('#bidang1').addClass('d-none');
                }else{
                    $('#bidang1').removeClass('d-none');
                    $('#bidang2').addClass('d-none');
                    $.ajax({
                        url: "<?php echo base_url();?>register/get_sub_pekerjaan",
                        method: 'POST',
                        data : {id:id},
                        async: false,
                        dataType: 'json',
                        success: function(data){
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){
                                html += "<option value="+data[i].nama+"> "+data[i].nama+"</option>";
                            }
                            $('#bidang_pekerjaan').html(html);
                        }
                    });
                }
            });
        });
    </script> -->

</body>

</html>
