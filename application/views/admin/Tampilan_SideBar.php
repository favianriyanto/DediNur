            

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?=base_url(); ?>assets/images/dpdefault.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <!-- <p style="margin-top:10px"></p> -->
                            <p style="font-size:20px;margin-top:-5px"><?php echo $userdata['username']?></p>
                            <?php 
                            if($userdata['jabatan'] == 1){
                            echo"Dokter";
                            }else if($userdata['jabatan'] == 2){
                            echo"Pegawai";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU UTAMA</li>
                        <li id="ayam" class="ayam <?php if($title == 'Beranda'){echo 'active';} ?>
                        <?php if($title == 'Merek'){echo 'active';} ?>
                        <?php if($title == 'Obat'){echo 'active';} ?>
                        <?php if($title == 'Pasien'){echo 'active';} ?>
                        <?php if($title == 'Rekapmasuk'){echo 'active';} ?>
                        <?php if($title == 'Rekapkeluar'){echo 'active';} ?>
                        <?php if($title == 'Transaksimasuk'){echo 'active';} ?>
                        <?php if($title == 'Transaksikeluar'){echo 'active';} ?>
                        "><a style="font-weight:bold; color:#ffffff" href="<?=base_url();?>admin"><i class="fa fa-home"></i> <span>Beranda</span></a>
                        </li>
                        <?php if($userdata['jabatan']==1){
                        ?>
                        <li id="kambing" class=" <?php if($title == 'Pengguna'){echo 'active';} ?>"><a style="font-weight:bold; color:#ffffff" href="<?=base_url();?>admin/pengguna"><i class="fa fa-users"></i> <span> Data Pengguna</span></a>
                        </li>
                        <?php } ?>
                        <a>
                            <a style="font-weight:bold; color:#ffffff" onclick="exit();">
                                <li style="position:absolute; bottom:0px"><i class="fa fa-power-off"></i> <span>Keluar</span>
                            </a></li>
                        </a>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

