<?php
class m_home extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	//    untuk mengcek jumlah username dan password yang sesuai
	function login($nm_user,$pwd_a) {
		$this->db->join("mas_user_akses","mas_user_akses.id_user_akses = mas_user.id_user_akses","left");
		$this->db->where('nm_user', $nm_user);
		$this->db->where('pwd_b', $pwd_a);
		$query =  $this->db->get('mas_user');
		return $query->num_rows();
	}

	//    untuk mengambil data hasil login
	function data_login($nm_user,$pwd_a) {
		$this->db->join("mas_user_akses","mas_user_akses.id_user_akses = mas_user.id_user_akses","left");
		$this->db->where('nm_user', $nm_user);
		$this->db->where('pwd_b', $pwd_a);
		return $this->db->get('mas_user')->row();
	}

}
