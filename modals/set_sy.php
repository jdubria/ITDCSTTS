<div id="set_sy" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Set School Year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="action/set_sy.php">
      		<div class="form-group">
      			<label class="pull-left" for="sy">Select School Year:</label>
            <select class="form-control" name="sy">
              <option disabled selected>Select School Year</option>
              <?php 
              $sql = mysqli_query($conn, "SELECT * FROM school_year WHERE active = 1;");
              while ($row = mysqli_fetch_array($sql)) { ?>
              <option value="<?php echo $row['sy_id'] ?>"><?php echo $row['sy'] ?></option>
              <?php  
              }
              ?>
            </select>
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
