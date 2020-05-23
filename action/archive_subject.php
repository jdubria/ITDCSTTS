<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$subid = $_POST['subid'];
	$rs = mysqli_query($conn, "
	UPDATE `subjects` SET `active`=0 WHERE  `subid`={$subid};	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Archived');
		location.href = '../archive.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Archived');
		location.href = '../subject.php';	
		</script>	
			");
	}
}


?>