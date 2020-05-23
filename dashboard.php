<?php
include 'html_parts/header.php';
include 'html_parts/navbar.php';

$sem_id = $_SESSION['sem_id'];
$sy_id = $_SESSION['sy_id'];

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
                             <a class="nav-link active" href="dashboard.php"><span class="fa fa-user-md"></span> Faculty Class Schedule</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="dashboard_room.php"><span class="fa fa-home"></span> Rooms Schedule</a>
                         </li>
                     </ul>
                 </div>


                 <div class="pull-left">
                      <button type="button" class="btn btn-sm btn-outline-dark" data-target="#add" data-toggle="modal"><span class="fa fa-plus"></span><strong> Assign Class </strong></button>
                 </div>
                 <br><br>

                        <div class="row">
                             <div class="col-sm-3">
                                 <ul class="list-group">
                                     <h6 class="list-group-item bg-secondary text-light h6 text-center">BS Info Tech Faculty</h4>
                                   <?php 
                                  $sql = mysqli_query($conn, "SELECT * FROM faculty WHERE active = 1");
                                    while ($rows = mysqli_fetch_array($sql)) { ?>
                                     <li class="list-group-item">
                                       <a href="?fac_id=<?php echo $rows['fac_id'] ?>"><?php echo $rows['fac_name'] ?></a>
                                     </li>
                                  <?php
                                     } 
                                   ?>
                                   </ul>
                             </div>
                             <div class="col-sm-9">
                              <?php 
                            if (isset($_GET['fac_id'])) {
                             $facids = $_GET['fac_id']; 
                             $sem_id = $_SESSION['sem_id'];
                              $sy_id = $_SESSION['sy_id'];
                             $result = mysqli_query($conn, "SELECT * FROM faculty WHERE active = 1 AND fac_id = '{$facids}'"); 
                             $fetch = mysqli_fetch_array($result);
                             $facname = $fetch['fac_name'];
                              ?>
                               <div class="table-responsive">
                                   <div class="pull-right">
                                        <button class="btn btn-sm btn-outline-dark" onclick="window.open('print/faculty.php?fac_id=<?php echo $facids ?>', '_blank', 'location=yes, height=470, width=740, scrollbars=yes, status=yes');"><span class="fa fa-print"></span> Print Schedule</button>
                                   </div>
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
                                               <th>Section</th>
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
                                      WHERE faculty.fac_id = {$facids} AND semester.sem_id = {$sem_id} AND school_year.sy_id = {$sy_id}
                                      ORDER BY day.day_id ASC
                                      -- ORDER BY room_day_time.rdt_id ASC

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
                                               <td><?php echo $row1['course_name'] ?> <?php echo $row1['year_name'] ?></td>
                                               <td> <?php echo $row1['section'] ?></td>
                                           </tr>
                                      <?php  
                                       }
                                        ?>     
                                           
                                       </tbody>
                                   </table>
                               </div>
                               <?php 
                                }else{
                                  echo "
                                  <br>
                                  <div class='card bg-secondary text-light'>
                                  <center><h6>SELECT FACULTY TO SEE SCHEDULE</h6></center>
                                   </div> <br> <br> 
                                  "; ?>
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

 