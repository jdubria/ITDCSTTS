<?php 
function resultLab1($time, $sem_id, $sy_id){
include "../connection/conn.php";

$result = mysqli_query($conn, "
SELECT 
room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id  AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
)) AS Difftime,

(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

(A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
OR
(A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
as FREE

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
INNER JOIN room ON A.room_id = room.roomid
INNER JOIN `day` ON A.day_id = `day`.day_id 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$time}' 
		");

return $result;
}



function resultLab2($time2, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT 
room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
)) AS Difftime,

(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

(A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
OR
(A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
as FREE

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
INNER JOIN room ON A.room_id = room.roomid
INNER JOIN `day` ON A.day_id = `day`.day_id 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$time2}' 
	");

return $result;
}



function resultLab3($time3, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT 
room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
)) AS Difftime,

(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

(A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
OR
(A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
as FREE

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
INNER JOIN room ON A.room_id = room.roomid
INNER JOIN `day` ON A.day_id = `day`.day_id 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$time3}' 
	");
// echo "
// SELECT 
// room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
// (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
// (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

// (SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
// )) AS Difftime,

// (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

// (SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

// (A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
// A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
// OR
// (A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
// A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
// AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
// as FREE

// FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
// INNER JOIN room ON A.room_id = room.roomid
// INNER JOIN `day` ON A.day_id = `day`.day_id 
// WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$time3}' 
// 	";
// echo "<br><br><br>";
return $result;
}



function resultLab4($time4, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT 
room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
)) AS Difftime,

(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

(A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
OR
(A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
as FREE

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
INNER JOIN room ON A.room_id = room.roomid
INNER JOIN `day` ON A.day_id = `day`.day_id 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$time4}' 
	");

return $result;
}



function resultLab5($time5, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT 
room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
)) AS Difftime,

(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

(A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
OR
(A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
as FREE

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
INNER JOIN room ON A.room_id = room.roomid
INNER JOIN `day` ON A.day_id = `day`.day_id 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$time5}' 
	");

return $result;
}



function resultremLab1($time, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.room_id, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
AS remaining_time

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
HAVING remaining_time IS NOT NULL AND remaining_time >= '{$time}' AND prev <= '17:30:00';
	");

return $result;
}


function resultremLab2($time2, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.room_id, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
AS remaining_time

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
HAVING remaining_time IS NOT NULL AND remaining_time >= '{$time2}' AND prev <= '17:30:00';
	");


// echo "
// SELECT A.room_id, A.day_id,
// (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
// (SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
// AS remaining_time

// FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
// WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
// HAVING remaining_time IS NOT NULL AND remaining_time >= '{$time2}' AND prev <= '17:30:00';
// 	";
return $result;
}


function resultremLab3($time3, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.room_id, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
AS remaining_time

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
HAVING remaining_time IS NOT NULL AND remaining_time >= '{$time3}' AND prev <= '17:30:00';
	");
// echo "<br>";
// echo "
// SELECT A.room_id, A.day_id,
// (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
// (SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
// AS remaining_time

// FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
// WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
// HAVING remaining_time IS NOT NULL AND remaining_time >= '{$time3}' AND prev <= '17:30:00';
// 	";
// 	echo "<br><br>";
return $result;
}




function resultremLab4($time4, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.room_id, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
AS remaining_time

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
HAVING remaining_time IS NOT NULL AND remaining_time >= '{$time4}' AND prev <= '17:30:00';
	");

return $result;
}




function resultremLab5($time5, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.room_id, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
AS remaining_time

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
WHERE room.room_type = 'laboratory room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
HAVING remaining_time IS NOT NULL AND remaining_time >= '{$time5}' AND prev <= '17:30:00';
	");

return $result;
}

// ==================== LECTURE NI ========================================


function resultLec1($lectime, $sem_id, $sy_id){
include "../connection/conn.php";

$result = mysqli_query($conn, "
SELECT 
room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
)) AS Difftime,

(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

(A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
OR
(A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
as FREE

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
INNER JOIN room ON A.room_id = room.roomid
INNER JOIN `day` ON A.day_id = `day`.day_id 
WHERE room.room_type = 'Lecture Room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$lectime}' 
		");

return $result;
}




function resultLec2($lectime2, $sem_id, $sy_id){
include "../connection/conn.php";

$result = mysqli_query($conn, "
SELECT 
room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
)) AS Difftime,

(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

(A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
OR
(A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
as FREE

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
INNER JOIN room ON A.room_id = room.roomid
INNER JOIN `day` ON A.day_id = `day`.day_id 
WHERE room.room_type = 'Lecture Room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$lectime2}' 
		");

return $result;
}



function resultLec3($lectime3, $sem_id, $sy_id){
include "../connection/conn.php";

$result = mysqli_query($conn, "
SELECT 
room.room_type, A.rdt_id, A.room_id, A.start_time, A.end_time, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time >= b.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AS next_end,

(SELECT TIMEDIFF(A.start_time, (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id)
)) AS Difftime,

(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prevbetween,

(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) AS remaining_time,

(A.start_time <= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(start_time) FROM room_day_time AS D WHERE D.start_time < B.start_time AND D.room_id = B.room_id AND D.day_id = B.day_id AND D.sem_id = B.sem_id AND D.sy_id = B.sy_id))
OR
(A.start_time < (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AND 
A.end_time >= (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time < B.end_time 
AND C.room_id = B.room_id AND C.day_id = B.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))
as FREE

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) 
INNER JOIN room ON A.room_id = room.roomid
INNER JOIN `day` ON A.day_id = `day`.day_id 
WHERE room.room_type = 'Lecture Room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} HAVING difftime >= '{$lectime3}' 
		");

return $result;
}




function resultremLec1($lectime, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.room_id, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
AS remaining_time

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
WHERE room.room_type = 'Lecture Room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
HAVING remaining_time IS NOT NULL AND remaining_time >= '{$lectime}' AND prev <= '17:30:00';
	");

return $result;
}


function resultremLec2($lectime2, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.room_id, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
AS remaining_time

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
WHERE room.room_type = 'Lecture Room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
HAVING remaining_time IS NOT NULL AND remaining_time >= '{$lectime2}' AND prev <= '17:30:00';
	");

return $result;
}




function resultremLec3($lectime3, $sem_id, $sy_id){
include "../connection/conn.php";
$result = mysqli_query($conn, "
SELECT A.room_id, A.day_id,
(SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id) AS prev,
(SELECT TIMEDIFF('20:30:00', (SELECT MAX(end_time) FROM room_day_time AS C WHERE C.end_time > B.end_time AND C.room_id = B.room_id AND B.day_id =  C.day_id AND C.sem_id = B.sem_id AND C.sy_id = B.sy_id))) 
AS remaining_time

FROM (room_day_time AS A INNER JOIN room_day_time AS B ON A.rdt_id = B.rdt_id) INNER JOIN room ON A.room_id = room.roomid 
WHERE room.room_type = 'Lecture Room' AND room.active = 1 AND A.sem_id = {$sem_id} AND A.sy_id = {$sy_id} GROUP BY remaining_time, day_id	 
HAVING remaining_time IS NOT NULL AND remaining_time >= '{$lectime3}' AND prev <= '17:30:00';
	");

return $result;
}

?>