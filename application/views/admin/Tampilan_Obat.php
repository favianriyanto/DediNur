
<section class="content-header">
<h1 style="font-weight:bold">
                Data Obat
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Beranda > Data Obat</a></li>
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
                    <th>Nama Obat</th>
                    <th>Deskripsi</th>
                    <th>Stok</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <?php if($userdata['jabatan']==1){
                        ?><th>Aksi</th>
                        <?php } ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($obat as $key => $value) {
                ?>
                    <tr idx="<?=$value['id_obat'];?>">
                        <td><?=$key+1;?></td>
                        <td><?=$value['nama'];?></td>
                        <td><?=$value['deskripsi'];?></td>

                        <td><?=$value['stok'];?></td>
                        <td><?=$value['merek_nama'];?></td>
                        <td><?php
                        if($value['kategori']==1){
                          echo"Keras";
                        }elseif($value['kategori']==2){
                          echo"Bebas Terbatas";
                        }else{
                          echo"Bebas";
                        }
                          ?></td>
                        
                        <td>Rp. <?=$value['harga'];?></td>

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
            <h4 class="modal-title">Form Data Obat<br>
            <?php if($userdata['jabatan']==1){?>
              <small>Tambah, Ubah dan Hapus Data Obat</small>
            <?php } ?>
            <?php if($userdata['jabatan']==2){?>
              <small>Tambah Data Obat</small>
            <?php } ?>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="myForm" method="POST" class=" form-horizontal">
                
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Nama Obat</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" maxlength="50" required name="nama" placeholder="Nama Obat">
                  <input type="hidden" class="form-control" required id="id" name="id_obat" value=0>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Deskripsi</label>
                  <div class="col-sm-8">
                    <textarea name="deskripsi" class="form-control"></textarea>
                  </div>
                </div>
                <?php if($userdata['jabatan']==1){?>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Stok Obat</label>
                  <div class="col-sm-8">
                  <input type="number" value="0" class="form-control" maxlength="50" required name="stok" placeholder="Stok Obat">
                  </div>
                </div>
                <?php } ?>
                <?php if($userdata['jabatan']==2){?>
                <div class="hidden form-group required">
                  <label class="col-sm-3 control-label">Stok Obat</label>
                  <div class="col-sm-8">
                  <input type="number" value="0" class="form-control" maxlength="50" required name="stok" placeholder="Stok Obat">
                  </div>
                </div>
                <?php } ?>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Merek</label>
                  <div class="col-sm-8">
                    <select name="merek" class="form-control" required="">
                      <?php
                        foreach ($merek as $key => $value) {
                          ?>
                          <option value="<?=$value['id_merek']?>"><?=$value['nama']?></option>
                          <?php
                        }
                        
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Kategori</label>
                  <div class="col-sm-8">
                    <select name="kategori" class="form-control" required="">
                     
                       <option value="1">Keras</option>
                       <option value="2">Bebas Terbatas</option>
                       <option value="3">Bebas</option>
                          
                    </select>
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-3 control-label">Harga Obat</label>
                  <div class="col-sm-8">
                  <input type="number" class="form-control" maxlength="50" required name="harga" placeholder="Rp. (Cth : 15000)">
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


