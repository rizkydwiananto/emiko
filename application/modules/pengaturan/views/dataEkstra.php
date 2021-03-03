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
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Ekstra</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydataekstra" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Ekstra</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_ekstra">

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
						<h4 class="modal-title">Tambah Ekstra</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Ekstra</label>
								<input class="form-control" type="text" name="nm_ekstra" id="nm_ekstra" placeholder="Input ekstra ..."/>
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
						<h4 class="modal-title" id="myModalLabel">Hapus Ekstra</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_ekstra" id="id_ekstra" value="">
							<div class="alert alert-danger" id="nm_ekstra"></div>

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
						<h3 class="modal-title" id="myModalLabel">Edit Ekstra</h3>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<div class="form-group">
								<label class="control-label col-xs-3" >ID Ekstra</label>
								<div class="col-xs-9">
									<input name="id_ekstra" id="id_ekstra2" class="form-control" type="text" placeholder="ID Ekstra" style="width:335px;" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3" >Ekstra</label>
								<div class="col-xs-9">
									<input name="nm_ekstra" id="nm_ekstra2" class="form-control" type="text" placeholder="Ekstra" style="width:335px;" required>
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
		tampil_data_ekstra();

		//$('#mydataakses').DataTable();
		//fungsi tampil data Ekstra
		function tampil_data_ekstra(){
			$.ajax({
				url : '<?=base_url();?>pengaturan/data_ekstra',
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
							'<td>'+data[i].nm_ekstra+'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_ekstra+'"><i class="fa fa-edit"></i></a>'+
							'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_ekstra+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#show_data_ekstra').html(html);
					$('#mydataekstra').DataTable({
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

		//Simpan Ekstra
		$('#btn_simpan').on('click',function(){
			var nm_ekstra=$('#nm_ekstra').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>pengaturan/simpan_ekstra',
				dataType : "JSON",
				data : {nm_ekstra:nm_ekstra},
				success: function(data){
					$('[name="nm_ekstra"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_ekstra(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_ekstra').on('click','.hapus_data',function(){
			var id_ekstra=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_ekstra')?>",
				dataType : "JSON",
				data : {id_ekstra:id_ekstra},
				success: function(data){
					$.each(data,function(id_ekstra, nm_ekstra){
						$('#ModalHapus').modal('show');
						$('[name="id_ekstra"]').val(data.id_ekstra);
						$('[id="nm_ekstra"]').html('<p>Apakah Anda yakin mau menghapus Ekstra <b><u>"'+data.nm_ekstra+'"</u></b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Ekstra
		$('#btn_hapus').on('click',function(){
			var id_ekstra=$('#id_ekstra').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/hapus_ekstra')?>",
				dataType : "JSON",
				data : {id_ekstra: id_ekstra},
				success: function(data){
					$('[name="id_ekstra"]').val("");
					$('[id="nm_ekstra"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_ekstra(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_ekstra').on('click','.edit_data',function(){
			var id_ekstra=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_ekstra')?>",
				dataType : "JSON",
				data : {id_ekstra:id_ekstra},
				success: function(data){
					$.each(data,function(id_ekstra, nm_ekstra){
						$('#ModalaEdit').modal('show');
						$('[name="id_ekstra"]').val(data.id_ekstra);
						$('[name="nm_ekstra"]').val(data.nm_ekstra);
					});
				}
			});
			return false;
		});

		//Update Ekstra
		$('#btn_update').on('click',function(){
			var id_ekstra=$('#id_ekstra2').val();
			var nm_ekstra=$('#nm_ekstra2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/update_ekstra')?>",
				dataType : "JSON",
				data : {id_ekstra:id_ekstra , nm_ekstra:nm_ekstra},
				success: function(data){
					$('[name="id_ekstra"]').val("");
					$('[name="nm_ekstra"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_ekstra(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
