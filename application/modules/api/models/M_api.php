<?php
class m_api extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	/************AKSES************/

	function akses_list()
	{
		$this->db->order_by('akses_nm','ASC');
		$query = $this->db->get('akses');
		return $query->result_array();
	}

	function simpan_akses($akses_nm){
		$insert_akses = array(
			'akses_nm' => $akses_nm,
		);
		$hasil_insert = $this->db->insert('akses',$insert_akses);
		return $hasil_insert;
	}

	function hapus_akses($id_akses){
		$delete = $this->db->delete('akses',array('id_akses' => $id_akses));
		return $delete;
	}

	function get_akses_by_id($id_akses){
		$this->db->order_by('akses_nm','ASC');
		$this->db->where('id_akses', $id_akses);
		$hsl = $this->db->get('akses');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_akses' => $data->id_akses,
					'akses_nm' => $data->akses_nm,
				);
			}
		}
		return $hasil;
	}

	function update_akses($id_akses,$akses_nm){
		$data = array(
			'akses_nm' => $akses_nm,
		);

		$update = $this->db->update('akses',$data,array('id_akses' => $id_akses));
		return $update;
	}

	/************AKSES************/
}
