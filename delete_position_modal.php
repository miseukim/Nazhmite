<?php
require ('./_connection.php');


if(isset($_POST['delete_position']))
{

  $id = $_POST['id'];
  

  $queryValidate = "DELETE FROM tbl_position WHERE id = '$id'"; 
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Position Deleted Successfully") </script>';
    echo '<script> window.location.href = "positions.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Add") </script>';
    echo '<script> window.location.href = "positions.php" </script>';
  }


}

?>
<!-- Delete Position Modal -->

<div class="modal fade" id="deletepositionModal" tabindex="-1" aria-labelledby="deletepositionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deletepositionModalLabel">Delete Position</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="delete_position_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
      <input type="hidden" id="del_position_id" name="id">
						<div class="text-center">
							<p>Do you want to delete this position?</p>
							<h2 id="del_position" class="bold"></h2>
						</div>
      </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="delete_position">Delete</button>
      </div>

      </form>
      </div>
    </div>
    </div>

    
