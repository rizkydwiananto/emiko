<?php

class User extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_user');
        $this->load->helper('file');
    }

	/************ DATA AKSES ************/

	public function akses() {
		$data['title'] = 'Data Akses';
		$data['view'] = 'dataAkses';
		$this->load->view('header_admin',$data);
	}

	function data_akses(){
		$data=$this->M_user->data_akses();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_akses(){
		$nm_user_akses = $this->input->post('nm_user_akses');
		$data = $this->M_user->simpan_akses($nm_user_akses);
		echo json_encode($data);
	}

	function get_akses(){
		$id_user_akses = $this->input->get('id_user_akses');
		$data = $this->M_user->get_akses_by_id($id_user_akses);
		echo json_encode($data);
	}

	function hapus_akses(){
		$id_user_akses =$this->input->post('id_user_akses');
		$data = $this->M_user->hapus_akses($id_user_akses);
		echo json_encode($data);
	}

	function update_akses(){
		$id_user_akses = $this->input->post('id_user_akses');
		$nm_user_akses = $this->input->post('nm_user_akses');
		$data = $this->M_user->update_akses($id_user_akses,$nm_user_akses);
		echo json_encode($data);
	}

	/************ END OF DATA AKSES ************/


	/************ DATA USER ************/

	public function user_all() {
		$data['akses'] = $this->M_user->data_akses();
		$data['title'] = 'Data User';
		$data['view'] = 'dataUser';
		$this->load->view('header_admin',$data);
	}

	function data_user(){
		$data=$this->M_user->data_user();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function simpan_user(){
		$nm_user = $this->input->post('nm_user');
		$id_user_akses = $this->input->post('id_user_akses');
		$pwd_a = $this->input->post('pwd_a');
		$pwd_b = md5($this->input->post('pwd_a'));
		$data = $this->M_user->simpan_user($nm_user,$id_user_akses,$pwd_a,$pwd_b);
		echo json_encode($data);
	}

	function get_user(){
		$id_user = $this->input->get('id_user');
		$data = $this->M_user->get_user_by_id($id_user);
		echo json_encode($data);
	}

	function hapus_user(){
		$id_user =$this->input->post('id_user');
		$data = $this->M_user->hapus_user($id_user);
		echo json_encode($data);
	}

	function update_user(){
		$id_user = $this->input->post('id_user');
		$nm_user = $this->input->post('nm_user');
		$id_user_akses = $this->input->post('id_user_akses');
		$pwd_a = $this->input->post('pwd_a');
		$pwd_b = md5($this->input->post('pwd_a'));
		$data = $this->M_user->update_user($id_user,$nm_user,$id_user_akses,$pwd_a,$pwd_b);
		echo json_encode($data);
	}

	/************ END OF DATA USER ************/
}
