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
                             <a class="nav-link active" href="faculty.php">
                                <span class="fa fa-user"></span> 
                               Faculty <span class="sr-only">(current)</span>
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
                     <h1 class="h2">Faculty/Instructors Management<span><br><p class="h6">Add, update and/or archive instructors</p></span></h1>
                 </div>

                 <div class="pull-left">
                     <button type="button" class="btn btn-sm btn-outline-dark" data-target="#faculty" data-toggle="modal" data-tooltip="tooltip" data-placement="bottom" title="Add faculty information"><span class="fa fa-plus"></span><strong> Faculty </strong></button>
                   </div>

                    <br><br>
                 
                     <div class="table-responsive">
                      <script type="text/javascript">
                        $(document).ready(function() {
                          $('#faculty_table').DataTable();
                      } );
                      </script>


                   <table class="table table-striped table-bordered table-sm" id="faculty_table">
                     <thead>
                       <tr class="text-center">
                         <th>Instructor ID</th>
                         <th>Instructor Name</th>
                         <th class="text-center">Action</th>
                       </tr>
                     </thead>

                     <tbody>
                            <?php
                        $result = mysqli_query($conn, "SELECT * FROM faculty WHERE  active = 1");
                         while ($row = mysqli_fetch_array($result)) { ?>                           
                      
                       <tr>
                         <td class="text-center"><?php echo $row['facode_id'] ?></td>
                         <td class="text-center"><?php echo $row['fac_name'] ?></td>

                         <td class="text-center">
                            <div class="btn-group">
                                <a href="#edit<?php echo $row['fac_id'] ?>" data-target="#edit<?php echo $row['fac_id'] ?>" data-toggle="modal" class="btn btn-sm btn-outline-dark" data-tooltip="tooltip" data-placement="bottom" title="Edit <?php echo $row['fac_name']; ?> information"> <strong> Edit</strong> </a>
                                 <a href="#archive<?php echo $row['fac_id'] ?>" data-target="#archive<?php echo $row['fac_id'] ?>" data-toggle="modal" class="btn btn-sm btn-outline-dark" data-tooltip="tooltip" data-placement="bottom" title="Archive <?php echo $row['fac_name']; ?>"> <strong> Archive</strong></a>
                            </div>
                         </td>
                       </tr>
                        <?php include('modals/button_faculty.php'); ?>
                     <?php } ?>
                     </tbody>
                   </table>
                 </div>


             </main>
        </div>     
    </div>

 <?php
include 'html_parts/footer.php';
include 'modals/add_faculty.php';
 ?>