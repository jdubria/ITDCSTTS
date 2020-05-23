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
                                                 <a href="settings_sy.php" class="nav-link">Registered School Year</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a href="settings_setsy.php" class="nav-link active">Set School Year</a>
                                             </li>
                                         </ul>                                     
                                 </div>
                                  <div class="col-sm-10">
                                     <div class="card">
                                        <br>
                                        <div class="container">
                                            <div class="jumbotron">
                                                <center><h5>Set School Year</h5></center>
                                                <center>
                                                <small class="text-info">If you will set or change the school year, Kindly log-out and re-login again.</small>
                                                </center>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="container">
                                                <div class="form-group">
                                                    <label class="pull-left">Current School Year:</label>
                                                    <?php 
                                                    $sql = mysqli_query($conn, "SELECT * FROM `default`
                                                        INNER JOIN school_year ON school_year.sy_id = default.sy_id;");
                                                    $fetch = mysqli_fetch_assoc($sql);
                                                    $sy = $fetch['sy'];
                                                    ?>
                                                    <input type="text" class="form-control" readonly="" value="<?php echo $sy; ?>">
                                                    <!-- session lang nadi -->
                                                </div>
                                                <div class="pull-right">
                                                    <button class="btn btn-sm" data-toggle="modal" data-target="#set_sy"><span class="fa fa-refresh"></span> Change Current School Year</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-10"></div>
                             </div>
                         </div>
                     </div>
                 </div>


             </main>
        </div>     
    </div>

 <?php
include 'html_parts/footer.php';
include 'modals/set_sy.php';
 ?>