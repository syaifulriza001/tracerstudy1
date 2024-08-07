<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ubah Password</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ubah Password</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
    if ($this->session->flashdata('msg')) {
    ?>
    <div class="alert alert-warning alert-dismissible fade show" id="alertlogin" role="alert">
      <?= $this->session->flashdata('msg')?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
    }
    ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ubah Password</h3> <span class="float-right"><a href="#" id="showpassword" class="btn btn-secondary"><i class="fa fa-eye"></i> Lihat Password </a></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <form action="<?= base_url('backend/users/ubahpassword')?>" method="post">
                    <div class="form-group">
                        <label for="old_password" class="form-control-label">Password Lama</label>
                        <input type="password" id="oldPass" class="form-control" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="new_password" class="form-control-label">Password Baru</label>
                        <input type="password" id="newPass" class="form-control" name="new_password">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password" class="form-control-label">Password Confirm</label>
                        <input type="password" id="conPass" class="form-control" name="confirm_password">
                    </div>
                    <input type="submit" class="btn btn-info float-right" name="submit" value="GANTI PASSWORD">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- /.modal -->
