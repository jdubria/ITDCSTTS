<div id="room" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Add Room</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="action/add_room.php">
       <fieldset>

         <div class="form-row">
          <label for="room_name" class="form-group col-sm-3 col-form-label"><strong>Room:</strong></label>
          <div class="col-sm-8">
           <input type="text" id="room_name" name="room_name" class="form-control" value="" placeholder="Room Name" required>
          </div>
        </div>        


         <div class="form-row">
          <label for="room_type" class="col-sm-3 col-form-label"><strong>Room Type:</strong></label>
          <div class="col-sm-8">
           <select class="form-group form-control" name="room_type" id="room_type">
             <option>Lecture Room</option>
             <option>Laboratory Room</option>
           </select>
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
