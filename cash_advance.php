<?php

require ('./_header.php');
require ('./_navbar.php');
require ('./_sidebar.php');
require ('./add_cashadvance_modal.php');
require ('./delete_cash_advance.php');
require ('./edit_cashadvance_modal.php');



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
                  <h4 class="font-weight-bold mb-0">Cash Advance</h4>

                 



                  <div class="template-demo mt-2">
                  <button type="button" class="btn btn-outline-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#cashadvanceModal">
                          <i class="ti-file btn-icon-prepend"></i>
                          Add Cash Advance
                     </button>
                   

                         </div>
                  </div>
               </div>
          </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Cash Advance List</h4>
          
                  <div class="table-responsive">
                  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="hidden"></th>
                          <th> Date </th>
                          <th> Employee ID </th>
                          <th> Full Name </th>
                          <th> Amount </th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Table Contents Here -->
                        <?php
                  require ('./_connection.php');

                  $queryValidate = "SELECT *, tbl_cashadvance.id AS caid, tbl_employees.employee_id AS empid FROM tbl_cashadvance LEFT JOIN tbl_employees
                  ON tbl_employees.id=tbl_cashadvance.employee_id
                  ORDER BY date_advance DESC";
                  $sqlValidate = $connection-> query($queryValidate);

                  while($row = $sqlValidate->fetch_assoc())
                  {
                    echo "
                    <tr>
                    <td class='hidden'></td>
                    <td> ".date('M d, Y', strtotime($row['date_advance']))."</td>
                    <td> ".$row['empid']."</td>
                    <td>".$row['firstname'].' '.$row['lastname']."</td>
                    <td> ".number_format($row['amount'], 2)."</td>
                    <td>
                    <button  class='btn btn-outline-primary btn-icon-text editcashadvanceModal' data-id='".$row['caid']."'> <i class='ti-write btn-icon-prepend'> </i>  Edit </button>
                   <button  class='btn btn-outline-danger btn-icon-text deletecashadvanceModal' data-id='".$row['caid']."'> <i class='ti-trash btn-icon-prepend'> </i>  Delete </button>

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
  $('.editcashadvanceModal').click(function(e){
    e.preventDefault();
    $('#editcashadvanceModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.deletecashadvanceModal').click(function(e){
    e.preventDefault();
    $('#deletecashadvanceModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'cashadvance_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.date').html(response.date_advance);
      $('.employee_id').html(response.employee_id);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('#caid').val(response.caid);
      $('#edit_cashadvance_id').val(response.caid);
      $('#show_amount').val(response.amount);
    }
  });
}
</script>

<?php require ('./_footer.php'); ?>