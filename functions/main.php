<?php 
function forrownumlab($result1, $size, $time, $times, $schedID, $sy_id, $sem_id, $facid){
include "../connection/conn.php";	
	$day_id = array();
	$roomid = '';
 	$difftimes = array();
 	$start_times = array();

 	while ($row = mysqli_fetch_assoc($result1)) {
 		$difftimes[] = $row['Difftime'];
 	 	$roomid = $row['room_id'];
	 	$day_id[] = $row['day_id'];
		$start_times[] = $row['prevbetween'];
 	}

 	$total = totaldifftime($difftimes);

 	if ($total >= $times) {
 		$newdays = array_slice($day_id, 0, $size);
 		$newstart_time = array_slice($start_times, 0, $size);
 		$rdt_ids = array();

	 	$count = array();
		$counter = array();
		$next_start = array(); 		

 		foreach (array_combine($newdays, $newstart_time) as $day => $start_time) {
 			$query1 = faculty_con1($facid, $time, $day, $sem_id, $sy_id);
 			$query2 = faculty_con2($facid, $start_time, $day, $sem_id, $sy_id);

			while ($row = mysqli_fetch_array($query1)) {
        		$counter[] = $row['Difftime'];
      		}

      		$count[] = mysqli_num_rows($query2);
      		
      		while ($rows = mysqli_fetch_array($query2)) {
        		$next_start[] = $rows['next_start'];
      		} 			

 		}

	 $total = totaldifftime($counter);
	 $totalsum = sum($count);

	 if ($total >= $times){
	 	foreach (array_combine($newdays, $newstart_time) as $day => $start_time) {
	 		$query1 = faculty_con1($facid, $time, $day, $sem_id, $sy_id);
			while ($row = mysqli_fetch_array($query1)) {
        		$next_start = $row['next_start'];
      		}
      		$end_time = add2timevalue($next_start, $time);
      		mysqli_query($conn, "
	        INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$roomid}, {$sem_id}, {$sy_id}, {$day}, '{$start_time}', '{end_time}');	
	        ");
	        	$result = mysqli_query($conn, "SELECT MAX(rdt_id) as ID FROM room_day_time");
	        	$fetch = mysqli_fetch_assoc($result);
	        	$rdt_ids[] = $fetch['ID'];	              			 		
	 	}
	 	foreach ($rdt_ids as $id) {
	        mysqli_query($conn, "
	         INSERT INTO `room_sched` (`schedid`, `rdt_id`, `sem_id`, `sy_id`) VALUES ({$schedID}, {$id}, {$sem_id}, {$sy_id});		
	         ");
         }
        return TRUE;	 	

	 }elseif ($totalsum >= $size) {
		foreach (array_combine($newdays, $newstart_time) as $day => $start_time) {
			$query2 = faculty_con2($facid, $start_time, $day, $sem_id, $sy_id);
			while ($rows = mysqli_fetch_array($query2)) {
        			$n_start = $rows['next_start'];
      		}	
			$end_time = add2timevalue($n_start, $time2);
      		mysqli_query($conn, "
	        INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$roomid}, {$sem_id}, {$sy_id}, {$day}, '{$start_time}', '{end_time}');	
	        ");
	        	$result = mysqli_query($conn, "SELECT MAX(rdt_id) as ID FROM room_day_time");
	        	$fetch = mysqli_fetch_assoc($result);
	        	$rdt_ids[] = $fetch['ID'];				
		}
	 	foreach ($rdt_ids as $id) {
	        mysqli_query($conn, "
	         INSERT INTO `room_sched` (`schedid`, `rdt_id`, `sem_id`, `sy_id`) VALUES ({$schedID}, {$id}, {$sem_id}, {$sy_id});		
	         ");
         }
        return TRUE;	 			 	
	 }else{
	 	return FALSE;	 	
	 }

 	}else {
 		return FALSE;
 	}
}

