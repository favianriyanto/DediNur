<section class="content-header">
<h1 style="font-weight:bold">
                Obat Keluar
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Beranda > Obat Keluar</a></li>
            </ol>
        <section class="content">
        <div class="box-header">
        <a class="btn btn-primary transaksi" data-target="#modal-transaksi" data-backdrop="static" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</a>
</div>

<div class="panel panel-default">
<input type="text" id="min" maxdate="max" class="hidden datepicker form-control">
             <input type="text" id="max" maxdate="min" class="hidden datepicker form-control">
    
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
          <div class="col-md-12">
             <div class="row">

              <div class="col-md-12">
              <table width="100%" id="dataTables-example" class="table table-striped table-bordered table-hover">
                <thead>
                  <th width="5%">No</th><th>Pegawai</th><th>Tanggal</th><th>Jumlah</th><th>Aksi</th>
                </thead>
                <tbody>
                  <?php
                    foreach ($transaksi as $key => $value) {
                ?>
                    <tr idx="<?=$value['id'];?>">
                    <?php $ayam = date('d-m-Y', strtotime($value['tgl_transaksi']));?>
                        <td><?=$key+1;?></td>
                        <td><?=$value['pengguna'];?></td>
                        <td><?=$ayam?></td>
                        <td><?=$value['jml_obat'];?></td>
                        <td align="center"> 
                            <a data-target="#modal-transaksi" data-backdrop="static" data-toggle="modal" class="detail btn btn-info">Lihat Detail Transaksi</a>  
                            
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
              </table>
              </div>
            </div>
          </div>
          
        </div>
        
    </div>
    <!-- /.panel-body -->
</div>
<div id="modal-transaksi" class="modal fade" role="dialog" style="display:none">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Form Obat Keluar<br>
            <small>Tambah dan Lihat Detail Transaksi</small>
          </h4>

          </div>
          <div class="modal-body">
            <form name="form-<?php echo $title; ?>" id="transaksiForm" method="POST" class=" form-horizontal">
            <div class="col-sm-6">
              <div class="form-group required">
                <label class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-8">
                  <input name="tanggal" class="form-control" disabled="" value="<?=date('d-m-Y')?>">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-3 control-label">Pasien</label>
                <div class="col-sm-8">
                  <select value="id_pasien" name="pasien" class="form-control">
                  <option value="">Pilih Pasien</option>
                  <?php
                  foreach ($pasien as $key => $value) {
                  ?>
                  <option value="<?=$value['id_pasien']?>"><?=$value['nama']?></option>
                  <?php
                  }
                  ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group required">
                <label class="col-sm-3 control-label">Pegawai</label>
                <div class="col-sm-8">
                  <input name="pengguna" class="form-control" disabled="" value="<?=$pengguna?>">
                </div>
              </div>
              <div class="form-group required">
                <label class="col-sm-3 control-label">ID</label>
                <div class="col-sm-8">
                  <input name="kd_transaksi" class="form-control" disabled="" value="<?=$kode_transaksi?>">
                </div>
              </div>
            </div>
            <input type="hidden" class="form-control" name="id">
            <div class="row">
              <div class="col-md-12">
              <table width="100%" id="tabel-transaksi" class="table table-striped table-bordered table-hover">
                <thead>
                  <th width="25%">Obat</th><th>Harga</th><th width="10%">Jumlah</th><th>Sub Total Harga</th><th></th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>
              <div class="col-sm-6 pull-right">
                <div class="form-group required">
                  <label class="col-sm-4 control-label">Total Item</label>
                  <div class="col-sm-8">
                    <input name="total_item" class="form-control" disabled="" value="">
                  </div>
                </div>
                <div class="form-group required">
                  <label class="col-sm-4 control-label">Total Harga</label>
                  <div class="col-sm-8">
                    <input name="jml_bayar" class="form-control" disabled="" value="">
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <input type="button" class="btn btn-success save" value="Simpan" onclick="post_transaksi();"></button>
          </div>
          </form>
        </div>

      </div>
    </div>


