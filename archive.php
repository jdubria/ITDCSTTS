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
                             <a class="nav-link" href="dashboard.php">
                                 <span class="fa fa-dashboard"></span>
                                Dashboard
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
                             <a class="nav-link active" href="archive.php">
                                <span class="fa fa-archive"></span> 
                               Archives <span class="sr-only">(current)</span>
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
                     <h1 class="h2">Archives<span><br><p class="h6">Manage and restore archived faculty, rooms and subjects</p></span></h1>
                 </div>
                 <div class="pt-3 pb-2 mb-3">
                     <ul class="nav nav-tabs mr-2">
                         <li class="nav-item">
                             <a class="nav-link active" href="archive.php"><span class="fa fa-list"></span> Archive Subject </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="archive_room.php"><span class="fa fa-home"></span> Archive Rooms </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="archive_faculty.php"><span class="fa fa-user"></span> Archive Faculty</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="archive_semsycourse.php"><span class="fa fa-th"></span> Archive Semester, School Year and Course</a>
                         </li>
                     </ul>
                 </div>


                  <div class="tab-content">
                <div id="subject" class="tab-pane active panel">
                               <div class="table-responsive">
                                  
                                  <script type="text/javascript">
                                    $(document).ready(function(){
                                      $("#table").dataTable();
                                    });
                                  </script>
                                   
                                   <table class="table table-striped table-bordered table-sm " id="table">
                                       <thead class="bg-dark text-light">
                                           <tr class="text-center">
                                               <th>Subject Code</th>
                                               <th>Subject Title</th>
                                               <th>Units</th>
                                               <th>Lecture</th>
                                               <th>Laboratory</th>
                                               <th>Restore</th>
                                           </tr>
                                       </thead>

                                       <tbody>
                                         <?php 
                                         $result = mysqli_query($conn, "
                                          SELECT * FROM subjects
                                          INNER JOIN course ON subjects.course_id = course.course_id
                                          INNER JOIN semester ON subjects.sem_id = semester.sem_id
                                          INNER JOIN `year` ON subjects.year_id = `year`.year_id
                                          WHERE subjects.active = 0;
                                          ");
                                         while ($row = mysqli_fetch_array($result)) { ?>
                                            <td class="text-center"><?php echo $row['code']; ?></td>
                                            <td class="text-center"><?php echo $row['title']; ?></td>
                                            <td class="text-center"><?php echo $row['units']; ?></td>
                                            <td class="text-center"><?php echo $row['lec']; ?></td>
                                            <td class="text-center"><?php echo $row['lab']; ?></td>

                                              <td class="text-center">
                                                <a href="action/restore_subject.php?subid=<?php echo $row['subid']?>" class="btn btn-sm btn-outline-dark" name="restore"> <strong> Restore</strong> </a>
                                              </td>
                                                </tr>

                                         <?php } ?> 
                                       </tbody>
                                   </table>
                               </div>                    
                </div>





                

              



               
                </div>                 


             </main>
        </div>     
    </div>

 <?php
include 'html_parts/footer.php';
 ?>