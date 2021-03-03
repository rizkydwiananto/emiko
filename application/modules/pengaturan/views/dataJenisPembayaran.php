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
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Jenis Pembayaran</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydatajnspembayaran" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">Jenis Pembayaran</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_jns_pembayaran">

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
						<h4 class="modal-title">Tambah Jenis Pembayaran</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Jenis Pembayaran</label>
								<input class="form-control" type="text" name="nm_jns_pembayaran" id="nm_jns_pembayaran" placeholder="Input jenis pembayaran ..."/>
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
						<h4 class="modal-title" id="myModalLabel">Hapus Jenis Pembayaran</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_jns_pembayaran" id="id_jns_pembayaran" value="">
							<div class="alert alert-danger" id="nm_jns_pembayaran"></div>

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
						<h3 class="modal-title" id="myModalLabel">Edit Jenis Pembayaran</h3>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<div class="form-group">
								<label class="control-label col-xs-3" >ID Jenis Pembyaran</label>
								<div class="col-xs-9">
									<input name="id_jns_pembayaran" id="id_jns_pembayaran2" class="form-control" type="text" placeholder="ID Jenis Pembayaran" style="width:335px;" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3" >Jenis Pembayaran</label>
								<div class="col-xs-9">
									<input name="nm_jns_pembayaran" id="nm_jns_pembayaran2" class="form-control" type="text" placeholder="Jenis Pembayaran" style="width:335px;" required>
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
		tampil_data_jns_pembayaran();

		//fungsi tampil data Jenis Pembayaran
		function tampil_data_jns_pembayaran(){
			$.ajax({
				url : '<?=base_url();?>pengaturan/data_jns_pembayaran',
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
							'<td>'+data[i].nm_jns_pembayaran+'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_jns_pembayaran+'"><i class="fa fa-edit"></i></a>'+
							'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_jns_pembayaran+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#show_data_jns_pembayaran').html(html);
					$('#mydatajnspembayaran').DataTable({
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
			var nm_jns_pembayaran=$('#nm_jns_pembayaran').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>pengaturan/simpan_jns_pembayaran',
				dataType : "JSON",
				data : {nm_jns_pembayaran:nm_jns_pembayaran},
				success: function(data){
					$('[name="nm_jns_pembayaran"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_jns_pembayaran(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_jns_pembayaran').on('click','.hapus_data',function(){
			var id_jns_pembayaran=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_jns_pembayaran')?>",
				dataType : "JSON",
				data : {id_jns_pembayaran:id_jns_pembayaran},
				success: function(data){
					$.each(data,function(id_jns_pembayaran, nm_jns_pembayaran){
						$('#ModalHapus').modal('show');
						$('[name="id_jns_pembayaran"]').val(data.id_jns_pembayaran);
						$('[id="nm_jns_pembayaran"]').html('<p>Apakah Anda yakin mau menghapus Jenis Pembyaran <b><u>"'+data.nm_jns_pembayaran+'"</u></b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus Jenis Pembayaran
		$('#btn_hapus').on('click',function(){
			var id_jns_pembayaran=$('#id_jns_pembayaran').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/hapus_jns_pembayaran')?>",
				dataType : "JSON",
				data : {id_jns_pembayaran: id_jns_pembayaran},
				success: function(data){
					$('[name="id_jns_pembayaran"]').val("");
					$('[id="nm_jns_pembayaran"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_jns_pembayaran(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_jns_pembayaran').on('click','.edit_data',function(){
			var id_jns_pembayaran=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('pengaturan/get_jns_pembayaran')?>",
				dataType : "JSON",
				data : {id_jns_pembayaran:id_jns_pembayaran},
				success: function(data){
					$.each(data,function(id_jns_pembayaran, nm_jns_pembayaran){
						$('#ModalaEdit').modal('show');
						$('[name="id_jns_pembayaran"]').val(data.id_jns_pembayaran);
						$('[name="nm_jns_pembayaran"]').val(data.nm_jns_pembayaran);
					});
				}
			});
			return false;
		});

		//Update Jenis Pembayaran
		$('#btn_update').on('click',function(){
			var id_jns_pembayaran=$('#id_jns_pembayaran2').val();
			var nm_jns_pembayaran=$('#nm_jns_pembayaran2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('pengaturan/update_jns_pembayaran')?>",
				dataType : "JSON",
				data : {id_jns_pembayaran:id_jns_pembayaran , nm_jns_pembayaran:nm_jns_pembayaran},
				success: function(data){
					$('[name="id_jns_pembayaran"]').val("");
					$('[name="nm_jns_pembayaran"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_jns_pembayaran(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
