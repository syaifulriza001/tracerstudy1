<div class="content-wrapper">
    <?php 
        if ($this->session->flashdata('status')) {
            if ($this->session->flashdata('kondisi')=="1") {
        ?>
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show" id="alertlogin">
                <span class="badge badge-pill badge-success">Success</span>
                <?= $this->session->flashdata('status') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php 
            }else{
        ?>
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show" id="alertlogin">
                <span class="badge badge-pill badge-danger">Failed</span>
                <?= $this->session->flashdata('status') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
            }
        ?>
            
        <?php
        }
        $this->session->set_userdata('status','');
        $this->session->set_userdata('kondisi','');
    ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data User  </h3>
                    <?php if($title=="2"): ?>
                    <span class="float-right">
                      <a  class="btn btn-primary btn-sm text-white" data-toggle="modal" data-target="#modal_tambah"><i class="fa fa-plus"></i> Tambah</a>
                    </span>
                    <?php endif?>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama</th>
                            <th>L / P</th>
                            <th><?php if($title=="2"){ echo "Telepon"; }else{ echo "Tahun Lulus"; }?></th>
                            <?php if($title=="3"){ ?>
                            <th>Konsentrasi</th>
                            <th>Bidang Pekerjaan</th>
                            <?php } ?>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($user as $user): ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td><?= ucfirst($user->nama_depan)." ".ucfirst($user->nama_belakang) ?></td>
                              <td><?= $user->jenis_kelamin ?></td>
                              <td><?php if($title=="2"){ ?> <?= $user->telp ?> <?php }else{ echo $user->tahun_lulus; } ?></td>
                              <?php if($title=="3"){ ?>
                              <td>
                                <?php 
                                  foreach($konsentrasi as $k): 
                                    if($k->id == $user->konsentrasi){
                                      echo $k->konsentrasi;
                                    }      
                                  endforeach;
                                ?>
                              </td>
                              <td>
                                <?php 
                                  foreach($bidang_pekerjaan as $bp): 
                                    if($bp->id == $user->bidang_pekerjaan){
                                      echo $bp->nama;
                                    }      
                                  endforeach;
                                ?>
                              </td>
                                <?php } ?>
                              <td>
                                <?php if($user->status == "nonaktif"){ ?>
                                <span class="badge badge-danger"><?= strtoupper($user->status) ?></span>
                                <?php }else{ ?>
                                <span class="badge badge-success"><?= strtoupper($user->status) ?></span>
                                <?php } ?>
                              </td>
                              <td>
                                <?php 
                                if($this->session->userdata('id_user_grup')==2){
                                if ($user->status=="nonaktif") {
                                ?>
                                <a href="<?= base_url('backend/users/editstatus/'.$user->id.'/aktif/'.$title); ?> " class="btn btn-success btn-sm font-weight-bold"><i class="fa fa-check"></i> AKTIFKAN</a>
                                <?php
                                }
                                else {
                                  ?>
                                  <a href="<?= base_url('backend/users/editstatus/'.$user->id.'/nonaktif/'.$title); ?> " class="btn btn-danger btn-sm font-weight-bold"><i class="fa fa-times"></i> NONAKTIFKAN</a>
                                  <?php
                                }}
                                ?>
                                <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_view<?= $user->id ?>"><i class="fa fa-eye"></i></a>
                                <?php if($title=="2"){ ?>
                                <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_edit<?= $user->id ?>"><i class="fa fa-edit"></i></a>
                                <a href="<?= base_url('backend/users/delete/'.$user->id.'/'.$title) ?>" class="btn btn-danger btn-sm" onclick="return confirm('anda yakin ingini menghapus data tersebut ?')"><i class="fa fa-trash"></i></a>
                                <?php } ?>
                              </td>

                            </tr>
                            <?php $no++; endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>

