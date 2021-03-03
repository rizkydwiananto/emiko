<?php
class M_pengaturan extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	/************ DATA JENIS KOPI ************/

	function data_jenis_kopi()
	{
		$this->db->order_by('nm_jns_kopi','ASC');
		$query = $this->db->get('mas_jns_kopi');
		return $query->result_array();
	}

	function simpan_jenis_kopi($nm_jns_kopi){
		$insert_jns_kopi = array(
			'nm_jns_kopi' => $nm_jns_kopi,
		);
		$hasil_insert = $this->db->insert('mas_jns_kopi',$insert_jns_kopi);
		return $hasil_insert;
	}

	function hapus_jns_kopi($id_jns_kopi){
		$delete = $this->db->delete('mas_jns_kopi',array('id_jns_kopi' => $id_jns_kopi));
		return $delete;
	}

	function get_jns_kopi_by_id($id_jns_kopi){
		$this->db->order_by('nm_jns_kopi','ASC');
		$this->db->where('id_jns_kopi', $id_jns_kopi);
		$hsl = $this->db->get('mas_jns_kopi');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_jns_kopi' => $data->id_jns_kopi,
					'nm_jns_kopi' => $data->nm_jns_kopi,
				);
			}
		}
		return $hasil;
	}

	function get_jns_kopi_not_by_id($id){
		$this->db->order_by('nm_jns_kopi','ASC');
		$this->db->where_not_in('id_jns_kopi', $id);
		$query = $this->db->get('mas_jns_kopi');
		return $query->result_array();


	}

	function get_jns_kopi_by_nama_jenis($nama_jenis){
		$this->db->order_by('nm_jns_kopi','ASC');
		$this->db->like('nm_jns_kopi', $nama_jenis);
		$hsl = $this->db->get('mas_jns_kopi');

		$key = 0;
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id' => $data->id_jns_kopi,
					'text' => $data->nm_jns_kopi,
				);
			}
		}
		return $hasil;
	}

	function update_jns_kopi($id_jns_kopi,$nm_jns_kopi){
		$data = array(
			'nm_jns_kopi' => $nm_jns_kopi,
		);

		$update = $this->db->update('mas_jns_kopi',$data,array('id_jns_kopi' => $id_jns_kopi));
		return $update;
	}

	/************ END OF DATA JENIS KOPI ************/

	/************ DATA UKURAN ************/

	function data_ukuran()
	{
		$this->db->order_by('nm_ukuran','ASC');
		$query = $this->db->get('mas_ukuran');
		return $query->result_array();
	}

	function simpan_ukuran($nm_ukuran){
		$insert_ukuran = array(
			'nm_ukuran' => $nm_ukuran,
		);
		$hasil_insert = $this->db->insert('mas_ukuran',$insert_ukuran);
		return $hasil_insert;
	}

	function get_ukuran_by_id($id_ukuran){
		$this->db->order_by('nm_ukuran','ASC');
		$this->db->where('id_ukuran', $id_ukuran);
		$hsl = $this->db->get('mas_ukuran');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_ukuran' => $data->id_ukuran,
					'nm_ukuran' => $data->nm_ukuran,
				);
			}
		}
		return $hasil;
	}

	function hapus_ukuran($id_ukuran){
		$delete = $this->db->delete('mas_ukuran',array('id_ukuran' => $id_ukuran));
		return $delete;
	}

	function update_ukuran($id_ukuran,$nm_ukuran){
		$data = array(
			'nm_ukuran' => $nm_ukuran,
		);

		$update = $this->db->update('mas_ukuran',$data,array('id_ukuran' => $id_ukuran));
		return $update;
	}

	/************ END OF DATA UKURAN ************/

	/************ DATA EKSTRA ************/

	function data_ekstra()
	{
		$this->db->order_by('nm_ekstra','ASC');
		$query = $this->db->get('mas_ekstra');
		return $query->result_array();
	}

	function simpan_ekstra($nm_ekstra){
		$insert_ekstra = array(
			'nm_ekstra' => $nm_ekstra,
		);
		$hasil_insert = $this->db->insert('mas_ekstra',$insert_ekstra);
		return $hasil_insert;
	}

	function get_ekstra_by_id($id_ekstra){
		$this->db->order_by('nm_ekstra','ASC');
		$this->db->where('id_ekstra', $id_ekstra);
		$hsl = $this->db->get('mas_ekstra');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_ekstra' => $data->id_ekstra,
					'nm_ekstra' => $data->nm_ekstra,
				);
			}
		}
		return $hasil;
	}

	function hapus_ekstra($id_ekstra){
		$delete = $this->db->delete('mas_ekstra',array('id_ekstra' => $id_ekstra));
		return $delete;
	}

	function update_ekstra($id_ekstra,$nm_ekstra){
		$data = array(
			'nm_ekstra' => $nm_ekstra,
		);

		$update = $this->db->update('mas_ekstra',$data,array('id_ekstra' => $id_ekstra));
		return $update;
	}

	/************ END OF DATA EKSTRA ************/

	/************ DATA PEMANIS ************/

	function data_pemanis()
	{
		$this->db->order_by('nm_pemanis','ASC');
		$query = $this->db->get('mas_pemanis');
		return $query->result_array();
	}

	function simpan_pemanis($nm_pemanis){
		$insert_pemanis = array(
			'nm_pemanis' => $nm_pemanis,
		);
		$hasil_insert = $this->db->insert('mas_pemanis',$insert_pemanis);
		return $hasil_insert;
	}

	function get_pemanis_by_id($id_pemanis){
		$this->db->order_by('nm_pemanis','ASC');
		$this->db->where('id_pemanis', $id_pemanis);
		$hsl = $this->db->get('mas_pemanis');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_pemanis' => $data->id_pemanis,
					'nm_pemanis' => $data->nm_pemanis,
				);
			}
		}
		return $hasil;
	}

	function hapus_pemanis($id_pemanis){
		$delete = $this->db->delete('mas_pemanis',array('id_pemanis' => $id_pemanis));
		return $delete;
	}

	function update_pemanis($id_pemanis,$nm_pemanis){
		$data = array(
			'nm_pemanis' => $nm_pemanis,
		);

		$update = $this->db->update('mas_pemanis',$data,array('id_pemanis' => $id_pemanis));
		return $update;
	}

	/************ END OF DATA PEMANIS ************/

	/************ DATA TEMPAT ************/

	function data_tempat()
	{
		$this->db->order_by('nm_tempat','ASC');
		$query = $this->db->get('mas_tempat');
		return $query->result_array();
	}

	function simpan_tempat($nm_tempat){
		$insert_tempat = array(
			'nm_tempat' => $nm_tempat,
		);
		$hasil_insert = $this->db->insert('mas_tempat',$insert_tempat);
		return $hasil_insert;
	}

	function get_tempat_by_id($id_tempat){
		$this->db->order_by('nm_tempat','ASC');
		$this->db->where('id_tempat', $id_tempat);
		$hsl = $this->db->get('mas_tempat');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_tempat' => $data->id_tempat,
					'nm_tempat' => $data->nm_tempat,
				);
			}
		}
		return $hasil;
	}

	function hapus_tempat($id_tempat){
		$delete = $this->db->delete('mas_tempat',array('id_tempat' => $id_tempat));
		return $delete;
	}

	function update_tempat($id_tempat,$nm_tempat){
		$data = array(
			'nm_tempat' => $nm_tempat,
		);

		$update = $this->db->update('mas_tempat',$data,array('id_tempat' => $id_tempat));
		return $update;
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

	function simpan_harga_kopi($id_jns_kopi,$id_pemanis,$id_ukuran,$id_tempat,$id_ekstra,$hrg_kopi){
		$insert_harga_kopi = array(
			'id_jns_kopi' => $id_jns_kopi,
			'id_pemanis' => $id_pemanis,
			'id_ukuran' => $id_ukuran,
			'id_tempat' => $id_tempat,
			'id_ekstra' => $id_ekstra,
			'hrg_kopi' => $hrg_kopi,
		);
		$hasil_insert = $this->db->insert('mas_hrg_kopi',$insert_harga_kopi);
		return $hasil_insert;
	}

	function get_harga_kopi_by_id($id_jns_kopi){
		$this->db->join("mas_jns_kopi","mas_jns_kopi.id_jns_kopi = mas_hrg_kopi.id_jns_kopi","left");
		$this->db->join("mas_pemanis","mas_pemanis.id_pemanis = mas_hrg_kopi.id_pemanis","left");
		$this->db->join("mas_ukuran","mas_ukuran.id_ukuran = mas_hrg_kopi.id_ukuran","left");
		$this->db->join("mas_tempat","mas_tempat.id_tempat = mas_hrg_kopi.id_tempat","left");
		$this->db->join("mas_ekstra","mas_ekstra.id_ekstra = mas_hrg_kopi.id_ekstra","left");
		$this->db->order_by('id_hrg_kopi','ASC');
		$this->db->where('id_hrg_kopi', $id_jns_kopi);
		$hsl = $this->db->get('mas_hrg_kopi');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_hrg_kopi' => $data->id_hrg_kopi,
					'id_jns_kopi' => $data->id_jns_kopi,
					'id_pemanis' => $data->id_pemanis,
					'id_ukuran' => $data->id_ukuran,
					'id_tempat' => $data->id_tempat,
					'id_ekstra' => $data->id_ekstra,
					'nm_jns_kopi' => $data->nm_jns_kopi,
					'nm_pemanis' => $data->nm_pemanis,
					'nm_ukuran' => $data->nm_ukuran,
					'nm_tempat' => $data->nm_tempat,
					'nm_ekstra' => $data->nm_ekstra,
					'hrg_kopi' => $data->hrg_kopi,
					'hrg_kopi_format' => number_format($data->hrg_kopi,0,',','.')
				);
			}
		}
		return $hasil;
	}

	function hapus_harga_kopi($id_hrg_kopi){
		$delete = $this->db->delete('mas_hrg_kopi',array('id_hrg_kopi' => $id_hrg_kopi));
		return $delete;
	}

	function update_harga_kopi($id_hrg_kopi,$id_jns_kopi,$id_pemanis,$id_ukuran,$id_tempat,$id_ekstra,$hrg_kopi){
		$data = array(
			'id_jns_kopi' => $id_jns_kopi,
			'id_pemanis' => $id_pemanis,
			'id_ukuran' => $id_ukuran,
			'id_tempat' => $id_tempat,
			'id_ekstra' => $id_ekstra,
			'hrg_kopi' => $hrg_kopi,
		);

		$update = $this->db->update('mas_hrg_kopi',$data,array('id_hrg_kopi' => $id_hrg_kopi));
		return $update;
	}

	/************ END OF DATA HARGA KOPI ************/


	/************ DATA JENIS PEMBAYARAN ************/

	function data_jns_pembayaran()
	{
		$this->db->order_by('nm_jns_pembayaran','ASC');
		$query = $this->db->get('mas_jns_pembayaran');
		return $query->result_array();
	}

	function simpan_jns_pembayaran($nm_jns_pembayaran){
		$insert_jns_pembayaran = array(
			'nm_jns_pembayaran' => $nm_jns_pembayaran,
		);
		$hasil_insert = $this->db->insert('mas_jns_pembayaran',$insert_jns_pembayaran);
		return $hasil_insert;
	}

	function get_pembayaran_not_in_by_id($id_jns_pembayaran) {
		$this->db->order_by('nm_jns_pembayaran','ASC');
		$this->db->where_not_in('id_jns_pembayaran', $id_jns_pembayaran);
		$query = $this->db->get('mas_jns_pembayaran');
		$hsl = $query->result_array();
		foreach ($hsl as $list) {
			$hasil[] = array(
				'id' => $list['id_jns_pembayaran'],
				'text' => $list['nm_jns_pembayaran']
			);
		}

		return array('results' => $hasil);
	}

	function get_jns_pembayaran_by_id($id_jns_pembayaran){
		$this->db->order_by('nm_jns_pembayaran','ASC');
		$this->db->where('id_jns_pembayaran', $id_jns_pembayaran);
		$hsl = $this->db->get('mas_jns_pembayaran');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_jns_pembayaran' => $data->id_jns_pembayaran,
					'nm_jns_pembayaran' => $data->nm_jns_pembayaran,
				);
			}
		}
		return $hasil;
	}

	function hapus_jns_pembayaran($id_jns_pembayaran){
		$delete = $this->db->delete('mas_jns_pembayaran',array('id_jns_pembayaran' => $id_jns_pembayaran));
		return $delete;
	}

	function update_jns_pembayaran($id_jns_pembayaran,$nm_jns_pembayaran){
		$data = array(
			'nm_jns_pembayaran' => $nm_jns_pembayaran,
		);

		$update = $this->db->update('mas_jns_pembayaran',$data,array('id_jns_pembayaran' => $id_jns_pembayaran));
		return $update;
	}

	/************ END OF DATA JENIS PEMBAYARAN ************/


	/************ DATA JENIS KARTU ************/

	function data_jns_kartu()
	{
		$this->db->join("mas_jns_pembayaran","mas_jns_pembayaran.id_jns_pembayaran = mas_jns_kartu.id_jns_pembayaran","left");
		$this->db->order_by('mas_jns_kartu.nm_jns_kartu','ASC');
		$query = $this->db->get('mas_jns_kartu');
		return $query->result_array();
	}

	function simpan_jns_kartu($nm_jns_kartu,$id_jns_pembayaran){
		$insert_jns_kartu = array(
			'nm_jns_kartu' => $nm_jns_kartu,
			'id_jns_pembayaran' => $id_jns_pembayaran,
		);
		$hasil_insert = $this->db->insert('mas_jns_kartu',$insert_jns_kartu);
		return $hasil_insert;
	}

	function get_jns_kartu_by_id($id_jns_kartu){
		$this->db->join("mas_jns_pembayaran","mas_jns_pembayaran.id_jns_pembayaran = mas_jns_kartu.id_jns_pembayaran","left");
		$this->db->order_by('mas_jns_kartu.nm_jns_kartu','ASC');
		$this->db->where('id_jns_kartu', $id_jns_kartu);
		$hsl = $this->db->get('mas_jns_kartu');

		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'id_jns_kartu' => $data->id_jns_kartu,
					'nm_jns_kartu' => $data->nm_jns_kartu,
					'id_jns_pembayaran_sel' => array(
						array(
							'id' => $data->id_jns_pembayaran,
							'text' => $data->nm_jns_pembayaran,
							'selected' => true
						)
					),
					'tes' => $this->M_pengaturan->get_pembayaran_not_in_by_id($data->id_jns_pembayaran
					)
				);
			}
		}
		return $hasil;
	}

	function hapus_jns_kartu($id_jns_kartu){
		$delete = $this->db->delete('mas_jns_kartu',array('id_jns_kartu' => $id_jns_kartu));
		return $delete;
	}

	function update_jns_kartu($id_jns_kartu,$id_jns_pembayaran,$nm_jns_kartu){
		$data = array(
			'nm_jns_kartu' => $nm_jns_kartu,
			'id_jns_pembayaran' => $id_jns_pembayaran
		);

		$update = $this->db->update('mas_jns_kartu',$data,array('id_jns_kartu' => $id_jns_kartu));
		return $update;
	}

	/************ END OF DATA JENIS KARTU ************/
}
