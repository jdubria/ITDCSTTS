<?php 
function maketimeLec($lec){
	$str = 0;
	$time = DATE("H:i:s", mktime($lec,$str,0));
	return $time;	
}

function checktimeforlec2($lec){

	$lectime1 = $lec/2;
	$str = 0;
	if (strpos($lectime1, '.') !== false) {
    	$pos = strpos($lectime1, ".");
    	$dot = substr($lectime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}
	$time = DATE("H:i:s", mktime($lectime1,$str,0));
	return $time;	
}


function checktimeforlec3($lec){

	$lectime1 = $lec/3;
	$str = 0;
	if (strpos($lectime1, '.') !== false) {
    	$pos = strpos($lectime1, ".");
    	$dot = substr($lectime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}
	$time = DATE("H:i:s", mktime($lectime1,$str,0));
	return $time;	
}

?>