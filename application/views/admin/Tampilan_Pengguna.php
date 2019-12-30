<section class="content-header">
            <h1 style="font-weight:bold">
                Data Pengguna
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-users"></i> > Data Pengguna</a></li>
            </ol>
            <!-- <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" style="padding: 4px" class="btn btn-sm btn-primary text-black pull-right"><i class="fa fa-plus-square-o fa-lg"></i></a>  -->
        <section class="content">
        <div class="box-header">
        <a class="btn btn-primary" data-target="#modal-admin" data-backdrop="static" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</a>
</div>
<div class="panel panel-default">
<input type="text" id="min" maxdate="max" class="hidden datepicker form-control">
             <input type="text" id="max" maxdate="min" class="hidden datepicker form-control">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Nama Pengguna</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Jabatan</th>
                    <th>No Telp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($provider as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_pengguna'];?>" id="<?=$value['id'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama'];?></td>
                        <td><?=$value['username'];?></td>
                        <td><?php 
                        if($value['jk'] == 'l'){
                          echo"Laki-laki";
                        }else if($value['jk'] == 'p'){
                          echo"Perempuan";
                        }
                        ?></td>
                        <td><?=$value['alamat'];?></td>
                        <td><?php 
                        if($value['jabatan'] == 1){
                          echo"Dokter";
                        }else if($value['jabatan'] == 2){
                          echo"Pegawai";
                        }
                        ?></td>
                        <td><?=$value['no_hp'];?></td>
                        <td> 
                            <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" class="update btn btn-info"><i class="fa fa-pencil-square-o fa-lg"></i> Ubah</a>  
                             <a data-target="#modal-change-password" data-backdrop="static" data-toggle="modal" class="change-pass btn btn-success"><i class="fa fa-key fa-lg"></i> Kata Sandi</a> 
                            <a class="delete btn btn-danger" href="javascript:;"><i class="fa fa-trash-o fa-lg"></i> Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
    <div id="modal-admin" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-modal">&times;</button>
            <h4 class="modal-title">Form Data <?php echo $title; ?><br>
            <small>Tambah, Ubah dan Hapus Data Pengguna</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="myForm" method="POST" class=" form-horizontal">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama" placeholder="Nama">
                  <input type="hidden" class="form-control" required id="id" name="id_pengguna" value=0>
                  <input type="hidden" class="form-control" required name="user_login_id" value=0>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea name="alamat" class="form-control"></textarea>
                  </div>
                </div>
                 <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Pengguna</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="username" placeholder="Nama Pengguna">
                  </div>
                </div>
                 <div class="form-group password required">
                  <label class="col-sm-3 control-label">Kata Sandi</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="password" id="password" placeholder="Kata Sandi">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Konfirmasi Kata Sandi</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="password_conf" id="password_conf" placeholder="Konfirmasi Kata Sandi">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">No Telp</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" name="telp" placeholder="No Telp">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-8">
                  <select name="jabatan" class="form-control" required="">
                   <option value="1">Dokter</option>
                   <option value="2">Pegawai</option>
                   <!-- <option value="3">Apoteker</option> -->
                  </select>
                  </div>
                </div>
                 <div class="form-group required">
                  <label class="col-sm-3 control-label">Jenis Kelamin</label>
                  <div class="col-sm-8">
                  <select name="jk" class="form-control" required="">
                   <option value="l">Laki - laki</option>
                   <option value="p">Perempuan</option>
                  </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger close-modal">Batal</button>
            <input type="button" class="btn btn-success" value="Simpan" onclick="postData();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>
    <div id="modal-change-password" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Form <?php echo $title; ?><br>
            <small>Ganti Kata Sandi</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="passwordForm" method="POST" class=" form-horizontal">
            <div class="alert alert-danger" style="display: none">Password Salah</div>
            <div class="row">
                 <div class="form-group password required">
                  <label class="col-sm-3 control-label">Kata Sandi Dokter</label>
                  <div class="col-sm-8">
                  <input type="hidden" class="form-control" name="id">
                  <input type="password" class="form-control" maxlength="50" required name="password_admin" placeholder="Kata Sandi Dokter">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Kata Sandi</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="new_password" id="new_password" placeholder="Kata Sandi Baru">
                  </div>
                </div>
                <div class="form-group password required">
                  <label class="col-sm-3 control-label">Kata Sandi(Ulang)</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control" maxlength="50" required name="new_password_conf" id="new_password_conf" placeholder="Konfirmasi Kata Sandi Baru">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <input type="button" class="btn btn-success" value="Simpan" onclick="changePass();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>
   
    <!-- /.panel-body -->
</div>

</section>
                  </section>
