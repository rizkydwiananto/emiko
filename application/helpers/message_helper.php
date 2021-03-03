<?php
	function get_notification($operation, $status) {
		$notification = "";
		
		switch($status) {
			case 0 : 
				$status = "gagal";
			break;
			case 1 : 
				$status = "berhasil";
			break;
			case 2 : 
				$status = "data tidak lengkap";
			break;
			case 9 : 
				$status = "sudah ada";
			break;
			default : 
				$status = "";
			break;	
		}
		
		switch($operation) {
			case "insert" : 
				$operation = "disimpan";
			break;
			case "update" : 
				$operation = "diubah";
			break;		
			case "delete" : 
				$operation = "dihapus";
			break;
			case "finish" : 
				$operation = "diselesaikan";
			break;
			default : 
				$operation = "";
			break;	
		}
		
		$notification = "Data " .$status. ' '.$operation;
		return $notification;
	}
	
	function get_notify_status($status) {
		switch($status) {
			case 0 : 
				$status = "DANGER";
			break;
			case 1 : 
				$status = "SUCCESS";
			break;
			case 2 : 
				$status = "WARNING";
			break;
			case 9 : 
				$status = "INFO";
			break;
			default : 
				$status = "";
			break;
		}	
		
		return $status;
	}	
?>