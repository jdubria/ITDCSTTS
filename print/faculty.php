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
     if (isset($_GET['fac_id'])) {
      $facids = $_GET['fac_id']; 
      $result = mysqli_query($conn, "SELECT * FROM faculty WHERE active = 1 AND fac_id = '{$facids}'"); 
      $fetch = mysqli_fetch_array($result);
      $facname = $fetch['fac_name'];
       ?>
                               <div class="table-responsive">
                                   <br><br>
                                   <h5 class="h6">Instructor Name: <span><b><?php echo $facname; ?></b></span></h5><br>
                                   
                                   <table class="table table-striped table-bordered table-sm">
                                       <thead>
                                           <tr>
                                               <th>Subject Code</th>
                                               <th>Subject Title</th>
                                               <th>Units</th>
                                               <th>Room</th>
                                               <th>Day</th>
                                               <th>Time</th>
                                               <th>Course & Year</th>
                                           </tr>
                                       </thead>

                                       <tbody>
                                        <?php 
                                       $sql1 = mysqli_query($conn, "
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
                                      WHERE faculty.fac_id = {$facids}
                                      ORDER BY room_day_time.start_time ASC

                                       ");
                                       while ($row1 = mysqli_fetch_array($sql1)) { 

                                        ?>
                                           <tr>
                                               <td><?php echo $row1['code'] ?></td>
                                               <td><?php echo $row1['title'] ?></td>
                                               <td><?php echo $row1['units'] ?></td>
                                               <td><?php echo $row1['name'] ?></td>
                                               <td><?php echo $row1['day'] ?></td>
                                               <td><?php echo $row1['start_time'] ?>-<?php echo $row1['end_time'] ?></td>
                                               <td><?php echo $row1['course_name'] ?> <?php echo $row1['year_name'] ?> <?php echo $row1['section'] ?></td>
                                           </tr>
                                      <?php  
                                       }
                                        ?>     
                                           
                                       </tbody>
                                   </table>
                               </div>


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
