<?php include 'connection/conn.php'; ?>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <center><h4 class="modal-title" id="myModalLabel"> Assign Class </h4></center>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

	    <form method="POST" action="action/assignschedule.php">
        
        <fieldset>

        	<div class="row form-row">
          <label for="sy" class="form-group col-sm-4 col-form-label"><strong>School Year:</strong></label>
          <div class="col-sm-8">
           <select class="form-control" name="sy" id="sy" required>
           	<option disabled selected>Select here</option>
             <?php 
             $result = mysqli_query($conn, "SELECT * FROM school_year WHERE active = 1");
             	while ($row = mysqli_fetch_array($result)) { ?>
             	<option value="<?php echo $row['sy_id'] ?>"><?php echo $row['sy'] ?></option>
            <?php 	}
             ?>
           </select>
           </div>
       </div>
        

		<div class="row form-row">
          <label for="semester" class="form-group col-sm-4 col-form-label"><strong>Semester:</strong></label>
          <div class="col-sm-8">
           <select class="form-control" name="sem" id="semester" required>
             <option disabled selected>Select here</option>
              <?php
            $result = mysqli_query($conn, "SELECT * FROM semester WHERE active = 1");
            while ($row = mysqli_fetch_array($result)) { ?>
                <option value="<?php echo $row['sem_id'] ?>"><?php echo $row['semester'] ?></option>
            <?php   }
             ?>
           </select>
          </div>
      </div>

    <div class="row form-row">
          <label for="course_name" class="form-group col-sm-4 col-form-label"><strong>Course:</strong></label>
          <div class="col-sm-8">
           <select class="form-control" name="course_name" id="course_name" required>
            <option disabled selected>Select here</option>
             <?php 
             $result = mysqli_query($conn, "SELECT * FROM course WHERE active = 1");
              while ($row = mysqli_fetch_array($result)) { ?>
              <option value="<?php echo $row['course_id'] ?>"><?php echo $row['course_name'] ?></option>
            <?php   }
             ?>
             </select>
          </div>
          </div>


    <div class="row form-row">
          <label for="course_name" class="form-group col-sm-4 col-form-label"><strong>Year:</strong></label>
          <div class="col-sm-8">
           <select class="form-control" name="year" id="year" required>
            <option disabled selected>Select here</option>
             <?php 
             $result = mysqli_query($conn, "SELECT * FROM year WHERE active = 1");
              while ($row = mysqli_fetch_array($result)) { ?>
              <option value="<?php echo $row['year_id'] ?>"><?php echo $row['year_name'] ?></option>
            <?php   }
             ?>
             </select>
          </div>
          </div>



		<div class="row form-row">
          <label for="year_name" class="form-group col-sm-4 col-form-label"><strong>Section:</strong></label>
          <div class="col-sm-8">
           <select class="form-control" name="section" id="section" required>
           	<option disabled selected>Select here</option>
            
           </select>
          </div>
      	</div> 

    <div class="row form-row">
          <label for="fac_name" class="form-group col-sm-4 col-form-label"><strong>Faculty:</strong></label>
          <div class="col-sm-8">
           <select class="form-control" name="fac_name" id="fac_name" required>
            <option disabled selected>Select here</option>
             <?php
            $result = mysqli_query($conn, "SELECT * FROM faculty WHERE active = 1");
            while ($row = mysqli_fetch_array($result)) { ?>
            <option value="<?php echo $row['fac_id'] ?>"><?php echo $row['fac_name'] ?></option>
              <?php   }
             ?>
            
           </select>
          </div>
        </div> 


   <div class="row form-row">
          <label for="code" class="form-group col-sm-4 col-form-label"><strong>Subject:</strong></label>
          <div class="col-sm-8">
           <select class="form-control" name="code" id="code" required>
            <option disabled selected>Select here</option>
           </select>
          </div>
        </div> 
        

        </fieldset>
          </div>


      <div class="modal-footer" style="background: #25383C;">
        <div class="btn-group">
      	<button type="button" class="btn btn-sm btn-outline-dark" data-dismiss="modal"><span class="fa fa-close"></span><strong> Close </strong></button>
        <button type="submit" id="save" name="save" class="btn btn-sm btn-outline-dark"><span class="fa fa-save"></span><strong> Save </strong></button>
        </div>
      </div> 
       </form>	
  </div>
</div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $("#year").change(function(){
      var year = $(this).val();
      var course = $("#course_name").val();        
      $.ajax({
        method: "POST",
        url: "action/get_course_year.php",
        data: {course:course, year:year},
        dataType: "text",
        success: function(data){
            $("#section").html(data);
        }
      });
    });

    $("#section").change(function(){
      var crs = $("#course_name").val();
      var yr = $("#year").val();
      var sem = $("#semester").val();
      $.ajax({
        method: "POST",
        url: "action/get_subject.php",
        data: {crs:crs, yr:yr, sem:sem},
        dataType: "text",
        success: function(data){
            $("#code").html(data);
        }
      });

    });

  });
</script>