<div id="edit<?php echo $row['course_id'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Update Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="action/edit_course.php">
      		<div class="form-group">
            <input type="hidden" name="course_id" value="<?php echo $row['course_id'] ?>">
      			<label class="pull-left" for="course">Course Name:</label>
      			<input type="text" name="course_name" id="course_name" value="<?php echo $row['course_name'] ?>" class="form-control">
      		</div>
          <div class="form-group">
            <input type="hidden" name="major" value="<?php echo $row['major'] ?>">
            <label class="pull-left" for="major">Major:</label>
            <input type="text" name="major" id="major" value="<?php echo $row['major'] ?>" class="form-control">
          </div>
      </div>
      <div class="modal-footer text-light" style="background: #25383C;">
      	<div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal"><span class="fa fa-close"></span><strong> Close </strong></button>
        <button type="submit" id="save" name="save" class="btn btn-sm btn-outline-dark"><span class="fa fa-check"></span><strong> Update </strong></button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<!-- =========================================================================================================== -->
<div id="archive<?php echo $row['course_id'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <p>Are you sure you want to archive <?php echo $row['course_name']; ?>?</p>
        </div>
        <form method="POST" action="action/archive_course.php">
          <div class="form-group">
            <input type="hidden" name="course_id" value="<?php echo $row['course_id'] ?>">
          </div>
      </div>
      <div class="modal-footer text-light" style="background: #25383C;">
        <div class="btn-group">
        <button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal"><span class="fa fa-close"></span><strong> Close </strong></button>
        <button type="submit" id="save" name="save" class="btn btn-sm btn-outline-dark"><span class="fa fa-archive"></span><strong> Archive </strong></button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>