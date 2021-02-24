<?php

require ('./_connection.php');


if(isset($_POST['update_employee']))
{
          $empid = $_POST['id'];
          $rfid = $_POST['rfid'];
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $address = $_POST['address'];
          $contact = $_POST['contact'];
          $email = $_POST['email'];
          $gender = $_POST['gender'];
          $position = $_POST['position'];
          $schedule = $_POST['schedule'];
          $image = $_FILES['employee_image']['name'];

          

    
      $queryValidate = "UPDATE tbl_employees SET rfid='$rfid', firstname='$firstname', lastname='$lastname', address='$address', contact_number='$contact', email_address='$email', gender='$gender', position_id='$position', schedule_id='$schedule', image='$image' WHERE id='$empid'"; 
                        
      $sqlValidate = mysqli_query($connection, $queryValidate);

  

              if($sqlValidate)
              {
                move_uploaded_file($_FILES["employee_image"]["tmp_name"], "employee_images/".$_FILES["employee_image"]["name"]);
                echo '<script> alert("Employee Updated Successfully") </script>';
                echo '<script> window.location.href = "employee_list.php" </script>';

              }
              else
              {
                echo '<script> alert("Unable to Update") </script>';
                echo '<script> window.location.href = "employee_list.php" </script>';
              }


      
  
}


?>




<!-- Update Employee Modal -->
<div class="modal fade" id="editemployeeModal" tabindex="-1" aria-labelledby="editemployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="employee_id"  id="editemployeeModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      

      <form action="edit_employee_modal.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="col-12 grid-margin">
      <input type="hidden" id="edit_employee_id" name="id">
            
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="edit_rfid" class="">RFID</label>
                          <div class="">
                            <input type="text"  name="rfid" id="edit_rfid" class=" form-control form-control-sm"  required/>
                          </div>
                        </div>
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="edit_firstname" class="">First Name</label>
                          <div class="">
                            <input type="text" name="firstname" id="edit_firstname" class=" form-control form-control-sm" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="edit_lastname" class="">Last Name</label>
                          <div class="">
                            <input type="text" name="lastname" id="edit_lastname" class="form-control form-control-sm" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label for="edit_address" class="">Address</label>
                          <div class="">
                            <input type="text" name="address" id="edit_address" class="form-control form-control-sm" placeholder="Address" required/>
                          </div>
                        </div>
                      </div>

                      
                    </div>
                    

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="edit_contact" class="">Contact</label>
                          <div class="">
                            <input type="text" name="contact" id="edit_contact" class=" form-control form-control-sm" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="edit_email" class="">Email</label>
                          <div class="">
                            <input type="email" name="email" id="edit_email" class="form-control form-control-sm" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label for="edit_gender" class="">Gender</label>
                          <div class="">
                            <select name="gender" id="edit_gender" class="form-control form-control-sm" required>
                            <option selected id="gender_val"></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                        <label class="">Position</label>
                          <div class="">
                            <select name="position" id="edit_position" class="form-control form-control-sm"  required>
                            <option  id="position_val"> - Select -</option>
                            <?php
                        require ('./_connection.php');

                        $queryValidate = "SELECT * FROM tbl_position";
                        $sqlValidate = mysqli_query($connection, $queryValidate);

                        while($results = mysqli_fetch_array($sqlValidate))
                              {
                                echo "
                              <option value='".$results['id']."'>".$results['description']."</option>
                            ";
                              }
                              
                                ?>
                            
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">

                        <label class="">Schedule</label>
                          <div class="">
                            <select name="schedule" id="edit_schedule" class="form-control form-control-sm" required>
                            <option id="schedule_val"> - Select - </option>
                            <?php
                        require ('./_connection.php');

                        $queryValidate = "SELECT * FROM tbl_schedule";
                        $sqlValidate = mysqli_query($connection, $queryValidate);

                        while($results = mysqli_fetch_array($sqlValidate))
                              {
                                echo "
                              <option value='".$results['id']."'>".$results['time_in'].' - '.$results['time_out']."</option>
                            ";
                              }
                              
                                ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group result">
                      <label>File upload</label>
                      <input type="file" name="employee_image" id="employee_image" class="file-upload-default" required>
                      <div class="input-group col-xs-12">
                        <input type="text"  id="employee_image" class="form-control form-control-sm file-upload-info" disabled placeholder="Upload Image" >
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary btn-sm" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    </div>
                    </div>
      
                    
      
                  
                
              
            </div>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="update_employee">Update</button>
      </div>
      </form>

    </div>
  </div>
</div>