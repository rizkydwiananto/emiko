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
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Jenis Kopi</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydatajnskopi" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Nama Jenis Kopi</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_jns_kopi">

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
						<h4 class="modal-title">Tambah Jenis Kopi</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Jenis Kopi</label>
							<input class="form-control" type="text" name="nm_jns_kopi" id="nm_jns_kopi" placeholder="Input nama jenis kopi ..."/>
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
						<h4 class="modal-title" id="myModalLabel">Hapus Jenis Kopi</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_jns_kopi" id="id_jns_kopi" value="">
							<div class="alert alert-danger" id="nm_jns_kopi"></div>

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
						<h3 class="modal-title" id="myModalLabel">Edit Jenis Kopi</h3>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<div class="form-group">
								<label class="control-label col-xs-3" >ID Kopi</label>
								<div class="col-xs-9">
									<input name="id_jns_kopi" id="id_jns_kopi2" class="form-control" type="text" placeholder="ID Jenis Kopi" style="width:335px;" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3" >Nama Jenis Kopi</label>
								<div class="col-xs-9">
									<input name="nm_jns_kopi" id="nm_jns_kopi2" class="form-control" type="text" placeholder="Nama Jenis Kopi" style="width:335px;" required>
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
		tampil_data_jns_kopi();

		//$('#mydataakses').DataTable();
		//fungsi tampil data akses
		function tampil_data_jns_kopi(){
			$.ajax({
				url : '<?=base_url();?>pengaturan/data_jenis_kopi',
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
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_jns_kopi+'"><i class="fa fa-edit"></i></a>'+
							'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_jns_kopi+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#show_data_jns_kopi').html(html);
					$('#mydatajnskopi').DataTable({
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

		//Simpan Jenis Kopi
		$('#btn_simpan').on('click',function(){
			var nm_jns_kopi=$('#nm_jns_kopi').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>pengaturan/simpan_jenis_kopi',
				dataType : "JSON",
				data : {nm_jns_kopi:nm_jns_kopi},
				success: function(data){
					$('[name="nm_jns_kopi"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_jns_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_jns_kopi').on('click','.hapus_data',function(){
			var id_jns_kopi=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_jns_kopi_cari')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi},
				success: function(data){
					$.each(data,function(id_jns_kopi, nm_jns_kopi){
						$('#ModalHapus').modal('show');
						$('[name="id_jns_kopi"]').val(data.id_jns_kopi);
						$('[id="nm_jns_kopi"]').html('<p>Apakah Anda yakin mau memhapus jenis Kopi <b><u>"'+data.nm_jns_kopi+'"</u></b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Akses
		$('#btn_hapus').on('click',function(){
			var id_jns_kopi=$('#id_jns_kopi').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/hapus_jns_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi: id_jns_kopi},
				success: function(data){
					$('[name="id_jns_kopi"]').val("");
					$('[id="nm_jns_kopi"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_jns_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_jns_kopi').on('click','.edit_data',function(){
			var id_jns_kopi=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_jns_kopi_cari')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi},
				success: function(data){
					$.each(data,function(id_jns_kopi, nm_jns_kopi){
						$('#ModalaEdit').modal('show');
						$('[name="id_jns_kopi"]').val(data.id_jns_kopi);
						$('[name="nm_jns_kopi"]').val(data.nm_jns_kopi);
					});
				}
			});
			return false;
		});

		//Update Akses
		$('#btn_update').on('click',function(){
			var id_jns_kopi=$('#id_jns_kopi2').val();
			var nm_jns_kopi=$('#nm_jns_kopi2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/update_jns_kopi')?>",
				dataType : "JSON",
				data : {id_jns_kopi:id_jns_kopi , nm_jns_kopi:nm_jns_kopi},
				success: function(data){
					$('[name="id_jns_kopi"]').val("");
					$('[name="nm_jns_kopi"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_jns_kopi(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
