<?php 
include "../connection/conn.php";

if (isset($_POST['course'])) {
	$course = $_POST['course'];
	$year = $_POST['year'];
$output = '';
$sql = "SELECT * FROM course_year
WHERE course_id = {$course} AND year_id = {$year} AND active = 1";

$result = mysqli_query($conn, $sql);
$output = '<option value="">Select Section</option>';
while ($row = mysqli_fetch_array($result)) {
	$output .= '<option value="'.$row["course_year_id"].'"">'.$row["section"].'</option>';
}

echo $output;
}

?>