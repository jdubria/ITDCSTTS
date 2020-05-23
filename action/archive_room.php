<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$roomid = $_POST['roomid'];
	$rs = mysqli_query($conn, "
	UPDATE `room` SET `active`=0 WHERE  `roomid`={$roomid};
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Archived');
		location.href = '../archive_room.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Archived');
		location.href = '../room.php';	
		</script>	
			");
	}
}


?>