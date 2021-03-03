<?php

class Home extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('m_home');
        $this->load->helper('file');
    }

	public function index($error = NULL) {
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('login');
	}

	public function auth() {
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('m_home');
		$login = $this->m_home->login($this->input->post('nm_user'), md5($this->input->post('pwd_a')));

		if ($login == 1) {
			//ambil detail data
			$row = $this->m_home->data_login($this->input->post('nm_user'), md5($this->input->post('pwd_a')));

			//daftarkan session
			$data = array(
				'logged' => TRUE,
				'id_user' => $row->id_user,
				'id_user_akses' => $row->id_user_akses,
				'nm_user' => $row->nm_user,
				'nm_user_akses' => $row->nm_user_akses,
				'pwd_a' => $row->pwd_a,
			);
			$this->session->set_userdata($data);

			if ($this->session->userdata("id_user_akses") == 2) {
				//redirect ke halaman sukses
				redirect('portal','refresh');
			} else {
				redirect('kasir','refresh');
			}


		} else {
			//tampilkan pesan error
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-remove"></i>
                    User / Password anda salah.
                  </div>');
			redirect('home/');
		}
	}

	function out() {
		$this->load->helper('url');
		//destroy session
		$this->session->sess_destroy();

		//redirect ke halaman login
		redirect(site_url('home/'));
	}

}
