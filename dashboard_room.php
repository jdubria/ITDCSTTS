<?php
include 'html_parts/header.php';
include 'html_parts/navbar.php';
 ?>
     <div class="container-fluid">
         <div class="row">
             <nav class="col-md-2 d-none d-md-block sidebar" style="margin-top: 70px;">
                 <div class="sidebar-sticky">
                     <ul class="nav flex-column">
                         <div class="container border-bottom bg-primary"></div>
                         <li class="nav-item">
                             <a class="nav-link active" href="dashboard.php">
                                 <span class="fa fa-dashboard"></span>
                                Dashboard <span class="sr-only">(current)</span>
                             </a>
                         </li>
                         
                         <li class="nav-item">
                             <a class="nav-link" href="subject.php">
                                <span class="fa fa-th-list"></span> 
                              Subject  
                             </a>
                         </li>
                         
                         <li class="nav-item">
                             <a class="nav-link" href="room.php">
                                <span class="fa fa-home"></span> 
                                Room
                             </a>
                         </li>
                         
                         <li class="nav-item">
                             <a class="nav-link" href="faculty.php">
                                <span class="fa fa-user"></span> 
                               Faculty
                             </a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link" href="archive.php">
                                <span class="fa fa-archive"></span> 
                               Archives
                             </a>
                         </li>
                          <li class="nav-item">
                             <a class="nav-link" href="settings.php">
                                <span class="fa fa-cogs"></span> 
                               Settings
                             </a>
                         </li>

                     </ul>
                 </div>
             </nav>
             
             <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="margin-top: 90px;">
                 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                     <h1 class="h2">Dashboard<span><br><p class="h6">Faculty Class Schedule and Room Occupancy Table</p></span></h1>
                 </div>

                 <div class="pt-3 pb-2 mb-3">
                     <ul class="nav nav-tabs mr-2">
                         <li class="nav-item">
                             <a class="nav-link" href="dashboard.php"><span class="fa fa-user-md"></span> Faculty Class Schedule</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link active" href="dashboard_room.php"><span class="fa fa-home"></span> Rooms Schedule</a>
                         </li>
                     </ul>
                 </div>

                 <div class="pull-left">
                      <button type="button" class="btn btn-sm btn-outline-dark" data-target="#add" data-toggle="modal"><span class="fa fa-plus"></span><strong> Assign Class </strong></button>
                 </div> <br><br>

                     <div class="tab-content">
                        <div class="row">
                             <div class="col-sm-2">
                                 <ul class="list-group">
                                     <h4 class="list-group-item h5">Rooms Schedule</h4>
                                     <?php 
                                 $result = mysqli_query($conn, "SELECT * FROM room WHERE active = 1");
                                 
                                 while ($row = mysqli_fetch_array($result)) { ?>
                                     <li class="list-group-item"><a href="?room=<?php echo $row['roomid'] ?>"><?php echo $row['name']; ?></a></li>
                                     <?php
                                     }    
                                     ?>
                                 </ul>
                             </div>
                                <?php 
                                  if (isset($_GET['room'])) { 
                                  $roomid = $_GET['room'];
                                  $query = mysqli_query($conn, "
                                  SELECT * FROM room WHERE roomid = {$roomid};  
                                    "); 
                                  $get = mysqli_fetch_array($query);
                                  $name = $get['name'];
                                    ?>                             
                             <div class="col-sm-2">
                                <ul class="list-group">
                                     <h4 class="list-group-item bg-success text-light h5"><?php echo $name; ?> Schedule</h4>
                                     <li class="list-group-item"><a href="?room=<?php echo $get['roomid'] ?>&&day=1">Monday</a></li>
                                     <li class="list-group-item"><a href="?room=<?php echo $get['roomid'] ?>&&day=2">Tuesday</a></li>
                                     <li class="list-group-item"><a href="?room=<?php echo $get['roomid'] ?>&&day=3">Wednesday</a></li>
                                     <li class="list-group-item"><a href="?room=<?php echo $get['roomid'] ?>&&day=4">Thursday</a></li>
                                     <li class="list-group-item"><a href="?room=<?php echo $get['roomid'] ?>&&day=5">Friday</a></li>
                                 </ul>                                                            
                             </div>
                             <div class="col-sm-8">
                                 <?php 
                               if (isset($_GET['room']) && isset($_GET['day'])) { 
                                $id = $_GET['room'];
                                $dayv = $_GET['day'];
                               $sem_id = $_SESSION['sem_id'];
                              $sy_id = $_SESSION['sy_id'];
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
                                  WHERE room.roomid = {$id} AND `day`.day_id = {$dayv} AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id}
                                  ORDER BY room_day_time.start_time ASC
                                  ");
                                ?>
                               <div class="table-responsive">
                                   <div class="pull-right">
                                        <button class="btn btn-sm btn-outline-dark" onclick="window.open('print/room.php?room=<?php echo $id ?>&&day=<?php echo $dayv ?>', '_blank', 'location=yes, height=470, width=740, scrollbars=yes, status=yes');"><span class="fa fa-print"></span> Print Schedule</button>
                                   </div>
                                   <br><br>                                
                                 
                                   <h5 class="h6">Room Name: <span><b><?php echo $name; ?></b></span></h5><br>
                                   
                                   <table class="table table-striped table-bordered table-sm">
                                       <thead>
                                           <tr>
                                               <th>Time</th>
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
                                  <?php
                                 }else{
                                  echo "
                                  <br>
                                  <div class='card bg-secondary text-light'>
                                  <center><h6>SELECT DAY TO SEE SCHEDULE</h6></center>
                                   </div> <br> <br> 
                                  "; 
                                  ?>
                            <div class="container">
                              <div class="jumbotron">
                                <div class="text-center">
                                  <h1>IT Department Class Scheduling <br> and <br> Time Tabling System</h1>
                                </div>

                              </div>
                            </div>
                                 <?php                                    
                                 }  
                                 ?>   
                                  <?php  
                                  }else{
                                  echo "
                                  <div class='col-sm-10'>
                                  <br>
                                  <div class='card bg-secondary text-light'>
                                  <center><h6>SELECT ROOM TO SEE SCHEDULE</h6></center>
                                   </div> <br> <br>

                            <div class='container'>
                              <div class='jumbotron'>
                                <div class='text-center'>
                                  <h1>IT Department Class Scheduling <br> and <br> Time Tabling System</h1>
                                </div>

                              </div>
                            </div>
                            </div>                                    
                                  ";
                                  }

                                  ?> 
                               </div>
                             </div>
                         </div>
                     </div>


             </main>
        </div>     
    </div>

 <?php
include 'html_parts/footer.php';
 ?>
  <script type="text/javascript">
     $(document).ready(function(){
        var url = window.location.href;
        $('.list-group li a').filter(function(){
           return $(this).prop('href') === url; 
        }).parent('li').addClass('active');
     });
 </script>

 <?php 
include 'modals/assignclassschedule.php';
 ?>