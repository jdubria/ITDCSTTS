<div id="subject" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
      	<form method="POST" action="action/add_subject.php">

        <div class="row">
          <div class="col-sm-5">
            <fieldset>
                <div class="form-group">
                  <label class="pull-left" for="course_name">Course:</label>
                  <select class="form-control" name="course_id">  
                    <option disabled selected>Select for Course</option>
                    <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM course WHERE active = 1");
                    while ($rows = mysqli_fetch_array($sql)) { ?>
                    <option value="<?php echo $rows['course_id'] ?>"><?php echo $rows['course_name'] ?> - <?php echo $rows['major']; ?></option>
                    <?php 
                    }
                    ?>
                  </select>
                </div>

                

                <div class="form-group">
                  <label class="pull-left" for="year_id">For Year:</label>
                  <select class="form-control" name="year_id">
                    <option disabled selected>Select Year</option>
                    <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM year");
                    while ($rows = mysqli_fetch_array($sql)) { ?>
                    <option value="<?php echo $rows['year_id'] ?>"><?php echo $rows['year_name'] ?></option>
                    <?php 
                    }
                    ?>                    
                  </select>
                </div>

                <div class="form-group">
                  <label class="pull-left" for="sem_id">For Semester:</label>
                  <select class="form-control" name="sem_id">
                    <option disabled selected>Select Sem</option>
                    <?php 
                    $sql = mysqli_query($conn, "SELECT * FROM semester WHERE active = 1");
                    while ($rows = mysqli_fetch_array($sql)) { ?>
                    <option value="<?php echo $rows['sem_id'] ?>"><?php echo $rows['semester'] ?></option>
                    <?php 
                    }
                    ?>                    
                  </select>
                </div>

            </fieldset>
          </div>
          <div class="col-sm-7">
            <fieldset>
                <div class="form-group">
                  <label class="pull-left" for="code">Subject Code:</label>
                  <input type="text" name="code" id="code" class="form-control">
                </div>

                <div class="form-group">
                  <label class="pull-left" for="title">Subject Title:</label>
                  <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-row">
                      <label class="col-sm-4 col-form-label">Units:</label>
                      <div class="col-sm-8">
                        <input type="number" step="0.5" class="form-control" min="0" name="units">
                      </div>
                    </div> 
                  </div>
                  <div class="col-sm-4">
                    <div class="form-row">
                      <label class="col-sm-6 col-form-label">Lecture Time:</label>
                      <div class="col-sm-6">
                        <input type="number" class="form-control" min="0" name="lec">
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-row">
                      <label class="col-sm-4 col-form-label">Lab Time:</label>
                      <div class="col-sm-8">
                        <input type="number" class="form-control" min="0" name="lab">
                      </div>
                    </div>
                  </div>
                </div>                              
            </fieldset>
          </div>

        </div>
          
      </div>

      <div class="modal-footer text-light" style="background: #25383C;">
      	<div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal"><span class="fa fa-close"></span><strong> Close </strong></button>
        <button type="submit" id="save" name="save" class="btn btn-sm btn-outline-dark"><span class="fa fa-save"></span><strong> Save </strong></button>
        </form>
      </div>
    </div>
    
  </div>
</div>
</div>