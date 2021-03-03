<section class="content-header">
	<h1><?php echo $title; ?></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-list-alt"></i> Menu</a></li>
		<li><a href="#"> <?php echo $title; ?></a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-success">
		<div class="box-header">
			<div class="row">
				<div class="col-md-6">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Harga Kopi</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydatahargakopi" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Jenis</th>
					<th style="text-align: center">Pemanis</th>
					<th style="text-align: center">Ukuran</th>
					<th style="text-align: center">Tempat</th>
					<th style="text-align: center">Ekstra</th>
					<th style="text-align: center">Harga</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_harga_kopi">

				</tbody>
			</table>
		</div>

		<!--TAMBAH DATA HARGA KOPI-->
		<div class="modal fade" id="tambahdata">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Tambah Harga Kopi</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Jenis</label>
							<select name="id_jns_kopi" id="id_jns_kopi" class="form-control select2" style="width: 100%;" required>
								<?php foreach ($jnsKopi as $list_jnsKopi) {?>
								<option value="<?php echo $list_jnsKopi['id_jns_kopi'];?>"><?php echo $list_jnsKopi['nm_jns_kopi'];?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label>Pemanis</label>
							<select name="id_pemanis" id="id_pemanis" class="form-control select2" style="width: 100%;" required>
								<?php foreach ($pemanis as $list_pemanis) {?>
									<option value="<?php echo $list_pemanis['id_pemanis'];?>"><?php echo $list_pemanis['nm_pemanis'];?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label>Ukuran</label>
							<select name="id_ukuran" id="id_ukuran" class="form-control select2" style="width: 100%;" required>
								<?php foreach ($ukuran as $list_ukuran) {?>
									<option value="<?php echo $list_ukuran['id_ukuran'];?>"><?php echo $list_ukuran['nm_ukuran'];?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label>Tempat</label>
							<select name="id_tempat" id="id_tempat" class="form-control select2" style="width: 100%;" required>
								<?php foreach ($tempat as $list_tempat) {?>
									<option value="<?php echo $list_tempat['id_tempat'];?>"><?php echo $list_tempat['nm_tempat'];?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label>Ekstra</label>
							<select name="id_ekstra" id="id_ekstra" class="form-control select2" style="width: 100%;" required>
								<?php foreach ($ekstra as $list_ekstra) {?>
									<option value="<?php echo $list_ekstra['id_ekstra'];?>"><?php echo $list_ekstra['nm_ekstra'];?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label>Harga</label>
							<input class="form-control" type="text" name="hrg_kopi" id="hrg_kopi" placeholder="Input Harga Kopi ..."/>
						</div>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-success" id="btn_simpan">Simpan</button>
						</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
		<!--TAMBAH DATA JENIS KOPI-->

		<!--MODAL HAPUS-->
		<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
						<h4 class="modal-title" id="myModalLabel">Hapus Harga Kopi</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_hrg_kopi" id="id_hrg_kopi" value="">
							<div class="alert alert-danger" id="nm_hrg_kopi"></div>

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

		<!-- MODAL EDIT -->
		<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 class="modal-title" id="myModalLabel">Edit Harga Kopi</h3>
					</div>
						<div class="modal-body">
							<div class="form-group">
								<label>ID Harga Kopi</label>
								<input name="id_hrg_kopi" id="id_hrg_kopi2" class="form-control" type="text" placeholder="ID Pemanis Kopi" readonly>
							</div>

							<div class="form-group">
								<label>Jenis</label>
								<select name="id_jns_kopi" id="id_jns_kopi2" class="form-control select2" style="width: 100%;" required>
								</select>
							</div>

							<div class="form-group">
								<label>Pemanis</label>
								<select name="id_pemanis" id="id_pemanis2" class="form-control select2" style="width: 100%;" required>
								</select>
							</div>

							<div class="form-group">
								<label>Ukuran</label>
								<select name="id_ukuran" id="id_ukuran2" class="form-control select2" style="width: 100%;" required></select>
							</div>

							<div class="form-group">
								<label>Tempat</label>
								<select name="id_tempat" id="id_tempat2" class="form-control select2" style="width: 100%;" required></select>
							</div>

							<div class="form-group">
								<label>Ekstra</label>
								<select name="id_ekstra" id="id_ekstra2" class="form-control select2" style="width: 100%;" required></select>
							</div>

							<div class="form-group">
								<label>Harga</label>
								<input class="form-control" type="text" name="hrg_kopi" id="hrg_kopi2" placeholder="Input Harga Kopi ..."/>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true" style="color: black">Tutup</button>
							<button class="btn btn-info" id="btn_update">Update</button>
						</div>
				</div>
			</div>
		</div>
		<!--END MODAL EDIT-->

	</div>
</section>
<!-- /.content -->

<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_harga_kopi();


		//fungsi tampil data pemanis kopi
		function tampil_data_harga_kopi(){
			$.ajax({
				url : '<?=base_url();?>pengaturan/data_harga_kopi',
				type : 'GET',
				async : true,
				dataType : 'json',
				success : function(data){
					console.log(data);
					var html = '';
					var no = 0;
					var i;

					if (data == null) {
						html += '<tr><td>Tidak ada data</td></tr>';

					} else {
						for(i=0; i<data.length; i++){
							no++;
							html += '<tr>'+
								'<td>'+no+'</td>'+
								'<td>'+data[i].nm_jns_kopi+'</td>'+
								'<td>'+data[i].nm_pemanis+'</td>'+
								'<td>'+data[i].nm_ukuran+'</td>'+
								'<td>'+data[i].nm_tempat+'</td>'+
								'<td>'+data[i].nm_ekstra+'</td>'+
								'<td>Rp. '+data[i].hrg_kopi+',-</td>'+
								'<td style="text-align:center;">'+
								'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_hrg_kopi+'"><i class="fa fa-edit"></i></a>'+
								'</td>'+
								'<td style="text-align:center;">'+
								'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_hrg_kopi+'"><i class="fa fa-close"></i></a>'+
								'</td>'+
								'</tr>';
						}
					}
					$('#show_data_harga_kopi').html(html);
					$('#mydatahargakopi').DataTable({
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

		//Simpan Data Harga
		$('#btn_simpan').on('click',function(){
			var id_jns_kopi=$('#id_jns_kopi').val();
			var id_pemanis=$('#id_pemanis').val();
			var id_ukuran=$('#id_ukuran').val();
			var id_tempat=$('#id_tempat').val();
			var id_ekstra=$('#id_ekstra').val();
			var hrg_kopi=$('#hrg_kopi').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>pengaturan/simpan_harga_kopi',
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis, id_ukuran:id_ukuran, id_tempat:id_tempat, id_ekstra:id_ekstra, hrg_kopi:hrg_kopi},
				success: function(data){
					$('[name="id_jns_kopi"]').val("");
					$('[name="id_pemanis"]').val("");
					$('[name="id_ukuran"]').val("");
					$('[name="id_tempat"]').val("");
					$('[name="id_ekstra"]').val("");
					$('[name="hrg_kopi"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_harga_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_harga_kopi').on('click','.hapus_data',function(){
			var id_hrg_kopi=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_hrg_kopi:id_hrg_kopi},
				success: function(data){
					$.each(data,function(id_hrg_kopi, nm_jns_kopi, nm_pemanis, nm_ukuran, nm_tempat, nm_ekstra, hrg_kopi){
						$('#ModalHapus').modal('show');
						$('[name="id_hrg_kopi"]').val(data.id_hrg_kopi);
						$('[id="nm_hrg_kopi"]').html('<p>Apakah Anda yakin mau menghapus Harga <b>'+data.nm_jns_kopi+' | '+data.nm_pemanis+' | '+data.nm_ukuran+' | '+data.nm_tempat+' | '+data.nm_ekstra+' | Rp.'+data.hrg_kopi_format+',-</b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Pemanis Kopi
		$('#btn_hapus').on('click',function(){
			var id_hrg_kopi=$('#id_hrg_kopi').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/hapus_harga_kopi')?>",
				dataType : "JSON",
				data : {id_hrg_kopi: id_hrg_kopi},
				success: function(data){
					$('[name="id_hrg_kopi"]').val("");
					$('[id="nm_hrg_kopi"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_harga_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_harga_kopi').on('click','.edit_data',function(){
			var id_hrg_kopi=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_harga_kopi')?>",
				dataType : "JSON",
				data : {id_hrg_kopi:id_hrg_kopi},
				success: function(data){
					$.each(data,function(id_hrg_kopi, id_jns_kopi, id_pemanis, id_ukuran, id_tempat, id_ekstra, nm_jns_kopi, nm_pemanis, nm_ukuran, nm_tempat, nm_ekstra, hrg_kopi){
						$('#ModalaEdit').modal('show');
						$('[name="id_hrg_kopi"]').val(data.id_hrg_kopi);

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

						$('[name="hrg_kopi"]').val(data.hrg_kopi);
					});
				}
			});
			return false;
		});

		//Update Pemanis Kopi
		$('#btn_update').on('click',function(){
			var id_hrg_kopi=$('#id_hrg_kopi2').val();
			var id_jns_kopi=$('#id_jns_kopi2').val();
			var id_pemanis=$('#id_pemanis2').val();
			var id_ukuran=$('#id_ukuran2').val();
			var id_tempat=$('#id_tempat2').val();
			var id_ekstra=$('#id_ekstra2').val();
			var hrg_kopi=$('#hrg_kopi2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/update_harga_kopi')?>",
				dataType : "JSON",
				data : {id_hrg_kopi:id_hrg_kopi , id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis, id_ukuran:id_ukuran, id_tempat:id_tempat, id_ekstra:id_ekstra, hrg_kopi:hrg_kopi},
				success: function(data){
					$('[name="id_hrg_kopi"]').val("");
					$('[name="id_jns_kopi"]').val("");
					$('[name="id_pemanis"]').val("");
					$('[name="id_ukuran"]').val("");
					$('[name="id_tempat"]').val("");
					$('[name="id_ekstra"]').val("");
					$('[name="hrg_kopi"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_harga_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
