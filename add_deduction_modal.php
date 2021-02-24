<?php
require ('./_connection.php');


if(isset($_POST['add_deduction']))
{

  $description = $_POST['description'];
  $amount = $_POST['amount'];
  

  $queryValidate = "INSERT INTO tbl_deductions (description, amount) 
  VALUES ('$description', '$amount')";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Deduction Added Successfully") </script>';
    echo '<script> window.location.href = "deductions.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Add") </script>';
    echo '<script> window.location.href = "deductions.php" </script>';
  }


}

?>

<!-- Add New Deduction Modal -->

<div class="modal fade" id="deductionModal" tabindex="-1" aria-labelledby="deductionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deductionModalLabel">Add New Deduction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="add_deduction_modal.php" method="POST">
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
                  <label class=""> Amount </label>
                  <div class="">
                    <input type="text" name="amount" class=" form-control form-control-sm" placeholder="Amount" required/>
                  </div>
                </div>
              </div>
              
            </div>
            
          
        
      
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="add_deduction">Save</button>
      </div>

      </form>
      </div>
    </div>
    </div>
