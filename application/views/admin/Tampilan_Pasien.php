
<section class="content-header">
            <h1 style="font-weight:bold">
                Data Pasien
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Beranda > Data Pasien</a></li>
            </ol>
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
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <?php if($userdata['jabatan']==1){?>
                      <th>Aksi</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($pasien as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_pasien'];?>">
                    <?php $ayam = date('d-m-Y', strtotime($value['tgl_lahir']));?>
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama'];?></td>
                        <td><?=$ayam?></td>
                        <td><?php 
                        if($value['jk'] == 'l'){
                          echo"Laki-laki";
                        }else if($value['jk'] == 'p'){
                          echo"Perempuan";
                        }
                        ?></td>
                        <td><?=$value['alamat'];?></td>
                        <td><?=$value['no_tlp'];?></td>
                        <?php if($userdata['jabatan']==1){?>
                          <td> 
                            <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" class="update btn btn-info"><i class="fa fa-pencil-square-o fa-lg"></i> Ubah</a>  
                            <a class="delete btn btn-danger" href="javascript:;"><i class="fa fa-trash-o fa-lg"></i> Hapus</a>
                        </td>
                        <?php } ?>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        
    </div>
    <div id="modal-admin" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close close-modal">&times;</button>
            <h4 class="modal-title">Form Data Pasien<br>

            <?php if($userdata['jabatan']==1){?>
              <small>Tambah, Ubah dan Hapus Data Pasien</small>
            <?php } ?>
            <?php if($userdata['jabatan']==2){?>
              <small>Tambah Data Pasien</small>
            <?php } ?>
            
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="myForm" method="POST" class=" form-horizontal">
            <div class="row">
                <div class="form-group required" style="margin-bottom: 20px">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama" placeholder="Nama">
                  <input type="hidden" class="form-control" required id="id" name="id_pasien" value=0>
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
                  <label class="col-sm-3 control-label">No Telp</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="no_telp" placeholder="No Telp">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Tanggal Lahir</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="tgl_lahir" placeholder="Tanggal Lahir (yyyy-mm-dd, Cth: 19990504)">
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
                <div class="hidden form-group required">
                  <label class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-8">
                  <input type="checkbox" style="margin-top: 10px" name="status" checked>
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
    <!-- /.panel-body -->
</div>


