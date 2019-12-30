<section class="content-header">
            <h1 style="font-weight:bold">
                Rekap Obat <?php if($title == 'Rekapmasuk'){echo 'Masuk';} ?> <?php if($title == 'Rekapkeluar'){echo 'Keluar';} ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Beranda > Rekap Obat <?php if($title == 'Rekapmasuk'){echo 'Masuk';} ?> <?php if($title == 'Rekapkeluar'){echo 'Keluar';} ?></a></li>
            </ol>
            <!-- <a data-target="#modal-admin" data-backdrop="static" data-toggle="modal" style="padding: 4px" class="btn btn-sm btn-primary text-black pull-right"><i class="fa fa-plus-square-o fa-lg"></i></a>  -->
        <section class="content">
        <div class="box-header">
</div>

<div class="panel panel-default">
    <!-- /.panel-heading -->
    <div class="panel-body">
        <div class="row">
          <!-- <div class="col-md-12"> -->
            <div class="col-md-3">
              <div class="form-group">
                <label>Tampilkan Mulai Tanggal</label>
                <input type="text" id="min" maxdate="max" class="datepicker form-control">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Tampilkan Sampai Tanggal</label>
                <input type="text" id="max" mindate="min" class="datepicker form-control">
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-export">
            <thead>
                <tr>
                    <th>Kode Transaksi</th>
                    <th>Pegawai</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Obat</th>
                    <th>Total bayar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  foreach ($transaksi as $key => $value) {
                    # code...
                  ?>
                  <tr idx="<?=$value['id'];?>"><td><?=$value['id'];?></td><td><?=$value['pengguna'];?></td><td><?=$value['tgl_transaksi'];?></td><td width="5%"><?=$value['jml_obat'];?></td><td><?=$value['detail_obat'];?></td><td>Rp. <?=$value['jumlah'];?></td></tr>
                  <?php
                  }
                ?>
            </tbody>
            </table>
          </div>
        </div>
        
    </div>
     
    <!-- /.panel-body -->
</div>


