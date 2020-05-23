<?php 

session_start();
include ('../connection/conn.php');
if(isset($_GET['sem_id'])){
	$sem_id = $_GET['sem_id'];

	

$query = "UPDATE `semester` SET `active`=1 WHERE  `sem_id`={$sem_id};";


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