<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$sy = $_POST['sy'];

	$rs = mysqli_query($conn, "
		INSERT INTO `school_year` (`sy`, `active`) VALUES ('{$sy}', 1);
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Added');
		location.href = '../settings_sy.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Added');
		location.href = '../settings_sy.php';	
		</script>	
			");
	}
}


?>