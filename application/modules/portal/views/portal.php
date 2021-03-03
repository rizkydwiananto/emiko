<section class="content-header">
	<h1><?php echo $title; ?></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Portal</a></li>
		<li><a href="#"> <?php echo $title; ?></a></li>
	</ol>
</section>

<?php
	$data_banyak_brg = $this->M_portal->data_banyak_brg();
?>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="row">

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-red"><i class="ion ion-coffee"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Total Menu Minuman</span>
							<span class="info-box-number"><?php echo $total_menu; ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->

				<!-- fix for small devices only -->
				<div class="clearfix visible-sm-block"></div>

				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-green"><i class="ion ion-android-cart"></i></span>

						<div class="info-box-content">
							<?php
							date_default_timezone_set('Asia/Jakarta');
							$tgl = date('Y-m-d');
							?>
							<span class="info-box-text">Penjualan <?php echo $this->M_portal->bulanThn($tgl); ?></span>
							<span class="info-box-number">Rp. <?php echo number_format($total_penjualan_bln_ini,0,'.','.'); ?> ,-</span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="info-box">
						<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

						<div class="info-box-content">
							<span class="info-box-text">Total User</span>
							<span class="info-box-number"><?php echo $total_user; ?></span>
						</div>
						<!-- /.info-box-content -->
					</div>
					<!-- /.info-box -->
				</div>
				<!-- /.col -->
			</div>
		</div>

		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Data Penjualan Tahun <?php echo date('Y'); ?></h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="chart">
						<canvas id="areaChart" style="height:250px"></canvas>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Kopi Terlaris</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<canvas id="pieChart" style="height:250px"></canvas>
				</div>
			</div>
		</div>
	</div>

