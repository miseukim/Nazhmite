<?php

require ('./_header.php');
require ('./_navbar.php');
require ('./_sidebar.php');
require ('./add_deduction_modal.php');
require ('./edit_deduction_modal.php');
require ('./delete_deduction_modal.php');


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
                  <h4 class="font-weight-bold mb-0">Deduction List</h4>

                 



                  <div class="template-demo mt-2">
                  <button type="button" class="btn btn-outline-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#deductionModal">
                          <i class="ti-file btn-icon-prepend"></i>
                          Add Deduction
                     </button>
                   

                         </div>
                  </div>
               </div>
          </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Deduction List</h4>
          
                  <div class="table-responsive">
                  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Description </th>
                          <th> Amount </th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Table Contents Here -->
                        <?php
                  require ('./_connection.php');

                  $queryValidate = "SELECT * FROM tbl_deductions";
                  $sqlValidate = $connection-> query($queryValidate);

                  while($row = $sqlValidate->fetch_assoc())
                  {
                    echo "
                    <tr>
                    <td> ".$row['description']."</td>
                    <td> ".number_format($row['amount'], 2)."</td>
                    <td>
                    <button  class='btn btn-outline-primary btn-icon-text editdeductionModal' data-id='".$row['id']."'> <i class='ti-write btn-icon-prepend'> </i>  Edit </button>
                   <button  class='btn btn-outline-danger btn-icon-text deletedeductionModal' data-id='".$row['id']."'> <i class='ti-trash btn-icon-prepend'> </i>  Delete </button>

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
  $('.editdeductionModal').click(function(e){
    e.preventDefault();
    $('#editdeductionModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.deletedeductionModal').click(function(e){
    e.preventDefault();
    $('#deletedeductionModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'deductions_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#edit_deduction_id').val(response.id);
      $('#show_description').val(response.description);
      $('#show_amount').val(response.amount);

      $('#del_deduction_id').val(response.id);
      $('#del_deduction').html(response.description);
    }
  });
}
</script>

<?php require ('./_footer.php'); ?>