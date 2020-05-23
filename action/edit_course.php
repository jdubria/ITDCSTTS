<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$course_id = $_POST['course_id'];
	$course_name = $_POST['course_name'];
	$major = $_POST['major'];
	$rs = mysqli_query($conn, " 
	UPDATE `course` SET `course_name`='{$course_name}', `major`='{$major}' WHERE  `course_id`={$course_id}");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Updated');
		location.href = '../settings_addcourse.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Updated');
		location.href = '../settings_addcourse.php';	
		</script>	
			");
	}
}


?>