<?php 
include "../connection/conn.php";

if (isset($_POST['save'])) {
	$subid = $_POST['subid'];
	$code = $_POST['code'];
	$title = $_POST['title'];
	$units = $_POST['units'];
	$lec = $_POST['lec'];
	$lab = $_POST['lab'];

	$rs = mysqli_query($conn, "
	UPDATE `subjects` SET `code`='{$code}', `title`='{$title}', `units`='{$units}', `lec`='{$lec}', `lab`='{$lab}' WHERE  `subid`='{$subid}';
		");

	if ($rs == 1) {
		die("
		<script>
		alert('Successfully Updated');
		location.href = '../subject.php';	
		</script>	
			");
	}else{
		die("
		<script>
		alert('No Data Updated');
		location.href = '../subject.php';	
		</script>	
			");
	}
}


?>