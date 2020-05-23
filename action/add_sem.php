<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$semester = $_POST['semester'];

	$rs = mysqli_query($conn, "
	INSERT INTO `semester` (`semester`, `active`) VALUES ('{$semester}', 1);	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Added');
		location.href = '../settings.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Added');
		location.href = '../settings.php';	
		</script>	
			");
	}
}


?>