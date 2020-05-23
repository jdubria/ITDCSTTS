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
                             <a class="nav-link" href="archive.php"><span class="fa fa-list"></span> Archive Subject </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="archive_room.php"><span class="fa fa-home"></span> Archive Rooms </a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link active" href="archive_faculty.php"><span class="fa fa-user"></span> Archive Faculty</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="archive_semsycourse.php"><span class="fa fa-th"></span> Archive Semester, School Year and Course</a>
                         </li>
                     </ul>
                 </div>                 


                    <div id="faculty" class="tab-pane panel">

                         <div class="table-responsive">
                                
                                  <script type="text/javascript">
                                    $(document).ready(function(){
                                      $("#table").dataTable();
                                    });
                                  </script>                                   
                                   
                                   <table class="table table-striped table-bordered table-sm" id="table">
                                       <thead class="bg-dark text-light">
                                           <tr class="text-center">
                                               <th>Instructor Name</th>
                                               <th>Restore</th>
                                           </tr>
                                       </thead>

                                       <tbody>
                                        <?php 
                                        $resultss = mysqli_query($conn, "SELECT * FROM faculty WHERE active = 0;");
                                        while ($row = mysqli_fetch_array($resultss)) { ?>
                                           <tr>
                                            <td class="text-center"><?php echo $row['fac_name']; ?></td>
                                             <td class="text-center">
                                              <a href="action/restore_faculty.php?fac_id=<?php echo $row['fac_id']?>" class="btn btn-sm btn-outline-dark"><strong> Restore </strong></a>
                                              </td>
                                                </tr>
                                                <?php } ?>
                                        
                                       </tbody>
                                   </table>
                               </div>     
                </div>

             </main>
        </div>     
    </div>

 <?php
include 'html_parts/footer.php';
 ?>