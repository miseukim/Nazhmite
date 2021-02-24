<?php
require ('./_connection.php');


if(isset($_POST['update_schedule_list']))
{
  $empid = $_POST['id'];
  $sched_id = $_POST['schedule'];
  
  

  $queryValidate = "UPDATE tbl_employees SET schedule_id = '$sched_id' WHERE id = '$empid'";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Schedule Updated Successfully") </script>';
    echo '<script> window.location.href = "schedule_list.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Update") </script>';
    echo '<script> window.location.href = "schedule_list.php" </script>';
  }

}

?>
<!-- Edit Schedule List Modal -->

<div class="modal fade" id="editschedulelistModal" tabindex="-1" aria-labelledby="editschedulelistModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-l">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editschedulelistModalLabel" class="employee_name"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="edit_schedule_list_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
      <input type="hidden" id="empid" name="id">
            
            <div class="row">
            <div class="col-md-12">
                        <div class="form-group row">
                        <?php
                        require ('./_connection.php');

                        ?>
                        
                          <label class=""> Schedule </label>
                          <div class="">
                            <select class="form-control form-control-sm" name="schedule" >
                            <option selected id="schedule_val"> </option>
                            <?php
                              $sqlSelect = "SELECT * FROM tbl_schedule";
                              $querySelect = mysqli_query($connection, $sqlSelect);
                              while ($results = $querySelect->fetch_assoc())
                              {
                                echo "
                              <option value='".$results['id']."'> ".date('h:i A', strtotime($results['time_in'])).' - '.date('h:i A', strtotime($results['time_out']))."</option>
                            ";
                              }

                            ?>
                            </select>
                          </div>
                        </div>
                      </div>
              
            </div>
            
          
        
      
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_schedule_list">Update</button>
      </div>

      </form>
      </div>
    </div>
    </div>

    
