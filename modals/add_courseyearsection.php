<div id="course" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Add Course, Year and Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="action/add_courseyearsection.php">
      		<div class="form-group">
      			<label class="pull-left" for="course_id">Select Course:</label>
            <select class="form-control" name="course_id">
              <option disabled selected>Select Course</option>
              <?php
              $sql = mysqli_query($conn, "SELECT * FROM course WHERE active = 1");
              while ($row = mysqli_fetch_array($sql)) { ?>
              <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_name']; ?> - <?php echo $row['major']; ?></option>
              <?php 
              }
              ?>
            </select>
      		</div>

          <div class="form-group">
            <label class="pull-left" for="year_id">Select Year:</label>
            <select class="form-control" name="year_id">
              <option disabled selected>Select Year</option>
              <?php
              $sql = mysqli_query($conn, "SELECT * FROM year");
              while ($row = mysqli_fetch_array($sql)) { ?>
              <option value="<?php echo $row['year_id'] ?>"><?php echo $row['year_name']; ?></option>
              <?php 
              }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label class="pull-left" for="section">Section:</label>
            <input type="number" name="section" id="section" class="form-control">
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
