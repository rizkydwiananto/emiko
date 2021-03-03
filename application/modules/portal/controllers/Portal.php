<?php

class Portal extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_portal');
        $this->load->helper('file');
    }

	public function index() {
    	$data['total_user'] = $this->M_portal->total_user();
    	$data['total_penjualan_bln_ini'] = $this->M_portal->total_penjualan_bln_ini();
    	$data['total_menu'] = $this->M_portal->total_menu();
		$data['title'] = "Portal";
		$data['view'] = "portal";
		$this->load->view('header_admin',$data);
	}

	function data_brg() {
    	//$this->db->order_by('qty','DESC');
		$query = $this->db->query("SELECT id_hrg_kopi,SUM(qty) AS qty FROM mas_penjualan_detail GROUP BY id_hrg_kopi ORDER BY qty DESC");
		$hasil = $query->result_array();

		/*if($query->num_rows() > 0){
			foreach($query->result_array() as $data){
				$hasil = $data;
			}
			//return $hasil;
		}*/

		/*header('Content-Type: application/json');
		echo json_encode($hasil);*/
		print_r($hasil);
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
			$result = $list['nm_jns_kopi'];
		}
		print_r( $result);
	}

	function tes_penjualan($bln) {
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

		echo 'Rp. '. number_format($result,0,',','.');
	}

}
