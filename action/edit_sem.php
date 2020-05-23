<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$semester = $_POST['semester'];
	$sem_id = $_POST['sem_id'];
	$rs = mysqli_query($conn, "
	UPDATE `semester` SET `semester`='{$semester}' WHERE  `sem_id`={$sem_id};	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Updated');
		location.href = '../settings.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Updated');
		location.href = '../settings.php';	
		</script>	
			");
	}
}


?>