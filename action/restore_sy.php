<?php 


include ('../connection/conn.php');
if(isset($_GET['sy_id'])){
	$sy_id = $_GET['sy_id'];
	

$query = "UPDATE `school_year` SET `active`=1 WHERE  `sy_id`={$sy_id};";


$rs = mysqli_query($conn, $query);

if($rs == 1){
		die("
		<script>
		alert('Restored');
		location.href = '../archive_semsycourse.php';	
		</script>	
			");
      }    

}

?>