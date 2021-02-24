<?php
require ('./_connection.php');


if(isset($_POST['delete_employee']))
{

  $id = $_POST['id'];
  

  $queryValidate = "DELETE FROM tbl_employees WHERE id = '$id'"; 
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Employee Deleted Successfully") </script>';
    echo '<script> window.location.href = "employee_list.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Delete") </script>';
    echo '<script> window.location.href = "employee_list.php" </script>';
  }


}

?>
<!-- Delete Employee Modal -->

<div class="modal fade" id="deleteemployeeModal" tabindex="-1" aria-labelledby="deleteemployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteemployeeModalLabel"><b><span class="employee_id"></span></b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form class="form-horizontal" action="delete_employee_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
      <input type="hidden" id="empid"  name="id">
						<div class="text-center">
							<p>Do you want to delete this employee?</p>
							<h2 class="bold del_employee_name"></h2>
						</div>
      </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="delete_employee">Delete</button>
      </div>

      </form>
      </div>
    </div>
    </div>

    
