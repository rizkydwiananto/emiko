<?php

class Api extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('M_api');
        $this->load->helper('file');
    }

	public function token()
	{
		//menggunakan input parameter di Body -> raw dalam postman
		// get posted data dari postman
		$data = json_decode(file_get_contents("php://input"));
		$username = $data->username; //menjabarkan nama
		$password = $data->password; //menjabarkan nama

		if ($username == '' && $password == '')
		{
			$response_error = array(
				'metadata' => array(
					'message' => 'Salah Username / Password',
					'code' => 500
				)
			);
			//http_response_code(200);
			header('Content-Type: application/json');
			echo json_encode($response_error);

		} else {

			//cek key di database api_keys
			$this->db->where('user_nm_rz','wstes');
			$query = $this->db->get('user_rz');
			$hsl = $query->result_array();
			foreach ($hsl as $list){
				$name = $list['user_nm_rz'];
				$key = $list['pass_nm_rz'];
			}

			//cek jika methode salah
			$method = $_SERVER['REQUEST_METHOD'];
			if ($method == 'POST')
			{
				// make sure data is not empty
				if(!empty($username) && !empty($password))
				{
					if ($username == $name && md5($password) == $key)
					{
						date_default_timezone_set('Asia/Jakarta');
						$date = date('Y-m-d');
						$time = date('H:i:s');

						//cek ip address
						function getUserIpAddr(){
							if(!empty($_SERVER['HTTP_CLIENT_IP'])){
								//ip from share internet
								$ip = $_SERVER['HTTP_CLIENT_IP'];
							}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
								//ip pass from proxy
								$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
							}else{
								$ip = $_SERVER['REMOTE_ADDR'];
							}
							return $ip;
						}
						$ip = getUserIpAddr();

						// Create Signature Hash
						$signature = hash_hmac('sha256', $name . "." . $date . $time, $key, true);

						// Encode Signature to Base64Url String
						$base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

						// Create JWT
						$jwt = $base64UrlSignature;

						$input = array(
							'token' => $jwt,
							'date' => $date,
							'time' => $time,
							'username_post' => $name,
							'password_post' => $key,
							'ip_address' => $ip
						);
						$insert = $this->db->insert('token',$input);

						$response = array(
							'response' => array(
								'token' => $jwt
							),
							'metadata' => array(
								'message' => 'Ok',
								'code' => 200
							)
						);
						//http_response_code(200);
						header('Content-Type: application/json');
						echo json_encode($response);
					}
					// if unable to create the product, tell the user
					else {
						$response_error = array(
							'metadata' => array(
								'message' => 'Salah! Username dan Password tidak sama dengan database !',
								'code' => 500
							)
						);
						//http_response_code(200);
						header('Content-Type: application/json');
						echo json_encode($response_error);
					}
				} else {
					$response_error = array(
						'metadata' => array(
							'message' => 'Salah ! Username dan Password tidak boleh kosong !',
							'code' => 500
						)
					);
					//http_response_code(200);
					header('Content-Type: application/json');
					echo json_encode($response_error);
				}
			} else {
				$response_error = array(
					'metadata' => array(
						'message' => 'Salah Method',
						'code' => 500
					)
				);
				//http_response_code(200);
				header('Content-Type: application/json');
				echo json_encode($response_error);
			}

		}
	}

	public function data()
	{
		$header = apache_request_headers();
		$xtoken = $header['x-token'];

		//cari token sesuai database
		$this->db->where('token',$xtoken);
		$query = $this->db->get('token');
		$hsl_token = $query->result_array();

		$method = $_SERVER['REQUEST_METHOD'];
		if ($method == 'POST') { //jika method benar

			if ($hsl_token == TRUE) { //jika data token benar

				date_default_timezone_set('Asia/Jakarta');
				$tgl_sekarang = date('Y-m-d');
				$wkt_sekarang = date('H:i:s');

				foreach ($hsl_token as $dt_token) {
					$tokenn = $dt_token['token'];
					$tgl_token = $dt_token['date'];
					$tgl_ed_token = date('Y-m-d', strtotime('+30 days', strtotime($tgl_token)));
					$wkt = $dt_token['time'];
					$wkt_ed_token = date('H:i:s', strtotime($wkt) + 60 * 1); //1 menit
				}

				if ($wkt_sekarang <= $wkt_ed_token) { //jika waktu tidak lebih dari 1 menit

					//fungsi mencari alamat ip
					function getUserIpAddr()
					{
						if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
							//ip from share internet
							$ip = $_SERVER['HTTP_CLIENT_IP'];
						} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
							//ip pass from proxy
							$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
						} else {
							$ip = $_SERVER['REMOTE_ADDR'];
						}
						return $ip;
					}

					$ip = getUserIpAddr();

					date_default_timezone_set('Asia/Jakarta');
					$req_uri = "$_SERVER[REQUEST_URI]";
					$input = array(
						'req_uri' => $req_uri,
						'req_uri_lastupdate' => date('Y-m-d H:i:s'),
						'ip_address' => $ip
					);
					$update = $this->db->update('token', $input, array('token' => $tokenn));

					if ($update === true) { //jika data update berhasil

						$this->db->order_by('nama', 'ASC');
						$query_datanm = $this->db->get('data_nm');
						$hsl_datanm = $query_datanm->result_array();

						if ($hsl_datanm != null) { //jika data datanm berhasil di query

							foreach ($hsl_datanm as $list_datanm)
							{
								$list_array[] = array(
									'id_data_nm' => $list_datanm['id_data_nm'],
									'nama' => $list_datanm['nama'],
									'jkel' => $list_datanm['jkel'],
									'alamat' => $list_datanm['alamat'],
									'hobi' => $list_datanm['hobi'],
									'telpon' => $list_datanm['telpon'],
								);
							}

							$response = array(
								'response' => array(
									'list' => $list_array
								),
								'metadata' => array(
									'message' => 'Ok',
									'code' => 200
								)
							);
							//http_response_code(200);
							header('Content-Type: application/json');
							echo json_encode($response);

						} else { //jika data datanm tidak berhasil di query
							$response_error = array(
								'metadata' => array(
									'message' => 'Salah! Gagal query datanm!',
									'code' => 500
								)
							);
							//http_response_code(200);
							header('Content-Type: application/json');
							echo json_encode($response_error);
						}

					} else { //jika gagal update database token
						$response_error = array(
							'metadata' => array(
								'message' => 'Salah! Gagal update database token!',
								'code' => 500
							)
						);
						//http_response_code(200);
						header('Content-Type: application/json');
						echo json_encode($response_error);
					}

				} else { //jika waktu expired lebih dari 1 menit
					$response_error = array(
						'metadata' => array(
							'message' => 'Salah! Waktu Expired !',
							'code' => 500
						)
					);
					//http_response_code(200);
					header('Content-Type: application/json');
					echo json_encode($response_error);
				}

			} else { //jika data token salah
				$response_error = array(
					'metadata' => array(
						'message' => 'Salah! Data token tidak sesuai',
						'code' => 500
					)
				);
				//http_response_code(200);
				header('Content-Type: application/json');
				echo json_encode($response_error);
			}

		} else { // Jika salah method
			$response_error = array(
				'metadata' => array(
					'message' => 'Salah Method',
					'code' => 500
				)
			);
			//http_response_code(200);
			header('Content-Type: application/json');
			echo json_encode($response_error);
		}
	}

}
