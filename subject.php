<?php
include 'html_parts/header.php';
include 'html_parts/navbar.php';
include 'modals/add_subject.php';
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
                             <a class="nav-link active" href="subject.php">
                                <span class="fa fa-th-list"></span> 
                              Subject <span class="sr-only">(current)</span>
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
                     <h1 class="h2">Subject Management<span><br><p class="h6">Add, update and/or archive subjects</p></span></h1>
                 </div>

                  <div class="pull-left">
                     <button type="button" data-target="#subject" data-toggle="modal" data-tooltip="tooltip" data-placement="bottom" title="Add subject information"  class="btn btn-sm btn-outline-dark"><span class="fa fa-plus"></span> <strong>Subject</strong></button>
                   </div>

                     <br><br>

                      <div class="table-responsive">
                      <script type="text/javascript">
                        $(document).ready(function() {
                          $('#subject_table').DataTable();
                      } );
                      </script>
                   
                   <table class="table table-striped table-bordered table-sm" id="subject_table">
                     <thead>
                       <tr class="text-center">
                         <th>Subject Code</th>
                         <th>Subject Title</th>
                         <th>Units</th>
                         <th>Lecture Hours</th>
                         <th>Laboratory Hours</th>
                         <th>Course</th>
                         <th>Major</th>
                         <th>Year</th>
                         <th>Semester</th>
                         


                         <th class="text-center">Action</th>
                       </tr>
                     </thead>

                     <tbody style="font-size: 12px;">
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM subjects
INNER JOIN course ON course.course_id = subjects.course_id                          
INNER JOIN semester ON semester.sem_id = subjects.sem_id
INNER JOIN year ON year.year_id = subjects.year_id
WHERE subjects.active = 1");
                         while ($row = mysqli_fetch_array($result)) { ?>
                      
                       <tr>
                         <td class="text-center"><?php echo $row['code']; ?></td>
                         <td class="text-center"><?php echo $row['title']; ?></td>
                         <td class="text-center"><?php echo $row['units']; ?></td>
                         <td class="text-center"><?php echo $row['lec']; ?></td>
                         <td class="text-center"><?php echo $row['lab']; ?></td>
                         <td class="text-center"><?php echo $row['course_name']; ?></td>
                         <td class="text-center"><?php echo $row['major']; ?></td>
                         <td class="text-center"><?php echo $row['year_name']; ?></td>
                         <td class="text-center"><?php echo $row['semester']; ?></td>

                         <td class="text-center">
                            <div class="btn-group">
                                <a href="#edit<?php echo $row['subid'] ?>" data-target="#edit<?php echo $row['subid'] ?>" data-toggle="modal" data-tooltip="tooltip" data-placement="bottom" title="Edit <?php echo $row['title']; ?> information" class="btn btn-sm btn-outline-dark"> <strong> Edit</strong></a>

                               <a href="#archive<?php echo $row['subid'] ?>" data-target="#archive<?php echo $row['subid'] ?>" data-toggle="modal" data-tooltip="tooltip" data-placement="bottom" title="Archive <?php echo $row['title']; ?>" class="btn btn-sm btn-outline-dark"> <strong> Archive</strong></a>
                            </div>

                         </td>
                          <?php include('modals/button_subject.php'); ?>
                      </tr> 
                      <?php  } ?>  
                     </tbody>
                   </table>
                 </div>

             </main>
        </div>     
    </div>

 <?php
include 'html_parts/footer.php';
 ?>

 s