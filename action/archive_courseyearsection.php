<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$course_year_id = $_POST['course_year_id'];
	$rs = mysqli_query($conn, "
	UPDATE `course_year` SET `active`=0 WHERE  `course_year_id`={$course_year_id};	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Archived');
		location.href = '../settings_courseyearsection.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Archived');
		location.href = '../settings_courseyearsection.php';	
		</script>	
			");
	}
}


?>