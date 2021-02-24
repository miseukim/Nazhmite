<?php
require ('./_connection.php');
require ('./timezones.php');


if(isset($_POST['update_schedule']))
{

  $id = $_POST['id'];
  $time_in = $_POST['time_in'];
  $time_in = date('H:i:s', strtotime($time_in));

  $time_out = $_POST['time_out'];
  $time_out = date('H:i:s', strtotime($time_out));
  

  $queryValidate = "UPDATE tbl_schedule SET time_in = '$time_in', time_out = '$time_out' WHERE id = '$id'";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Schedule Update Successfully") </script>';
    echo '<script> window.location.href = "schedules.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Update") </script>';
    echo '<script> window.location.href = "schedules.php" </script>';
  }


}

?><!-- Update schedule Modal -->

<div class="modal fade" id="editscheduleModal" tabindex="-1" aria-labelledby="editscheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editscheduleModalLabel">Update schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="edit_schedule_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
      <input type="hidden" id="edit_schedule_id" name="id">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Time In </label>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="time" name="time_in" id="show_time_in" class="form-control timepicker"  >
                     
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Time Out </label>
                  <div class="">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="time" name="time_out" id="show_time_out" class="form-control timepicker"  >
                     
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              
            </div>
            
          
        
      
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_schedule">Save</button>
      </div>

      </form>
      </div>
    </div>
    </div>