</section>
<!-- /.content -->
<script>
	$(function () {
		/* ChartJS
		 * -------
		 * Here we will create a few charts using ChartJS
		 */

		//--------------
		//- AREA CHART -
		//--------------

		// Get context with jQuery - using jQuery's .get() method.
		var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
		// This will get the first returned node in the jQuery collection.
		var areaChart       = new Chart(areaChartCanvas)

		var areaChartData = {
			labels  : ['JAN', 'FEB', 'MAR', 'APR', 'MEI', 'JUN', 'JUL', 'AGS', 'SEP', 'OKT', 'NOV', 'DES'],
			datasets: [
				{
					label               : 'Data Penjualan',
					fillColor           : 'rgba(60,141,188,0.9)',
					strokeColor         : 'rgba(60,141,188,0.8)',
					pointColor          : '#3b8bba',
					pointStrokeColor    : 'rgba(60,141,188,1)',
					pointHighlightFill  : '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data                : [
						<?php echo $this->M_portal->penjualan_per_bln(1);?>,
						<?php echo $this->M_portal->penjualan_per_bln(2);?>,
						<?php echo $this->M_portal->penjualan_per_bln(3);?>,
						<?php echo $this->M_portal->penjualan_per_bln(4);?>,
						<?php echo $this->M_portal->penjualan_per_bln(5);?>,
						<?php echo $this->M_portal->penjualan_per_bln(6);?>,
						<?php echo $this->M_portal->penjualan_per_bln(7);?>,
						<?php echo $this->M_portal->penjualan_per_bln(8);?>,
						<?php echo $this->M_portal->penjualan_per_bln(9);?>,
						<?php echo $this->M_portal->penjualan_per_bln(10);?>,
						<?php echo $this->M_portal->penjualan_per_bln(11);?>,
						<?php echo $this->M_portal->penjualan_per_bln(12);?>,
					]
				}
			]
		}

		var areaChartOptions = {
			//Boolean - If we should show the scale at all
			showScale               : true,
			//Boolean - Whether grid lines are shown across the chart
			scaleShowGridLines      : false,
			//String - Colour of the grid lines
			scaleGridLineColor      : 'rgba(0,0,0,.05)',
			//Number - Width of the grid lines
			scaleGridLineWidth      : 1,
			//Boolean - Whether to show horizontal lines (except X axis)
			scaleShowHorizontalLines: true,
			//Boolean - Whether to show vertical lines (except Y axis)
			scaleShowVerticalLines  : true,
			//Boolean - Whether the line is curved between points
			bezierCurve             : true,
			//Number - Tension of the bezier curve between points
			bezierCurveTension      : 0.3,
			//Boolean - Whether to show a dot for each point
			pointDot                : false,
			//Number - Radius of each point dot in pixels
			pointDotRadius          : 4,
			//Number - Pixel width of point dot stroke
			pointDotStrokeWidth     : 1,
			//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
			pointHitDetectionRadius : 20,
			//Boolean - Whether to show a stroke for datasets
			datasetStroke           : true,
			//Number - Pixel width of dataset stroke
			datasetStrokeWidth      : 2,
			//Boolean - Whether to fill the dataset with a color
			datasetFill             : true,
			//String - A legend template
			legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
			//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
			maintainAspectRatio     : true,
			//Boolean - whether to make the chart responsive to window resizing
			responsive              : true
		}

		//Create the line chart
		areaChart.Line(areaChartData, areaChartOptions)


		//-------------
		//- PIE CHART -
		//-------------
		// Get context with jQuery - using jQuery's .get() method.
		var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
		var pieChart       = new Chart(pieChartCanvas)
		var PieData        = [
			{
				value    : <?php echo $data_banyak_brg[0]['qty']; ?>,
				color    : '#f56954',
				highlight: '#f56954',
				label    : '<?php echo $this->M_portal->get_nm_kopi($data_banyak_brg[0]['id_hrg_kopi']); ?>'
			},
			{
				value    : <?php echo $data_banyak_brg[1]['qty']; ?>,
				color    : '#00a65a',
				highlight: '#00a65a',
				label    : '<?php echo $this->M_portal->get_nm_kopi($data_banyak_brg[1]['id_hrg_kopi']); ?>'
			},
			{
				value    : <?php echo $data_banyak_brg[2]['qty']; ?>,
				color    : '#f39c12',
				highlight: '#f39c12',
				label    : '<?php echo $this->M_portal->get_nm_kopi($data_banyak_brg[2]['id_hrg_kopi']); ?>'
			},
			{
				value    : <?php echo $data_banyak_brg[3]['qty']; ?>,
				color    : '#00c0ef',
				highlight: '#00c0ef',
				label    : '<?php echo $this->M_portal->get_nm_kopi($data_banyak_brg[3]['id_hrg_kopi']); ?>'
			},
			{
				value    : <?php echo $data_banyak_brg[4]['qty']; ?>,
				color    : '#3c8dbc',
				highlight: '#3c8dbc',
				label    : '<?php echo $this->M_portal->get_nm_kopi($data_banyak_brg[4]['id_hrg_kopi']); ?>'
			}
		]
		var pieOptions     = {
			//Boolean - Whether we should show a stroke on each segment
			segmentShowStroke    : true,
			//String - The colour of each segment stroke
			segmentStrokeColor   : '#fff',
			//Number - The width of each segment stroke
			segmentStrokeWidth   : 2,
			//Number - The percentage of the chart that we cut out of the middle
			percentageInnerCutout: 50, // This is 0 for Pie charts
			//Number - Amount of animation steps
			animationSteps       : 100,
			//String - Animation easing effect
			animationEasing      : 'easeOutBounce',
			//Boolean - Whether we animate the rotation of the Doughnut
			animateRotate        : true,
			//Boolean - Whether we animate scaling the Doughnut from the centre
			animateScale         : false,
			//Boolean - whether to make the chart responsive to window resizing
			responsive           : true,
			// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
			maintainAspectRatio  : true,
			//String - A legend template
			legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
		}
		//Create pie or douhnut chart
		// You can switch between pie and douhnut using the method below.
		pieChart.Doughnut(PieData, pieOptions)
	})
</script>
