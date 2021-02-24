<?php
require ('./_connection.php');


if(isset($_POST['delete_deduction']))
{

  $id = $_POST['id'];
  

  $queryValidate = "DELETE FROM tbl_deductions WHERE id = '$id'"; 
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Deduction Deleted Successfully") </script>';
    echo '<script> window.location.href = "deductions.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Delete") </script>';
    echo '<script> window.location.href = "deductions.php" </script>';
  }


}

?>
<!-- Delete Deduction Modal -->

<div class="modal fade" id="deletedeductionModal" tabindex="-1" aria-labelledby="deletedeductionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletedeductionModalLabel">Delete Deduction</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="delete_deduction_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
      <input type="hidden" id="del_deduction_id" name="id">
						<div class="text-center">
							<p>Do you want to delete this deduction?</p>
							<h2 id="del_deduction" class="bold"></h2>
						</div>
      </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="delete_deduction">Delete</button>
      </div>

      </form>
      </div>
    </div>
    </div>

    
