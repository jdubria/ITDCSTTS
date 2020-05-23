<div id="edit<?php echo $row['subid'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Update Subject Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <div class="modal-body">
        <fieldset>
          <div class="container">
            <div class="form-row">
              <label class="col-sm-2 col-form-label">Course:</label>
              <div class="col-sm-10">
              <input type="text" name="course" id="course" class="form-control" value="<?php echo $row['course_name'] ?>" readonly>
              </div>
            </div>
            <br>
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-row">
                  <label class="col-sm-2 col-form-label">Sem:</label>
                  <div class="col-sm-10">
                  <input type="text" name="semester" id="semester" class="form-control" value="<?php echo $row['semester'] ?>" readonly>
                  </div>
                </div>                
              </div>
              <div class="col-sm-6">
                <div class="form-row">
                  <label class="col-sm-2 col-form-label">Year:</label>
                  <div class="col-sm-10">
                  <input type="text" name="year_id" id="year_id" value="<?php echo $row['year_name'] ?>" class="form-control" readonly>
                  </div>
                </div>                  
              </div>
            </div>
          </div>          
        </fieldset>
        <br>
        <form method="POST" action="action/edit_subject.php">
          <input type="hidden" name="subid" value="<?php echo $row['subid'] ?>">
        <div class="row">
               
          <div class="col-sm-6">
              <div class="form-group">
                <input type="hidden" name="code" value="<?php echo $row['code'] ?>">
                <label class="pull-left" for="code">Subject Code:</label>
                <input type="text" name="code" id="code" value="<?php echo $row['code'] ?>" class="form-control">
              </div>

              <div class="form-group">
                <label class="pull-left" for="title">Subject Title:</label>
                <textarea rows="5" name="title" id="title" class="form-control"><?php echo $row['title'] ?></textarea>
              </div>            
          </div>
          <div class="col-sm-6">
               <div class="form-group">
                <label class="pull-left" for="units">Units:</label>
                <input type="number" step="0.5" name="units" id="units" value="<?php echo $row['units'] ?>" class="form-control" min="0">
              </div>

              <div class="form-group">
                <label class="pull-left" for="lec">Lecture Hours:</label>
                <input type="number" name="lec" id="lec" value="<?php echo $row['lec'] ?>" class="form-control" min="0">
              </div>          

              <div class="form-group">
                <label class="pull-left" for="lab">Laboratory Hours:</label>
                <input type="text" name="lab" id="lab" value="<?php echo $row['lab'] ?>" class="form-control" min="0">
              </div>
            </div>            
          </div>
        </div>


      <div class="modal-footer text-light" style="background: #25383C;">
        <div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal"><span class="fa fa-close"></span>
         <strong> Close </strong>
        </button>
        <button type="submit" id="save" name="save" class="btn btn-sm btn-outline-dark"><span class="fa fa-check"></span>
         <strong> Update </strong>
        </button>
        </form>
        </div>
      </div>




    
</div>
</div>
</div>
<!-- =========================================================================================================== -->
<!-- =========================================================================================================== -->
<div id="archive<?php echo $row['subid'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <p>Are you sure you want to archive this subject?</p>
        </div>
        <form method="POST" action="action/archive_subject.php">
          <div class="form-group">
            <input type="hidden" name="subid" value="<?php echo $row['subid'] ?>">
          </div>
      </div>
      <div class="modal-footer text-light" style="background: #25383C;">
        <div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal"><span class="fa fa-close"></span>
         <strong> Close </strong>
        </button>
        <button type="submit" id="save" name="save" class="btn btn-sm btn-outline-dark"><span class="fa fa-archive"></span>
         <strong> Archive </strong>
        </button>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>