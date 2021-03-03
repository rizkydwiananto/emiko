<div class="row" style="background-color: #525659">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-4">
				<a href="<?=base_url();?>kasir" class="pull-left">
					<button class="btn btn-success"><i class="fa fa-home"></i> Kembali Ke Kasir</button>
				</a>
			</div>

			<div class="col-md-4" style="text-align: center">
				<button class="btn btn-info form-control">
					<i class="fa fa-arrow-circle-left pull-left"></i>
					~ <i class="fa fa-print"></i> Cetak Struk ~
					<i class="fa fa-arrow-circle-right pull-right"></i>
				</button>
			</div>

			<div class="col-md-4">
				<a href="<?=base_url();?>kasir/data_penjualan" class="pull-right">
					<button class="btn btn-success"><i class="fa fa-home"></i> Kembali Ke Data Penjualan</button>
				</a>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<iframe id="printf" name="pdf" src="<?=base_url();?>kasir/printstruk/<?php echo $no_struk; ?>" width="100%" height="727px" ></iframe>
	</div>
</div>

<script>
	document.getElementById("printf").contentWindow.print();
</script>
