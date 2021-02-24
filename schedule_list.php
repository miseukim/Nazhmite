<?php

require ('./_header.php');
require ('./_navbar.php');
require ('./_sidebar.php');
require ('./edit_schedule_list_modal.php');



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
                  <h4 class="font-weight-bold mb-0">Employee Schedule List</h4>

                 



                  <div class="template-demo mt-2">
                  <button type="button" class="btn btn-outline-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#editschedulelistModal">
                          <i class="ti-file btn-icon-prepend"></i>
                          Print Schedules
                     </button>
                   

                         </div>
                  </div>
               </div>
          </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Employee Schedule List</h4>
          
                  <div class="table-responsive">
                  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Employee ID </th>
                          <th> Full Name </th>
                          <th> Schedule </th>
                          <th> Actions </th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Table Contents Here -->
                  <?php
                  

                  $queryValidate = "SELECT *, tbl_employees.id as empid FROM tbl_employees LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employees.schedule_id";
                  $sqlValidate = $connection->query($queryValidate);

                  while($row = $sqlValidate->fetch_assoc())
                  {
                    echo "
                    <tr>
                    <td>".$row['employee_id']."</td>
                    <td>".$row['firstname'].' '.$row['lastname']."</td>
                    <td>".date('h:i A', strtotime($row['time_in'])).' - '.date('h:i A', strtotime($row['time_out']))."</td>
                    
                    <td>
                    <button  class='btn btn-outline-primary btn-icon-text editschedulelistModal' data-id='".$row['empid']."'> <i class='ti-write btn-icon-prepend'> </i>  Edit </button>
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
  $('.editschedulelistModal').click(function(e){
    e.preventDefault();
    $('#editschedulelistModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'schedule_row_list.php',
    data: {id:id},  
    dataType: 'json',
    success: function(response){
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('#schedule_val').val(response.schedule_id);
      $('#schedule_val').val(response.schedule_id).html(response.time_in+' '+response.time_out);
      $('#empid').val(response.empid);
    }
  });
}
</script>

<?php require ('./_footer.php'); ?>
     
     
     