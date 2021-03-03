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
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Pemanis</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydatapemanis" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Pemanis</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_pemanis">

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
						<h4 class="modal-title">Tambah Pemanis</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Pemanis</label>
								<input class="form-control" type="text" name="nm_pemanis" id="nm_pemanis" placeholder="Input pemanis ..."/>
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
						<h4 class="modal-title" id="myModalLabel">Hapus Pemanis</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_pemanis" id="id_pemanis" value="">
							<div class="alert alert-danger" id="nm_pemanis"></div>

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
						<h3 class="modal-title" id="myModalLabel">Edit Pemanis</h3>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<div class="form-group">
								<label class="control-label col-xs-3" >ID Pemanis</label>
								<div class="col-xs-9">
									<input name="id_pemanis" id="id_pemanis2" class="form-control" type="text" placeholder="ID Pemanis" style="width:335px;" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3" >Pemanis</label>
								<div class="col-xs-9">
									<input name="nm_pemanis" id="nm_pemanis2" class="form-control" type="text" placeholder="Pemanis" style="width:335px;" required>
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
		tampil_data_pemanis();

		//$('#mydataakses').DataTable();
		//fungsi tampil data Pemanis
		function tampil_data_pemanis(){
			$.ajax({
				url : '<?=base_url();?>pengaturan/data_pemanis',
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
							'<td>'+data[i].nm_pemanis+'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_pemanis+'"><i class="fa fa-edit"></i></a>'+
							'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_pemanis+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#show_data_pemanis').html(html);
					$('#mydatapemanis').DataTable({
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

		//Simpan Pemanis
		$('#btn_simpan').on('click',function(){
			var nm_pemanis=$('#nm_pemanis').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>pengaturan/simpan_pemanis',
				dataType : "JSON",
				data : {nm_pemanis:nm_pemanis},
				success: function(data){
					$('[name="nm_pemanis"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_pemanis(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_pemanis').on('click','.hapus_data',function(){
			var id_pemanis=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_pemanis')?>",
				dataType : "JSON",
				data : {id_pemanis:id_pemanis},
				success: function(data){
					$.each(data,function(id_pemanis, nm_pemanis){
						$('#ModalHapus').modal('show');
						$('[name="id_pemanis"]').val(data.id_pemanis);
						$('[id="nm_pemanis"]').html('<p>Apakah Anda yakin mau menghapus Data <b><u>"'+data.nm_pemanis+'"</u></b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Pemanis
		$('#btn_hapus').on('click',function(){
			var id_pemanis=$('#id_pemanis').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/hapus_pemanis')?>",
				dataType : "JSON",
				data : {id_pemanis: id_pemanis},
				success: function(data){
					$('[name="id_pemanis"]').val("");
					$('[id="nm_pemanis"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_pemanis(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_pemanis').on('click','.edit_data',function(){
			var id_pemanis=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_pemanis')?>",
				dataType : "JSON",
				data : {id_pemanis:id_pemanis},
				success: function(data){
					$.each(data,function(id_pemanis, nm_pemanis){
						$('#ModalaEdit').modal('show');
						$('[name="id_pemanis"]').val(data.id_pemanis);
						$('[name="nm_pemanis"]').val(data.nm_pemanis);
					});
				}
			});
			return false;
		});

		//Update Pemanis
		$('#btn_update').on('click',function(){
			var id_pemanis=$('#id_pemanis2').val();
			var nm_pemanis=$('#nm_pemanis2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/update_pemanis')?>",
				dataType : "JSON",
				data : {id_pemanis:id_pemanis , nm_pemanis:nm_pemanis},
				success: function(data){
					$('[name="id_pemanis"]').val("");
					$('[id="nm_pemanis"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_pemanis(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
