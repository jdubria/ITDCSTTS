<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$sy = $_POST['sy'];
	$sy_id = $_POST['sy_id'];
	$rs = mysqli_query($conn, "
	UPDATE `school_year` SET `sy`='{$sy}' WHERE  `sy_id`={$sy_id};	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Updated');
		location.href = '../settings_sy.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Updated');
		location.href = '../settings_sy.php';	
		</script>	
			");
	}
}


?>