<section class="content-header">
	<h1><?php echo $title; ?></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-puzzle-piece"></i> Spesifikasi</a></li>
		<li><a href="#"> <?php echo $title; ?></a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-success">
		<div class="box-header">
			<div class="row">
				<div class="col-md-6">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Tempat</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydatatempat" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Tempat</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_tempat">

				</tbody>
			</table>
		</div>

		<!--TAMBAH DATA JENIS KOPI-->
		<div class="modal fade" id="tambahdata">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Tambah Tempat</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Tempat</label>
							<input class="form-control" type="text" name="nm_tempat" id="nm_tempat" placeholder="Input Tempat ..."/>
						</div>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
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
						<h4 class="modal-title" id="myModalLabel">Hapus Tempat</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_tempat" id="id_tempat" value="">
							<div class="alert alert-danger" id="nm_tempat"></div>

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
						<h3 class="modal-title" id="myModalLabel">Edit Tempat</h3>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<div class="form-group">
								<label class="control-label col-xs-3" >ID Tempat</label>
								<div class="col-xs-9">
									<input name="id_tempat" id="id_tempat2" class="form-control" type="text" placeholder="ID Tempat" style="width:335px;" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3" >Tempat</label>
								<div class="col-xs-9">
									<input name="nm_tempat" id="nm_tempat2" class="form-control" type="text" placeholder="Tempat" style="width:335px;" required>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn" data-dismiss="modal" aria-hidden="true" style="color: black">Tutup</button>
							<button class="btn btn-info" id="btn_update">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!--END MODAL EDIT-->

	</div>
</section>
<!-- /.content -->

<script type="text/javascript">
	$(document).ready(function(){
		tampil_data_tempat();

		//$('#mydataakses').DataTable();
		//fungsi tampil data Tempat
		function tampil_data_tempat(){
			$.ajax({
				url : '<?=base_url();?>pengaturan/data_tempat',
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
							'<td>'+data[i].nm_tempat+'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_tempat+'"><i class="fa fa-edit"></i></a>'+
							'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_tempat+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#show_data_tempat').html(html);
					$('#mydatatempat').DataTable({
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
			var nm_tempat=$('#nm_tempat').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>pengaturan/simpan_tempat',
				dataType : "JSON",
				data : {nm_tempat:nm_tempat},
				success: function(data){
					$('[name="nm_tempat"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_tempat(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_tempat').on('click','.hapus_data',function(){
			var id_tempat=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_tempat')?>",
				dataType : "JSON",
				data : {id_tempat:id_tempat},
				success: function(data){
					$.each(data,function(id_tempat, nm_tempat){
						$('#ModalHapus').modal('show');
						$('[name="id_tempat"]').val(data.id_tempat);
						$('[id="nm_tempat"]').html('<p>Apakah Anda yakin mau menghapus Data Tempat <b><u>"'+data.nm_tempat+'"</u></b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Tempat
		$('#btn_hapus').on('click',function(){
			var id_tempat=$('#id_tempat').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/hapus_tempat')?>",
				dataType : "JSON",
				data : {id_tempat: id_tempat},
				success: function(data){
					$('[name="id_tempat"]').val("");
					$('[id="nm_tempat"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_tempat(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_tempat').on('click','.edit_data',function(){
			var id_tempat=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_tempat')?>",
				dataType : "JSON",
				data : {id_tempat:id_tempat},
				success: function(data){
					$.each(data,function(id_tempat, nm_tempat){
						$('#ModalaEdit').modal('show');
						$('[name="id_tempat"]').val(data.id_tempat);
						$('[name="nm_tempat"]').val(data.nm_tempat);
					});
				}
			});
			return false;
		});

		//Update Tempat
		$('#btn_update').on('click',function(){
			var id_tempat=$('#id_tempat2').val();
			var nm_tempat=$('#nm_tempat2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/update_tempat')?>",
				dataType : "JSON",
				data : {id_tempat:id_tempat , nm_tempat:nm_tempat},
				success: function(data){
					$('[name="id_tempat"]').val("");
					$('[name="nm_tempat"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_tempat(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
