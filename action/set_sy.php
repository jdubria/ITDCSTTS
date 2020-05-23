<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$sy = $_POST['sy'];

	$rs = mysqli_query($conn, "
	UPDATE `default` SET `sy_id`={$sy} WHERE  `default_id`=1;	
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Change!');
		var a = confirm('Log-out and log-in again?');
		if(a == true){
		location.href = '../logout.php';
		}else{
		location.href = '../settings_setsy.php';	
		}	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Change');
		location.href = '../settings_setsy.php';	
		</script>	
			");
	}
}


?>