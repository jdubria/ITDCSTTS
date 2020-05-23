<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$roomid = $_POST['roomid'];
	$name = $_POST['room_name'];
	$room_type = $_POST['room_type'];
	$rs = mysqli_query($conn, " 
	UPDATE `room` SET `name`='{$name}', `room_type`='{$room_type}' WHERE  `roomid`={$roomid};
	");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Updated');
		location.href = '../room.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Updated');
		location.href = '../room.php';	
		</script>	
			");
	}
}


?>