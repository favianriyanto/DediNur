

<section class="content-header">
            <h1 style="font-weight:bold">
                Selamat Datang di Klinik Dedi Nur
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i> Beranda</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <?php if($userdata['jabatan']==2){
                ?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue" onclick="location.href='admin/transaksi/obatMasuk';">
                        <div class="inner">
                            <br>
                            <h3 style="text-align:center"><i class="fa fa-plus-square"></i> Obat Masuk</h3>
                            <br>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->          
                <?php } ?>

                <?php if($userdata['jabatan']==2){
                ?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red" onclick="location.href='admin/transaksi/obatKeluar';">
                        <div class="inner">
                            <br>
                            <h3 style="text-align:center"><i class="fa  fa-minus-square"></i> Obat Keluar</h3>
                            <br>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->       
                <?php } ?>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow" onclick="location.href='admin/obat';">
                        <div class="inner">
                            <br>
                            <h3 style="text-align:center"><i class="fa fa-medkit"></i> Data Obat</h3>
                            <br>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua" onclick="location.href='admin/pasien';">
                        <div class="inner">
                            <br>
                            <h3 style="text-align:center"><i class="fa fa-wheelchair"></i> Data Pasien</h3>
                            <br>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-purple" onclick="location.href='admin/merek';">
                        <div class="inner">
                            <br>
                            <h3 style="text-align:center"><i class="fa fa-suitcase"></i> Data Merek Obat</h3>
                            <br>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

                <?php if($userdata['jabatan']==1){
                ?>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue" onclick="location.href='admin/rekapdata/rekapObatMasuk';">
                        <div class="inner">
                            <br>
                            <h3 style="text-align:center; font-size: 34px;"><i style="font-size: 38px;" class="fa fa-arrow-circle-o-down"></i> Rekap Obat Masuk</h3>
                            <br>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->      
                <?php } ?>

                <?php if($userdata['jabatan']==1){
                ?>
                <div style="width:25.1%" class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red" onclick="location.href='admin/rekapdata/rekapObatKeluar';">
                        <div class="inner">
                            <br>
                            <h3 style="text-align:center; font-size: 34px;"><i style="font-size: 38px;" class="fa fa-arrow-circle-o-up"></i> Rekap Obat Keluar</h3>
                            <br>
                        </div>
                        <div class="icon">
                        </div>
                        <a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->     
                <?php } ?>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->