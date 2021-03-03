<?php
	function handling_characters($str) {
		$str = str_replace("@", "", $str);
		$str = str_replace("#", "", $str);
		$str = str_replace("$", "", $str);
		$str = str_replace("%", "", $str);
		$str = str_replace("^", "", $str);
		$str = str_replace("&", "", $str);
		$str = str_replace("*", "", $str);
		$str = str_replace("'", "", $str);
		$str = str_replace('"', '', $str);
		
		return $str;
	}
	
	function convert_to_nomor($id) {
		$digit = "";
		$nomor = "";
		
		$id = intval($id);
		if($id < 10) {
			$digit = "000000";
		}
		else if($id >= 10 && $id < 99) {
			$digit = "00000";
		}
		else if($id >= 100 && $id < 999) {
			$digit = "0000";
		}	
		else if($id >= 1000 && $id < 9999) {
			$digit = "000";
		}
		else if($id >= 10000 && $id < 99999) {
			$digit = "00";
		}
		else if($id >= 100000 && $id < 999999) {
			$digit = "0";
		}
		else {
			$digit = "";
		}
		
		$nomor = $digit .''. $id;
		
		return $nomor;
	}
	
	function convert_to_star($len) {
		$encryp = "";
		
		for($i=0; $i<$len; $i++) {
			$encryp = $encryp."*";
		}
		
		return $encryp;
	}
	
	function format_rupiah($value) {
		return 'Rp. '. number_format($value, 2);
	}

    function rupiah($harga)
{
    $a=(string)$harga; //membuat $harga menjadi string
    $len=strlen($a); //menghitung panjang string $a
 
    if ( $len <=18 )
    {
        $ratril=$len-3-1;
        $ramil=$len-6-1;
        $rajut=$len-9-1; //untuk mengecek apakah ada nilai ratusan juta (9angka dari belakang)
        $juta=$len-12-1; //untuk mengecek apakah ada nilai jutaan (6angka belakang)
        $ribu=$len-15-1; //untuk mengecek apakah ada nilai ribuan (3angka belakang)
 
        $angka='';
        for ($i=0;$i<$len;$i++)
        {
            if ( $i == $ratril )
            {
                $angka=$angka.$a[$i].".";
            }
            else if ($i == $ramil )
            {
                $angka=$angka.$a[$i].".";
            }
            else if ( $i == $rajut )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 3angka dari depan
            }
            else if ( $i == $juta )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 6angka dari depan
            }
            else if ( $i == $ribu )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 9angka dari depan
            }
            else
            {
                $angka=$angka.$a[$i];
            }
        }
    }
    echo $angka.",-";
    }


?>