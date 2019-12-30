
<section class="content-header">
            <h1 style="font-weight:bold">
                Data Merek Obat
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Beranda > Data Merek Obat</a></li>
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
                    <th>Nama Merek</th>
                    <th>Deskripsi</th>
                    <?php if($userdata['jabatan']==1){
                        ?><th>Aksi</th>
                        <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($merek as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_merek'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama'];?></td>
                        <td><?=$value['deskripsi'];?></td>
                        <?php if($userdata['jabatan']==1){
                        ?>
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
            <h4 class="modal-title">Form Data Merek Obat<br>

            <?php if($userdata['jabatan']==1){?>
              <small>Tambah, Ubah dan Hapus Data Merek Obat</small>
            <?php } ?>
            <?php if($userdata['jabatan']==2){?>
              <small>Tambah Data Merek Obat</small>
            <?php } ?>
            
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="myForm" method="POST" class=" form-horizontal">
                
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Merek</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama" placeholder="Nama Merek Obat">
                  <input type="hidden" class="form-control" required id="id" name="id_merek" value=0>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Deskripsi</label>
                  <div class="col-sm-8">
                    <textarea name="deskripsi" class="form-control"></textarea>
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


