<?php 


include ('../connection/conn.php');
if(isset($_GET['fac_id'])){
	$fac_id = $_GET['fac_id'];
	

$query = "UPDATE `faculty` SET `active`=1 WHERE  `fac_id`={$fac_id};";


$rs = mysqli_query($conn, $query);

if($rs == 1){
		die("
		<script>
		alert('Restored');
		location.href = '../faculty.php';	
		</script>	
			");
      }    

}

?>