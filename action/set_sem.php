<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$semester = $_POST['semester'];

	$rs = mysqli_query($conn, "
	UPDATE `default` SET `sem_id`={$semester} WHERE  `default_id`=1;	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Change!');
		var a = confirm('Log-out and log-in again?');
		if(a == true){
		location.href = '../logout.php';
		}else{
		location.href = '../settings_setsem.php';	
		}	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Change');
		location.href = '../settings_setsem.php';	
		</script>	
			");
	}
}


?>