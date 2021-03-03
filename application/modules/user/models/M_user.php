<?php
class M_user extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	/************ DATA AKSES ************/

	function data_akses()
	{
		$this->db->order_by('nm_user_akses','ASC');
		$query = $this->db->get('mas_user_akses');
		return $query->result_array();
	}

	function simpan_akses($nm_user_akses){
		$insert_akses = array(
			'nm_user_akses' => $nm_user_akses,
		);
		$hasil_insert = $this->db->insert('mas_user_akses',$insert_akses);
		return $hasil_insert;
	}

	function get_akses_by_id($id_user_akses){
		$this->db->order_by('nm_user_akses','ASC');
		$this->db->where('id_user_akses', $id_user_akses);
		$hsl = $this->db->get('mas_user_akses');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_user_akses' => $data->id_user_akses,
					'nm_user_akses' => $data->nm_user_akses,
				);
			}
		}
		return $hasil;
	}

	function hapus_akses($id_user_akses){
		$delete = $this->db->delete('mas_user_akses',array('id_user_akses' => $id_user_akses));
		return $delete;
	}

	function update_akses($id_user_akses,$nm_user_akses){
		$data = array(
			'nm_user_akses' => $nm_user_akses,
		);

		$update = $this->db->update('mas_user_akses',$data,array('id_user_akses' => $id_user_akses));
		return $update;
	}

	function get_akses_not_in_by_id($id_user_akses) {
		$this->db->order_by('nm_user_akses','ASC');
		$this->db->where_not_in('id_user_akses', $id_user_akses);
		$hsl = $this->db->get('mas_user_akses');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id_user_akses,
					'text' => $data->nm_user_akses,
				);
			}
		}
		return $hasil;
	}

	/************ END OF DATA AKSES ************/


	/************ DATA USER ************/

	function data_user()
	{
		$this->db->join("mas_user_akses","mas_user_akses.id_user_akses = mas_user.id_user_akses","left");
		$this->db->order_by('mas_user.nm_user','ASC');
		$query = $this->db->get('mas_user');
		return $query->result_array();
	}

	function simpan_user($nm_user,$id_user_akses,$pwd_a,$pwd_b){
		$insert_user = array(
			'nm_user' => $nm_user,
			'id_user_akses' => $id_user_akses,
			'pwd_a' => $pwd_a,
			'pwd_b' => $pwd_b
		);
		$hasil_insert = $this->db->insert('mas_user',$insert_user);
		return $hasil_insert;
	}

	function get_user_by_id($id_user){
		$this->db->join("mas_user_akses","mas_user_akses.id_user_akses = mas_user.id_user_akses","left");
		$this->db->order_by('mas_user.nm_user','ASC');
		$this->db->where('id_user', $id_user);
		$hsl = $this->db->get('mas_user');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_user' => $data->id_user,
					'nm_user' => $data->nm_user,
					'akses_id' => array(
						array(
							'id' => $data->id_user_akses,
							'text' => $data->nm_user_akses
						)
					),
					'tes' => array(
						$this->M_user->get_akses_not_in_by_id($data->id_user_akses)
					),
					'pwd_a' => $data->pwd_a,
				);
			}
		}
		return $hasil;
	}

	function hapus_user($id_user){
		$delete = $this->db->delete('mas_user',array('id_user' => $id_user));
		return $delete;
	}

	function update_user($id_user,$nm_user,$id_user_akses,$pwd_a,$pwd_b){
		$data = array(
			'nm_user' => $nm_user,
			'id_user_akses' => $id_user_akses,
			'pwd_a' => $pwd_a,
			'pwd_b' => $pwd_b
		);

		$update = $this->db->update('mas_user',$data,array('id_user' => $id_user));
		return $update;
	}

	/************ END OF DATA USER ************/
}
