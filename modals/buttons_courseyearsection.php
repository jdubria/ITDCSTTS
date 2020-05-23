
<div id="archive<?php echo $row['course_year_id'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php $mysqli = mysqli_query($conn, 
      "
      SELECT * FROM course_year
      INNER JOIN course ON course_year.course_id = course.course_id
      INNER JOIN `year` ON course_year.year_id = `year`.year_id
      WHERE course_year.active = 1 AND course_year.course_year_id = ".$row['course_year_id']."
       "
        );

      $c = mysqli_fetch_assoc($mysqli);
         ?>
      <div class="modal-body">
        <div class="text-center">
          <p>Are you sure you want to archive <?php echo $c['course_name']; ?> <?php echo $c['year_name']; ?> - <?php echo $c['section']; ?>?</p>
        </div>
        <form method="POST" action="action/archive_courseyearsection.php">
          <div class="form-group">
            <input type="hidden" name="course_year_id" value="<?php echo $row['course_year_id'] ?>">
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