<?php
include 'html_parts/header.php';
include 'html_parts/navbar.php';
include 'modals/add_sy.php';
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
                             <a class="nav-link" href="archive.php">
                                <span class="fa fa-archive"></span> 
                               Archives
                             </a>
                         </li>
                          <li class="nav-item">
                             <a class="nav-link active" href="settings.php">
                                <span class="fa fa-cogs"></span> 
                               Settings <span class="sr-only">(current)</span>
                             </a>
                         </li>

                     </ul>
                 </div>
             </nav>
             
             <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="margin-top: 90px;">
                 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                     <h1 class="h2">Settings<span><br></span></h1>
                 </div>

                 <div class="row">
                     <div class="col-sm-2">
                             <h6><b>Menu</b></h6>                
                         <ul class="nav nav-pills nav-stacked">

                             <li class="nav-item">
                                 <a href="settings.php" class="nav-link">Semesters</a>
                             </li>
                             <li class="nav-item">
                                 <a href="settings_sy.php" class="nav-link active">School Year</a>
                             </li>
                             </li>
                            <li class="nav-item">
                                  <a href="settings_addcourse.php" class="nav-link">Add Course</a>
                             </li>
                            <li class="nav-item">
                                  <a href="settings_courseyearsection.php" class="nav-link">Course, Year and Section</a>
                             </li>
                         </ul>
                     </div>
                     <div class="col-sm-10">
                         <div class="container">
                             <div class="row">
                                 <div class="col-sm-2">
                                        <div class="bg-success">
                                            <br>
                                            <div class="w3-margin">
                                                <h6 class="text-center text-light"><b>School Year</b></h6>
                                            </div>
                                            <br>    
                                        </div>
                                        <br>                
                                        <ul class="nav nav-pills nav-stacked">
                                             <li class="nav-item">
                                                 <a href="settings_sy.php" class="nav-link active">Registered School Year</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a href="settings_setsy.php" class="nav-link">Set School Year</a>
                                             </li>
                                         </ul>                                     
                                 </div>
                                 <div class="col-sm-10">
                                    <div class="card">
                                        <div class="container">
                                            <br>
                                            <div class="jumbotron">
                                                <center><h5><b>List of School Year</b></h5></center>
                                            </div>

                                            <div class="table-responsive">
                                                <div class="pull-left">
                                                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#sy" data-tooltip="tooltip" data-placement="bottom" title="Add School Year"><span class="fa fa-plus"></span> School Year</button>
                                                </div>
                                                <br>
                                                <br>

                                                <table class="table table-sm table-striped table-inverse">
                                                    <thead>
                                                     <th>#</th>
                                                     <th>School Year</th>
                                                     <th>Action</th>
                                                    </thead>

                                                 <tbody>
                                                 <?php
                                                 $x = 1; 
                                                 $sql = mysqli_query($conn, "SELECT * FROM school_year WHERE active = 1");
                                                 while ($row = mysqli_fetch_array($sql)) { ?>
                                                     <tr>
                                                         <td><?php echo $x++; ?></td>
                                                         <td><?php echo $row['sy']; ?></td>
                                                         <td>
                                                            <div class="btn-group">
                                                             <a href="#edit<?php echo $row['sy_id'] ?>" data-toggle="modal" class="btn btn-sm"><span class="fa fa-edit"></span> Edit</a>
                                                             <a href="#archive<?php echo $row['sy_id'] ?>" data-toggle="modal" class="btn btn-sm"><span class="fa fa-archive"></span> Archived</a>
                                                            </div>
                                                            <?php include 'modals/buttons_sy.php'; ?>
                                                         </td>
                                                     </tr>
                                                <?php
                                                 }
                                                 ?>        
                                                 </tbody>                                                    
                                                </table>
                                            </div>   
                                       </div> 
                                    </div>
                                 </div>
                                  
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