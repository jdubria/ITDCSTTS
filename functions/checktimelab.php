<?php 
function maketimeLab($lab){
	$str = 0;
	$time = DATE("H:i:s", mktime($lab,$str,0));
	return $time;	
}

function checktimeforlab2($lab){

	$labtime1 = $lab/2;
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}

	$time = DATE("H:i:s", mktime($labtime1,$str,0));

	return $time;
	
}



function checktimeforlab3($lab){

	$labtime1 = $lab/3;
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}

	$time = DATE("H:i:s", mktime($labtime1,$str,0));

	return $time;
	
}

function checktimeforlab4($lab){

	$labtime1 = $lab/4;
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}

	$time = DATE("H:i:s", mktime($labtime1,$str,0));

	return $time;
	
}

function checktimeforlab5($lab){

	$labtime1 = $lab/5;
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}

	$time = DATE("H:i:s", mktime($labtime1,$str,0));

	return $time;
	
}
function multiplytwotime1($time1, $lab){
	$times = $lab;
	$labtime1 = 0;
 	for ($i=0; $i <= $time1; $i++) { 
 		$labtime1 = $times * $i;		
 	}
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}
	$time = DATE("H:i:s", mktime($labtime1,$str,0));

	return $time;		

}
function multiplytwotimefor2($time1, $lab){
	$times = $lab/2;
	$labtime1 = 0;
 	for ($i=0; $i <= $time1; $i++) { 
 		$labtime1 = $times * $i;		
 	}
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}
	$time = DATE("H:i:s", mktime($labtime1,$str,0));

	return $time;		

}



function multiplytwotimefor3($time1, $lab){
	$times = $lab/3;
	$labtime1 = 0;
 	for ($i=0; $i <= $time1; $i++) { 
 		$labtime1 = $times * $i;		
 	}
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}
	$time = DATE("H:i:s", mktime($labtime1,$str,0));

	return $time;		

}

function multiplytwotimefor4($time1, $lab){
	$times = $lab/4;
	$labtime1 = 0;
 	for ($i=0; $i <= $time1; $i++) { 
 		$labtime1 = $times * $i;		
 	}
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}
	$time = DATE("H:i:s", mktime($labtime1,$str,0));

	return $time;		

}


function multiplytwotimefor5($time1, $lab){
	$times = $lab/5;
	$labtime1 = 0;
 	for ($i=0; $i <= $time1; $i++) { 
 		$labtime1 = $times * $i;		
 	}
	$str = 0;
	if (strpos($labtime1, '.') !== false) {
    	$pos = strpos($labtime1, ".");
    	$dot = substr($labtime1, $pos);
		$str = ltrim($dot, '.');
		$str = $str * 6;
	}else{
		$str = $str;		
	}
	$time = DATE("H:i:s", mktime($labtime1,$str,0));
 
	return $time;		

}
?>