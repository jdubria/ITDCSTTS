<div id="edit<?php echo $row['sem_id'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Update Semester</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="POST" action="action/edit_sem.php">
      		<div class="form-group">
            <input type="hidden" name="sem_id" value="<?php echo $row['sem_id'] ?>">
      			<label class="pull-left" for="semester">Semester Name:</label>
      			<input type="text" name="semester" id="semester" value="<?php echo $row['semester'] ?>" class="form-control">
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
<div id="archive<?php echo $row['sem_id'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <p>Are you sure you want to archive <?php echo $row['semester']; ?>?</p>
        </div>
        <form method="POST" action="action/archive_sem.php">
          <div class="form-group">
            <input type="hidden" name="sem_id" value="<?php echo $row['sem_id'] ?>">
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