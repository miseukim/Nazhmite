<?php
require ('./_connection.php');
require ('./timezones.php');


if(isset($_POST['add_schedule']))
{

  $time_in = $_POST['time_in'];
  $time_in = date('H:i:s', strtotime($time_in));

  $time_out = $_POST['time_out'];
  $time_out = date('H:i:s', strtotime($time_out));
  

  $queryValidate = "INSERT INTO tbl_schedule (time_in, time_out) 
  VALUES ('$time_in', '$time_out')";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Schedule Added Successfully") </script>';
    echo '<script> window.location.href = "schedules.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Add") </script>';
    echo '<script> window.location.href = "schedules.php" </script>';
  }


}

?><!-- Add New schedule Modal -->

<div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="scheduleModalLabel">Add New schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="add_schedule_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Time In </label>
                  <div class="form-group">
                    <div class="input-group">
                      <input type="time" name="time_in" class="form-control timepicker" id="timeinpicker" >
                     
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
                      <input type="time" name="time_out" class="form-control timepicker" id="timeoutpicker" >
                     
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
        <button type="submit" class="btn btn-primary" name="add_schedule">Save</button>
      </div>

      </form>
      </div>
    </div>
    </div>
