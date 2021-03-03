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
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Ukuran</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydataukuran" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Ukuran</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_ukuran">

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
						<h4 class="modal-title">Tambah Ukuran</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Ukuran</label>
								<input class="form-control" type="text" name="nm_ukuran" id="nm_ukuran" placeholder="Input ukuran ..."/>
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
						<h4 class="modal-title" id="myModalLabel">Hapus Ukuran</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_ukuran" id="id_ukuran" value="">
							<div class="alert alert-danger" id="nm_ukuran"></div>

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
						<h3 class="modal-title" id="myModalLabel">Edit Ukuran</h3>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<div class="form-group">
								<label class="control-label col-xs-3" >ID Ukuran</label>
								<div class="col-xs-9">
									<input name="id_ukuran" id="id_ukuran2" class="form-control" type="text" placeholder="ID Ukuran" style="width:335px;" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3" >Ukuran</label>
								<div class="col-xs-9">
									<input name="nm_ukuran" id="nm_ukuran2" class="form-control" type="text" placeholder="Ukuran" style="width:335px;" required>
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
		tampil_data_ukuran();

		//$('#mydataakses').DataTable();
		//fungsi tampil data Ukuran
		function tampil_data_ukuran(){
			$.ajax({
				url : '<?=base_url();?>pengaturan/data_ukuran',
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
							'<td>'+data[i].nm_ukuran+'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_ukuran+'"><i class="fa fa-edit"></i></a>'+
							'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_ukuran+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#show_data_ukuran').html(html);
					$('#mydataukuran').DataTable({
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

		//Simpan Ukuran
		$('#btn_simpan').on('click',function(){
			var nm_ukuran=$('#nm_ukuran').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>pengaturan/simpan_ukuran',
				dataType : "JSON",
				data : {nm_ukuran:nm_ukuran},
				success: function(data){
					$('[name="nm_ukuran"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_ukuran(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_ukuran').on('click','.hapus_data',function(){
			var id_ukuran=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_ukuran')?>",
				dataType : "JSON",
				data : {id_ukuran:id_ukuran},
				success: function(data){
					$.each(data,function(id_ukuran, nm_ukuran){
						$('#ModalHapus').modal('show');
						$('[name="id_ukuran"]').val(data.id_ukuran);
						$('[id="nm_ukuran"]').html('<p>Apakah Anda yakin mau menghapus Ukuran <b><u>"'+data.nm_ukuran+'"</u></b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Ukuran
		$('#btn_hapus').on('click',function(){
			var id_ukuran=$('#id_ukuran').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/hapus_ukuran')?>",
				dataType : "JSON",
				data : {id_ukuran: id_ukuran},
				success: function(data){
					$('[name="id_ukuran"]').val("");
					$('[id="nm_ukuran"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_ukuran(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_ukuran').on('click','.edit_data',function(){
			var id_ukuran=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_ukuran')?>",
				dataType : "JSON",
				data : {id_ukuran:id_ukuran},
				success: function(data){
					$.each(data,function(id_ukuran, nm_ukuran){
						$('#ModalaEdit').modal('show');
						$('[name="id_ukuran"]').val(data.id_ukuran);
						$('[name="nm_ukuran"]').val(data.nm_ukuran);
					});
				}
			});
			return false;
		});

		//Update Ukuran
		$('#btn_update').on('click',function(){
			var id_ukuran=$('#id_ukuran2').val();
			var nm_ukuran=$('#nm_ukuran2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/update_ukuran')?>",
				dataType : "JSON",
				data : {id_ukuran:id_ukuran , nm_ukuran:nm_ukuran},
				success: function(data){
					$('[name="id_ukuran"]').val("");
					$('[name="nm_ukuran"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_ukuran(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
