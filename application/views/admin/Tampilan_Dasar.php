<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Inventori Obat Apotek Dedi Nur</title>
    <script type="text/javascript">
        var base_url = '<?php echo base_url(); ?>';
    </script>
    <!-- Bootstrap Core CSS -->
    <!-- <link href="<?=base_url(); ?>assets/css/bootstrap.css" rel="stylesheet"> -->

    <!-- MetisMenu CSS -->
    <link href="<?=base_url(); ?>assets/plugin/select2/css/select2.min.css" rel="stylesheet">
    <link href="<?=base_url(); ?>assets/plugin/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- <link href="<?=base_url(); ?>assets/plugin/datatables-plugins/buttons.dataTables.min.css" rel="stylesheet"> -->
    <!-- DataTables CSS -->
    <link href="<?=base_url(); ?>assets/plugin/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?=base_url(); ?>assets/plugin/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="<?=base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet"> -->

    <!-- Custom Fonts -->
    <link href="<?=base_url(); ?>assets/plugin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- css dari template -->
    
    <link href="<?=base_url(); ?>assets/css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url(); ?>assets/css/Ionicons/css/ionicons.min.css" rel="stylesheet">
    <!-- <link href="<?=base_url(); ?>assets/css/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"> -->
    <link href="<?=base_url(); ?>assets/css/jvectormap/jquery-jvectormap.css" rel="stylesheet">
    <link href="<?=base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet">
    <link href="<?=base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?=base_url(); ?>assets/css/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet"> -->
    <link href="<?=base_url(); ?>assets/css/_all-skins.min.css" rel="stylesheet">



</head>

<body class="hold-transition skin-blue sidebar-mini">
    

    <div class="wrapper">

        <?php
            if(!empty($navbar)){
                $this->load->view($navbar);
            }
        ?>
        <?php
            if(!empty($sidebar)){
                $this->load->view($sidebar);
            }
        ?>
        <div class="content-wrapper" >
                     <?php
                        if(!empty($content)){
                            $this->load->view($content);
                        }
                    ?>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script src="<?=base_url();?>assets/plugin/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/plugin/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?=base_url();?>assets/plugin/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>assets/plugin/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/plugin/datatables-responsive/dataTables.responsive.js"></script>
    <script src="<?=base_url();?>assets/plugin/select2/js/select2.full.min.js"></script>

    <!-- <script src="<?=base_url();?>assets/plugin/jquery-validation/dataTables.bootstrap.min.js"></script> -->
    <script src="<?=base_url();?>assets/plugin/datatables-responsive/dataTables.responsive.js"></script>
    <!-- Custom Theme JavaScript -->
    <!-- <script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script> -->
    <script src="<?=base_url();?>assets/js/moment.js"></script>
    <script src="<?=base_url();?>assets/js/adminlte.min.js"></script>
    <script src="<?=base_url();?>assets/plugin/highcharts/highcharts.js"></script>
    <?php  
    for($i=0;$i<count($scripts);$i++):
    ?>
           <script type='text/javascript' src = '<?=base_url();?>assets/<?=$scripts[$i];?>'></script>
 <?php endfor;?>
    <!-- 
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script> -->
    <script>
    $(document).ready(function() {
        $(".select2").select2();
        $('.datepicker').datepicker();
        $('#dataTables-example').DataTable({
            "language": {
                "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Tampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext":     "Selanjutnya",
                    "sLast":     "Terakhir"
                }
                },
                        'paging'      : true,
                        'lengthChange': true,
                        'searching'   : true,
                        'ordering'    : true,
                        'info'        : true,
                        'autoWidth'   : true,
                        dom: 'Bfrtip',
            responsive: true
        });
        var table= $('#dataTables-export').DataTable( {
            "language": {
                "sEmptyTable":	 "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing":   "Sedang memproses...",
                "sLengthMenu":   "Tampilkan _MENU_ entri",
                "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix":  "",
                "sSearch":       "Cari:",
                "sUrl":          "",
                "oPaginate": {
                    "sFirst":    "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext":     "Selanjutnya",
                    "sLast":     "Terakhir"
                }
                },
            dom: 'Bfrtip',
            buttons: [
                            {
                                text: '<i class="fa fa-lg fa-print"></i> Cetak',
                                extend: 'print',
                                className: 'btn btn-success'
                            }
                        ],

        } );
        $.fn.dataTableExt.afnFiltering.push(
            function( oSettings, aData, iDataIndex ) {

                var grab_daterange = $("#date_range").val();
                // var give_results_daterange = grab_daterange.split(" to ");
                var filterstart = $('#min').val();
                var filterend = $('#max').val();
                var iStartDateCol = 2; //using column 2 in this instance
                var iEndDateCol = 2;
                var tabledatestart = aData[iStartDateCol];
                var tabledateend= aData[iEndDateCol];

                if ( filterstart == "" && filterend == "" )
                {
                    return true;
                }
                else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && filterend === "")
                {
                    return true;
                }
                else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isAfter(tabledatestart)) && filterstart === "")
                {
                    return true;
                }
                else if ((moment(filterstart).isSame(tabledatestart) || moment(filterstart).isBefore(tabledatestart)) && (moment(filterend).isSame(tabledateend) || moment(filterend).isAfter(tabledateend)))
                {
                    return true;
                }
                return false;
            }
            );
        $('.datepicker').datepicker()
        .on('change', function(e) {
            // `e` here contains the extra attributes
            table.draw();
        });
        $('[name="date"]').on('change',function(){
             table.draw();
        });
        // $('#min').keyup( function() { table.draw(); } );
        // $('#max').keyup( function() { table.draw(); } );
        var base_url = '<?=base_url();?>';
        // console.log(base_url)
        initValidatorStyle();
    });

    function initValidatorStyle(){
    $.validator.setDefaults({
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            }else if (element.hasClass('select2')) {     
                error.insertAfter(element.next('span'));
            }else {
                error.insertAfter(element);
            }
        }
    });
}
    </script>

</body>

</html>
