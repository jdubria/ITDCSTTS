<!DOCTYPE html>
<?php include "../connection/conn.php"; ?>
<html>
<head>
	<title>ITDCSTTS</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../src/css/w3.css">
    <link rel="stylesheet" type="text/css" href="../src/fa-font/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../src/css/sidebar.css">
    <!-- JavaScript -->
    <script src="../src/js/jquery.min.js"></script>
    <script src="../src/js/popper.min.js"></script>
    <script src="../src/js/bootstrap.min.js"></script>
    <script src="../src/js/holder.min.js"></script>
    

    <link rel="stylesheet" type="text/css" href="../src/datable/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../src/datable/dataTables.jqueryui.min.css">
    <script type="text/javascript" src="../src/datable/dataTables.min.js"></script>
    <script type="text/javascript" src="../src/datable/dataTables.jqueryui.min.js"></script>    
</head>
<body onload="window.print()">
		<br><br><br><br><br><br>
	<center><h6>CHMSC BSIT Class Schedule</h6></center>
<?php 
     if (isset($_GET['room']) && isset($_GET['day'])) { 
      $id = $_GET['room'];
      $dayv = $_GET['day'];
                                
    $roomid = $_GET['room'];
    $query = mysqli_query($conn, "
    SELECT * FROM room WHERE roomid = {$roomid};  
      "); 
    $get = mysqli_fetch_array($query);
    $name = $get['name'];


      $sqlquery = mysqli_query($conn, "
        SELECT * FROM `schedule`
        INNER JOIN faculty ON `schedule`.fac_id = faculty.fac_id
        INNER JOIN subjects ON `schedule`.sub_id = subjects.subid
        INNER JOIN room_sched ON room_sched.schedid = `schedule`.sched_id
        INNER JOIN room_day_time ON room_sched.rdt_id = room_day_time.rdt_id
        INNER JOIN room ON room_day_time.room_id = room.roomid
        INNER JOIN `day` ON room_day_time.day_id = `day`.day_id
        INNER JOIN course_year ON `schedule`.course_year_id = course_year.course_year_id
        INNER JOIN course ON course_year.course_id = course.course_id
        INNER JOIN `year` ON course_year.year_id = `year`.year_id
        INNER JOIN school_year ON `schedule`.sy_id = school_year.sy_id
        INNER JOIN semester ON `schedule`.sem_id = semester.sem_id
        WHERE room.roomid = {$id} AND `day`.day_id = {$dayv}
        ORDER BY room_day_time.start_time ASC
        ");
      ?>
<br><br>                                
                                 
                                   <h5 class="h6">Room Name: <span><b><?php echo $name; ?></b></span></h5><br>
                                   
                                   <table class="table table-striped table-bordered table-sm">
                                       <thead>
                                           <tr>
                                               <th>Time</th>
                                               <th>Day</th>
                                               <th>Subject Code</th>
                                               <th>Subject Title</th>
                                               <th>Units</th>
                                               <th>Instructor</th>
                                               <th>Course & Year</th>
                                           </tr>
                                       </thead>

                                       <tbody>
                                        <?php 
                                    while ($rowss = mysqli_fetch_array($sqlquery)) { ?>
                                           <tr>
                                               <td><?php echo $rowss['start_time'] ?> - <?php echo $rowss['end_time'] ?></td>
                                               <td><?php echo $rowss['day']; ?></td>
                                               <td><?php echo $rowss['code'] ?></td>
                                               <td><?php echo $rowss['title'] ?></td>
                                               <td><?php echo $rowss['units'] ?></td>
                                               <td><?php echo $rowss['fac_name'] ?></td>
                                               <td><?php echo $rowss['course_name'] ?> <?php echo $rowss['year_name'] ?> <?php echo $rowss['section'] ?></td>
                                           </tr>                                           
                                         <?php
                                       }   
                                        ?> 
                                       </tbody>
                                   </table>


 <?php }else{
 ?>
    <script type="text/javascript">
        alert("No record to be print");
        window.close();
    </script>
    <?php 
} ?>


 <?php
include '../html_parts/footer.php';
 ?>