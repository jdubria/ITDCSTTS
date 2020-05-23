<div id="edit<?php echo $row['roomid'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header text-light" style="background: #25383C;">
        <h5 class="modal-title"> Update Room Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <div class="modal-body">
        <form method="POST" action="action/edit_room.php">
                <input type="hidden" name="roomid" id="roomid" value="<?php echo $row['roomid'] ?>" class="form-control" readonly>

              <div class="form-group">
                <label class="pull-left" for="sem_id">Room:</label>
                <input type="text" name="room_name" id="room_name" value="<?php echo $row['name'] ?>" class="form-control">
              </div> 
            
               <div class="form-group">
                <label for="room_type" class="pull-left">Room Type:</label>
                 <select class="form-group form-control" name="room_type" id="room_type">
                  <option selected><?php echo $row['room_type'] ?></option>
                   <option>Lecture Room</option>
                   <option>Laboratory Room</option>
                 </select>
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
<div id="archive<?php echo $row['roomid'] ?>" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: #25383C;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <p>Are you sure you want to archive this ?</p>
        </div>
        <form method="POST" action="action/archive_room.php">
          <div class="form-group">
            <input type="hidden" name="roomid" value="<?php echo $row['roomid'] ?>">
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