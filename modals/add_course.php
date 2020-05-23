<div id="course" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="action/add_course.php">
      		<div class="form-group">
      			<label class="pull-left" for="course_name">Course Name:</label>
      			<input type="text" name="course_name" id="course_name" class="form-control">
      		</div>
          <div class="form-group">
            <label class="pull-left" for="major">Major:</label>
            <input type="text" name="major" id="major" class="form-control">
            <small class="text-info">If the course has no major, kindly input "N/A"</small>
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
