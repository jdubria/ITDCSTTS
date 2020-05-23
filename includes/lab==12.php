<?php 
	include "../connection/conn.php";

		$rownums = array();
	 	$dayvalue = array();
	 	$result = getlabroom();
	 	$roomid = fetchroom($result);
	 	$dayvalue = getdayID($roomid);
	 	$sql1 = faculty_conn1($facid, $time5, $sem_id, $sy_id, $size5);
	 	foreach ($dayvalue as $d) {
	 		$sql2 = faculty_conn2($facid, $d, $sem_id, $sy_id);
	 		$rownums[] = mysqli_num_rows($sql2);
	 	}
		$rownum1 = mysqli_num_rows($sql1);
		$rowtotal = sum($rownums);
		if ($rownum1 > 2) {
				$xx = 0;
				$start = array();
				$end = array();
				$day = array();
				$rdt_ids = array();
				while ($row = mysqli_fetch_array($sql1)) {
					$start[] = $row['next_start'];
					$end[] = $row['next_end'];
					$day[] = $row['day_id'];
				}
				foreach (array_combine($start, $end) as $starts => $ends) {
				mysqli_query($conn, "
				INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$roomid}, {$sem_id}, {$sy_id}, {$day[$xx++]}, '{$starts}', '{$ends}'); 			
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
	     		$labtrue = TRUE;
		}elseif ($rowtotal > 0) {
				$start = array();
				$day = array();
				$rdt_ids = array();
				foreach ($dayvalue as $d) {
					$sql2 = faculty_conn2($facid, $d, $sem_id, $sy_id);
					$fetch = mysqli_fetch_assoc($sql2);
					$start[] = $fetch['next_start'];
					$day[] = $fetch['day_id'];						
				}
				$CD = 0;
				$CS = 0;
				foreach (array_combine($day, $start) as $dd => $ss) {
					if (!empty($dd) && !empty($ss)) {
						$CD = $CD + 1;
						$CS = $CS + 1;
					}elseif(empty($dd) && empty($ss)){
						$CD = $CD + 0;
						$CS = $CS + 0;
					}
				}
				if ($CD > 0 && $CS > 0) {
					$arr = array();
		 			foreach ($start as $s) {
		 				if ($s != 0) {
		 					array_push($arr, $s);
		 				}elseif($s == 0){
		 					array_push($arr, "07:30:00");
		 				}
		 			}
					$newdays = array_slice($day, 0, $size3);
		 			$newstart_time = array_slice($arr, 0, $size3);
		 			$time = '02:00:00';
		 			foreach (array_combine($newdays, $newstart_time) as $days => $start_time) {
					$next_end = add2timevalue($start_time, $time);
					mysqli_query($conn, "
					INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$roomid}, {$sem_id}, {$sy_id}, {$days}, '{$start_time}', '{$next_end}'); 			
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
		 			$labtrue = TRUE;
				}else{
					return FALSE;
				}
		}else{
			$arr = array();
			$MAXEND = array();
			$rdt_ids = array();
			$newdays = array_slice($dayvalue, 0, $size3);
			foreach ($newdays as $day) {
				$rs = maxendtime($roomid, $day, $sem_id, $sy_id);
				$get = mysqli_fetch_assoc($rs);
				$arr[] = $get['MAX(end_time)'];		
			}
			$isip = 0;
			foreach ($arr as $a) {
				if (!empty($a)) {
					$isip = $isip + 1;
				}elseif (empty($a)) {
					$isip = $isip + 0;
				}
			}

			if ($isip > 0) {
				$rdt_ids = array();
				$x = 5;
		 		$time = '02:24:00';
			foreach ($arr as $s) {
				if ($s != 0) {
					array_push($MAXEND, $s);
				}elseif($s == 0){
					array_push($MAXEND, "07:30:00");
				}
			}
		 	for ($i=0; $i < $x ; $i++) { 
		 	$next_end = add2timevalue($MAXEND[$i], $time);
			 	mysqli_query($conn, "
				INSERT INTO `room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) VALUES ({$roomid}, {$sem_id}, {$sy_id}, {$dayvalue[$i]}, '{$MAXEND[$i]}', '{$next_end}'); 			
					");
			 	$fetchs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(rdt_id) FROM room_day_time WHERE room_id = {$roomid}"));
				$rdt_ids[] = $fetchs['MAX(rdt_id)'];
		 	}
		 	foreach ($rdt_ids as $id) {
	  			  mysqli_query($conn, "
	     			INSERT INTO `room_sched` (`schedid`, `rdt_id`, `sem_id`, `sy_id`) VALUES ({$schedID}, {$id}, {$sem_id}, {$sy_id});		
	     			");
	 			}
	 			$labtrue = TRUE;
			}else{
				$rdt_ids = array();
		 		$x = 5;
		 	for ($i=0; $i < $x ; $i++) { 
			mysqli_query($conn, "
			INSERT INTO `itdcstts`.`room_day_time` (`room_id`, `sem_id`, `sy_id`, `day_id`, `start_time`, `end_time`) 
													VALUES ('{$roomid}', '{$sem_id}', '{$sy_id}', '{$dayvalue[$i]}', '07:30:00', '10:30:00');		
			");
			 	$fetchs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(rdt_id) FROM room_day_time WHERE room_id = {$roomid}"));
				$rdt_ids[] = $fetchs['MAX(rdt_id)']; 				
		 	}			 							
		 	foreach ($rdt_ids as $id) {
	  			  mysqli_query($conn, "
	     			INSERT INTO `room_sched` (`schedid`, `rdt_id`, `sem_id`, `sy_id`) VALUES ({$schedID}, {$id}, {$sem_id}, {$sy_id});		
	     			");
	 			}
	 			$labtrue = TRUE;
			}
		}



?>