<?php 
	
function faculty_con1($facid, $time, $day, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT
A.rdt_id, A.room_id, A.day_id, A.start_time, A.end_time,
(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id 
AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS Difftime,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id 
AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS next_start,
(SELECT MIN(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time 
AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end
FROM room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id
INNER JOIN room_sched AS RS ON RS.rdt_id = A.rdt_id
INNER JOIN `day` AS AD ON A.day_id = AD.day_id
INNER JOIN semester ON A.sem_id = semester.sem_id
INNER JOIN school_year ON A.sy_id = school_year.sy_id
INNER JOIN `schedule` AS SC ON RS.schedid = SC.sched_id
INNER JOIN subjects AS SB ON SC.sub_id = SB.subid 
INNER JOIN faculty AS F ON SC.fac_id = F.fac_id           
WHERE F.fac_id = {$facid} AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id} AND AD.day_id = {$day}
HAVING difftime >= '{$time}' ORDER BY A.start_time ASC;
	");
// //////////////////////////////////////////////E
// echo "<br>";
// echo "
// SELECT
// A.rdt_id, A.room_id, A.day_id, A.start_time, A.end_time,
// (SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id 
// AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS Difftime,
// (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id 
// AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS next_start,
// (SELECT MIN(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time 
// AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end
// FROM room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id
// INNER JOIN room_sched AS RS ON RS.rdt_id = A.rdt_id
// INNER JOIN `day` AS AD ON A.day_id = AD.day_id
// INNER JOIN semester ON A.sem_id = semester.sem_id
// INNER JOIN school_year ON A.sy_id = school_year.sy_id
// INNER JOIN `schedule` AS SC ON RS.schedid = SC.sched_id
// INNER JOIN subjects AS SB ON SC.sub_id = SB.subid 
// INNER JOIN faculty AS F ON SC.fac_id = F.fac_id            
// WHERE F.fac_id = {$facid} AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id} AND AD.day_id = {$day}
// HAVING difftime >= '{$time}' ORDER BY A.start_time ASC;
// 	";
// echo "<br><br>";
return $result;
}



function faculty_conn1($facid, $time, $sem_id, $sy_id, $size){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT
A.rdt_id, A.room_id, A.day_id, A.start_time, A.end_time,
(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id 
AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS Difftime,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id 
AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS next_start,
(SELECT MIN(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time 
AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end
FROM room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id
INNER JOIN room_sched AS RS ON RS.rdt_id = A.rdt_id
INNER JOIN semester ON A.sem_id = semester.sem_id
INNER JOIN school_year ON A.sy_id = school_year.sy_id
INNER JOIN `schedule` AS SC ON RS.schedid = SC.sched_id
INNER JOIN subjects AS SB ON SC.sub_id = SB.subid 
INNER JOIN faculty AS F ON SC.fac_id = F.fac_id              
WHERE F.fac_id = {$facid} AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id} 
HAVING difftime >= '{$time}' ORDER BY A.start_time ASC LIMIT {$size};
	");
return $result;
}




function faculty_con2($facid, $start_time, $day, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.day_id, 
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS next_start,

(SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(A.end_time)-TIME_TO_SEC(A.start_time)))) 
AS Total_Time,

(SELECT TIMEDIFF('08:00:00', (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(A.end_time)-TIME_TO_SEC(A.start_time)))))) 
AS remaining_time 

FROM room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id
INNER JOIN room_sched AS RS ON RS.rdt_id = A.rdt_id
INNER JOIN semester ON A.sem_id = semester.sem_id
INNER JOIN school_year ON A.sy_id = school_year.sy_id
INNER JOIN `schedule` AS SC ON RS.schedid = SC.sched_id
INNER JOIN subjects AS SB ON SC.sub_id = SB.subid 
INNER JOIN faculty AS F ON SC.fac_id = F.fac_id							
WHERE 
F.fac_id = {$facid} 
AND A.day_id = {$day} AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id}
HAVING next_start = '{$start_time}'
	");
// /////////////////////////////////
// echo "
// SELECT A.day_id, 
// (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS next_start,

// (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(A.end_time)-TIME_TO_SEC(A.start_time)))) 
// AS Total_Time,

// (SELECT TIMEDIFF('08:00:00', (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(A.end_time)-TIME_TO_SEC(A.start_time)))))) 
// AS remaining_time 

// FROM room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id
// INNER JOIN room_sched AS RS ON RS.rdt_id = A.rdt_id
// INNER JOIN semester ON A.sem_id = semester.sem_id
// INNER JOIN school_year ON A.sy_id = school_year.sy_id
// INNER JOIN `schedule` AS SC ON RS.schedid = SC.sched_id
// INNER JOIN subjects AS SB ON SC.sub_id = SB.subid 
// INNER JOIN faculty AS F ON SC.fac_id = F.fac_id							
// WHERE 
// F.fac_id = {$facid} 
// AND A.day_id = {$day} AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id}
// HAVING next_start = '{$start_time}'
// 	";
// echo "<br>";
return $result;	
}

