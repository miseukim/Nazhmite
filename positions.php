<?php

require ('./_header.php');
require ('./_navbar.php');
require ('./_sidebar.php');
require ('./add_position_modal.php');
require ('./edit_position_modal.php');
require ('./delete_position_modal.php');

?>

<!-- <div class="modal-dialog modal-dialog-centered">
  ...
</div> -->

<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card" >
               <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="font-weight-bold mb-0">Position List</h4>

                 



                  <div class="template-demo mt-2">
                  <button type="button" class="btn btn-outline-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#positionModal">
                          <i class="ti-file btn-icon-prepend"></i>
                          Add Position
                     </button>
                   

                         </div>
                  </div>
               </div>
          </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Position List</h4>
          
                  <div class="table-responsive">
                  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Description </th>
                          <th> Rate Per Hour </th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Table Contents Here -->
                        <?php
                  require ('./_connection.php');

                  $queryValidate = "SELECT * FROM tbl_position";
                  $sqlValidate = $connection-> query($queryValidate);

                  while($row = $sqlValidate->fetch_assoc())
                  {
                    echo "
                    <tr>
                    <td> ".$row['description']."</td>
                    <td> ".number_format($row['rate'], 2)."</td>
                    <td>
                    <button  class='btn btn-outline-primary btn-icon-text editpositionModal' data-id='".$row['id']."'> <i class='ti-write btn-icon-prepend'> </i>  Edit </button>
                   <button  class='btn btn-outline-danger btn-icon-text deletepositionModal' data-id='".$row['id']."'> <i class='ti-trash btn-icon-prepend'> </i>  Delete </button>

                    </td>
                    </tr>
                    
                    ";
                  }

                  
                  ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>



            
          </div>


        </div>
</div>






<?php require ('./_scripts.php'); ?>
     
     <script>
$(function(){
  $('.editpositionModal').click(function(e){
    e.preventDefault();
    $('#editpositionModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.deletepositionModal').click(function(e){
    e.preventDefault();
    $('#deletepositionModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'position_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#edit_position_id').val(response.id);
      $('#show_description').val(response.description);
      $('#show_rate').val(response.rate);
      $('#del_position_id').val(response.id);
      $('#del_position').html(response.description);
    }
  });
}
</script>

<?php require ('./_footer.php'); ?>
     
     
     