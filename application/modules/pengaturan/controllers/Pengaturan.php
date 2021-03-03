<?php

class Pengaturan extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_pengaturan');
        $this->load->helper('file');
    }

    public function index() {
    	echo 'berhasil';
	}

    public function portal() {
    	//echo 'test';
        $data['title'] = "Portal";
        $data['view'] = "portal";
        $this->load->view('header_admin',$data);
    }

    /************ DATA JENIS KOPI ************/

    public function jenisKopi() {
    	$data['title'] = 'Data Jenis Kopi';
    	$data['view'] = 'dataJenisKopi';
    	$this->load->view('header_admin',$data);
	}

	function data_jenis_kopi(){
		$data=$this->M_pengaturan->data_jenis_kopi();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_jenis_kopi(){
		$nm_jns_kopi = $this->input->post('nm_jns_kopi');
		$data = $this->M_pengaturan->simpan_jenis_kopi($nm_jns_kopi);
		echo json_encode($data);
	}

	function hapus_jns_kopi(){
		$id_jns_kopi =$this->input->post('id_jns_kopi');
		$data = $this->M_pengaturan->hapus_jns_kopi($id_jns_kopi);
		echo json_encode($data);
	}

	function get_jns_kopi(){
		$nama_jenis = $this->input->get('nama_jenis');
		$data = $this->M_pengaturan->get_jns_kopi_by_nama_jenis($nama_jenis);
		echo json_encode($data);
	}

	function get_jns_kopi_cari(){
		$id_jns_kopi = $this->input->get('id_jns_kopi');
		$data = $this->M_pengaturan->get_jns_kopi_by_id($id_jns_kopi);
		echo json_encode($data);
	}

	function get_jns_kopi_not_by_id($id){
		$data = $this->M_pengaturan->get_jns_kopi_not_by_id($id);
		echo json_encode($data);
	}

	function update_jns_kopi(){
		$id_jns_kopi = $this->input->post('id_jns_kopi');
		$nm_jns_kopi = $this->input->post('nm_jns_kopi');
		$data = $this->M_pengaturan->update_jns_kopi($id_jns_kopi,$nm_jns_kopi);
		echo json_encode($data);
	}

	/************ END OF DATA JENIS KOPI ************/

	/************ DATA UKURAN ************/

	public function ukuran() {
		$data['title'] = 'Data Ukuran';
		$data['view'] = 'dataUkuran';
		$this->load->view('header_admin',$data);
	}

	function data_ukuran(){
		$data=$this->M_pengaturan->data_ukuran();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_ukuran(){
		$nm_ukuran = $this->input->post('nm_ukuran');
		$data = $this->M_pengaturan->simpan_ukuran($nm_ukuran);
		echo json_encode($data);
	}

	function get_ukuran(){
		$id_ukuran = $this->input->get('id_ukuran');
		$data = $this->M_pengaturan->get_ukuran_by_id($id_ukuran);
		echo json_encode($data);
	}

	function hapus_ukuran(){
		$id_ukuran =$this->input->post('id_ukuran');
		$data = $this->M_pengaturan->hapus_ukuran($id_ukuran);
		echo json_encode($data);
	}

	function update_ukuran(){
		$id_ukuran = $this->input->post('id_ukuran');
		$nm_ukuran = $this->input->post('nm_ukuran');
		$data = $this->M_pengaturan->update_ukuran($id_ukuran,$nm_ukuran);
		echo json_encode($data);
	}

	/************ END OF DATA UKURAN ************/

	/************ DATA EKSTRA ************/

	public function ekstra() {
		$data['title'] = 'Data Ekstra';
		$data['view'] = 'dataEkstra';
		$this->load->view('header_admin',$data);
	}

	function data_ekstra(){
		$data=$this->M_pengaturan->data_ekstra();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_ekstra(){
		$nm_ekstra = $this->input->post('nm_ekstra');
		$data = $this->M_pengaturan->simpan_ekstra($nm_ekstra);
		echo json_encode($data);
	}

	function get_ekstra(){
		$id_ekstra = $this->input->get('id_ekstra');
		$data = $this->M_pengaturan->get_ekstra_by_id($id_ekstra);
		echo json_encode($data);
	}

	function hapus_ekstra(){
		$id_ekstra =$this->input->post('id_ekstra');
		$data = $this->M_pengaturan->hapus_ekstra($id_ekstra);
		echo json_encode($data);
	}

	function update_ekstra(){
		$id_ekstra = $this->input->post('id_ekstra');
		$nm_ekstra = $this->input->post('nm_ekstra');
		$data = $this->M_pengaturan->update_ekstra($id_ekstra,$nm_ekstra);
		echo json_encode($data);
	}

	/************ END OF DATA EKSTRA ************/

	/************ DATA PEMANIS ************/

	public function pemanis() {
		$data['title'] = 'Data Pemanis';
		$data['view'] = 'dataPemanis';
		$this->load->view('header_admin',$data);
	}

	function data_pemanis(){
		$data=$this->M_pengaturan->data_pemanis();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_pemanis(){
		$nm_pemanis = $this->input->post('nm_pemanis');
		$data = $this->M_pengaturan->simpan_pemanis($nm_pemanis);
		echo json_encode($data);
	}

	function get_pemanis(){
		$id_pemanis = $this->input->get('id_pemanis');
		$data = $this->M_pengaturan->get_pemanis_by_id($id_pemanis);
		echo json_encode($data);
	}

	function hapus_pemanis(){
		$id_pemanis =$this->input->post('id_pemanis');
		$data = $this->M_pengaturan->hapus_pemanis($id_pemanis);
		echo json_encode($data);
	}

	function update_pemanis(){
		$id_pemanis = $this->input->post('id_pemanis');
		$nm_pemanis = $this->input->post('nm_pemanis');
		$data = $this->M_pengaturan->update_pemanis($id_pemanis,$nm_pemanis);
		echo json_encode($data);
	}


	/************ END OF DATA PEMANIS ************/

	/************ DATA TEMPAT ************/

	public function tempat() {
		$data['title'] = 'Data Tempat';
		$data['view'] = 'dataTempat';
		$this->load->view('header_admin',$data);
	}

	function data_tempat(){
		$data=$this->M_pengaturan->data_tempat();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_tempat(){
		$nm_tempat = $this->input->post('nm_tempat');
		$data = $this->M_pengaturan->simpan_tempat($nm_tempat);
		echo json_encode($data);
	}

	function get_tempat(){
		$id_tempat = $this->input->get('id_tempat');
		$data = $this->M_pengaturan->get_tempat_by_id($id_tempat);
		echo json_encode($data);
	}

	function hapus_tempat(){
		$id_tempat =$this->input->post('id_tempat');
		$data = $this->M_pengaturan->hapus_tempat($id_tempat);
		echo json_encode($data);
	}

	function update_tempat(){
		$id_tempat = $this->input->post('id_tempat');
		$nm_tempat = $this->input->post('nm_tempat');
		$data = $this->M_pengaturan->update_tempat($id_tempat,$nm_tempat);
		echo json_encode($data);
	}

	/************ END OF DATA TEMPAT ************/

	/************ DATA HARGA KOPI ************/

	public function hargaKopi() {
		$data['jnsKopi'] = $this->M_pengaturan->data_jenis_kopi();
		$data['pemanis'] = $this->M_pengaturan->data_pemanis();
		$data['ukuran'] = $this->M_pengaturan->data_ukuran();
		$data['tempat'] = $this->M_pengaturan->data_tempat();
		$data['ekstra'] = $this->M_pengaturan->data_ekstra();
		$data['title'] = 'Data Harga Kopi';
		$data['view'] = 'dataHargaKopi';
		$this->load->view('header_admin',$data);
	}

	function data_harga_kopi(){
		$data = $this->M_pengaturan->data_harga_kopi();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_harga_kopi(){
		$id_jns_kopi = $this->input->post('id_jns_kopi');
		$id_pemanis = $this->input->post('id_pemanis');
		$id_ukuran = $this->input->post('id_ukuran');
		$id_tempat = $this->input->post('id_tempat');
		$id_ekstra = $this->input->post('id_ekstra');
		$hrg_kopi = $this->input->post('hrg_kopi');
		$data = $this->M_pengaturan->simpan_harga_kopi($id_jns_kopi,$id_pemanis,$id_ukuran,$id_tempat,$id_ekstra,$hrg_kopi);
		echo json_encode($data);
	}

	function get_harga_kopi(){
		$id_hrg_kopi = $this->input->get('id_hrg_kopi');
		$data = $this->M_pengaturan->get_harga_kopi_by_id($id_hrg_kopi);
		echo json_encode($data);
	}

	function hapus_harga_kopi(){
		$id_hrg_kopi =$this->input->post('id_hrg_kopi');
		$data = $this->M_pengaturan->hapus_harga_kopi($id_hrg_kopi);
		echo json_encode($data);
	}

	function update_harga_kopi(){
		$id_hrg_kopi = $this->input->post('id_hrg_kopi');
		$id_jns_kopi = $this->input->post('id_jns_kopi');
		$id_pemanis = $this->input->post('id_pemanis');
		$id_ukuran = $this->input->post('id_ukuran');
		$id_tempat = $this->input->post('id_tempat');
		$id_ekstra = $this->input->post('id_ekstra');
		$hrg_kopi = $this->input->post('hrg_kopi');
		$data = $this->M_pengaturan->update_harga_kopi($id_hrg_kopi,$id_jns_kopi,$id_pemanis,$id_ukuran,$id_tempat,$id_ekstra,$hrg_kopi);
		echo json_encode($data);
	}

	/************ END OF DATA HARGA KOPI ************/


	/************ DATA JENIS PEMBAYARAN ************/

	public function jenisPembayaran() {
		$data['title'] = 'Data Jenis Pembayaran';
		$data['view'] = 'dataJenisPembayaran';
		$this->load->view('header_admin',$data);
	}

	function data_jns_pembayaran(){
		$data=$this->M_pengaturan->data_jns_pembayaran();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_jns_pembayaran(){
		$nm_jns_pembayaran = $this->input->post('nm_jns_pembayaran');
		$data = $this->M_pengaturan->simpan_jns_pembayaran($nm_jns_pembayaran);
		echo json_encode($data);
	}

	function get_jns_pembayaran(){
		$id_jns_pembayaran = $this->input->get('id_jns_pembayaran');
		$data = $this->M_pengaturan->get_jns_pembayaran_by_id($id_jns_pembayaran);
		echo json_encode($data);
	}

	function hapus_jns_pembayaran(){
		$id_jns_pembayaran =$this->input->post('id_jns_pembayaran');
		$data = $this->M_pengaturan->hapus_jns_pembayaran($id_jns_pembayaran);
		echo json_encode($data);
	}

	function update_jns_pembayaran(){
		$id_jns_pembayaran = $this->input->post('id_jns_pembayaran');
		$nm_jns_pembayaran = $this->input->post('nm_jns_pembayaran');
		$data = $this->M_pengaturan->update_jns_pembayaran($id_jns_pembayaran,$nm_jns_pembayaran);
		echo json_encode($data);
	}

	/************ END OF DATA JENIS PEMBAYARAN ************/


	/************ DATA JENIS KARTU ************/

	public function jenisKartu() {
		$data['jnsPembayaran'] = $this->M_pengaturan->data_jns_pembayaran();
		$data['title'] = 'Data Jenis Kartu';
		$data['view'] = 'dataJenisKartu';
		$this->load->view('header_admin',$data);
	}

	function data_jns_kartu(){
		$data=$this->M_pengaturan->data_jns_kartu();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_jns_kartu(){
		$nm_jns_kartu = $this->input->post('nm_jns_kartu');
		$id_jns_pembayaran = $this->input->post('id_jns_pembayaran');
		$data = $this->M_pengaturan->simpan_jns_kartu($nm_jns_kartu,$id_jns_pembayaran);
		echo json_encode($data);
	}

	function get_jns_kartu(){
		$id_jns_kartu = $this->input->get('id_jns_kartu');
		$data = $this->M_pengaturan->get_jns_kartu_by_id($id_jns_kartu);
		echo json_encode($data);
	}

	function hapus_jns_kartu(){
		$id_jns_kartu =$this->input->post('id_jns_kartu');
		$data = $this->M_pengaturan->hapus_jns_kartu($id_jns_kartu);
		echo json_encode($data);
	}

	function update_jns_kartu(){
		$id_jns_kartu = $this->input->post('id_jns_kartu');
		$id_jns_pembayaran = $this->input->post('id_jns_pembayaran');
		$nm_jns_kartu = $this->input->post('nm_jns_kartu');
		$data = $this->M_pengaturan->update_jns_kartu($id_jns_kartu,$id_jns_pembayaran,$nm_jns_kartu);
		echo json_encode($data);
	}

	function get_pembayaran_not_in_by_id() {
		$this->db->order_by('nm_jns_pembayaran','ASC');
		//$this->db->where_not_in('id_jns_pembayaran', $id_jns_pembayaran);
		$query = $this->db->get('mas_jns_pembayaran');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$hasil[] = array(
				'id' => $list['id_jns_pembayaran'],
				'text' => $list['nm_jns_pembayaran']
			);
		}

		echo json_encode(array('results' => $hasil));
	}

	/************ END OF DATA JENIS KARTU ************/

}
