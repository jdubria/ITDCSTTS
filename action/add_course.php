<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$course_name = $_POST['course_name'];
	$major = $_POST['major'];

	$rs = mysqli_query($conn, "
	INSERT INTO `course` (`course_name`, `major`, `active`) VALUES ('{$course_name}', '{$major}', 1);	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Added');
		location.href = '../settings_addcourse.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Added');
		location.href = '../settings_addcourse.php';	
		</script>	
			");
	}
}


?>