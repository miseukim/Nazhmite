<?php
require ('./_connection.php');


if(isset($_POST['add_position']))
{

  $description = $_POST['description'];
  $rate = $_POST['rate'];
  

  $queryValidate = "INSERT INTO tbl_position (description, rate) 
  VALUES ('$description', '$rate')";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Position Added Successfully") </script>';
    echo '<script> window.location.href = "positions.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Add") </script>';
    echo '<script> window.location.href = "positions.php" </script>';
  }


}

?><!-- Add New Position Modal -->

<div class="modal fade" id="positionModal" tabindex="-1" aria-labelledby="positionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="positionModalLabel">Add New Position</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="add_position_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Description </label>
                  <div class="">
                    <input type="text" name="description" class=" form-control form-control-sm" placeholder="Description" required/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Rate Per Hour </label>
                  <div class="">
                    <input type="text" name="rate" class=" form-control form-control-sm" placeholder="Rate" required/>
                  </div>
                </div>
              </div>
              
            </div>
            
          
        
      
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_position">Save</button>
      </div>

      </form>
      </div>
    </div>
    </div>
