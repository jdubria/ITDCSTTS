<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$fac_id = $_POST['fac_id'];
	$facode_id = $_POST['facode_id'];
	$fac_name= $_POST['fac_name'];
	$rs = mysqli_query($conn, " 
	UPDATE `faculty` SET `facode_id`='{$facode_id}', `fac_name`='{$fac_name}' WHERE  `fac_id`={$fac_id};
	");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Updated');
		location.href = '../faculty.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Updated');
		location.href = '../faculty.php';	
		</script>	
			");
	}
}


?>