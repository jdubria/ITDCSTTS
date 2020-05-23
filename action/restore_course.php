<?php 


include ('../connection/conn.php');
if(isset($_GET['course_id'])){
	$course_id = $_GET['course_id'];
	

$query = "UPDATE `course` SET `active`=1 WHERE  `course_id`={$course_id};";


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