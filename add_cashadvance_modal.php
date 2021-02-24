<?php
require ('./_connection.php');


if(isset($_POST['add_cashadvance']))
{

  $employee = $_POST['employee'];
  $amount = $_POST['amount'];

  $querySelect = "SELECT * FROM tbl_employees WHERE employee_id = '$employee'";
  $sqlValidate = $connection->query($querySelect);
  if($sqlValidate->num_rows < 1)
  {
    echo '<script> alert("Employee Not Found!") </script>';
    echo '<script> window.location.href = "cash_advance.php" </script>';
  }
  else
  {
  $results = $sqlValidate->fetch_assoc();
  $employee_id = $results['id'];
  $queryValidate = "INSERT INTO tbl_cashadvance (date_advance, employee_id, amount) 
  VALUES (NOW(), '$employee_id', '$amount')";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Cash Advance Added Successfully") </script>';
    echo '<script> window.location.href = "cash_advance.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Add") </script>';
    echo '<script> window.location.href = "cash_advance.php" </script>';
  }
  }

}

?><!-- Add Cash Advance Modal -->

<div class="modal fade" id="cashadvanceModal" tabindex="-1" aria-labelledby="cashadvanceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="cashadvanceModalLabel">Add Cash Advance</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="add_cashadvance_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class=""> Employee ID </label>
                  <div class="">
                    <input type="text" name="employee" class=" form-control form-control-sm" placeholder="Employee ID" required/>
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
        <button type="submit" class="btn btn-primary" name="add_cashadvance">Save</button>
      </div>

      </form>
      </div>
    </div>
    </div>
