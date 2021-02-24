<?php

require ('./_header.php');
require ('./_navbar.php');
require ('./_sidebar.php');



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
                  <h4 class="font-weight-bold mb-0">Over Time List</h4>

                 



                  <div class="template-demo mt-2">
                  <button type="button" class="btn btn-outline-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#overtimeModal">
                          <i class="ti-file btn-icon-prepend"></i>
                          Add Overtime
                     </button>
                   

                         </div>
                  </div>
               </div>
          </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Overtime List</h4>
          
                  <div class="table-responsive">
                  
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="hidden"></th>
                          <th> Date </th>
                          <th> Employee ID </th>
                          <th> Full Name </th>
                          <th> No. of Hours </th>
                          <th> Rate </th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Table Contents Here -->
                        <?php
                  require ('./_connection.php');

                  $queryValidate = "SELECT *, tbl_overtime.id AS otid, tbl_employees.employee_id AS empid FROM tbl_overtime LEFT JOIN tbl_employees
                  ON tbl_employees.id=tbl_overtime.employee_id
                  ORDER BY date_overtime DESC";
                  $sqlValidate = $connection-> query($queryValidate);

                  while($row = $sqlValidate->fetch_assoc())
                  {
                    echo "
                    <tr>
                    <td class='hidden'></td>
                    <td> ".date('M d, Y', strtotime($row['date_overtime']))."</td>
                    <td> ".$row['empid']."</td>
                    <td>".$row['firstname'].' '.$row['lastname']."</td>
                    <td> ".$row['hours']."</td>
                    <td> ".$row['rate']."</td>
                    <td>
                    <button  class='btn btn-outline-primary btn-icon-text editcashadvanceModal' data-id='".$row['otid']."'> <i class='ti-write btn-icon-prepend'> </i>  Edit </button>
                   <button  class='btn btn-outline-danger btn-icon-text deletecashadvanceModal' data-id='".$row['otid']."'> <i class='ti-trash btn-icon-prepend'> </i>  Delete </button>

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
    url: 'overtime_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      var time = response.hours;
      var split = time.split('.');
      var hour = split[0];
      var min = '.'+split[1];
      min = min * 60;
      console.log(min);
      $('.employee_name').html(response.firstname+' '+response.lastname);
      $('.otid').val(response.otid);
      $('#datepicker_edit').val(response.date_overtime);
      $('#overtime_date').html(response.date_overtime);
      $('#hours_edit').val(hour);
      $('#mins_edit').val(min);
      $('#rate_edit').val(response.rate);
    }
  });
}
</script>

<?php require ('./_footer.php'); ?>