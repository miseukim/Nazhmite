<?php
require ('./_connection.php');


if(isset($_POST['delete_schedule']))
{

  $id = $_POST['id'];
  

  $queryValidate = "DELETE FROM tbl_schedule WHERE id = '$id'"; 
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Schedule Deleted Successfully") </script>';
    echo '<script> window.location.href = "schedules.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Add") </script>';
    echo '<script> window.location.href = "schedules.php" </script>';
  }


}

?>
<!-- Delete Schedule Modal -->

<div class="modal fade" id="deletescheduleModal" tabindex="-1" aria-labelledby="deletescheduleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletescheduleModalLabel">Delete Schedule</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="delete_schedule_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
      <input type="hidden" id="del_schedule_id" name="id">
						<div class="text-center">
							<p5>Do you want to delete this schedule?</p5>
							
						</div>
      </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="delete_schedule">Delete</button>
      </div>

      </form>
      </div>
    </div>
    </div>

    
