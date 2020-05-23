<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$sem_id = $_POST['sem_id'];
	$rs = mysqli_query($conn, "
	UPDATE `semester` SET `active`=0 WHERE  `sem_id`={$sem_id};	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Archived');
		location.href = '../settings.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Archived');
		location.href = '../settings.php';	
		</script>	
			");
	}
}


?>