function forrownumlabrem($result6, $time, $times, $lab, $tt, $numrow6, $schedID, $facid, $sy_id, $sem_id, $size){
	include "../connection/conn.php";
	$totalTime = $tt;
	$day_id = array();
	$roomid = array();
 	$prev = array();
	$rdt_ids = array();
	$counter = array(); 	
	
 	if ($totalTime >= $times) {
	 	while ($rows = mysqli_fetch_array($result6)) { 
	 		$roomid[] = $rows['room_id'];
	 		$day_id[] = $rows['day_id'];
	 		$prev[] = $rows['prev'];
	 	}
	 	$x = 0;
	 	$y = 0;

	echo "<br><br>";
	print_r($size);
	echo "<br><br>";
	print_r($day_id);
	echo "<br>============================================";
	print_r($prev);
	echo "<br>===========================================";

		$maxEND = array(); 	
	 	$newrooms = array_slice($roomid, 0, $size);
	 	$newdays = array_slice($day_id, 0, $size);
	 	$newprev = array_slice($prev, 0, $size);
	 
	 echo "newrooms: "; print_r($newrooms); echo "<br>";
	 echo "newdays: "; print_r($newdays); echo "<br>";
	 echo "new time: "; print_r($newprev); echo "<br>";

		$AllEND = array();

 		foreach (array_combine($newdays, $newprev) as $day => $start_time) {
 			$query1 = faculty_con1($facid, $time, $day, $sem_id, $sy_id);
 			// $query1 = faculty_con1($facid, $time, $sem_id, $sy_id);	
 			$query2 = faculty_con2($facid, $start_time, $day, $sem_id, $sy_id);

 			$query3 = max_end_with_facid($facid, $day, $sem_id, $sy_id); 

 			$AllEND[] = add2timevalue($start_time, $time);

			while ($row = mysqli_fetch_array($query1)) {
        		$counter[] = $row['Difftime'];
        		$did[] = $row['day_id'];
      		}

      		$count[] = mysqli_num_rows($query2);
      		
      		while ($rows = mysqli_fetch_array($query2)) {
        		$next_start[] = $rows['next_start'];
      		} 

      		 while ($rows = mysqli_fetch_array($query3)) {
        		$maxEND[] = $rows['MAX(A.end_time)'];
      		} 


 		}


 		

 	if ($size <= count($maxEND)){

 	}elseif ($size > count($maxEND)) {
 		$zero = 0;
 		$zeroTime = maketimeLab($zero);
 		echo $zeroTime;
 		array_push($maxEND, $zeroTime);
 	}

 	$allowed = 0; $allow = 0;

 	for ($i=0; $i < $size ; $i++) { 
 		if ($maxEND[$i] == $newprev[$i]) {
 			$allowed = $allowed + 0;
 		}else{
 			$allowed = $allowed + 1;
 		}

 		if ($AllEND[$i] <= "18:30:00") {
 			$allow = $allow + 1;
 		}else{
 			$allow = $allow + 0;
 		}
 	}

 	echo $allowed;

 	
	$total = totaldifftime($counter);
	$totalsum = sum($count); 		

	if ($total >= $times) {
	 	foreach (array_combine($newdays, $newprev) as $day => $start_time) {
	 		$query1 = faculty_con1($facid, $time, $day, $sem_id, $sy_id);
			while ($row = mysqli_fetch_array($query1)) {
        		$next_start = $row['next_start'];
      		}
      		$end_time = add2timevalue($next_start, $time);
      		mysqli_query($conn, "
	        INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$roomid[$x++]}, {$sem_id}, {$sy_id}, {$day}, '{$start_time}', '{end_time}');	
	        ");
	        	$result = mysqli_query($conn, "SELECT MAX(rdt_id) as ID FROM room_day_time");
	        	$fetch = mysqli_fetch_assoc($result);
	        	$rdt_ids[] = $fetch['ID'];	              			 		
	 	}
	 	foreach ($rdt_ids as $id) {
	        mysqli_query($conn, "
	         INSERT INTO `room_sched` (`schedid`, `rdt_id`, `sem_id`, `sy_id`) VALUES ({$schedID}, {$id}, {$sem_id}, {$sy_id});		
	         ");
         }
        return TRUE;	
	}elseif ($totalsum >= $size) {

		foreach (array_combine($newdays, $newprev) as $day => $start_time) {
			$query2 = faculty_con2($facid, $start_time, $day, $sem_id, $sy_id);
			while ($rows = mysqli_fetch_array($query2)) {
        			$n_start = $rows['next_start'];
      		}	
			$end_time = add2timevalue($n_start, $times);
      		mysqli_query($conn, "
	        INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$roomid[$y++]}, {$sem_id}, {$sy_id}, {$day}, '{$start_time}', '{$end_time}');	
	        ");
	        	$result = mysqli_query($conn, "SELECT MAX(rdt_id) as ID FROM room_day_time");
	        	$fetch = mysqli_fetch_assoc($result);
	        	$rdt_ids[] = $fetch['ID'];				
		}
	 	foreach ($rdt_ids as $id) {
	        mysqli_query($conn, "
	         INSERT INTO `room_sched` (`schedid`, `rdt_id`, `sem_id`, `sy_id`) VALUES ({$schedID}, {$id}, {$sem_id}, {$sy_id});		
	         ");
         }
        return TRUE;	 
	}
	// elseif ($allowed == $size && $allow == $size) {
	// 	echo "allowed";
	// 	$i = 0;
 // 		foreach (array_combine($newdays, $newprev) as $day => $start_time) {
 // 			$next_end = add2timevalue($start_time, $time);


 // 			mysqli_query($conn, "
	//         INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$newrooms[$i++]}, {$sem_id}, {$sy_id}, {$day}, '{$start_time}', '{$next_end}');	
	//         ");
	//         	$result = mysqli_query($conn, "SELECT MAX(rdt_id) as ID FROM room_day_time");
	//         	$fetch = mysqli_fetch_assoc($result);
	//         	$rdt_ids[] = $fetch['ID'];
 // 			// echo "
	//    //      INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$newrooms[$i++]}, {$sem_id}, {$sy_id}, {$day}, '{$start_time}', '{$next_end}');	
	//    //      ";
	//    //      echo "<br>";
 // 		}

 // 		foreach ($rdt_ids as $id) {
	//         mysqli_query($conn, "
	//          INSERT INTO `room_sched` (`schedid`, `rdt_id`, `sem_id`, `sy_id`) VALUES ({$schedID}, {$id}, {$sem_id}, {$sy_id});		
	//          ");
 //         }


 // 		return TRUE;

 		
 // 	}
 	else{
	 	return FALSE;
 	}

 	}else{
 		return FALSE;
 	}

}




?>