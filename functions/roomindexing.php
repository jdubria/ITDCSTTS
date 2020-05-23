<?php 
function putindextoroomMonday($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 1 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);
	$juan = array();

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}

			// print_r($room); echo "<br>";
			// print_r($SEC_TO_TIME);

		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '13:00:00') {
				$juan[] =	mysqli_query($conn, "
						INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 1, 1);
						");
				}else{
					echo "";
				}
			}

	}else{
		return false;
	}
	
}

function putindextoroomTuesday($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 2 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '13:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 2, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}

function putindextoroomWednesday($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 3 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '13:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 3, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}



function putindextoroomThursday($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 4 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '13:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 4, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}

function putindextoroomFriday($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 5 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '13:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 5, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}

function putindextoroomMondays($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 1 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '12:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 1, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}

function putindextoroomTuesdays($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 2 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '12:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 2, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}

function putindextoroomWednesdays($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 3 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '12:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 3, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}



function putindextoroomThursdays($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 4 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '12:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 4, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}

function putindextoroomFridays($sem_id, $sy_id){
include "../connection/conn.php";	

	$result = mysqli_query($conn, "SELECT room_id, day_id, SEC_TO_TIME( SUM(TIME_TO_SEC(TIMEDIFF(end_time, start_time)))) AS timeSum 
FROM room_day_time WHERE day_id = 5 AND sem_id = {$sem_id} and sy_id = {$sy_id} group by room_id");

	$rowcount = mysqli_num_rows($result);

	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
				$SEC_TO_TIME[] = $row['timeSum'];
			}


		for ($i=0; $i < $rowcount; $i++) { 
				if ($SEC_TO_TIME[$i] >= '12:00:00') {
					mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occuppied`) VALUES ({$sem_id}, {$sy_id}, {$room[$i]}, 5, 1);
						");
				}else{
					echo "";
				}
			}


	}else{
		return false;
	}
	
}


function putoccupiedtoRoom($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, SUM(occupied) FROM room_occupied_week GROUP BY room_id HAVING SUM(occupied) >= 5;");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_sem` (`sem_id`, `sy_id`, `room_id`, `occupied`) VALUES ({$sem_id}, {$sy_id}, {$roomid}, 1);");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndMonday($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 1 AND sem_id = {$sem_id} and sy_id = {$sy_id}
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 1 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})	 
		GROUP BY room_id  HAVING MAX(end_time) >= '19:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {

		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}

		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '1', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndTuesday($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 2 AND sem_id = {$sem_id} and sy_id = {$sy_id}
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 2 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '19:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '2', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndWednesday($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 3 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 3 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '19:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '3', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndThursday($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 4 AND sem_id = {$sem_id} and sy_id = {$sy_id}
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 4 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '19:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '4', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndFriday($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 5 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 5 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '19:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '5', '1');");
			}	
	}else{
		return false;
	}
	
}
// /////////////////////////////////////////////////////////////
function indexMaxEndMondayss($sem_id, $sy_id){
include "../connection/conn.php";
	$room = array();
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 1 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 1 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:30:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '1', '1');");
			}	
	}else{
		return false;
	}
	print_r($room);
}

function indexMaxEndTuesdayss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 2 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 2 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:30:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '2', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndWednesdayss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 3 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 3 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:30:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '3', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndThursdayss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 4 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 4 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:30:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '4', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndFridayss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 5 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 5 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:30:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '5', '1');");
			}	
	}else{
		return false;
	}
	
}
// ///////////////////////////////////////////////////////////////////////////////////////

function indexMaxEndMondaysss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 1 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 1 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '1', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndTuesdaysss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 2 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 2 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '2', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndWednesdaysss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 3 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 3 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '3', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndThursdaysss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 4 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 4 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '4', '1');");
			}	
	}else{
		return false;
	}
	
}

function indexMaxEndFridaysss($sem_id, $sy_id){
include "../connection/conn.php";
	$result = mysqli_query($conn, "SELECT room_id, MAX(end_time), day_id FROM room_day_time WHERE day_id = 5 AND sem_id = {$sem_id} and sy_id = {$sy_id} 
		AND room_id  NOT IN (SELECT room_id FROM room_occupied_week 
		WHERE room_occupied_week.day_id = 5 AND room_occupied_week.sem_id = {$sem_id} AND room_occupied_week.sy_id = {$sy_id})
		GROUP BY room_id  HAVING MAX(end_time) >= '18:00:00'");
	$rowcount = mysqli_num_rows($result);
	if ($rowcount > 0) {
		while ($row = mysqli_fetch_array($result)) {
				$room[] = $row['room_id'];
			}
		foreach ($room as $roomid) {
				mysqli_query($conn, "
			INSERT INTO `room_occupied_week` (`sem_id`, `sy_id`, `room_id`, `day_id`, `occupied`) VALUES ('{$sem_id}', '{$sy_id}', '{$roomid}', '5', '1');");
			}	
	}else{
		return false;
	}
	
}
?>