function faculty_conn2($facid, $day, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.day_id, 
MAX(A.end_time) AS next_start,
(SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(A.end_time)-TIME_TO_SEC(A.start_time)))) AS Total_Time,
(SELECT TIMEDIFF('08:00:00', (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(A.end_time)-TIME_TO_SEC(A.start_time)))))) AS remaining_time 
FROM room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id
INNER JOIN room_sched AS RS ON RS.rdt_id = A.rdt_id
INNER JOIN semester ON A.sem_id = semester.sem_id
INNER JOIN school_year ON A.sy_id = school_year.sy_id
INNER JOIN `schedule` AS SC ON RS.schedid = SC.sched_id
INNER JOIN subjects AS SB ON SC.sub_id = SB.subid 
INNER JOIN faculty AS F ON SC.fac_id = F.fac_id   
WHERE 
F.fac_id = {$facid} AND A.day_id = {$day}
AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id}
HAVING remaining_time <= '08:00:00' AND next_start <= '18:00:00'
	");

// echo "
// SELECT A.day_id, 
// MAX(A.end_time) AS next_start,
// (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(A.end_time)-TIME_TO_SEC(A.start_time)))) AS Total_Time,
// (SELECT TIMEDIFF('08:00:00', (SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(A.end_time)-TIME_TO_SEC(A.start_time)))))) AS remaining_time 
// FROM room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id
// INNER JOIN room_sched AS RS ON RS.rdt_id = A.rdt_id
// INNER JOIN semester ON A.sem_id = semester.sem_id
// INNER JOIN school_year ON A.sy_id = school_year.sy_id
// INNER JOIN `schedule` AS SC ON RS.schedid = SC.sched_id
// INNER JOIN subjects AS SB ON SC.sub_id = SB.subid 
// INNER JOIN faculty AS F ON SC.fac_id = F.fac_id   
// WHERE 
// F.fac_id = {$facid} AND A.day_id = {$day}
// AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id}
// HAVING remaining_time <= '08:00:00' AND next_start <= '18:00:00'
// 	";
// 	echo "<br>"; echo "<br>";
return $result;	
}




// ===================================================================================

function getlabroom(){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT * FROM room 
LEFT JOIN room_occupied_sem ON room_occupied_sem.room_id = room.roomid
WHERE room_occupied_sem.room_id IS NULL AND room.room_type = 'laboratory room' AND room.active = 1
	");
return $result;

}

function getlecroom(){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT * FROM room 
LEFT JOIN room_occupied_sem ON room_occupied_sem.room_id = room.roomid
WHERE room_occupied_sem.room_id IS NULL AND room.room_type = 'lecture room' AND room.active = 1
	");
return $result;

}


function fetchroom($result){
include "../connection/conn.php";
$fetch = mysqli_fetch_array($result);
$roomid = $fetch['roomid'];
return $roomid;
}

function getdayID($roomid){
	include "../connection/conn.php";
	$day_id = array();
	$result = mysqli_query($conn, "
		SELECT * 
		FROM `day`
		WHERE day_id NOT IN (SELECT day_id FROM room_occupied_week 
		INNER JOIN room ON room_occupied_week.room_id = room.roomid
		WHERE room_occupied_week.occupied = 1 AND room.roomid = {$roomid}	 
		GROUP BY day_id)
		");
	while ($row = mysqli_fetch_array($result)) {
		$day_id[] = $row['day_id'];
	}

	return $day_id;
}

function maxendtime($roomid, $day, $sem_id, $sy_id){
	include "../connection/conn.php";
	$result = mysqli_query($conn, "
	SELECT MAX(end_time) FROM room_day_time
	INNER JOIN room ON room_day_time.room_id = room.roomid
	INNER JOIN semester ON room_day_time.sem_id = semester.sem_id
	INNER JOIN school_year ON room_day_time.sy_id = school_year.sy_id
	WHERE room.roomid = {$roomid} AND room_day_time.day_id =  {$day}
	AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id}
	HAVING MAX(end_time) <= '18:00:00';
		");
	return $result;
	
}


function max_end_with_facid($facid, $day, $sem_id, $sy_id){
	include "../connection/conn.php";
	$result = mysqli_query($conn, "
SELECT MAX(A.end_time), A.day_id
FROM room_day_time AS A 
INNER JOIN room_sched AS RS ON RS.rdt_id = A.rdt_id
INNER JOIN `day` AS AD ON A.day_id = AD.day_id
INNER JOIN semester ON A.sem_id = semester.sem_id
INNER JOIN school_year ON A.sy_id = school_year.sy_id
INNER JOIN `schedule` AS SC ON RS.schedid = SC.sched_id
INNER JOIN subjects AS SB ON SC.sub_id = SB.subid 
INNER JOIN faculty AS F ON SC.fac_id = F.fac_id
WHERE AD.day_id = {$day} AND F.fac_id = {$facid} AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id}
HAVING MAX(A.end_time) <= '18:00:00';
		");
	return $result;	
}

//====================================================================================



?>