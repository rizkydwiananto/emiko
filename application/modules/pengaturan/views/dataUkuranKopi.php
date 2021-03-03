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
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Ukuran Kopi</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydataukurankopi" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Jenis</th>
					<th style="text-align: center">Pemanis</th>
					<th style="text-align: center">Ukuran</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_ukuran_kopi">

				</tbody>
			</table>
		</div>

		<!--TAMBAH DATA PEMANIS KOPI-->
		<div class="modal fade" id="tambahdata">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Tambah Pemanis Kopi</h4>
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
						<h4 class="modal-title" id="myModalLabel">Hapus Pemanis Kopi</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_pemanis_kopi" id="id_pemanis_kopi" value="">
							<div class="alert alert-danger" id="nm_pemanis_kopi"></div>

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
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h3 class="modal-title" id="myModalLabel">Edit Pemanis Kopi</h3>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>ID Pemanis Kopi</label>
							<input name="id_pemanis_kopi" id="id_pemanis_kopi2" class="form-control" type="text" placeholder="ID Pemanis Kopi" readonly>
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
		tampil_data_ukuran_kopi();


		//fungsi tampil data pemanis kopi
		function tampil_data_ukuran_kopi(){
			$.ajax({
				url : '<?=base_url();?>pengaturan/data_ukuran_kopi',
				type : 'GET',
				async : true,
				dataType : 'json',
				success : function(data){
					console.log(data);
					var html = '';
					var no = 0;
					var i;
					for(i=0; i<data.length; i++){
						no++;
						html += '<tr>'+
							'<td>'+no+'</td>'+
							'<td>'+data[i].nm_jns_kopi+'</td>'+
							'<td>'+data[i].nm_pemanis+'</td>'+
							'<td>'+data[i].nm_ukuran+'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_ukuran_kopi+'"><i class="fa fa-edit"></i></a>'+
							'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_ukuran_kopi+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#show_data_ukuran_kopi').html(html);
					$('#mydataukurankopi').DataTable({
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

		//Simpan Tempat
		$('#btn_simpan').on('click',function(){
			var id_jns_kopi=$('#id_jns_kopi').val();
			var id_pemanis=$('#id_pemanis').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>pengaturan/simpan_pemanis_kopi',
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis},
				success: function(data){
					$('[name="id_jns_kopi"]').val("");
					$('[name="id_pemanis"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_pemanis_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_pemanis_kopi').on('click','.hapus_data',function(){
			var id_pemanis_kopi=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_pemanis_kopi')?>",
				dataType : "JSON",
				data : {id_pemanis_kopi:id_pemanis_kopi},
				success: function(data){
					$.each(data,function(id_pemanis_kopi, nm_jns_kopi, nm_pemanis){
						$('#ModalHapus').modal('show');
						$('[name="id_pemanis_kopi"]').val(data.id_pemanis_kopi);
						$('[id="nm_pemanis_kopi"]').html('<p>Apakah Anda yakin mau menghapus Data <b>'+data.nm_jns_kopi+' | '+data.nm_pemanis+'</b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Pemanis Kopi
		$('#btn_hapus').on('click',function(){
			var id_pemanis_kopi=$('#id_pemanis_kopi').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/hapus_pemanis_kopi')?>",
				dataType : "JSON",
				data : {id_pemanis_kopi: id_pemanis_kopi},
				success: function(data){
					$('[name="id_pemanis_kopi"]').val("");
					$('[id="nm_pemanis_kopi"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_pemanis_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_pemanis_kopi').on('click','.edit_data',function(){
			var id_pemanis_kopi=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_pemanis_kopi')?>",
				dataType : "JSON",
				data : {id_pemanis_kopi:id_pemanis_kopi},
				success: function(data){
					$.each(data,function(id_pemanis_kopi, id_jns_kopi, id_pemanis, nm_jns_kopi, nm_pemanis){
						$('#ModalaEdit').modal('show');
						$('[name="id_pemanis_kopi"]').val(data.id_pemanis_kopi);

						/*$('[name="id_jns_kopi"]').val(data.id_jns_kopi);*/

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
					});
				}
			});
			return false;
		});

		//Update Pemanis Kopi
		$('#btn_update').on('click',function(){
			var id_pemanis_kopi=$('#id_pemanis_kopi2').val();
			var id_jns_kopi=$('#id_jns_kopi2').val();
			var id_pemanis=$('#id_pemanis2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/update_pemanis_kopi')?>",
				dataType : "JSON",
				data : {id_pemanis_kopi:id_pemanis_kopi , id_jns_kopi:id_jns_kopi, id_pemanis:id_pemanis},
				success: function(data){
					$('[name="id_pemanis_kopi"]').val("");
					$('[name="id_jns_kopi"]').val("");
					$('[name="id_pemanis"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_pemanis_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
