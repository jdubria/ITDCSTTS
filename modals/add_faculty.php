<div id="faculty" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Add Faculty</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="POST" action="action/add_faculty.php">
       <fieldset>

         <div class="form-row">
          <label for="facode_id" class="form-group col-sm-4 col-form-label"><strong>Faculty Code ID:</strong></label>
          <div class="col-sm-8">
           <input type="text" id="facode_id" name="facode_id" class="form-control" placeholder="Faculty Code ID" required>
          </div>
        </div>        

          <div class="form-row">
          <label for="fac_name" class="form-group col-sm-4 col-form-label"><strong>Faculty Name:</strong></label>
          <div class="col-sm-8">
           <input type="text" id="fac_name" name="fac_name" class="form-control" placeholder="Faculty Name" required>
          </div>
        </div> 

         
          </fieldset>        

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
