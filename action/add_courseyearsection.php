<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$course_id = $_POST['course_id'];
	$year_id = $_POST['year_id'];
	$section = $_POST['section'];

	$rs = mysqli_query($conn, "
	INSERT INTO `course_year` (`course_id`, `year_id`, `section`, `active`) VALUES ({$course_id}, {$year_id}, {$section}, 1);	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Added');
		location.href = '../settings_courseyearsection.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Added');
		location.href = '../settings_courseyearsection.php';	
		</script>	
			");
	}
}


?>