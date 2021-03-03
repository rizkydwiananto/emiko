<?php
date_default_timezone_set('Asia/Jakarta');
$tgl = date('Y-m-d');
?>
<section class="content-header">
	<h1><?php echo $title; ?> | <?php echo $this->M_kasir->tanggal_indo($tgl, true); ?></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-shopping-cart"></i> Kasir</a></li>
		<li><a href="#"> <?php echo $title; ?></a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-success">
		<div class="box-header">
			<div class="row">
				<div class="col-md-6">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-search"></i> Cari Penjualan</button> &nbsp;
					<a href="<?=base_url();?>kasir/export_excel/<?php echo $tgl; ?>/<?php echo $tgl; ?>/0">
						<button type="button" class="btn btn-success"><i class="fa fa-download"></i></button>
					</a>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydatapenjualan" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Tanggal</th>
					<th style="text-align: center">Waktu</th>
					<th style="text-align: center">No. Nota/Struk</th>
					<th style="text-align: center">Pembayaran</th>
					<th style="text-align: center">Total Harga</th>
					<th style="text-align: center">Pemesan</th>
					<th style="text-align: center">Kasir</th>
					<th style="text-align: center">Print</th>
					<?php if ($_SESSION['nm_user'] == 'admin') { ?>
					<th style="text-align: center">Hapus</th>
					<?php } ?>
				</tr>
				</thead>

				<tbody id="show_data_penjualan">

				</tbody>
			</table>
		</div>

		<!--CARI DATA PENJUALAN-->
		<div class="modal fade" id="tambahdata">
			<div class="modal-dialog">
				<form method="post" action="<?=base_url();?>kasir/proses_cari_penjualan" enctype="multipart/form-data">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Tambah Jenis Kartu</h4>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>Tanggal Awal</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="tanggalpilih" name="tgl_awal" required>
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Tanggal Akhir</label>
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="tanggalpilih1" name="tgl_akhir" required>
											</div>
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<label>Nomor Struk / Nota</label>
											<input class="form-control" type="text" name="no_struk" placeholder="Input Nomor Struk ..."/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-success" id="btn_simpan">Cari Penjualan</button>
					</div>
				</div>
				</form>
				<!-- /.modal-content -->
			</div>
		</div>
		<!--CARI DATA PENJUALAN-->

		<!--MODAL HAPUS-->
		<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
						<h4 class="modal-title" id="myModalLabel">Hapus Data Penjualan</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="no_struk" id="no_struk" value="">
							<div class="alert alert-danger" id="no_struk_det"></div>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
							<button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--END MODAL HAPUS-->

	</div>
</section>
<!-- /.content -->

<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_penjualan();

		//fungsi tampil data Penjualan
		function tampil_data_penjualan(){
			$.ajax({
				url : '<?=base_url();?>kasir/dataPenjualan',
				type : 'GET',
				async : true,
				dataType : 'json',
				success : function(data){
					console.log(data);
					var html = '';
					var no = 0;
					var i;
					var jns_pembayaran = '';
					var url = '<?=base_url();?>kasir/cetak_struk';
					for(i=0; i<data.length; i++){

						if (data[i].id_jns_pembayaran == 1) {
							jns_pembayaran = data[i].jns_pembayaran_tunai;
						} else {
							jns_pembayaran = data[i].jns_pembayaran_kartu;
						}

						no++;
						html += '<tr>'+
							'<td>'+no+'</td>'+
							'<td>'+data[i].tgl+'</td>'+
							'<td>'+data[i].wkt+'</td>'+
							'<td>'+data[i].no_struk+'</td>'+
							'<td>'+jns_pembayaran+'</td>'+
							'<td>'+data[i].ttl_hrg+'</td>'+
							'<td>'+data[i].pemesan+'</td>'+
							'<td>'+data[i].nm_user+'</td>'+
							'<td style="text-align:center;">'+
							'<a href="'+url+'/'+data[i].no_struk+'" class="btn btn-success"><i class="fa fa-print"></i></a>'+
							'</td>'+
							<?php if ($_SESSION['nm_user'] == 'admin') { ?>
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].no_struk+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							<?php } ?>
							'</tr>';
					}
					$('#show_data_penjualan').html(html);
					$('#mydatapenjualan').DataTable({
						retrieve: true,
						paging: true,
						searching: true
					});
				}
			});
		}

		//fungsi refresh
		function refreshPage() {
			location.reload(true);
		}

		//Keluar Modal dan refresh
		$('.modal').on('hidden.bs.modal', function () {
			tampil_data_penjualan(refreshPage(),1000);
		});

		//GET HAPUS
		$('#show_data_penjualan').on('click','.hapus_data',function(){
			var no_struk=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('kasir/get_penjualan')?>",
				dataType : "JSON",
				data : {no_struk:no_struk},
				success: function(data){
					$.each(data,function(no_struk){
						$('#ModalHapus').modal('show');
						$('[name="no_struk"]').val(data.no_struk);
						$('[id="no_struk_det"]').html('<p>Apakah Anda yakin mau menghapus Penjualan dengan nomor struk <b>"<u>'+data.no_struk+'</u>"</b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Jenis Kartu
		$('#btn_hapus').on('click',function(){
			var no_struk=$('#no_struk').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('kasir/hapus_penjualan')?>",
				dataType : "JSON",
				data : {no_struk: no_struk},
				success: function(data){
					$('[name="no_struk"]').val("");
					$('[id="no_struk_det"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_penjualan(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
