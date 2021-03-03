<?php
class M_portal extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	function total_user() {
		$query = $this->db->get('mas_user');
		return $query->num_rows();
	}

	function total_penjualan_bln_ini() {
		date_default_timezone_set('Asia/Jakarta');
		$m = date('m');
		$y = date('Y');
		$this->db->where('tgl >=', $y.'-'.$m.'-01');
		$this->db->where('tgl <=', $y.'-'.$m.'-31');
		$this->db->select_sum('ttl_hrg');
		$this->db->from('mas_penjualan');
		$query = $this->db->get();
		return $query->row()->ttl_hrg;
	}

	function penjualan_per_bln($bln) {
		date_default_timezone_set('Asia/Jakarta');
		$y = date('Y');
		$this->db->where('tgl >=', $y.'-'.$bln.'-01');
		$this->db->where('tgl <=', $y.'-'.$bln.'-31');
		$this->db->select_sum('ttl_hrg');
		$this->db->from('mas_penjualan');
		$query = $this->db->get();
		$hsl = $query->row()->ttl_hrg;
		if ($hsl == null) {
			$result = 0;
		} else {
			$result = (int)$hsl;
		}

		return $result;
	}

	function data_banyak_brg() {
		//$this->db->order_by('qty','DESC');
		$query = $this->db->query("SELECT id_hrg_kopi,SUM(qty) AS qty FROM mas_penjualan_detail GROUP BY id_hrg_kopi ORDER BY qty DESC");
		$hasil = $query->result_array();
		return $hasil;
	}

	function get_nm_kopi($id) {
		$this->db->join("mas_jns_kopi","mas_jns_kopi.id_jns_kopi = mas_hrg_kopi.id_jns_kopi","left");
		$this->db->join("mas_pemanis","mas_pemanis.id_pemanis = mas_hrg_kopi.id_pemanis","left");
		$this->db->join("mas_ukuran","mas_ukuran.id_ukuran = mas_hrg_kopi.id_ukuran","left");
		$this->db->join("mas_tempat","mas_tempat.id_tempat = mas_hrg_kopi.id_tempat","left");
		$this->db->join("mas_ekstra","mas_ekstra.id_ekstra = mas_hrg_kopi.id_ekstra","left");
		$this->db->where("mas_hrg_kopi.id_hrg_kopi",$id);
		$this->db->order_by('nm_jns_kopi','ASC');
		$query = $this->db->get('mas_hrg_kopi');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$result = $list['nm_jns_kopi'].' '.$list['nm_pemanis'].' '.$list['nm_ukuran'].' '.$list['nm_tempat'].' '.$list['nm_ekstra'];
		}
		return $result;
	}

	function total_menu() {
		$query = $this->db->get('mas_hrg_kopi');
		return $query->num_rows();
	}

	function bulanThn($tanggal) {

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
		$split = explode('-', $tanggal);
		return $bulan[ (int)$split[1] ] . ' ' . $split[0];
	}

}
