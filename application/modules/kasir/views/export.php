<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP - www.malasngoding.com</title>
</head>
<body>
<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	.str{ mso-number-format:\@; }
</style>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=exportDataPenjualan.xls");
?>

<?php
	if ($no_struk == 0) {
		$struk = '';
	} else {
		$struk = $no_struk;
	}
?>
<p style="font-size: 15px"><b>Data Penjualan <?php echo $tgl_awal; ?> s.d. <?php echo $tgl_akhir; ?> | <?php echo $struk; ?></b></p>

<table border="2">
	<tr>
		<th style="text-align: center">No</th>
		<th style="text-align: center">Tanggal</th>
		<th style="text-align: center">Waktu</th>
		<th style="text-align: center">No. Nota/Struk</th>
		<th style="text-align: center">Pembayaran</th>
		<th style="text-align: center">Total Harga</th>
		<th style="text-align: center">Pemesan</th>
		<th style="text-align: center">Kasir</th>
	</tr>

	<?php $no=1; foreach ($data_penjualan as $list) {?>
	<tr>
		<td><?php echo $no++; ?></td>
		<?php $myDateTime = DateTime::createFromFormat('Y-m-d', $list['tgl']);?>
		<td><?php echo $myDateTime->format('Y-m-d');?></td>
		<td><?php echo $list['wkt'];?></td>
		<td class="str"><?php echo $list['no_struk'];?></td>
		<td><?php echo $this->M_kasir->get_jns_pembayaran($list['id_jns_pembayaran']);?></td>
		<td><?php echo $list['ttl_hrg'];?></td>
		<td><?php echo $list['pemesan'];?></td>
		<td><?php echo $this->M_kasir->get_user($list['id_user']);?></td>
	</tr>
	<?php } ?>
</table>
</body>
</html>
