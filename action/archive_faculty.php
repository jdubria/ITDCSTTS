<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$fac_id = $_POST['fac_id'];
	$rs = mysqli_query($conn, "
	UPDATE `faculty` SET `active`=0 WHERE  `fac_id`={$fac_id};	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Archived');
		location.href = '../archive_faculty.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Archived');
		location.href = '../faculty.php';	
		</script>	
			");
	}
}


?>