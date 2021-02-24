<?php

require ('./_header.php');
require ('./_navbar.php');
require ('./_sidebar.php');
require ('./_connection.php');
require ('./add_employee_modal.php');
require ('./add_admin_modal.php');
require ('./delete_employee_modal.php');
require ('./edit_employee_modal.php');


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
                  <h4 class="font-weight-bold mb-0">Employee List</h4>

                 



                  <div class="template-demo mt-2">
                  <button type="button" class="btn btn-outline-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#employeeModal">
                          <i class="ti-file btn-icon-prepend"></i>
                          Add Employee
                     </button>
                   <button type="button" class="btn btn-outline-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#adminModal">
                          <i class="ti-file btn-icon-prepend"></i>
                          Add Admin
                    </button>

                         </div>
                  </div>
               </div>
          </div>


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Employee List</h4>
          
                  <div class="table-responsive">
                
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th> Date Hired </th>
                          <th> Image </th>
                          <th> Employee ID </th>
                          <th> Full Name </th>
                          <th> Position </th>
                          <th> Schedule </th>
                          <th> Contact Number </th>
                          <th> Action </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Table Contents Here -->
                        <?php
                  require ('./_connection.php');

                  $queryValidate = "SELECT *, tbl_employees.id as empid FROM tbl_employees LEFT JOIN tbl_position ON tbl_position.id=tbl_employees.position_id LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employees.schedule_id";
                  $sqlValidate = $connection-> query($queryValidate);

                  while($results = $sqlValidate->fetch_assoc())
                  {
                    echo "
                    <tr>
                    <td> ".date('M d, Y', strtotime($results['created_on']))."</td>
                    <td> ".'<img src="employee_images/'.$results['image'].'" alt="Image">'."</td>
                    <td> ".$results['employee_id']."</td>
                    <td> ".$results['firstname']." ".$results['lastname']." </td>
                    <td> ".$results['description']."</td>
                    <td> ".date('h:i A', strtotime($results['time_in'])).' - '.date('h:i A', strtotime($results['time_out']))."</td>
                    <td> ".$results['contact_number']."</td>
                    <td>
                    <button  class='btn btn-outline-primary btn-icon-text editemployeeModal' data-id='".$results['empid']."'> <i class='ti-write btn-icon-prepend'> </i>  Edit </button>
                   <button  class='btn btn-outline-danger btn-icon-text deleteemployeeModal' data-id='".$results['empid']."'> <i class='ti-trash btn-icon-prepend'> </i>  Delete </button>

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





<?php require ('./_scripts.php') ?>
     
     

<script>
$(function(){
  $('.editemployeeModal').click(function(e){
    e.preventDefault();
    $('#editemployeeModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.deleteemployeeModal').click(function(e){
    e.preventDefault();
    $('#deleteemployeeModal').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });
});

function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('#empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);

      $('#edit_employee_id').val(response.empid);
      $('#edit_rfid').val(response.rfid);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#edit_contact').val(response.contact_number);
      $('#edit_email').val(response.email_address);
      $('#gender_val').val(response.gender).html(response.gender);
      $('#position_val').val(response.position_id).html(response.description);
      $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
      
      
      

      
    }
  });
}
</script>

<?php require ('_footer.php')?>