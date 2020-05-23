<?php 

session_start();
include ('../connection/conn.php');
if(isset($_GET['subid'])){
	$subid = $_GET['subid'];
	

$query = "UPDATE `subjects` SET `active`=1 WHERE  `subid`={$subid};";


$rs = mysqli_query($conn, $query);

if($rs == 1){
		die("
		<script>
		alert('Restored');
		location.href = '../subject.php';	
		</script>	
			");
       
      }    

}

?>