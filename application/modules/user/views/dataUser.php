<section class="content-header">
	<h1><?php echo $title; ?></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-users"></i> User</a></li>
		<li><a href="#"> <?php echo $title; ?></a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box box-success">
		<div class="box-header">
			<div class="row">
				<div class="col-md-6">
					<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah User</button>
				</div>
			</div>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>

		<div class="box-body table-responsive padding">
			<table id="mydatauser" class="table table-bordered table-hover dataTable no-footer" style="text-align: center">
				<thead>
				<tr>
					<th style="text-align: center">No</th>
					<th style="text-align: center">User</th>
					<th style="text-align: center">Akses</th>
					<th style="text-align: center">Edit</th>
					<th style="text-align: center">Hapus</th>
				</tr>
				</thead>

				<tbody id="show_data_user">

				</tbody>
			</table>
		</div>

		<!--TAMBAH DATA USER-->
		<div class="modal fade" id="tambahdata">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="keluar">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Tambah User</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Jenis Akses</label>
							<select name="id_user_akses" id="id_user_akses" class="form-control select2" style="width: 100%;" required>
								<option selected value="">- Pilih Akses -</option>
								<?php foreach ($akses as $list_akses) {?>
									<option value="<?php echo $list_akses['id_user_akses'];?>"><?php echo $list_akses['nm_user_akses'];?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<label>Nama User</label>
							<input class="form-control" type="text" name="nm_user" id="nm_user" placeholder="Input user ..."/>
						</div>

						<div class="form-group">
							<label>Password</label>
							<input class="form-control" type="password" name="pwd_a" id="pwd_a" placeholder="Input Password ..."/>
						</div>
					</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" id="keluar">Batal</button>
							<button type="submit" class="btn btn-success" id="btn_simpan">Simpan</button>
						</div>
				</div>
				<!-- /.modal-content -->
			</div>
		</div>
		<!--TAMBAH DATA USER-->

		<!--MODAL HAPUS-->
		<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" id="keluar">x</span></button>
						<h4 class="modal-title" id="myModalLabel">Hapus User</h4>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<input type="hidden" name="id_user" id="id_user" value="">
							<div class="alert alert-danger" id="nm_user"></div>

						</div>
						<div class="modal-footer">
							<button type="button" id="keluar" class="btn btn-default" data-dismiss="modal">Tutup</button>
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
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="keluar">×</button>
						<h3 class="modal-title" id="myModalLabel">Edit User</h3>
					</div>
					<form class="form-horizontal">
						<div class="modal-body">

							<div class="form-group">
								<label class="control-label col-xs-3" >ID User</label>
								<div class="col-xs-9">
									<input name="id_user" id="id_user2" class="form-control" type="text" placeholder="ID User" style="width:335px;" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3" >Nama User</label>
								<div class="col-xs-9">
									<input name="nm_user" id="nm_user2" class="form-control" type="text" placeholder="Nama User" style="width:335px;" required>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3">Jenis Akses</label>
								<div class="col-xs-9">
									<select name="id_user_akses" id="id_user_akses2" class="form-control selectedit" style="width:335px;" required>

									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-xs-3" >Password</label>
								<div class="col-xs-9">
									<input name="pwd_a" id="pwd_a2" class="form-control" type="password" placeholder="Password" style="width:335px;" required>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn" id="keluar" data-dismiss="modal" aria-hidden="true" style="color: black">Tutup</button>
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
		tampil_data_user();

		//fungsi tampil data User
		function tampil_data_user(){
			$.ajax({
				url : '<?=base_url();?>user/data_user',
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
							'<td>'+data[i].nm_user+'</td>'+
							'<td>'+data[i].nm_user_akses+'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-primary edit_data" data="'+data[i].id_user+'"><i class="fa fa-edit"></i></a>'+
							'</td>'+
							'<td style="text-align:center;">'+
							'<a href="javascript:;" class="btn btn-danger hapus_data" data="'+data[i].id_user+'"><i class="fa fa-close"></i></a>'+
							'</td>'+
							'</tr>';
					}
					$('#show_data_user').html(html);
					$('#mydatauser').DataTable({
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
			tampil_data_user(refreshPage(),1000);
		});

		//Simpan User
		$('#btn_simpan').on('click',function(){
			var nm_user=$('#nm_user').val();
			var id_user_akses=$('#id_user_akses').val();
			var pwd_a=$('#pwd_a').val();
			$.ajax({
				type : "POST",
				url : '<?=base_url();?>user/simpan_user',
				dataType : "JSON",
				data : {nm_user:nm_user, id_user_akses:id_user_akses, pwd_a:pwd_a},
				success: function(data){
					$('[name="nm_user"]').val("");
					$('[name="id_user_akses"]').val("");
					$('[name="pwd_a"]').val("");
					$('#tambahdata').modal('hide');
					tampil_data_user(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET HAPUS
		$('#show_data_user').on('click','.hapus_data',function(){
			var id_user=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('user/get_user')?>",
				dataType : "JSON",
				data : {id_user:id_user},
				success: function(data){
					$.each(data,function(id_user, nm_user){
						$('#ModalHapus').modal('show');
						$('[name="id_user"]').val(data.id_user);
						$('[id="nm_user"]').html('<p>Apakah Anda yakin mau menghapus User <b><u>"'+data.nm_user+'"</u></b> ?</p>');
					});
				}
			});
			return false;
		});

		//Hapus User
		$('#btn_hapus').on('click',function(){
			var id_user=$('#id_user').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('user/hapus_user')?>",
				dataType : "JSON",
				data : {id_user: id_user},
				success: function(data){
					$('[name="id_user"]').val("");
					$('[id="nm_user"]').html("");
					$('#ModalHapus').modal('hide');
					tampil_data_user(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

		//GET UPDATE
		$('#show_data_user').on('click','.edit_data',function(){
			var id_user=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('user/get_user')?>",
				dataType : "JSON",
				data : {id_user:id_user},
				success: function(data){
					console.log(data);
					$.each(data,function(id_user, nm_ekstra, pwd_a, id_user_akses, akses_id, tes){
						$('#ModalaEdit').modal('show');
						$('[name="id_user"]').val(data.id_user);
						$('[name="nm_user"]').val(data.nm_user);
						$('[name="pwd_a"]').val(data.pwd_a);
						$('.selectedit').select2(
							{
								dropdownParent: $("#ModalaEdit"),
								data: data.akses_id
							}
						);
						$('.selectedit').select2({dropdownParent: $("#ModalaEdit"),data: data.tes});
					});
				}
			});
			return false;
		});

		//Update User
		$('#btn_update').on('click',function(){
			var id_user=$('#id_user2').val();
			var nm_user=$('#nm_user2').val();
			var pwd_a=$('#pwd_a2').val();
			var id_user_akses=$('#id_user_akses2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('user/update_user')?>",
				dataType : "JSON",
				data : {id_user:id_user , nm_user:nm_user, pwd_a:pwd_a, id_user_akses:id_user_akses},
				success: function(data){
					$('[name="id_user"]').val("");
					$('[name="nm_user"]').val("");
					$('[name="pwd_a"]').val("");
					$('[name="id_user_akses"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_user(refreshPage(),1000); //fungsi refresh
				}
			});
			return false;
		});

	});
</script>
