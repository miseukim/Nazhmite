<?php
require ('./_connection.php');


if(isset($_POST['update_deduction']))
{

    $id = $_POST['id'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
  

  $queryValidate = "UPDATE tbl_deductions SET description='$description', amount='$amount' WHERE id='$id'";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Deduction Updated Successfully") </script>';
    echo '<script> window.location.href = "deductions.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Add") </script>';
    echo '<script> window.location.href = "deductions.php" </script>';
  }


}

?>

<!-- Update Deduction Modal -->

<div class="modal fade" id="editdeductionModal" tabindex="-1" aria-labelledby="editdeductionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editdeductionModalLabel">Add New Deduction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="edit_deduction_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
      <input type="hidden" id="edit_deduction_id" name="id">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Description </label>
                  <div class="">
                    <input type="text" name="description" id="show_description" class=" form-control form-control-sm" placeholder="Description" required/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Amount </label>
                  <div class="">
                    <input type="text" name="amount" id="show_amount" class=" form-control form-control-sm" placeholder="Amount" required/>
                  </div>
                </div>
              </div>
              
            </div>
            
          
        
      
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_deduction"> Update </button>
      </div>

      </form>
      </div>
    </div>
    </div>
