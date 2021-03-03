<?php
date_default_timezone_set('Asia/Jakarta');
$tgl = date('Y-m-d');
?>
<section class="content-header">
	<h1><?php echo $title; ?></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-shopping-cart"></i> Kasir</a></li>
		<li><a href="#"> <?php echo $title; ?></a></li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="row">

				<div class="col-md-4">
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Penjualan Hari Ini | <?php echo $this->M_kasir->tanggal_indo($tgl, true); ?></h3>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>

						<form class="form-horizontal">
							<div class="box-body">
								<div class="form-group">
									<label class="col-sm-4 control-label">Total Pendapatan</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" readonly value="Rp. <?php echo number_format($total_pendapatan_hrini,0,'.','.'); ?> ,-">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label">Total Item</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" readonly value="<?php echo $total_item_hrini; ?>">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>

				<form action="<?=base_url();?>kasir/tambah_proses_penjualan" method="post" enctype="multipart/form-data">
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<div class="box box-success">
								<div class="box-header with-border">
									<h3 class="box-title">Keranjang</h3>

									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
									</div>
								</div>

								<div class="box-body">
									<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-cart-plus"></i>&nbsp; Tambah Barang</button>
									<br>
									<br>
									<div class="box-body table-responsive padding">
										<table class="table table-striped" style="font-size: 16px">
											<thead>
											<tr>
												<th style="text-align: center; width: 10px">No</th>
												<th style="text-align: center" colspan="2">Barang</th>
												<th style="width: 15px">Qty</th>
												<th style="width: 15px">&times;</th>
												<th style="text-align: center">Harga</th>
												<th style="text-align: center">Total</th>
												<th style="width: 15px; text-align: center"><i class="fa fa-edit"></i></th>
												<th style="width: 15px; text-align: center"><i class="fa fa-close"></i></th>
											</tr>
											</thead>
											<tbody id="show_data_kasir">

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12" style="display: none" id="subtotal">
							<div class="box box-success">
								<div class="box-body table-responsive padding">
									<table class="table table-striped">
										<tbody>
										<tr>
											<td colspan="3" style="width: 210px; text-align: right; font-size: 19px"><b>SUB TOTAL &nbsp; <i class="fa fa-arrow-right"></i></b></td>
											<td style="width: 400px; text-align: right; font-size: 19px; letter-spacing: 2px"><b><?php echo $sub_total;?></b> <input type="hidden" name="ttl_hrg" value="<?php echo $sub_total;?>"></td>
										</tr>
										</tbody>
									</table>
								</div>

								<div class="box-body">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-3">
													<div class="form-group">
														<select name="id_jns_pembayaran" id="id_jns_pembayaran" class="form-control select2" style="width: 100%;" required>
															<option value="" selected>- Pilih Jenis Bayar -</option>
															<?php foreach ($jns_pembayaran as $list_jns_pembayaran) {?>
																<option value="<?php echo $list_jns_pembayaran['id_jns_pembayaran'];?>"><?php echo $list_jns_pembayaran['nm_jns_pembayaran'];?></option>
															<?php } ?>
														</select>
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<select name="id_jns_kartu" id="id_jns_kartu" class="form-control select2" style="width: 100%;" required></select>
													</div>
												</div>

												<div class="col-md-3">
													<div class="form-group">
														<input class="form-control" type="text" name="pemesan" placeholder="Tulis pemesan ..." required/>
													</div>
												</div>

												<div class="col-md-3">
													<div id="masukkan"></div>
												</div>
												<br>
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<button type="submit" class="form-control btn btn-success">
													<i class="fa fa-money"></i> &nbsp; BAYAR
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</form>

			</div>
		</div>
	</div>

	<!--TAMBAH DATA JENIS KOPI-->
	<div class="modal fade" id="tambahdata">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Tambah Barang</h4>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<div class="form-group">
							<label class="control-label col-xs-3" >Jenis Kopi</label>
							<div class="col-xs-9">
								<select name="id_jns_kopi" id="id_jns_kopi" class="form-control select2" style="width: 80%;" required>
									<option value="" selected>- Pilih -</option>
									<?php foreach ($jnsKopi as $list_jnsKopi) {?>
										<option value="<?php echo $list_jnsKopi['id_jns_kopi'];?>"><?php echo $list_jnsKopi['nm_jns_kopi'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Pemanis</label>
							<div class="col-xs-9">
								<select name="id_pemanis" id="id_pemanis" class="form-control select2" style="width: 80%;" required>
									<option value="" selected>- Pilih -</option>
									<?php foreach ($pemanis as $list_pemanis) {?>
										<option value="<?php echo $list_pemanis['id_pemanis'];?>"><?php echo $list_pemanis['nm_pemanis'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Ukuran</label>
							<div class="col-xs-9">
								<select name="id_ukuran" id="id_ukuran" class="form-control select2" style="width: 80%;" required>
									<option value="" selected>- Pilih -</option>
									<?php foreach ($ukuran as $list_ukuran) {?>
										<option value="<?php echo $list_ukuran['id_ukuran'];?>"><?php echo $list_ukuran['nm_ukuran'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Tempat</label>
							<div class="col-xs-9">
								<select name="id_tempat" id="id_tempat" class="form-control select2" style="width: 80%;" required>
									<option value="" selected>- Pilih -</option>
									<?php foreach ($tempat as $list_tempat) {?>
										<option value="<?php echo $list_tempat['id_tempat'];?>"><?php echo $list_tempat['nm_tempat'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Ekstra</label>
							<div class="col-xs-9">
								<select name="id_ekstra" id="id_ekstra" class="form-control select2" style="width: 80%;" required>
									<option value="" selected>- Pilih -</option>
									<?php foreach ($ekstra as $list_ekstra) {?>
										<option value="<?php echo $list_ekstra['id_ekstra'];?>"><?php echo $list_ekstra['nm_ekstra'];?></option>
									<?php } ?>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Harga</label>
							<div class="col-xs-9">
								<input name="hrg_kopi" id="hrg_kopi" class="form-control" readonly type="text" placeholder="Harga Kopi" style="width:80%;" required>
								<input name="id_hrg_kopi" id="id_hrg_kopi" class="form-control" readonly type="hidden" placeholder="id Harga Kopi" style="width:335px;" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3">Qty</label>
							<div class="col-xs-9">
								<input name="qty" id="qty" class="form-control" type="text" placeholder="Qty" style="width:80%;" required>
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button style="display: none" class="btn btn-success" id="btn_simpan">Tambah</button>
					</div>
				</form>
			</div>
			<!-- /.modal-content -->
		</div>
	</div>
	<!--TAMBAH DATA JENIS KOPI-->

	<!-- MODAL EDIT -->
	<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 class="modal-title" id="myModalLabel">Edit Keranjang</h3>
				</div>
				<form class="form-horizontal">
					<div class="modal-body">

						<div class="form-group" style="display: none">
							<label class="control-label col-xs-3" >ID Keranjang</label>
							<div class="col-xs-9">
								<input name="id_keranjang" id="id_keranjang2" class="form-control" type="text" placeholder="ID Keranjang" style="width:335px;" readonly>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Jenis Kopi</label>
							<div class="col-xs-9">
								<select name="id_jns_kopi" id="id_jns_kopi2" class="form-control select2" style="width: 80%;" required></select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Pemanis</label>
							<div class="col-xs-9">
								<select name="id_pemanis" id="id_pemanis2" class="form-control select2" style="width: 80%;" required></select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Ukuran</label>
							<div class="col-xs-9">
								<select name="id_ukuran" id="id_ukuran2" class="form-control select2" style="width: 80%;" required></select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Tempat</label>
							<div class="col-xs-9">
								<select name="id_tempat" id="id_tempat2" class="form-control select2" style="width: 80%;" required></select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Ekstra</label>
							<div class="col-xs-9">
								<select name="id_ekstra" id="id_ekstra2" class="form-control select2" style="width: 80%;" required></select>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3" >Harga</label>
							<div class="col-xs-9">
								<input name="hrg_kopi" id="hrg_kopi2" class="form-control" readonly type="text" placeholder="Harga Kopi" style="width:335px;" required>
								<input name="id_hrg_kopi" id="id_hrg_kopi2" class="form-control" readonly type="hidden" placeholder="id Harga Kopi" style="width:335px;" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-3">Qty</label>
							<div class="col-xs-9">
								<input name="qty" id="qty2" class="form-control" type="text" placeholder="Qty" style="width:335px;" required>
							</div>
						</div>

					</div>

					<div class="modal-footer">
						<button class="btn btn-info" id="btn_update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--END MODAL EDIT-->
</section>

<script type="text/javascript">
	$(document).ready(function () {

		tampil_data_kasir();

		//fungsi tampil data kasir
		function tampil_data_kasir(){
			$.ajax({
				url : '<?=base_url();?>kasir/data_kasir',
				type : 'GET',
				async : true,
				dataType : 'json',
				success : function(data){
					console.log(data);
					var html = '';
					var no = 0;
					var i;

					if (data.response != null) {
						html += '<tr><td colspan="8" style="text-align: center">'+data.response+' <i class="fa fa-frown-o"></i></td></tr>';
						//$('#pembayaran').fadeOut();
						$('#subtotal').fadeOut();

					} else {
						for(i=0; i<data.length; i++){
							no++;
							html += '<tr>'+
								'<td>'+no+' <input type="hidden" name="id_hrg_kopi[]" value="'+data[i].id_hrg_kopi+'" /> <input type="hidden" name="id_user[]" value="'+data[i].id_user+'" /></td>'+
								'<td colspan="2">'+data[i].nm_jns_kopi+' '+data[i].nm_pemanis+' '+data[i].nm_ukuran+' '+data[i].nm_tempat+' '+data[i].nm_ekstra+'</td>'+
								'<td>'+data[i].qty+' <input type="hidden" name="qty[]" value="'+data[i].qty+'" /></td>'+
								'<td>&times;</td>'+
								'<td style="text-align: right; letter-spacing: 2px">'+data[i].hrg_kopi+' <input type="hidden" name="hrg_kopi[]" value="'+data[i].hrg_kopi+'" /></td>'+
								'<td style="text-align: right; letter-spacing: 2px">'+data[i].hrg_x_qty+' <input type="hidden" name="hrg_x_qty[]" value="'+data[i].hrg_x_qty+'" /></td>'+
								'<td style="text-align:center;">'+
								'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_keranjang+'"><i class="fa fa-edit"></i></a>'+
								'</td>'+
								'<td style="text-align:center;">'+
								'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_keranjang+'"><i class="fa fa-close"></i></a>'+
								'</td>'+
								'</tr>';
						}
						//$('#pembayaran').fadeIn();
						$('#subtotal').fadeIn();
					}
					$('#show_data_kasir').html(html);
				}
			});
		}

		//fungsi refresh
		function refreshPage() {
			location.reload(true);
		}

		/*jenis pembayaran*/
		$('#id_jns_pembayaran').change(function () {
			var id_jns_pembayaran=$('#id_jns_pembayaran').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_jns_kartu')?>",
				dataType : "JSON",
				data : {id_jns_pembayaran:id_jns_pembayaran},
				success: function (data) {
					console.log(data);
					var html = '';
					var masukkan = '';
					var no = 0;
					var i;

					for(i=0; i<data.length; i++){
						no++;
						html += '<option value="'+data[i].id_jns_kartu+'">'+data[i].nm_jns_kartu+'</option>';
					}

					if (id_jns_pembayaran == 1) {
						masukkan = '<input style="text-align: right; font-size: 19px" class="form-control" type="number" name="cash" value="" placeholder="Input Pembayaran ..." required>';
					} else {
						masukkan = '<input style="text-align: right; font-size: 19px" class="form-control" type="text" name="nokartu" value="" placeholder="Input Nomor Kartu ..." required> <input type="hidden" name="cash" value="0">';
					}

					$('#id_jns_kartu').html(html);
					$('#masukkan').html(masukkan);
				}
			})
		});
		/*jenis pembayaran*/

		/*id_ekstra*/
		$('#id_ekstra').change(function () {
			var id_jns_kopi=$('#id_jns_kopi').val();
			var id_pemanis=$('#id_pemanis').val();
			var id_ukuran=$('#id_ukuran').val();
			var id_tempat=$('#id_tempat').val();
			var id_ekstra=$('#id_ekstra').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis, id_ukuran:id_ukuran, id_tempat:id_tempat, id_ekstra:id_ekstra},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').show();
					}
				}
			})
		});

		$('#id_ekstra2').change(function () {
			var id_jns_kopi2=$('#id_jns_kopi2').val();
			var id_pemanis2=$('#id_pemanis2').val();
			var id_ukuran2=$('#id_ukuran2').val();
			var id_tempat2=$('#id_tempat2').val();
			var id_ekstra2=$('#id_ekstra2').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi2, id_pemanis:id_pemanis2, id_ukuran:id_ukuran2, id_tempat:id_tempat2, id_ekstra:id_ekstra2},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').show();
					}
				}
			})
		});
		/*END id_ekstra*/

		/*id_jns_kopi*/
		$('#id_jns_kopi').change(function () {
			var id_jns_kopi=$('#id_jns_kopi').val();
			var id_pemanis=$('#id_pemanis').val();
			var id_ukuran=$('#id_ukuran').val();
			var id_tempat=$('#id_tempat').val();
			var id_ekstra=$('#id_ekstra').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis, id_ukuran:id_ukuran, id_tempat:id_tempat, id_ekstra:id_ekstra},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').show();
					}
				}
			})
		});

		$('#id_jns_kopi2').change(function () {
			var id_jns_kopi2=$('#id_jns_kopi2').val();
			var id_pemanis2=$('#id_pemanis2').val();
			var id_ukuran2=$('#id_ukuran2').val();
			var id_tempat2=$('#id_tempat2').val();
			var id_ekstra2=$('#id_ekstra2').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi2, id_pemanis:id_pemanis2, id_ukuran:id_ukuran2, id_tempat:id_tempat2, id_ekstra:id_ekstra2},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').show();
					}
				}
			})
		});
		/*END id_jns_kopi*/

		/*id_pemanis*/
		$('#id_pemanis').change(function () {
			var id_jns_kopi=$('#id_jns_kopi').val();
			var id_pemanis=$('#id_pemanis').val();
			var id_ukuran=$('#id_ukuran').val();
			var id_tempat=$('#id_tempat').val();
			var id_ekstra=$('#id_ekstra').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis, id_ukuran:id_ukuran, id_tempat:id_tempat, id_ekstra:id_ekstra},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').show();
					}
				}
			})
		});

		$('#id_pemanis2').change(function () {
			var id_jns_kopi2=$('#id_jns_kopi2').val();
			var id_pemanis2=$('#id_pemanis2').val();
			var id_ukuran2=$('#id_ukuran2').val();
			var id_tempat2=$('#id_tempat2').val();
			var id_ekstra2=$('#id_ekstra2').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi2, id_pemanis:id_pemanis2, id_ukuran:id_ukuran2, id_tempat:id_tempat2, id_ekstra:id_ekstra2},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').show();
					}
				}
			})
		});
		/*END id_pemanis*/

		/*id_ukuran*/
		$('#id_ukuran').change(function () {
			var id_jns_kopi=$('#id_jns_kopi').val();
			var id_pemanis=$('#id_pemanis').val();
			var id_ukuran=$('#id_ukuran').val();
			var id_tempat=$('#id_tempat').val();
			var id_ekstra=$('#id_ekstra').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis, id_ukuran:id_ukuran, id_tempat:id_tempat, id_ekstra:id_ekstra},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').show();
					}
				}
			})
		});

		$('#id_ukuran2').change(function () {
			var id_jns_kopi2=$('#id_jns_kopi2').val();
			var id_pemanis2=$('#id_pemanis2').val();
			var id_ukuran2=$('#id_ukuran2').val();
			var id_tempat2=$('#id_tempat2').val();
			var id_ekstra2=$('#id_ekstra2').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi2, id_pemanis:id_pemanis2, id_ukuran:id_ukuran2, id_tempat:id_tempat2, id_ekstra:id_ekstra2},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').show();
					}
				}
			})
		});
		/*END id_ukuran*/

		/*id_tempat*/
		$('#id_tempat').change(function () {
			var id_jns_kopi=$('#id_jns_kopi').val();
			var id_pemanis=$('#id_pemanis').val();
			var id_ukuran=$('#id_ukuran').val();
			var id_tempat=$('#id_tempat').val();
			var id_ekstra=$('#id_ekstra').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis, id_ukuran:id_ukuran, id_tempat:id_tempat, id_ekstra:id_ekstra},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="btn_simpan"]').show();
					}
				}
			})
		});

		$('#id_tempat2').change(function () {
			var id_jns_kopi2=$('#id_jns_kopi2').val();
			var id_pemanis2=$('#id_pemanis2').val();
			var id_ukuran2=$('#id_ukuran2').val();
			var id_tempat2=$('#id_tempat2').val();
			var id_ekstra2=$('#id_ekstra2').val();

			$.ajax({
				type : "POST",
				url : "<?php echo base_url('kasir/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi2, id_pemanis:id_pemanis2, id_ukuran:id_ukuran2, id_tempat:id_tempat2, id_ekstra:id_ekstra2},
				success: function (data) {
					console.log(data);

					if (data.hrg_kopi == null) {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').fadeOut('slow');
					} else  {
						$('[id="hrg_kopi2"]').val(data.hrg_kopi);
						$('[id="id_hrg_kopi2"]').val(data.id_hrg_kopi);
						$('[id="btn_update"]').show();
					}
				}
			})
		});
		/*END id_tempat*/

		//Simpan Data Kasir
		$('#btn_simpan').on('click',function(){
			var id_hrg_kopi=$('#id_hrg_kopi').val();
			var hrg_kopi=$('#hrg_kopi').val();
			var qty=$('#qty').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>kasir/simpan_kasir',
				dataType : "JSON",
				data : {id_hrg_kopi:id_hrg_kopi, hrg_kopi:hrg_kopi, qty:qty},
				success: function(data){
					$('[name="id_hrg_kopi"]').val("");
					$('[name="id_pemanis"]').val("");
					$('[name="id_ukuran"]').val("");
					$('[name="id_tempat"]').val("");
					$('[name="id_ekstra"]').val("");
					$('[name="hrg_kopi"]').val("");
					$('[name="qty').val("");
					$('#tambahdata').modal('hide');
					tampil_data_kasir(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//Update Kasir
		$('#btn_update').on('click',function(){
			var id_keranjang=$('#id_keranjang2').val();
			var id_hrg_kopi=$('#id_hrg_kopi2').val();
			var hrg_kopi=$('#hrg_kopi2').val();
			var qty=$('#qty2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('kasir/update_kasir')?>",
				dataType : "JSON",
				data : {id_keranjang:id_keranjang, id_hrg_kopi:id_hrg_kopi, hrg_kopi:hrg_kopi, qty:qty},
				success: function(data){
					$('[name="id_keranjang"]').val("");
					$('[name="id_hrg_kopi"]').val("");
					$('[name="id_jns_kopi"]').val("");
					$('[name="id_pemanis"]').val("");
					$('[name="id_ukuran"]').val("");
					$('[name="id_tempat"]').val("");
					$('[name="id_ekstra"]').val("");
					$('[name="hrg_kopi"]').val("");
					$('[name="qty"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_kasir(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//Hapus Data Kasir
		$('#show_data_kasir').on('click','.hapus_data',function(){
			var id_keranjang=$(this).attr('data');
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('kasir/hapus_keranjang')?>",
				dataType : "JSON",
				data : {id_keranjang:id_keranjang},
				success: function(data){
					$('[name="id_keranjang"]').val("");
					tampil_data_kasir(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_kasir').on('click','.edit_data',function(){
			var id_keranjang=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('kasir/get_kasir')?>",
				dataType : "JSON",
				data : {id_keranjang:id_keranjang},
				success: function(data){
					$.each(data,function(id_keranjang,id_hrg_kopi,hrg_kopi,qty,id_jns_kopi,nm_jns_kopi,id_ukuran,nm_ukuran,id_pemanis,nm_pemanis,id_tempat,nm_tempat,id_ekstra,nm_ekstra){
						$('#ModalaEdit').modal('show');
						$('[name="id_keranjang"]').val(data.id_keranjang);
						$('[name="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[name="hrg_kopi"]').val(data.hrg_kopi);
						$('[name="qty"]').val(data.qty);
						$('[name="id_jns_kopi"]').html('<option selected value="'+data.id_jns_kopi+'">'+data.nm_jns_kopi+'</option>'+
							<?php
							foreach ($jnsKopi as $list_jnsKopi) {?>
							'<option value="<?php echo $list_jnsKopi['id_jns_kopi'];?>"><?php echo $list_jnsKopi['nm_jns_kopi'];?></option>'+
							<?php } ?>
							'');

						$('[name="id_pemanis"]').html('<option selected value="'+data.id_pemanis+'">'+data.nm_pemanis+'</option>'+
							<?php
							foreach ($pemanis as $list_pemanis) {?>
							'<option value="<?php echo $list_pemanis['id_pemanis'];?>"><?php echo $list_pemanis['nm_pemanis'];?></option>'+
							<?php } ?>
							'');

						$('[name="id_ukuran"]').html('<option selected value="'+data.id_ukuran+'">'+data.nm_ukuran+'</option>'+
							<?php
							foreach ($ukuran as $list_ukuran) {?>
							'<option value="<?php echo $list_ukuran['id_ukuran'];?>"><?php echo $list_ukuran['nm_ukuran'];?></option>'+
							<?php } ?>
							'');

						$('[name="id_tempat"]').html('<option selected value="'+data.id_tempat+'">'+data.nm_tempat+'</option>'+
							<?php
							foreach ($tempat as $list_tempat) {?>
							'<option value="<?php echo $list_tempat['id_tempat'];?>"><?php echo $list_tempat['nm_tempat'];?></option>'+
							<?php } ?>
							'');

						$('[name="id_ekstra"]').html('<option selected value="'+data.id_ekstra+'">'+data.nm_ekstra+'</option>'+
							<?php
							foreach ($ekstra as $list_ekstra) {?>
							'<option value="<?php echo $list_ekstra['id_ekstra'];?>"><?php echo $list_ekstra['nm_ekstra'];?></option>'+
							<?php } ?>
							'');
					});
				}
			});
			return false;
		});

	});
</script>
