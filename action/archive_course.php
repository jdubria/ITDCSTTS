<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$course_id = $_POST['course_id'];
	$rs = mysqli_query($conn, "
	UPDATE `course` SET `active`=0 WHERE  `course_id`={$course_id};	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Archived');
		location.href = '../settings_addcourse.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Archived');
		location.href = '../settings_addcourse.php';	
		</script>	
			");
	}
}


?>