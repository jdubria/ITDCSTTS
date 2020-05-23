<?php 
function sum($count){
	$sum = 0;
	$sum2 = 0;
	foreach ($count as $a) {
		$sum = $a;
		$sum2 = $sum2 + $sum;
	}
	return $sum2;
}


function totaldifftime($difftime){
	$sum = strtotime('00:00:00');
 	$sum2=0;
 	foreach ($difftime as $v){
		$sum1=strtotime($v)-$sum;
 		$sum2 = $sum2+$sum1;
 	}
 	$sum3=$sum+$sum2;
 	$newtime = date("H:i:s",$sum3);

 	return $newtime;	
}



function add2timevalue($time1, $time2){

 	$secs = strtotime($time2)-strtotime("00:00:00");
	$result = date("H:i:s",strtotime($time1)+$secs);
	
	return $result;
}

function insert_RDT(){
	
}

?>