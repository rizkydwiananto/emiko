<?php
class M_kasir extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	function data_jns_pembayaran()
	{
		$this->db->order_by('nm_jns_pembayaran','DESC');
		$query = $this->db->get('mas_jns_pembayaran');
		return $query->result_array();
	}

	/************ DATA JENIS KOPI ************/

	function data_jenis_kopi()
	{
		$this->db->order_by('nm_jns_kopi','ASC');
		$query = $this->db->get('mas_jns_kopi');
		return $query->result_array();
	}

	function data_jenis_kopi_by_id($id)
	{
		$this->db->where('id_jns_kopi',$id);
		$this->db->order_by('nm_jns_kopi','ASC');
		$query = $this->db->get('mas_jns_kopi');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$hasil = $list['nm_jns_kopi'];
		}
		return $hasil;
	}

	/************ END OF DATA JENIS KOPI ************/

	/************ DATA UKURAN ************/

	function data_ukuran()
	{
		$this->db->order_by('nm_ukuran','ASC');
		$query = $this->db->get('mas_ukuran');
		return $query->result_array();
	}

	function data_ukuran_by_id($id)
	{
		$this->db->where('id_ukuran',$id);
		$this->db->order_by('nm_ukuran','ASC');
		$query = $this->db->get('mas_ukuran');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$hasil = $list['nm_ukuran'];
		}
		return $hasil;
	}

	/************ END OF DATA UKURAN ************/

	/************ DATA EKSTRA ************/

	function data_ekstra()
	{
		$this->db->order_by('nm_ekstra','ASC');
		$query = $this->db->get('mas_ekstra');
		return $query->result_array();
	}

	function data_ekstra_by_id($id)
	{
		$this->db->where('id_ekstra',$id);
		$this->db->order_by('nm_ekstra','ASC');
		$query = $this->db->get('mas_ekstra');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$hasil = $list['nm_ekstra'];
		}
		return $hasil;
	}

	/************ END OF DATA EKSTRA ************/

	/************ DATA PEMANIS ************/

	function data_pemanis()
	{
		$this->db->order_by('nm_pemanis','ASC');
		$query = $this->db->get('mas_pemanis');
		return $query->result_array();
	}

	function data_pemanis_by_id($id)
	{
		$this->db->where('id_pemanis',$id);
		$this->db->order_by('nm_pemanis','ASC');
		$query = $this->db->get('mas_pemanis');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$hasil = $list['nm_pemanis'];
		}
		return $hasil;
	}

	/************ END OF DATA PEMANIS ************/

	/************ DATA TEMPAT ************/

	function data_tempat()
	{
		$this->db->order_by('nm_tempat','ASC');
		$query = $this->db->get('mas_tempat');
		return $query->result_array();
	}

	function data_tempat_by_id($id)
	{
		$this->db->where('id_tempat',$id);
		$this->db->order_by('nm_tempat','ASC');
		$query = $this->db->get('mas_tempat');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$hasil = $list['nm_tempat'];
		}
		return $hasil;
	}

	/************ END OF DATA TEMPAT ************/

	/************ DATA HARGA KOPI ************/

	function data_harga_kopi()
	{
		$this->db->join("mas_jns_kopi","mas_jns_kopi.id_jns_kopi = mas_hrg_kopi.id_jns_kopi","left");
		$this->db->join("mas_pemanis","mas_pemanis.id_pemanis = mas_hrg_kopi.id_pemanis","left");
		$this->db->join("mas_ukuran","mas_ukuran.id_ukuran = mas_hrg_kopi.id_ukuran","left");
		$this->db->join("mas_tempat","mas_tempat.id_tempat = mas_hrg_kopi.id_tempat","left");
		$this->db->join("mas_ekstra","mas_ekstra.id_ekstra = mas_hrg_kopi.id_ekstra","left");
		$this->db->order_by('nm_jns_kopi','ASC');
		$query = $this->db->get('mas_hrg_kopi');
		$hsl = $query->result_array();

		if ($hsl == null) {
			$result = array(
				'response' => 'tidak ada data'
			);

		} else {
			foreach ($hsl as $list) {
				$result[] = array(
					'id_hrg_kopi' => $list['id_hrg_kopi'],
					'nm_jns_kopi' => $list['nm_jns_kopi'],
					'nm_pemanis' => $list['nm_pemanis'],
					'nm_ukuran' => $list['nm_ukuran'],
					'nm_tempat' => $list['nm_tempat'],
					'nm_ekstra' => $list['nm_ekstra'],
					'hrg_kopi' => number_format($list['hrg_kopi'],0,',','.')
				);
			}

		}
		return $result;
	}

	function get_harga_kopi($id)
	{
		$this->db->join("mas_jns_kopi","mas_jns_kopi.id_jns_kopi = mas_hrg_kopi.id_jns_kopi","left");
		$this->db->join("mas_pemanis","mas_pemanis.id_pemanis = mas_hrg_kopi.id_pemanis","left");
		$this->db->join("mas_ukuran","mas_ukuran.id_ukuran = mas_hrg_kopi.id_ukuran","left");
		$this->db->join("mas_tempat","mas_tempat.id_tempat = mas_hrg_kopi.id_tempat","left");
		$this->db->join("mas_ekstra","mas_ekstra.id_ekstra = mas_hrg_kopi.id_ekstra","left");
		$this->db->where("mas_hrg_kopi.id_hrg_kopi",$id);
		$this->db->order_by('nm_jns_kopi','ASC');
		$query = $this->db->get('mas_hrg_kopi');
		$hsl = $query->result_array();

		if ($hsl == null) {
			$result = array(
				'response' => 'tidak ada data'
			);

		} else {
			foreach ($hsl as $list) {
				$result[] = array(
					'id_hrg_kopi' => $list['id_hrg_kopi'],
					'nm_jns_kopi' => $list['nm_jns_kopi'],
					'nm_pemanis' => $list['nm_pemanis'],
					'nm_ukuran' => $list['nm_ukuran'],
					'nm_tempat' => $list['nm_tempat'],
					'nm_ekstra' => $list['nm_ekstra'],
					'hrg_kopi' => number_format($list['hrg_kopi'],0,',','.')
				);
			}

		}
		return $result;
	}

	function get_harga_kopi_by($id_jns_kopi,$id_pemanis,$id_ukuran,$id_tempat,$id_ekstra)
	{
		$this->db->where('id_jns_kopi =',$id_jns_kopi);
		$this->db->where('id_pemanis =',$id_pemanis);
		$this->db->where('id_ukuran =',$id_ukuran);
		$this->db->where('id_tempat =',$id_tempat);
		$this->db->where('id_ekstra =',$id_ekstra);
		$this->db->order_by('hrg_kopi','ASC');
		$query = $this->db->get('mas_hrg_kopi');
		$hsl = $query->result_array();

		if ($hsl == null) {
			$result = array(
				'response' => 'tidak ada data'
			);
		} else {
			foreach ($hsl as $list) {
				$result = array(
					'hrg_kopi' => $list['hrg_kopi'],
					'id_hrg_kopi' => $list['id_hrg_kopi']
				);
			}
		}

		return $result;
	}

	/************ END OF DATA HARGA KOPI ************/
	function get_jns_pembayaran($id){
		$this->db->where('id_jns_pembayaran', $id);
		$this->db->order_by('nm_jns_pembayaran','ASC');
		$query = $this->db->get('mas_jns_pembayaran');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$nama = $list['nm_jns_pembayaran'];
		}
		return $nama;
	}

	function get_jns_kartu($id){
		$this->db->where('id_jns_kartu', $id);
		$this->db->order_by('nm_jns_kartu','ASC');
		$query = $this->db->get('mas_jns_kartu');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$nama = $list['nm_jns_kartu'];
		}
		return $nama;
	}

	function get_user($id){
		$this->db->where('id_user', $id);
		$this->db->order_by('nm_user','ASC');
		$query = $this->db->get('mas_user');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$nama = $list['nm_user'];
		}
		return $nama;
	}

	function tanggal_indo($tanggal, $cetak_hari = false)
	{
		date_default_timezone_set('Asia/Jakarta');
		$hari = array ( 1 =>    'Senin',
			'Selasa',
			'Rabu',
			'Kamis',
			'Jumat',
			'Sabtu',
			'Minggu'
		);

		$bulan = array (1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

		if ($cetak_hari) {
			$num = date('N', strtotime($tanggal));
			return $hari[$num] . ', ' . $tgl_indo;
		}
		return $tgl_indo;
	}

	function jml_qty_penjualan_detail($no_struk) {
		$this->db->where('no_struk', $no_struk);
		$this->db->select('SUM(qty) as total');
		$this->db->from('mas_penjualan_detail');
		return $this->db->get()->row()->total;
	}

	function data_penjualan($no_struk) {
		$this->db->where('no_struk', $no_struk);
		$this->db->order_by('id_penjualan','ASC');
		$query = $this->db->get('mas_penjualan');
		$hsl = $query->result_array();
		return $hsl;
	}

	function data_penjualan_detail($no_struk) {
		$this->db->where('no_struk', $no_struk);
		$this->db->order_by('id_penjualan_detail','ASC');
		$query = $this->db->get('mas_penjualan_detail');
		$hsl = $query->result_array();
		return $hsl;
	}

	function data_kasir()
	{
		$this->db->where('mas_keranjang.id_user', $this->session->userdata('id_user'));
		$this->db->join("mas_hrg_kopi","mas_hrg_kopi.id_hrg_kopi = mas_keranjang.id_hrg_kopi","left");
		$this->db->order_by('mas_keranjang.id_keranjang','ASC');
		$query = $this->db->get('mas_keranjang');
		$hsl = $query->result_array();

		if ($hsl == null) {
			$result = array(
				'response' => 'Tidak ada data'
			);
		} else {
			foreach ($hsl as $list) {
				$kopi = $this->M_kasir->get_harga_kopi($list['id_hrg_kopi']);
				$result[] = array(
					'nm_jns_kopi' => $kopi[0]['nm_jns_kopi'],
					'nm_pemanis' => $kopi[0]['nm_pemanis'],
					'nm_ukuran' => $kopi[0]['nm_ukuran'],
					'nm_tempat' => $kopi[0]['nm_tempat'],
					'nm_ekstra' => $kopi[0]['nm_ekstra'],
					'qty' => $list['qty'],
					'id_hrg_kopi' => $list['id_hrg_kopi'],
					'hrg_kopi' => $list['hrg_kopi'],
					'hrg_x_qty' => $list['hrg_x_qty'],
					'id_keranjang' => $list['id_keranjang'],
				);
			}
		}

		return $result;
	}

	function simpan_kasir($id_hrg_kopi,$hrg_kopi,$qty){
		date_default_timezone_set('Asia/Jakarta');
		$insert_kasir = array(
			'tgl_keranjang' => date('Y-m-d'),
			'id_hrg_kopi' => $id_hrg_kopi,
			'hrg_kopi' => $hrg_kopi,
			'qty' => $qty,
			'hrg_x_qty' => $qty*$hrg_kopi,
			'id_user' => $this->session->userdata("id_user"),
		);
		$hasil_insert = $this->db->insert('mas_keranjang',$insert_kasir);
		return $hasil_insert;
	}

	function update_kasir($id_keranjang,$id_hrg_kopi,$hrg_kopi,$qty){
		$data = array(
			'tgl_keranjang' => date('Y-m-d'),
			'id_hrg_kopi' => $id_hrg_kopi,
			'hrg_kopi' => $hrg_kopi,
			'qty' => $qty,
			'hrg_x_qty' => $qty*$hrg_kopi,
			'id_user' => $this->session->userdata("id_user"),
		);

		$update = $this->db->update('mas_keranjang',$data,array('id_keranjang' => $id_keranjang));
		return $update;
	}

	function total_pendapatan_hrini() {
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$this->db->where('tgl', $tgl);
		$this->db->select_sum('ttl_hrg');
		$this->db->from('mas_penjualan');
		$query = $this->db->get();
		return $query->row()->ttl_hrg;
	}

	function total_item_hrini() {
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$this->db->where('tgl', $tgl);
		$this->db->select_sum('qty');
		$this->db->from('mas_penjualan_detail');
		$query = $this->db->get();
		return $query->row()->qty;
	}

	function sub_total_kasir() {
		$this->db->select_sum('hrg_x_qty');
		$this->db->where('id_user',$this->session->userdata('id_user'));
		$this->db->from('mas_keranjang');
		$query = $this->db->get();
		return $query->row()->hrg_x_qty;
	}

	function hapus_keranjang($id_keranjang){
		$delete = $this->db->delete('mas_keranjang',array('id_keranjang' => $id_keranjang));
		return $delete;
	}

	function get_kasir_by_id($id_keranjang){
		$this->db->join("mas_hrg_kopi","mas_hrg_kopi.id_hrg_kopi = mas_keranjang.id_hrg_kopi","left");
		$this->db->order_by('mas_keranjang.id_keranjang','ASC');
		$this->db->where('id_keranjang', $id_keranjang);
		$hsl = $this->db->get('mas_keranjang');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_keranjang' => $data->id_keranjang,
					'id_hrg_kopi' => $data->id_hrg_kopi,
					'hrg_kopi' => $data->hrg_kopi,
					'qty' => $data->qty,
					'id_jns_kopi' => $data->id_jns_kopi,
					'nm_jns_kopi' => $this->M_kasir->data_jenis_kopi_by_id($data->id_jns_kopi),
					'id_pemanis' => $data->id_pemanis,
					'nm_pemanis' => $this->M_kasir->data_pemanis_by_id($data->id_pemanis),
					'id_ukuran' => $data->id_ukuran,
					'nm_ukuran' => $this->M_kasir->data_ukuran_by_id($data->id_ukuran),
					'id_tempat' => $data->id_tempat,
					'nm_tempat' => $this->M_kasir->data_tempat_by_id($data->id_tempat),
					'id_ekstra' => $data->id_ekstra,
					'nm_ekstra' => $this->M_kasir->data_ekstra_by_id($data->id_ekstra),
				);
			}
		}
		return $hasil;
	}

	function get_jns_kartu_by_id($id_jns_pembayaran){
		$this->db->order_by('nm_jns_kartu','ASC');
		$this->db->where('id_jns_pembayaran =', $id_jns_pembayaran);
		//$query = $this->db->get('mas_jns_kartu');
		$hsl = $this->db->get('mas_jns_kartu');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil[]=array(
					'id_jns_kartu' => $data->id_jns_kartu,
					'nm_jns_kartu' => $data->nm_jns_kartu,
				);
			}
		}
		return $hasil;
	}

	function nomor_lanjut() {
		$this->db->select('*');
		$this->db->order_by('nomor', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('mas_penjualan');
		$angka = $query->row()->nomor;

		if ($angka > 0) {
			$hasil = $angka+1;
		} else {
			$hasil = 1;
		}
		return $hasil;
	}

	function kembalian_gagal() {
		$html = '
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
				  text: "Uang Cash tidak boleh kurang dari Total Harga (Sub Total) ya ...! Mohon Cek kembali ...!",
				  backdrop: `
					rgba(150,75,0)
				  `
				}).then(function() {
				  window.location = "'.base_url().'kasir";
				});
			</script>
			</body>
    		</html>
    	';

		return $html;
	}

	function tambah_penjualan($id_jns_pembayaran,$id_jns_kartu,$nokartu,$cash2,$ttl_hrg,$kembalian,$id_user,$nomor,$no_struk,$pemesan) {
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');
		$wkt = date('H:i:s');

		//jika $nokartu null
		if ($nokartu == null) {
			$nokartu2 = 0;
		} else {
			$nokartu2 = $nokartu;
		}

		//jika $cash null
		/*if ($cash2 == null) {
			$cash3 = 0;
		} else {
			$cash3 = $cash2;
		}*/

		//jika $kembalian < 0
		if ($kembalian < 0) {
			$kembalian2 = 0;
		} else {
			$kembalian2 = $kembalian;
		}

		$insert_penjualan = array(
			'tgl' => $tgl,
			'wkt' => $wkt,
			'no_struk' => $no_struk,
			'nomor' => $nomor,
			'id_jns_pembayaran' => $id_jns_pembayaran,
			'cash' => $cash2,
			'id_jns_kartu' => $id_jns_kartu,
			'nokartu' => $nokartu2,
			'ttl_hrg' => $ttl_hrg,
			'kembalian' => $kembalian2,
			'id_user' => $id_user,
			'pemesan' => $pemesan
		);

		$hasil_insert = $this->db->insert('mas_penjualan',$insert_penjualan);
		return $hasil_insert;
	}

	function insert_penjualan_detail($data_detail) {
		return $this->db->insert_batch('mas_penjualan_detail',$data_detail);
	}

	function hapus_keranjang_by_user($id_user){
		$delete = $this->db->delete('mas_keranjang',array('id_user' => $id_user));
		return $delete;
	}

	/************ DATA PENJUALAN ************/
	function dataPenjualan()
	{
		date_default_timezone_set('Asia/Jakarta');
		$tgl = date('Y-m-d');

		$this->db->where('tgl', $tgl);
		$this->db->order_by('no_struk','ASC');
		$query = $this->db->get('mas_penjualan');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {

			$result[] = array(
				'id_penjualan' => $list['id_penjualan'],
				'tgl' => $this->M_kasir->tanggal_indo($list['tgl'], true),
				'wkt' => $list['wkt'],
				'no_struk' => $list['no_struk'],
				'id_jns_pembayaran' => $list['id_jns_pembayaran'],
				'jns_pembayaran_tunai' => $this->M_kasir->get_jns_pembayaran($list['id_jns_pembayaran']),
				'jns_pembayaran_kartu' => $this->M_kasir->get_jns_pembayaran($list['id_jns_pembayaran']).' / '.$this->M_kasir->get_jns_kartu($list['id_jns_kartu']).' / '.$list['nokartu'],
				'ttl_hrg' => 'Rp. '.number_format($list['ttl_hrg'], 0, '.', '.') .' ,-',
				'pemesan' => $list['pemesan'],
				'id_user' => $list['id_user'],
				'nm_user' => $this->M_kasir->get_user($list['id_user'])
			);
		}

		return $result;
	}

	function dataPenjualanCari($tgl_awal,$tgl_akhir,$no_struk)
	{
		date_default_timezone_set('Asia/Jakarta');
		$y = date('Y');

		$awal = $tgl_awal;
		if ($awal == '') {
			$this->db->where('tgl >=', $y.'-01-01');
		} else {
			$this->db->where('tgl >=', $tgl_awal);
		}

		$akhir = $tgl_akhir;
		if ($akhir == '') {
			$this->db->where('tgl <=', $y.'-12-31');
		} else {
			$this->db->where('tgl <=', $tgl_akhir);
		}

		$struk = $no_struk;
		if ($struk != 0) {
			$this->db->where('no_struk', $no_struk);
		} else {
			$this->db->where_not_in('no_struk','');
		}

		//$this->db->where('tgl >=', $tgl_awal);
		//$this->db->where('tgl <=', $tgl_akhir);
		//$this->db->where('no_struk', $no_struk);
		$this->db->order_by('no_struk','ASC');
		$query = $this->db->get('mas_penjualan');
		$hsl = $query->result_array();

		if ($hsl == null) {
			$result = array(
				'response' => 'tidak ada data'
			);
		} else {
			foreach ($hsl as $list) {

				$result[] = array(
					'id_penjualan' => $list['id_penjualan'],
					'tgl' => $this->M_kasir->tanggal_indo($list['tgl'], true),
					'wkt' => $list['wkt'],
					'no_struk' => $list['no_struk'],
					'id_jns_pembayaran' => $list['id_jns_pembayaran'],
					'jns_pembayaran_tunai' => $this->M_kasir->get_jns_pembayaran($list['id_jns_pembayaran']),
					'jns_pembayaran_kartu' => $this->M_kasir->get_jns_pembayaran($list['id_jns_pembayaran']).' / '.$this->M_kasir->get_jns_kartu($list['id_jns_kartu']).' / '.$list['nokartu'],
					'ttl_hrg' => 'Rp. '.number_format($list['ttl_hrg'], 0, '.', '.') .' ,-',
					'pemesan' => $list['pemesan'],
					'id_user' => $list['id_user'],
					'nm_user' => $this->M_kasir->get_user($list['id_user'])
				);
			}
		}
		return $result;
	}

	function get_penjualan_by_id($no_struk){
		$this->db->order_by('no_struk','ASC');
		$this->db->where('no_struk', $no_struk);
		$hsl = $this->db->get('mas_penjualan');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_penjualan' => $data->id_penjualan,
					'no_struk' => $data->no_struk,
				);
			}
		}
		return $hasil;
	}

	function hapus_penjualan($no_struk){
		$delete = $this->db->delete('mas_penjualan',array('no_struk' => $no_struk));
		if ($delete == true) {
			$delete_penjualan_detail = $this->db->delete('mas_penjualan_detail',array('no_struk' => $no_struk));;
		}
		return $delete;
	}

	function export_excel($tgl_awal,$tgl_akhir,$no_struk){
		date_default_timezone_set('Asia/Jakarta');
		$y = date('Y');

		$awal = $tgl_awal;
		if ($awal == '') {
			$this->db->where('tgl >=', $y.'-01-01');
		} else {
			$this->db->where('tgl >=', $tgl_awal);
		}

		$akhir = $tgl_akhir;
		if ($akhir == '') {
			$this->db->where('tgl <=', $y.'-12-31');
		} else {
			$this->db->where('tgl <=', $tgl_akhir);
		}

		$struk = $no_struk;
		if ($struk != 0) {
			$this->db->where('no_struk', $no_struk);
		} else {
			$this->db->where_not_in('no_struk','');
		}

		$this->db->order_by('no_struk','ASC');
		$query = $this->db->get('mas_penjualan');
		$hsl = $query->result_array();
		return$hsl;
	}
	/************ END OF DATA PENJUALAN ************/
}
