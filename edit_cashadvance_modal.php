<?php
require ('./_connection.php');


if(isset($_POST['update_cashadvance']))
{
  $id = $_POST['id'];
  $amount = $_POST['amount'];
  

  $queryValidate = "UPDATE tbl_cashadvance SET amount = '$amount' WHERE id = '$id'";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Amount Updated Successfully") </script>';
    echo '<script> window.location.href = "cash_advance.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Update") </script>';
    echo '<script> window.location.href = "cash_advance.php" </script>';
  }


}

?>
<!-- Edit Cash Advance Modal -->

<div class="modal fade" id="editcashadvanceModal" tabindex="-1" aria-labelledby="editcashadvanceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-l">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editcashadvanceModalLabel"><b><span class="employee_id"></span> | <span class="employee_name"></span></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="edit_cashadvance_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
      <input type="hidden" id="edit_cashadvance_id" name="id">
            
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class=""> Amount </label>
                  <div class="">
                    <input type="text" name="amount" class=" form-control form-control-sm" id="show_amount" required/>
                  </div>
                </div>
              </div>
              
              
            </div>
            
          
        
      
    </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_cashadvance">Update</button>
      </div>

      </form>
      </div>
    </div>
    </div>

    
