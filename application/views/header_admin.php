<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>emiko | Electronic Masino's Coffee :: <?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/plugins/iCheck/all.css">
    <!-- Ionicons -->
	<link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/Ionicons/css/ionicons.min.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- DataTables -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/select2/dist/css/select2.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/back/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/dist/css/AdminLTE.min.css" type="text/css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/dist/css/skins/_all-skins.css" type="text/css">
    <!-- Favicon -->
    <link href="<?=base_url()?>assets/back/images/logo/logo.ico" rel="shortcut icon" />
    <!-- Pace style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/back/plugins/pace/pace.css">

    <!-- jQuery 2.2.3 -->
    <script src="<?=base_url()?>assets/back/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?=base_url()?>assets/back/bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="<?=base_url()?>assets/back/bower_components/select2/dist/js/select2.min.js"></script>
    <!-- PACE -->
    <script src="<?=base_url()?>assets/back/plugins/pace/pace.min.js"></script>
    <!-- date-range-picker -->
    <script src="<?=base_url()?>assets/back/bower_components/moment/min/moment.min.js"></script>
    <script src="<?=base_url()?>assets/back/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?=base_url()?>assets/back/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="<?=base_url()?>assets/back/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url()?>assets/back/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url()?>assets/back/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/back/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?=base_url()?>assets/back/plugins/iCheck/icheck.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/back/dist/js/app.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/back/dist/js/Adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url()?>assets/back/dist/js/demo.js"></script>
    <!-- fullCalendar -->
    <script src="<?=base_url()?>assets/back/bower_components/moment/moment.js"></script> <!--jangan dihapus bareng sama fullcalendar-->
    <script src="<?=base_url()?>assets/back/bower_components/fullcalendar/dist/fullcalendar.js"></script> <!--jangan dihapus bareng sama fullcalendar-->
    <!-- ChartJS -->
    <script src="<?=base_url();?>assets/back/bower_components/chart.js/Chart.js"></script>

</head>

<style type="text/css">
	#belakang{
		background-image: linear-gradient(to right, #875f39, #714D2B, #704D25, #3A1910)
	}
</style>

