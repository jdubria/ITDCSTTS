<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$sy_id = $_POST['sy_id'];
	$rs = mysqli_query($conn, "
	UPDATE `school_year` SET `active`=0 WHERE  `sy_id`={$sy_id};	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Archived');
		location.href = '../settings_sy.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Archived');
		location.href = '../settings_sy.php';	
		</script>	
			");
	}
}


?>