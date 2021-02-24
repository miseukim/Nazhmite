<?php
require ('./_connection.php');


if(isset($_POST['update_position']))
{
  $id = $_POST['id'];
  $description = $_POST['description'];
  $rate = $_POST['rate'];
  

  $queryValidate = "UPDATE tbl_position SET description = '$description', rate = '$rate' WHERE id = '$id'";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Position Updated Successfully") </script>';
    echo '<script> window.location.href = "positions.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Update") </script>';
    echo '<script> window.location.href = "positions.php" </script>';
  }


}

?>
<!-- Edit Position Modal -->

<div class="modal fade" id="editpositionModal" tabindex="-1" aria-labelledby="editpositionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editpositionModalLabel">Update Position</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="edit_position_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
      <input type="hidden" id="edit_position_id" name="id">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Description </label>
                  <div class="">
                    <input type="text" name="description" class=" form-control form-control-sm" id="show_description" required/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Rate Per Hour </label>
                  <div class="">
                    <input type="text" name="rate" class=" form-control form-control-sm" id="show_rate" required/>
                  </div>
                </div>
              </div>
              
            </div>
            
          
        
      
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_position">Update</button>
      </div>

      </form>
      </div>
    </div>
    </div>

    
