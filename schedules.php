<?php

require ('./_header.php');
require ('./_navbar.php');
require ('./_sidebar.php');
require ('./add_schedule_modal.php');
require ('./edit_schedule_modal.php');
require ('./delete_schedule_modal.php');

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
                  <h4 class="font-weight-bold mb-0">Schedule List</h4>

                 



                  <div class="template-demo mt-2">
                  <button type="button" class="btn btn-outline-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#scheduleModal">
                          <i class="ti-file btn-icon-prepend"></i>
                          Add Schedule
                     </button>
                   

                         </div>
                  </div>
               </div>
          </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Schedule List</h4>
          
                  <div class="table-responsive">
                  <?php
                  require ('./_connection.php');

                  $queryValidate = "SELECT * FROM tbl_schedule";
                  $sqlValidate = $connection-> query($queryValidate);

                  
                  ?>
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Time In </th>
                          <th> Time Out </th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Table Contents Here -->
                   <?php
                  require ('./_connection.php');

                  $queryValidate = "SELECT * FROM tbl_schedule";
                  $sqlValidate = $connection-> query($queryValidate);

                  while($row = $sqlValidate->fetch_assoc())
                  {
                    echo "
                    <tr>
                    <td> ".date('h:i A', strtotime($row['time_in']))."</td>
                    <td> ".date('h:i A', strtotime($row['time_out']))."</td>
                    <td>
                    <button  class='btn btn-outline-primary btn-icon-text editscheduleModal' data-id='".$row['id']."'> <i class='ti-write btn-icon-prepend'> </i>  Edit </button>
                   <button  class='btn btn-outline-danger btn-icon-text deletescheduleModal' data-id='".$row['id']."'> <i class='ti-trash btn-icon-prepend'> </i>  Delete </button>

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
  $('.editscheduleModal').click(function(e){
    e.preventDefault();
    $('#editscheduleModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.deletescheduleModal').click(function(e){
    e.preventDefault();
    $('#deletescheduleModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'schedule_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#edit_schedule_id').val(response.id);
      $('#show_time_in').val(response.time_in);
      $('#show_time_out').val(response.time_out);
      $('#del_schedule_id').val(response.id);
      
    }
  });
}
</script>






<?php require ('./_footer.php'); ?>
     
     
     
     