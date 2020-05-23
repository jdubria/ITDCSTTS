<?php 


include ('../connection/conn.php');
if(isset($_GET['course_year_id'])){
	$course_year_id = $_GET['course_year_id'];
	

$query = "UPDATE `course_year` SET `active`=1 WHERE  `course_year_id`={$course_year_id};";


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