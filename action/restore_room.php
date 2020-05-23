<?php 

include ('../connection/conn.php');
if(isset($_GET['roomid'])){
	$roomid = $_GET['roomid'];
	

$query = "UPDATE `room` SET `active`=1 WHERE  `roomid`={$roomid};";


$rs = mysqli_query($conn, $query);

if($rs == 1){
		die("
		<script>
		alert('Restored');
		location.href = '../room.php';	
		</script>	
			");
      }    

}

?>