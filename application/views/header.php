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
	<link href="<?=base_url()?>assets/back/ionic-v.4.5.4/ionicons.min.css" rel="stylesheet">
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
	<script src=".<?=base_url()?>assets/back/bower_components/moment/min/moment.min.js"></script>
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

<body>

<?php $this->load->view($view) ?>

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