<body class="hold-transition skin-brown sidebar-mini">
<div class="wrapper">

    <header class="main-header" id="belakang">
        <!-- Logo -->
        <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><i>e<b>MK</b></i></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><i>e-Miko</i></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top" id="belakang">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" alt="Profil>
                            <span class="hidden-xs"><i class="fa fa-user-o"></i> <?php echo $this->session->userdata("user_nm"); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?=base_url()?>assets/back/images/coffee.png" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $this->session->userdata("nm_user"); ?><br>
                                    <?php echo $this->session->userdata("nm_user_akses"); ?><br>
                                </p>
                            </li>

                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" alt="Logout>
                            <span class="hidden-xs"><i class="fa fa-sign-out"></i> Sign Out</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- Menu Footer-->
                            <li class="user-footer" style="background-color: black">
                                <div style="text-align: center">
                                    <a href="<?=base_url();?>home/out">
                                        <button type="button" class="btn btn-danger">Sign Out</button>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?=base_url()?>assets/back/images/coffee.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Rizky Dwiananto <?php /*echo $this->session->userdata("person_nm");*/ ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

				<!--PORTAL-->
				<li class="header">PORTAL</li>
				<!--DASHBOARD-->
				<li class="treeview
				<?php
				if ($title == 'Portal') { echo "active";}
				?>
				">
					<a href="#">
						<i class="fa fa-dashboard"></i>
						<span>Portal</span>
						<span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url();?>portal"><i class="fa fa-circle-o"></i> Portal</a></li>
					</ul>
				</li>
				<!--DASHBOARD-->
				<!--PORTAL-->

				<!--KASIR-->
				<li class="header">KASIR</li>
				<!--KASIR-->
				<li class="treeview
				<?php
				if ($title == 'Kasir') { echo "active";}
				elseif ($title == 'Data Penjualan') { echo "active";}
				?>
				">
					<a href="#">
						<i class="fa fa-shopping-cart"></i>
						<span>Kasir</span>
						<span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url();?>kasir"><i class="fa fa-circle-o"></i> Kasir</a></li>
						<li><a href="<?=base_url();?>kasir/data_penjualan"><i class="fa fa-circle-o"></i> Data Penjualan</a></li>
					</ul>
				</li>
				<!--KASIR-->
				<!--KASIR-->

				<?php if ($_SESSION['nm_user'] == 'admin') { ?>

				<!--PENGATURAN EMIKO-->
				<li class="header">PENGATURAN</li>

				<!--USER-->
				<li class="treeview
				<?php
				if ($title == 'Data Akses') { echo "active";}
				elseif ($title == 'Data User') { echo "active";}
				?>
				">
					<a href="#">
						<i class="fa fa-users"></i>
						<span>User</span>
						<span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url();?>user/user_all"><i class="fa fa-circle-o"></i> Data User</a></li>
						<li><a href="<?=base_url();?>user/akses"><i class="fa fa-circle-o"></i> Data Akses</a></li>
					</ul>
				</li>
				<!--USER-->

				<!--MENU-->
				<li class="treeview
				<?php
					if ($title == 'Data Harga Kopi') { echo "active";}
				?>
				">
					<a href="#">
						<i class="fa fa-list-alt"></i>
						<span>Menu</span>
						<span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url();?>pengaturan/hargaKopi"><i class="fa fa-circle-o"></i> Data Harga Kopi</a></li>
					</ul>
				</li>
				<!--MENU-->

				<!--SPESIFIKASI-->
				<li class="treeview
				<?php
					if ($title == 'Data Jenis Kopi') { echo "active";}
					elseif ($title == 'Data Ukuran') { echo "active";}
					elseif ($title == 'Data Ekstra') { echo "active";}
					elseif ($title == 'Data Pemanis') { echo "active";}
					elseif ($title == 'Data Tempat') { echo "active";}
				?>
				">
					<a href="#">
						<i class="fa fa-puzzle-piece"></i>
						<span>Spesifikasi</span>
						<span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url();?>pengaturan/jenisKopi"><i class="fa fa-circle-o"></i> Data Jenis Kopi</a></li>
						<li><a href="<?=base_url();?>pengaturan/pemanis"><i class="fa fa-circle-o"></i> Data Pemanis</a></li>
						<li><a href="<?=base_url();?>pengaturan/ukuran"><i class="fa fa-circle-o"></i> Data Ukuran</a></li>
						<li><a href="<?=base_url();?>pengaturan/tempat"><i class="fa fa-circle-o"></i> Data Tempat</a></li>
						<li><a href="<?=base_url();?>pengaturan/ekstra"><i class="fa fa-circle-o"></i> Data Ekstra</a></li>
					</ul>
				</li>
				<!--SPESIFIKASI-->

				<!--SPESIFIKASI-->
				<li class="treeview
				<?php
				if ($title == 'Data Jenis Pembayaran') { echo "active";}
				elseif ($title == 'Data Jenis Kartu') { echo "active";}
				?>
				">
					<a href="#">
						<i class="fa fa-money"></i>
						<span>Pembayaran</span>
						<span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?=base_url();?>pengaturan/jenisPembayaran"><i class="fa fa-circle-o"></i> Data Jenis Pembayaran</a></li>
						<li><a href="<?=base_url();?>pengaturan/jenisKartu"><i class="fa fa-circle-o"></i> Data Jenis Kartu</a></li>
					</ul>
				</li>
				<!--SPESIFIKASI-->

				<!--PENGATURAN-->
				<?php } ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <style type="text/css">
        #bck{
            background: linear-gradient(#eff2f6, #dee5ed, #dee5ed, #dee5ed, #bccadc, #adbed2);
        }
    </style>
    <div class="content-wrapper" id="bck">
        <?php $this->load->view($view) ?>
    </div>
    <!-- /.content-wrapper -->

    <?php
    date_default_timezone_set('Asia/Jakarta');
    $year = date('Y');
    if ($year == 2020){
        $year = 2020;
    } else {
        $year = '2020 - '.date('Y');
    }
    ?>
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright © <?php echo $year; ?> | <a target="_blank" href="http://rizkydwiananto.com/">rizkydwiananto</a>
    </footer>
</div>
<!-- ./wrapper -->



<!-- TABLE -->
<script>
    $(function () {
        $('#example1').DataTable();
        $('#example3').DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        })



        var date = new Date();
        date.setDate(date.getDate() + 60);

        //TanggalKunjungan
        $('#tanggalkunjungan').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd',
            startDate: new Date(),
            endDate: date
        })

        // tanggaloperasi
        $('#tanggaloperasi').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            format: 'yyyy-mm-dd'
        })

        //Tanggal
        $('#tanggalpilih').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Tanggal
        $('#tanggalpilih1').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Date picker
        $('#datepicker').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Date picker

        $('#datepicker2').datepicker({
            orientation: "bottom",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            todayHighlight: true,
            format: 'yyyy-mm-dd'
        })

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false,
            format: 'h:i:s a'
        })

        //Timepicker
        $('.timepicker2').timepicker({
            showInputs: false,
            format: 'h:i:s a'
        })

        //Initialize Select2 Elements
        $('.select2').select2();

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
        })
    });
</script>

<!-- LOADING PACE (yang loading jalan diatas) -->
<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function () {
        Pace.restart()
    })
    $('.ajax').click(function () {
        $.ajax({
            url: '#', success: function (result) {
                $('.ajax-content').html('<hr>Ajax Request Completed !')
            }
        })
    })
</script>


</body>
</html>
