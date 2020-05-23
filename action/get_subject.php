<?php 
include "../connection/conn.php";

if (isset($_POST['crs'])) {
	$course = $_POST['crs'];
	$year = $_POST['yr'];
	$sem = $_POST['sem'];

$output = '';
$sql = "SELECT * FROM subjects 
WHERE year_id = {$year} AND sem_id = $sem AND course_id = $course AND active = 1";

$result = mysqli_query($conn, $sql);
$output = '<option value="">Select Subject</option>';
while ($row = mysqli_fetch_array($result)) {
	$output .= '<option value="'.$row["subid"].'"">'.$row["code"].'-'.$row["title"].'</option>';
}

echo $output;
}

?>