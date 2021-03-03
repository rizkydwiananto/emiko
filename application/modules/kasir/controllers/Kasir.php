<?php

class Kasir extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_kasir');
        $this->load->helper('file');
		$this->load->library('Pdf');
    }

	/********************************** KASIR **********************************/

    public function index() {
		$data['jnsKopi'] = $this->M_kasir->data_jenis_kopi();
		$data['pemanis'] = $this->M_kasir->data_pemanis();
		$data['ukuran'] = $this->M_kasir->data_ukuran();
		$data['tempat'] = $this->M_kasir->data_tempat();
		$data['ekstra'] = $this->M_kasir->data_ekstra();
		$data['jns_pembayaran'] = $this->M_kasir->data_jns_pembayaran();
		$data['sub_total'] = $this->M_kasir->sub_total_kasir();
		$data['total_pendapatan_hrini'] = $this->M_kasir->total_pendapatan_hrini();
		$data['total_item_hrini'] = $this->M_kasir->total_item_hrini();
        $data['title'] = "Kasir";
        $data['view'] = "kasir";
        $this->load->view('header_admin',$data);
    }

	function get_harga_kopi(){
		$id_jns_kopi = $this->input->post('id_jns_kopi');
		$id_pemanis = $this->input->post('id_pemanis');
		$id_ukuran = $this->input->post('id_ukuran');
		$id_tempat = $this->input->post('id_tempat');
		$id_ekstra = $this->input->post('id_ekstra');
		$data = $this->M_kasir->get_harga_kopi_by($id_jns_kopi,$id_pemanis,$id_ukuran,$id_tempat,$id_ekstra);
		echo json_encode($data);
	}

	function data_kasir(){
		$data=$this->M_kasir->data_kasir();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_kasir(){
		$id_hrg_kopi = $this->input->post('id_hrg_kopi');
		$hrg_kopi = $this->input->post('hrg_kopi');
		$qty = $this->input->post('qty');
		$data = $this->M_kasir->simpan_kasir($id_hrg_kopi,$hrg_kopi,$qty);
		echo json_encode($data);
	}

	function update_kasir(){
		$id_keranjang = $this->input->post('id_keranjang');
		$id_hrg_kopi = $this->input->post('id_hrg_kopi');
		$hrg_kopi = $this->input->post('hrg_kopi');
		$qty = $this->input->post('qty');
		$data = $this->M_kasir->update_kasir($id_keranjang,$id_hrg_kopi,$hrg_kopi,$qty);
		echo json_encode($data);
	}

	function hapus_keranjang(){
		$id_keranjang =$this->input->post('id_keranjang');
		$data = $this->M_kasir->hapus_keranjang($id_keranjang);
		echo json_encode($data);
	}

	function get_kasir(){
		$id_keranjang = $this->input->get('id_keranjang');
		$data = $this->M_kasir->get_kasir_by_id($id_keranjang);
		echo json_encode($data);
	}

	function get_jns_kartu(){
		$id_jns_pembayaran = $this->input->post('id_jns_pembayaran');
		$data = $this->M_kasir->get_jns_kartu_by_id($id_jns_pembayaran);
		echo json_encode($data);
	}

	function tambah_proses_penjualan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$wkt = date('H:i:s');

		/*=============================================*/
		/*insert ke tabel mas_penjualan*/
		$nomor = $this->M_kasir->nomor_lanjut();
		$nomorDigit = sprintf("%07d", $nomor);
		$no_struk = date('ymd').$nomorDigit;

		$id_jns_pembayaran = $this->input->post('id_jns_pembayaran');
		$id_jns_kartu = $this->input->post('id_jns_kartu');
		$nokartu = $this->input->post('nokartu');

		$cash = $this->input->post('cash');
		$ttl_hrg = $this->input->post('ttl_hrg');
		if ($cash == 0) {
			$cash2 = $ttl_hrg;
		} else {
			$cash2 = $cash;
		}

		$kembalian = $cash2-$ttl_hrg;
		$id_user = $this->session->userdata('id_user');
		$pemesan = $this->input->post('pemesan');

		//JIKA KEMBALIAN KURANG DARI 0
		if (is_int($kembalian) && $kembalian >= 0) {
			$tambah_penjualan = $this->M_kasir->tambah_penjualan($id_jns_pembayaran,$id_jns_kartu,$nokartu,$cash2,$ttl_hrg,$kembalian,$id_user,$nomor,$no_struk,$pemesan);

			/*=============================================*/
			/*insert ke tabel mas_penjualan_detail*/
			$id_user_form = $this->input->post('id_user');
			$id_hrg_kopi = $this->input->post('id_hrg_kopi');
			$hrg_kopi = $this->input->post('hrg_kopi');
			$qty = $this->input->post('qty');
			$hrg_x_qty = $this->input->post('hrg_x_qty');
			$index = 0;
			$data_detail = array();
			foreach ($id_user_form as $data_id_user_form) {
				array_push($data_detail,
					array(
						'id_user' => $id_user,
						'no_struk' => $no_struk,
						'tgl' => $tgl,
						'wkt' => $wkt,
						'id_hrg_kopi' => $id_hrg_kopi[$index],
						'hrg_kopi' => $hrg_kopi[$index],
						'qty' => $qty[$index],
						'hrg_x_qty' => $hrg_x_qty[$index],
					)
				);
				$index++;
			}
			$insert_penjualan_detail = $this->M_kasir->insert_penjualan_detail($data_detail);
			/*END OF insert ke tabel mas_penjualan_detail*/
			/*=============================================*/

			/*=============================================*/
			/*$delete data di tabel mas_keranjang berdasrkan id user*/
			$hapus_keranjang_by_user = $this->M_kasir->hapus_keranjang_by_user($id_user);
			/*END OF $delete data di tabel mas_keranjang berdasrkan id user*/
			/*=============================================*/

			redirect("kasir/cetak_struk/".$no_struk);

		} else {
			echo $this->M_kasir->kembalian_gagal();

		}
		/*END OF insert ke tabel mas_penjualan*/
		/*=============================================*/

	}

	public function cetak_struk($no_struk) {
    	$data['no_struk'] = $no_struk;
		$data['title'] = "Cetak Struk";
		$data['view'] = "cetak_struk";
		$this->load->view('header',$data);
	}

	public function printstruk($no_struk)
	{
		$pdf = new TCPDF('P', 'mm', array(55, 150), true, 'UTF-8', false);

		$pdf->SetTitle('Struk');
		$pdf->SetMargins(3, 3, 3, true);
		$pdf->setPrintFooter(false);
		$pdf->setPrintHeader(false);
		$pdf->SetAutoPageBreak(true);
		$pdf->AddPage('');
		$pdf->SetFont('helvetica', '', $pdf->pixelsToUnits('14'), '', 'default', true);

		$jml_qty_penjualan_detail = $this->M_kasir->jml_qty_penjualan_detail($no_struk);

		$data_penjualan = $this->M_kasir->data_penjualan($no_struk);
		foreach ($data_penjualan as $list_penjualan) {
			$id_jns_pembayaran = $list_penjualan['id_jns_pembayaran'];
			$cash = $list_penjualan['cash'];
			$id_jns_kartu = $list_penjualan['id_jns_kartu'];
			$nokartu = $list_penjualan['nokartu'];
			$ttl_hrg = $list_penjualan['ttl_hrg'];
			$kembalian = $list_penjualan['kembalian'];
			$id_user = $list_penjualan['id_user'];
			$pemesan = $list_penjualan['pemesan'];
			$tgl = $list_penjualan['tgl'];
			$wkt = $list_penjualan['wkt'];
		}

		//JIKA ID_JNS_PEMBAYARAN == 1 (TUNAI)
		if ($id_jns_pembayaran == 1) {
			$tabel_tunai = '
				<tr>
					<td colspan="8" style="text-align: right">BAYAR &nbsp; =</td>
					<td style="text-align: right" colspan="4">Rp. '.number_format($cash,0,'.','.').' ,-</td>
				</tr>
			';
			$tabel_kembalian = '
			<td colspan="3" style="text-align: right"><b>Kembalian</b> &nbsp; =</td>
			<td style="text-align: right" colspan="4"><b>Rp. '.number_format($kembalian,0,'.','.').' ,-</b></td>
			';
			$tabel_debkre = '';
		} else {
			$tabel_tunai = '';
			$tabel_debkre = '
				<tr>
					<td colspan="12" style="text-align: right; font-size: 5px">Pembayaran dengan '.$this->M_kasir->get_jns_pembayaran($id_jns_pembayaran).' '.$this->M_kasir->get_jns_kartu($id_jns_kartu).' '.$nokartu.' &nbsp; &nbsp;</td>
				</tr>
			';
			$tabel_kembalian = '';
		}

		$data_penjualan_detail = $this->M_kasir->data_penjualan_detail($no_struk);

		$tabel = '
        <table>
			<tr>
				<td colspan="4"><img src="' . base_url() . 'assets/back/images/logo/logo.jpg" width="100px"></td>
				<td colspan="8" style="margin: auto; text-align: center">
					&nbsp;<br>
					&nbsp;<br>
					<b style="font-size: large">Nota Pembelian</b><br>
					<i>*** Tempat para Penikmat Kopi sejati ***</i>
				</td>
			</tr>
			<tr>
				<td colspan="12" style="text-align: center; line-height: 2">================================================</td>
			</tr>
			<tr>
				<td colspan="2">No. Nota</td>
				<td colspan="10">: '.$no_struk.'</td>
			</tr>
			<tr>
				<td colspan="2">Pemesan</td>
				<td colspan="10">: '.$pemesan.'</td>
			</tr>
			<tr>
				<td colspan="12" style="text-align: center; line-height: 2">================================================</td>
			</tr>
        ';

		$tabel .= '
			<tr>
        		<td style="text-align: center" colspan="7" width="77"><i>Minuman</i></td>
        		<td style="text-align: center" width="15"><i>Qty</i></td>
        		<td style="text-align: center" colspan="2"><i>Harga</i></td>
        		<td style="text-align: center" colspan="2"><i>Total</i></td>
        	</tr>
        	<tr>
				<td colspan="12" style="text-align: center; line-height: 2">===============================================</td>
			</tr>
		';

		foreach ($data_penjualan_detail as $list_detail_penjualan) {
		$kopi = $this->M_kasir->get_harga_kopi($list_detail_penjualan['id_hrg_kopi']);
			foreach ($kopi as $list_kopi){
				$nm_jns_kopi = $list_kopi['nm_jns_kopi'];
				$nm_pemanis = $list_kopi['nm_pemanis'];
				$nm_ukuran = $list_kopi['nm_ukuran'];
				$nm_tempat = $list_kopi['nm_tempat'];
				$nm_ekstra = $list_kopi['nm_ekstra'];
			}
		$tabel .= '
			<tr>
				<td></td>
        		<td colspan="6">'.$nm_jns_kopi.' '.$nm_pemanis.' '.$nm_ukuran.' '.$nm_tempat.' '.$nm_ekstra.'</td>
        		<td style="text-align: center">'.$list_detail_penjualan['qty'].'</td>
        		<td style="text-align: right" colspan="2">'.number_format($list_detail_penjualan['hrg_kopi'],0,'.','.').'</td>
        		<td style="text-align: right" colspan="2">'.number_format($list_detail_penjualan['hrg_x_qty'],0,'.','.').'</td>
        	</tr>
        	<tr>
        		<td colspan="12"></td>
			</tr>
		';
		}

		$tabel .= '
			<tr>
				<td colspan="12" style="text-align: center; line-height: 2">===============================================</td>
			</tr>
		';

		$tabel .= '
			<tr style="font-size: 6px">
				<td colspan="8" style="text-align: right"><b>SUB TOTAL</b> &nbsp; =</td>
				<td style="text-align: right" colspan="4"><b>Rp. '.number_format($ttl_hrg,0,'.','.').' ,-</b></td>
			</tr>
			'.$tabel_tunai.'
			'.$tabel_debkre.'
			<tr>
				<td colspan="12" style="text-align: center; line-height: 2">============================================= (-)</td>
			</tr>
			<tr>
				<td colspan="5" style="text-align: center"><b>Total Minuman : '.$jml_qty_penjualan_detail.'</b></td>
				'.$tabel_kembalian.'
			</tr>
			<tr>
				<td colspan="12" style="text-align: center; line-height: 2">===============================================</td>
			</tr>
			<tr>
				<td style="text-align: center; font-size: 85%" colspan="6">
					<i>* Semua Orang Indonesia berhak untuk dapat menikmati rasa Kopi Asli Nusantara *</i>
				</td>
				<td></td>
				<td></td>
				<td style="text-align: center" colspan="4">
					Bekasi, '.$this->M_kasir->tanggal_indo($tgl).'<br>
					Terimakasih<br><br>
					<span style="font-size: 6px"><b>Masino`s Kopi</b></span><br>
				</td>
			</tr>
			<tr>
				<td colspan="12"></td>
			</tr>
			<tr>
				<td colspan="12" style="font-size: small; text-align: center"><i>printed '.$tgl.' '.$wkt.' | '.$this->M_kasir->get_user($id_user).'</i></td>
			</tr>
		';

		$tabel .= '
		</table>
		';

		$pdf->writeHTML($tabel);
		$pdf->Output('cetak_'.$no_struk.'.pdf', 'I');
	}
	/********************************** END OF KASIR **********************************/


	/********************************** DATA PENJUALAN **********************************/
	public function data_penjualan() {
		$data['title'] = "Data Penjualan";
		$data['view'] = "data_penjualan";
		$this->load->view('header_admin',$data);
	}

	public function proses_cari_penjualan() {
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$no_struk = $this->input->post('no_struk');

		if ($tgl_akhir < $tgl_awal) {
			echo '
			<html>
    		<head>
    			<link rel="stylesheet" href="'.base_url().'assets/back/swal/sweetalert2.min.css">
    			<script src="'.base_url().'assets/back/swal/sweetalert2.all.min.js"></script>
			</head>
    		<body>
    		<script>
    			Swal.fire({
				  icon: "error",
				  title: "Oops...",
				  text: "Tanggal Akhir tidak boleh kurang dari Tanggal Awal ya!",
				  backdrop: `
					rgba(150,75,0)
				  `
				}).then(function() {
				  window.location = "'.base_url().'kasir/data_penjualan";
				});
			</script>
			</body>
    		</html>
			';

		} else {
			if ($no_struk == '') {
				$struk = 0;
			} else {
				$struk = $no_struk;
			}

			redirect('kasir/data_penjualan_cari/'.$tgl_awal.'/'.$tgl_akhir.'/'.$struk);
		}
	}

	public function data_penjualan_cari($tgl_awal,$tgl_akhir,$no_struk) {
		$data['tgl_awal'] = $tgl_awal;
		$data['tgl_akhir'] = $tgl_akhir;
		$data['no_struk'] = $no_struk;
		$data['title'] = "Data Penjualan";
		$data['view'] = "data_penjualan_cari";
		$this->load->view('header_admin',$data);
	}

	function dataPenjualan(){
		$data=$this->M_kasir->dataPenjualan();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function dataPenjualanCari($tgl_awal,$tgl_akhir,$no_struk){
		$data=$this->M_kasir->dataPenjualanCari($tgl_awal,$tgl_akhir,$no_struk);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function get_penjualan(){
		$no_struk = $this->input->get('no_struk');
		$data = $this->M_kasir->get_penjualan_by_id($no_struk);
		echo json_encode($data);
	}

	function hapus_penjualan(){
		$no_struk = $this->input->post('no_struk');
		$data = $this->M_kasir->hapus_penjualan($no_struk);
		echo json_encode($data);
	}

	function export_excel($tgl_awal,$tgl_akhir,$no_struk){
		$data['tgl_awal'] = $tgl_awal;
		$data['tgl_akhir'] = $tgl_akhir;
		$data['no_struk'] = $no_struk;
		$data['data_penjualan'] = $this->M_kasir->export_excel($tgl_awal,$tgl_akhir,$no_struk);
		$this->load->view('export',$data);
	}

	/********************************** END OF DATA PENJUALAN **********************************/

}
