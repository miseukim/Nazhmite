<?php
require ('./_connection.php');


if(isset($_POST['delete_cashadvance']))
{

  $id = $_POST['id'];
  

  $queryValidate = "DELETE FROM tbl_cashadvance WHERE id = '$id'"; 
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Cash Advance Deleted Successfully") </script>';
    echo '<script> window.location.href = "cash_advance.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Delete") </script>';
    echo '<script> window.location.href = "cash_advance.php" </script>';
  }


}

?>
<!-- Delete Cash Advance Modal -->

<div class="modal fade" id="deletecashadvanceModal" tabindex="-1" aria-labelledby="deletecashadvanceModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletecashadvanceModalLabel"><b><span class="date"></span></b> | <b><span class="employee_name"></span></b> </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="delete_cash_advance.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
      <input type="hidden" id="caid" name="id">
						<div class="text-center">
							<p>Do you want to delete this item?</p>
							<h2 class="employee_name"></h2>
						</div>
      </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger" name="delete_cashadvance">Delete</button>
      </div>

      </form>
      </div>
    </div>
    </div>

    
