<?php 
function getLaboratory($subid){
	include "../connection/conn.php";
	$id = $subid;
	$query = mysqli_query($conn, "SELECT * FROM subjects WHERE subid = {$id}");
	$fetch = mysqli_fetch_assoc($query);
	$lab = $fetch['lab'];
	return $lab;
}

function getLecture($subid){
	include "../connection/conn.php";
	$id = $subid;
	$query = mysqli_query($conn, "SELECT * FROM subjects WHERE subid = {$id}");
	$fetch = mysqli_fetch_assoc($query);
	$lec = $fetch['lec'];
	return $lec;	
}


?>