<?php 
if($title=="2"){
foreach ($user2 as $user) {
?>
  <div class="modal fade" id="modal_view<?= $user->id ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Data Alumni</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td width="35%" rowspan="11">
                <img src="<?= base_url('assets/user/'.$user->foto) ?>" alt="<?= $user->foto ?>" class="img-thumbnail">
              </td>
              <td width="22%"><strong>Nama : </strong></td>
              <td><?= $user->nama_depan.' '.$user->nama_belakang ?></td>
            </tr>
            <tr>
            <td><strong>P/L :</strong></td>
            <td><?= $user->jenis_kelamin ?></td>
            </tr>
            <td><strong>HP :</strong></td>
            <td><?= $user->telp ?></td>
            </tr>
            <td><strong>E-mail :</strong></td>
            <td><?= $user->email ?></td>
            </tr>
            <td><strong>Alamat :</strong></td>
            <td><?= $user->alamat ?></td>
            </tr>
            <td><strong>Username :</strong></td>
            <td><?= $user->username ?></td>
            </tr>
          </table>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php
}
}else{
  foreach ($user2 as $user) {
    ?>
      <div class="modal fade" id="modal_view<?= $user->id ?>" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Data Alumni</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table">
                <tr>
                  <td width="35%" rowspan="11">
                    <img src="<?= base_url('assets/user/'.$user->foto) ?>" alt="<?= $user->foto ?>" class="img-thumbnail">
                  </td>
                  <td width="22%"><strong>Nama : </strong></td>
                  <td><?= $user->nama_depan.' '.$user->nama_belakang ?></td>
                </tr>
                <tr>
                <td><strong>P/L :</strong></td>
                <td><?= $user->jenis_kelamin ?></td>
                </tr>
                <td><strong>T Lahir :</strong></td>
                <td><?= $user->tgl_lahir ?></td>
                </tr>
                <td><strong>HP :</strong></td>
                <td><?= $user->telp ?></td>
                </tr>
                <td><strong>E-mail :</strong></td>
                <td><?= $user->email ?></td>
                </tr>
                <td><strong>Alamat :</strong></td>
                <td><?= $user->alamat ?></td>
                </tr>
                <td><strong>Tahun lulus :</strong></td>
                <td><?= $user->tahun_lulus ?></td>
                </tr>
                <td><strong>Angkatan :</strong></td>
                <td><?= $user->angkatan ?></td>
                </tr>
                <td><strong>Konsentrasi Skripsi :</strong></td>
                <td>
                  <?php 
                    foreach($konsentrasi as $k): 
                      if($k->id == $user->konsentrasi){
                        echo $k->konsentrasi;
                      }      
                    endforeach;
                  ?>
                </td>
                </tr>
                <td><strong>Kota :</strong></td>
                <td><?= $user->kota ?></td>
                </tr>
                <td><strong>Bidang Pekerjaan :</strong></td>
                <td>
                  <?php 
                    foreach($bidang_pekerjaan as $bp): 
                      if($bp->id == $user->bidang_pekerjaan){
                        echo $bp->nama;
                      }      
                    endforeach;
                  ?>
                </td>
                </tr>
              </table>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<?php }} ?>

<?php 
if($title=="2"){
foreach ($user2 as $user) {
?>
  <div class="modal fade" id="modal_edit<?= $user->id ?>" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Panitia</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?=base_url('backend/users/update/'.$user->id.'/'.$title)?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Depan</label>
                    <input type="text" class="form-control" name="nama_depan" value="<?= $user->nama_depan ?>">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang" value="<?= $user->nama_belakang ?>">
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
                    <label for="nama_depan" class="form-control-label">Foto</label>
                    <input type="file" class="form-control" name="new_foto" >
                    <input type="text" class="form-control" name="old_foto" value="<?= $user->foto?>" hidden>
                    
                </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Edit</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php
}
}else{
  foreach ($user2 as $user) {
    ?>
      <div class="modal fade" id="modal_edit<?= $user->id ?>" role="dialog">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data Panitia</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('backend/users/update/'.$user->id.'/'.$title)?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_depan" class="form-control-label">Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan" value="<?= $user->nama_depan ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama_depan" class="form-control-label">Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang" value="<?= $user->nama_belakang ?>">
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
                        <label for="nama_depan" class="form-control-label">Foto</label>
                        <input type="file" class="form-control" name="new_foto" >
                        <input type="text" class="form-control" name="old_foto" value="<?= $user->foto?>" hidden>
                        
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" >Edit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- /.modal -->
<?php }} ?>
<div class="modal fade" id="modal_tambah" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="<?=base_url('backend/users/tambah/'.$title)?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Depan</label>
                    <input type="text" class="form-control" name="nama_depan">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Nama Belakang</label>
                    <input type="text" class="form-control" name="nama_belakang">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-control-label">L/P</label>
                    <select name="jenis_kelamin" class="form-control">
                       <option selected>Pilih</option>
                       <option value="L">L</option>
                       <option value="P">P</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Phone</label>
                    <input type="text" class="form-control" name="telp" >
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">E-mail</label>
                    <input type="text" class="form-control" name="email" >
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Username</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="form-group">
                    <label for="nama_depan" class="form-control-label">Foto</label>
                    <input type="file" class="form-control" name="foto" >
                </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Tambah</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>