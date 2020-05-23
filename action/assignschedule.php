<?php 
include '../functions/checkforunits.php';
include '../functions/checktimelab.php';
include '../functions/checktimelec.php';
include '../functions/results.php';
include '../functions/timefunctions.php';
include '../functions/main.php';
include '../functions/sub_main.php';
include '../functions/roomindexing.php'; 
include "../connection/conn.php";

if (isset($_POST['save'])) {

	$sy_id = $_POST['sy'];
	$sem_id = $_POST['sem'];
	$course_id = $_POST['course_name'];	
	$year_id = $_POST['year'];
	$course_year_id = $_POST['section'];
	$facid = $_POST['fac_name'];
	$subid = $_POST['code'];
	echo $course_year_id; echo "<br>";

 	mysqli_query($conn, "
 		INSERT INTO `itdcstts`.`schedule` (`course_year_id`, `sub_id`, `fac_id`, `sem_id`, `sy_id`, `active`) VALUES ({$course_year_id}, {$subid}, {$facid}, {$sem_id}, {$sy_id}, 1);
 	");

 	$statement = mysqli_query($conn, "SELECT MAX(sched_id) FROM schedule");
 	$fetchID = mysqli_fetch_array($statement);
 	$schedID = $fetchID['MAX(sched_id)'];	


 	$labtrue = FALSE;
	$lectrue = FALSE;
	$leclabtrue = FALSE;


	putindextoroomMonday($sem_id, $sy_id);
	putindextoroomTuesday($sem_id, $sy_id);
	putindextoroomWednesday($sem_id, $sy_id);
	putindextoroomThursday($sem_id, $sy_id);
	putindextoroomFriday($sem_id, $sy_id);
	putindextoroomMondays($sem_id, $sy_id);
	putindextoroomTuesdays($sem_id, $sy_id);
	putindextoroomWednesdays($sem_id, $sy_id);
	putindextoroomThursdays($sem_id, $sy_id);
	putindextoroomFridays($sem_id, $sy_id);
	putoccupiedtoRoom($sem_id, $sy_id);

	indexMaxEndMondayss($sem_id, $sy_id);
	indexMaxEndTuesdayss($sem_id, $sy_id);
	indexMaxEndWednesdayss($sem_id, $sy_id);
	indexMaxEndThursdayss($sem_id, $sy_id);
	indexMaxEndFridayss($sem_id, $sy_id);

	indexMaxEndMondaysss($sem_id, $sy_id);
	indexMaxEndTuesdaysss($sem_id, $sy_id);
	indexMaxEndWednesdaysss($sem_id, $sy_id);
	indexMaxEndThursdaysss($sem_id, $sy_id);
	indexMaxEndFridaysss($sem_id, $sy_id);


	$time;
	$time2;
	$time3;
	$time4;
	$time5;
	$lab = getLaboratory($subid);
	$size1 = 1;
	$size2 = 2;
	$size3 = 3;
	$size4 = 4;
	$size5 = 5;

 	$lec = getLecture($subid);
	$lectime;
	$lectime2;
	$lectime3;


// =================


if (!empty($lab)) {
	$lab = getLaboratory($subid);
	$lec = getLecture($subid);

	if ($lab <= 3) {
	$time = maketimeLab($lab);
	$time2 = checktimeforlab2($lab);
 	$time3 = checktimeforlab3($lab);
 	$result1 = resultLab1($time, $sem_id, $sy_id);
 	$result2 = resultLab2($time2, $sem_id, $sy_id);
 	$result3 = resultLab3($time3, $sem_id, $sy_id);

  	$result6 = resultremLab1($time, $sem_id, $sy_id);
 	$result7 = resultremLab2($time2, $sem_id, $sy_id);
	$result8 = resultremLab3($time3, $sem_id, $sy_id);	

 	$numrow1 = mysqli_num_rows($result1);
 	$numrow2 = mysqli_num_rows($result2);
 	$numrow3 = mysqli_num_rows($result3);

	$numrow6 = mysqli_num_rows($result6);
 	$numrow7 = mysqli_num_rows($result7);
 	$numrow8 = mysqli_num_rows($result8);

	$totalTime1 = multiplytwotime1($numrow6, $lab);
	$totalTime2 = multiplytwotimefor2($numrow7, $lab);
	$totalTime3 = multiplytwotimefor3($numrow8, $lab); 	

	if (forrownumlab($result1, $size1, $time, $time, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$labtrue = TRUE; 
	}elseif (forrownumlab($result2, $size2, $time2, $time, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$labtrue = TRUE; 
	}elseif (forrownumlab($result3, $size3, $time3, $time, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$labtrue = TRUE; 
	}elseif (forrownumlabrem($result6, $time, $time, $lab, $totalTime1, $numrow6, $schedID, $facid, $sy_id, $sem_id, $size1)==TRUE) {
		$labtrue = TRUE; 
	}elseif (forrownumlabrem($result7, $time2, $time, $lab, $totalTime2, $numrow7, $schedID, $facid, $sy_id, $sem_id, $size2)==TRUE) {
		$labtrue = TRUE; 
	}elseif (forrownumlabrem($result8, $time3, $time, $lab, $totalTime3, $numrow8, $schedID, $facid, $sy_id, $sem_id, $size3)==TRUE) {
		$labtrue = TRUE;
	}else{

	 	if ($lab == 2){
	 		include "../includes/lab==2.php";
	 	}elseif ($lab == 3) {
	 		include "../includes/lab==3.php";
	 	}
	}
	}elseif ($lab > 3) {
	$time = maketimeLab($lab);
	$time2 = checktimeforlab2($lab);
 	$time3 = checktimeforlab3($lab);
 	$time4 = checktimeforlab4($lab);
 	$time5 = checktimeforlab5($lab);

 	$result1 = resultLab1($time, $sem_id, $sy_id);
 	$result2 = resultLab2($time2, $sem_id, $sy_id);
 	$result3 = resultLab3($time3, $sem_id, $sy_id);
 	$result4 = resultLab4($time4, $sem_id, $sy_id);
 	$result5 = resultLab5($time5, $sem_id, $sy_id);

 	$result6 = resultremLab1($time, $sem_id, $sy_id);
 	$result7 = resultremLab2($time2, $sem_id, $sy_id);
	$result8 = resultremLab3($time3, $sem_id, $sy_id);
 	$result9 = resultremLab4($time4, $sem_id, $sy_id);
	$result10 = resultremLab5($time5, $sem_id, $sy_id);

 	$numrow1 = mysqli_num_rows($result1);
 	$numrow2 = mysqli_num_rows($result2);
 	$numrow3 = mysqli_num_rows($result3);
 	$numrow4 = mysqli_num_rows($result4);
 	$numrow5 = mysqli_num_rows($result5);

	
	$numrow6 = mysqli_num_rows($result6);
 	$numrow7 = mysqli_num_rows($result7);
 	$numrow8 = mysqli_num_rows($result8);
 	$numrow9 = mysqli_num_rows($result9);
 	$numrow10 = mysqli_num_rows($result10);

	$totalTime1 = multiplytwotime1($numrow6, $lab);
	$totalTime2 = multiplytwotimefor2($numrow7, $lab);
	$totalTime3 = multiplytwotimefor3($numrow8, $lab);
	$totalTime4 = multiplytwotimefor4($numrow9, $lab);
	$totalTime5 = multiplytwotimefor5($numrow10, $lab); 	

	if (forrownumlab($result1, $size1, $time, $time, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 1";
	}elseif (forrownumlab($result2, $size2, $time2, $time, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 2";
	}elseif (forrownumlab($result3, $size3, $time3, $time, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 3";
	}elseif (forrownumlab($result4, $size4, $time4, $time, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 4";
	}elseif (forrownumlab($result5, $size5, $time5, $time, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$labtrue = TRUE;  echo "lab > 3 - 5";
	}elseif (forrownumlabrem($result6, $time, $time, $lab, $totalTime1, $numrow6, $schedID, $facid, $sy_id, $sem_id, $size1)==TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 6";
	}elseif (forrownumlabrem($result7, $time2, $time, $lab, $totalTime2, $numrow7, $schedID, $facid, $sy_id, $sem_id, $size2)==TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 7";
	}elseif (forrownumlabrem($result8, $time3, $time, $lab, $totalTime3, $numrow8, $schedID, $facid, $sy_id, $sem_id, $size3)==TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 8"; echo "yeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee";
	}elseif (forrownumlabrem($result9, $time4, $time, $lab, $totalTime4, $numrow9, $schedID, $facid, $sy_id, $sem_id, $size4)==TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 9";
	}elseif (forrownumlabrem($result10, $time5, $time, $lab, $totalTime5, $numrow10, $schedID, $facid, $sy_id, $sem_id, $size5)==TRUE) {
		$labtrue = TRUE; echo "lab > 3 - 10";
	}else{

	 	if ($lab == 2){
	 		include "../includes/lab==2.php";
	 	}elseif ($lab == 3) {
	 		include "../includes/lab==3.php";
	 	}elseif ($lab == 6) {
	 		include "../includes/lab==6.php";
	 	}elseif ($lab == 12) {
	 		include "../includes/lab==12.php";
		}
	}
	}

	if ($lec <= 2) {
	$lectime = maketimeLec($lec);
 	$lectime2 = checktimeforlec2($lec);

	$resultlec1 = resultLec1($lectime, $sem_id, $sy_id);
 	$resultlec2 = resultLec2($lectime2, $sem_id, $sy_id);

 	$resultlec4 = resultremLec1($lectime, $sem_id, $sy_id);
 	$resultlec5 = resultremLec2($lectime2, $sem_id, $sy_id);
 	 	 	
 	$lecnumrow =  mysqli_num_rows($resultlec1);
 	$lecnumrow2 = mysqli_num_rows($resultlec2);

  	$lecnumrow4 = mysqli_num_rows($resultlec4);
 	$lecnumrow5 = mysqli_num_rows($resultlec5);

	$totallecTime1 = multiplytwotime1($lecnumrow4, $lec);
	$totallecTime2 = multiplytwotimefor2($lecnumrow5, $lec); 	

	if (forrownumlab($resultlec1, $size1, $lectime, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$lectrue = TRUE; echo "lec <= 2 - 1";
	}elseif (forrownumlab($resultlec2, $size2, $lectime2, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$lectrue = TRUE; echo "lec <= 2 - 2";
	}elseif (forrownumlabrem($resultlec4, $lectime, $lectime, $lec, $totallecTime1, $lecnumrow4, $schedID, $facid, $sy_id, $sem_id, $size1)==TRUE) {
		$lectrue = TRUE; echo "lec <= 2 - 3";
	}elseif (forrownumlabrem($resultlec5, $lectime2, $lectime, $lec, $totallecTime2, $lecnumrow5, $schedID, $facid, $sy_id, $sem_id, $size2)==TRUE) {
		$lectrue = TRUE; echo "lec <= 2 - 4";
	}else{

	 	if ($lec == 1) {
	 		include "../includes/lec==1.php";
	 	}elseif ($lec == 2) {
	 		include "../includes/lec==2.php";
	 	}
	}
	}elseif ($lec > 2) {
	$lectime = maketimeLec($lec);
 	$lectime2 = checktimeforlec2($lec);
 	$lectime3 = checktimeforlec3($lec);

	$resultlec1 = resultLec1($lectime, $sem_id, $sy_id);
 	$resultlec2 = resultLec2($lectime2, $sem_id, $sy_id);
 	$resultlec3 = resultLec3($lectime3, $sem_id, $sy_id);

 	$resultlec4 = resultremLec1($lectime, $sem_id, $sy_id);
 	$resultlec5 = resultremLec2($lectime2, $sem_id, $sy_id);
	$resultlec6 = resultremLec3($lectime3, $sem_id, $sy_id);

 	$lecnumrow =  mysqli_num_rows($resultlec1);
 	$lecnumrow2 = mysqli_num_rows($resultlec2);
 	$lecnumrow3 = mysqli_num_rows($resultlec3);

 	$lecnumrow4 = mysqli_num_rows($resultlec4);
 	$lecnumrow5 = mysqli_num_rows($resultlec5);
 	$lecnumrow6 = mysqli_num_rows($resultlec6);

	$totallecTime1 = multiplytwotime1($lecnumrow4, $lec);
	$totallecTime2 = multiplytwotimefor2($lecnumrow5, $lec);
	$totallecTime3 = multiplytwotimefor3($lecnumrow6, $lec); 	

 	if (forrownumlab($resultlec1, $size1, $lectime, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
 		$lectrue = TRUE; 
	}elseif (forrownumlab($resultlec2, $size2, $lectime2, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$lectrue = TRUE;
	}elseif (forrownumlab($resultlec3, $size3, $lectime3, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$lectrue = TRUE;
	}elseif (forrownumlabrem($resultlec4, $lectime, $lectime, $lec, $totallecTime1, $lecnumrow4, $schedID, $facid, $sy_id, $sem_id, $size1)==TRUE) {
		$lectrue = TRUE; 
	}elseif (forrownumlabrem($resultlec5, $lectime2, $lectime, $lec, $totallecTime2, $lecnumrow5, $schedID, $facid, $sy_id, $sem_id, $size2)==TRUE) {
		$lectrue = TRUE; 
	}elseif (forrownumlabrem($resultlec6, $lectime3, $lectime, $lec, $totallecTime3, $lecnumrow6, $schedID, $facid, $sy_id, $sem_id, $size2)==TRUE) {
		$lectrue = TRUE; 
	}else{

	 	if ($lec == 1) {
	 		include "../includes/lec==1.php";
	 	}elseif ($lec == 2) {
	 		include "../includes/lec==2.php";
	 	}elseif ($lec == 3) {
	 		include "../includes/lec==3.php";
		}
	}
	}
 	indexMaxEndMonday($sem_id, $sy_id);
	indexMaxEndTuesday($sem_id, $sy_id);
	indexMaxEndWednesday($sem_id, $sy_id);
	indexMaxEndThursday($sem_id, $sy_id);
	indexMaxEndFriday($sem_id, $sy_id);
	putindextoroomMonday($sem_id, $sy_id);
	putindextoroomTuesday($sem_id, $sy_id);
	putindextoroomWednesday($sem_id, $sy_id);
	putindextoroomThursday($sem_id, $sy_id);
	putindextoroomFriday($sem_id, $sy_id);
	putindextoroomMondays($sem_id, $sy_id);
	putindextoroomTuesdays($sem_id, $sy_id);
	putindextoroomWednesdays($sem_id, $sy_id);
	putindextoroomThursdays($sem_id, $sy_id);
	putindextoroomFridays($sem_id, $sy_id);
	putoccupiedtoRoom($sem_id, $sy_id);

	indexMaxEndMondayss($sem_id, $sy_id);
	indexMaxEndTuesdayss($sem_id, $sy_id);
	indexMaxEndWednesdayss($sem_id, $sy_id);
	indexMaxEndThursdayss($sem_id, $sy_id);
	indexMaxEndFridayss($sem_id, $sy_id);

	indexMaxEndMondaysss($sem_id, $sy_id);
	indexMaxEndTuesdaysss($sem_id, $sy_id);
	indexMaxEndWednesdaysss($sem_id, $sy_id);
	indexMaxEndThursdaysss($sem_id, $sy_id);
	indexMaxEndFridaysss($sem_id, $sy_id);	

	
	 if ($labtrue = TRUE && $lectrue = TRUE) {
 	indexMaxEndMonday($sem_id, $sy_id);
	indexMaxEndTuesday($sem_id, $sy_id);
	indexMaxEndWednesday($sem_id, $sy_id);
	indexMaxEndThursday($sem_id, $sy_id);
	indexMaxEndFriday($sem_id, $sy_id);
	putindextoroomMonday($sem_id, $sy_id);
	putindextoroomTuesday($sem_id, $sy_id);
	putindextoroomWednesday($sem_id, $sy_id);
	putindextoroomThursday($sem_id, $sy_id);
	putindextoroomFriday($sem_id, $sy_id);
	putindextoroomMondays($sem_id, $sy_id);
	putindextoroomTuesdays($sem_id, $sy_id);
	putindextoroomWednesdays($sem_id, $sy_id);
	putindextoroomThursdays($sem_id, $sy_id);
	putindextoroomFridays($sem_id, $sy_id);
	putoccupiedtoRoom($sem_id, $sy_id);
	
	indexMaxEndMondayss($sem_id, $sy_id);
	indexMaxEndTuesdayss($sem_id, $sy_id);
	indexMaxEndWednesdayss($sem_id, $sy_id);
	indexMaxEndThursdayss($sem_id, $sy_id);
	indexMaxEndFridayss($sem_id, $sy_id);

	indexMaxEndMondaysss($sem_id, $sy_id);
	indexMaxEndTuesdaysss($sem_id, $sy_id);
	indexMaxEndWednesdaysss($sem_id, $sy_id);
	indexMaxEndThursdaysss($sem_id, $sy_id);
	indexMaxEndFridaysss($sem_id, $sy_id);	 	
	 	die("<script>alert('Successfully Added');window.location.href='../dashboard.php';</script>");
	 }else{
	 	die("<script>alert('No Schedule Added');window.location.href='../dashboard.php';</script>");
	 }	


}else{
	$lec = getLecture($subid);
	if ($lec <= 2) {
	$lectime = maketimeLec($lec);
 	$lectime2 = checktimeforlec2($lec);

	$resultlec1 = resultLec1($lectime, $sem_id, $sy_id);
 	$resultlec2 = resultLec2($lectime2, $sem_id, $sy_id);

 	$resultlec4 = resultremLec1($lectime, $sem_id, $sy_id);
 	$resultlec5 = resultremLec2($lectime2, $sem_id, $sy_id); 	 	
 	 	 	
 	$lecnumrow =  mysqli_num_rows($resultlec1);
 	$lecnumrow2 = mysqli_num_rows($resultlec2);

  	$lecnumrow4 = mysqli_num_rows($resultlec4);
 	$lecnumrow5 = mysqli_num_rows($resultlec5);

	$totallecTime1 = multiplytwotime1($lecnumrow4, $lec);
	$totallecTime2 = multiplytwotimefor2($lecnumrow5, $lec); 		

	if (forrownumlab($resultlec1, $size1, $lectime, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$leclabtrue = TRUE;
	}elseif (forrownumlab($resultlec2, $size2, $lectime2, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$leclabtrue = TRUE;
	}elseif (forrownumlabrem($resultlec4, $lectime, $lectime, $lec, $totallecTime1, $lecnumrow4, $schedID, $facid, $sy_id, $sem_id, $size1)==TRUE) {
		$leclabtrue = TRUE;
	}elseif (forrownumlabrem($resultlec5, $lectime2, $lectime, $lec, $totallecTime2, $lecnumrow5, $schedID, $facid, $sy_id, $sem_id, $size2)==TRUE) {
		$leclabtrue = TRUE;
	}else{
	 	if ($lec == 1) {
	 		include "../includes/lec==1.php";
	 	}elseif ($lec == 2) {
	 		include "../includes/lec==2.php";
	 	}
	}
	}elseif ($lec > 2) {
	$lectime = maketimeLec($lec);
 	$lectime2 = checktimeforlec2($lec);
 	$lectime3 = checktimeforlec3($lec);

	$resultlec1 = resultLec1($lectime, $sem_id, $sy_id);
 	$resultlec2 = resultLec2($lectime2, $sem_id, $sy_id);
 	$resultlec3 = resultLec3($lectime3, $sem_id, $sy_id);

 	$resultlec4 = resultremLec1($lectime, $sem_id, $sy_id);
 	$resultlec5 = resultremLec2($lectime2, $sem_id, $sy_id);
	$resultlec6 = resultremLec3($lectime3, $sem_id, $sy_id); 	

 	$lecnumrow =  mysqli_num_rows($resultlec1);
 	$lecnumrow2 = mysqli_num_rows($resultlec2);
 	$lecnumrow3 = mysqli_num_rows($resultlec3);
 	
 	$lecnumrow4 = mysqli_num_rows($resultlec4);
 	$lecnumrow5 = mysqli_num_rows($resultlec5);
 	$lecnumrow6 = mysqli_num_rows($resultlec6);

	$totallecTime1 = multiplytwotime1($lecnumrow4, $lec);
	$totallecTime2 = multiplytwotimefor2($lecnumrow5, $lec);
	$totallecTime3 = multiplytwotimefor3($lecnumrow6, $lec); 	

 	if (forrownumlab($resultlec1, $size1, $lectime, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
 		$leclabtrue = TRUE;
	}elseif (forrownumlab($resultlec2, $size2, $lectime2, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$leclabtrue = TRUE;
	}elseif (forrownumlab($resultlec3, $size3, $lectime3, $lectime, $schedID, $sy_id, $sem_id, $facid) == TRUE) {
		$leclabtrue = TRUE;
	}elseif (forrownumlabrem($resultlec4, $lectime, $lectime, $lec, $totallecTime1, $lecnumrow4, $schedID, $facid, $sy_id, $sem_id, $size1)==TRUE) {
		$leclabtrue = TRUE;
	}elseif (forrownumlabrem($resultlec5, $lectime2, $lectime, $lec, $totallecTime2, $lecnumrow5, $schedID, $facid, $sy_id, $sem_id, $size2)==TRUE) {
		$leclabtrue = TRUE;
	}elseif (forrownumlabrem($resultlec6, $lectime3, $lectime, $lec, $totallecTime3, $lecnumrow6, $schedID, $facid, $sy_id, $sem_id, $size2)==TRUE) {
		$leclabtrue = TRUE;
	}else{

	 	if ($lec == 1) {
	 		include "../includes/lec==1.php";
	 	}elseif ($lec == 2) {
	 		include "../includes/lec==2.php";
	 	}elseif ($lec == 3) {
	 		include "../includes/lec==3.php";
		}
	}
	}
 	indexMaxEndMonday($sem_id, $sy_id);
	indexMaxEndTuesday($sem_id, $sy_id);
	indexMaxEndWednesday($sem_id, $sy_id);
	indexMaxEndThursday($sem_id, $sy_id);
	indexMaxEndFriday($sem_id, $sy_id);
	putindextoroomMonday($sem_id, $sy_id);
	putindextoroomTuesday($sem_id, $sy_id);
	putindextoroomWednesday($sem_id, $sy_id);
	putindextoroomThursday($sem_id, $sy_id);
	putindextoroomFriday($sem_id, $sy_id);
	putindextoroomMondays($sem_id, $sy_id);
	putindextoroomTuesdays($sem_id, $sy_id);
	putindextoroomWednesdays($sem_id, $sy_id);
	putindextoroomThursdays($sem_id, $sy_id);
	putindextoroomFridays($sem_id, $sy_id);
	putoccupiedtoRoom($sem_id, $sy_id);

	indexMaxEndMondayss($sem_id, $sy_id);
	indexMaxEndTuesdayss($sem_id, $sy_id);
	indexMaxEndWednesdayss($sem_id, $sy_id);
	indexMaxEndThursdayss($sem_id, $sy_id);
	indexMaxEndFridayss($sem_id, $sy_id);

	indexMaxEndMondaysss($sem_id, $sy_id);
	indexMaxEndTuesdaysss($sem_id, $sy_id);
	indexMaxEndWednesdaysss($sem_id, $sy_id);
	indexMaxEndThursdaysss($sem_id, $sy_id);
	indexMaxEndFridaysss($sem_id, $sy_id);

	if ($leclabtrue = TRUE) {
 	indexMaxEndMonday($sem_id, $sy_id);
	indexMaxEndTuesday($sem_id, $sy_id);
	indexMaxEndWednesday($sem_id, $sy_id);
	indexMaxEndThursday($sem_id, $sy_id);
	indexMaxEndFriday($sem_id, $sy_id);
	putindextoroomMonday($sem_id, $sy_id);
	putindextoroomTuesday($sem_id, $sy_id);
	putindextoroomWednesday($sem_id, $sy_id);
	putindextoroomThursday($sem_id, $sy_id);
	putindextoroomFriday($sem_id, $sy_id);
	putindextoroomMondays($sem_id, $sy_id);
	putindextoroomTuesdays($sem_id, $sy_id);
	putindextoroomWednesdays($sem_id, $sy_id);
	putindextoroomThursdays($sem_id, $sy_id);
	putindextoroomFridays($sem_id, $sy_id);
	putoccupiedtoRoom($sem_id, $sy_id);
	
	indexMaxEndMondayss($sem_id, $sy_id);
	indexMaxEndTuesdayss($sem_id, $sy_id);
	indexMaxEndWednesdayss($sem_id, $sy_id);
	indexMaxEndThursdayss($sem_id, $sy_id);
	indexMaxEndFridayss($sem_id, $sy_id);

	indexMaxEndMondaysss($sem_id, $sy_id);
	indexMaxEndTuesdaysss($sem_id, $sy_id);
	indexMaxEndWednesdaysss($sem_id, $sy_id);
	indexMaxEndThursdaysss($sem_id, $sy_id);
	indexMaxEndFridaysss($sem_id, $sy_id);		
	 	die("<script>alert('Successfully Added');window.location.href='../dashboard.php';</script>");
	 }else{
	 	die("<script>alert('No Schedule Added');window.location.href='../dashboard.php';</script>");
	 }			


}

}
?>


<!-- Powered by: Currente TM -->