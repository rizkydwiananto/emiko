<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    $ip      = $this->input->ip_address();// Mendapatkan IP komputer user
        $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
        $waktu   = time(); //
         
        // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM tstatistika WHERE ip='$ip' AND tanggal='$tanggal'");
        
        // Kalau belum ada, simpan data user tersebut ke database
        if($s->num_rows() == 0){
            $this->db->query("INSERT INTO tstatistika(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
        }
        // Jika sudah ada, update
        else{
            $this->db->query("UPDATE tstatistika SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
        }
		
	}
}
