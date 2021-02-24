<?php

require ('./_connection.php');


if(isset($_POST['add_employee']))
{
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

          //creating employeeid
		$letters = '';
		$numbers = '';
		foreach (range('A', 'Z') as $char) {
		    $letters .= $char;
		}
		for($i = 0; $i < 10; $i++){
			$numbers .= $i;
		}
		$employee_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
		//

    if(file_exists("employee_images/" . $_FILES["employee_image"]["name"]))
        {
          $store = $_FILES["employee_image"]["name"];
          echo '<script> alert("Image Already Exists! '.$store.' ") </script>';
          echo '<script> window.location.href = "employee_list.php" </script>';
        }

  else
  {

      $queryValidate = "INSERT INTO tbl_employees (employee_id, rfid, firstname, lastname, address, contact_number, email_address, gender, position_id, schedule_id, image, created_on) 
                        VALUES ('$employee_id', '$rfid', '$firstname', '$lastname', '$address', '$contact', '$email', '$gender', '$position', '$schedule', '$image', NOW())";
      $sqlValidate = mysqli_query($connection, $queryValidate);

  

              if($sqlValidate)
              {
                move_uploaded_file($_FILES["employee_image"]["tmp_name"], "employee_images/".$_FILES["employee_image"]["name"]);
                echo '<script> alert("Employee Added Successfully") </script>';
                echo '<script> window.location.href = "employee_list.php" </script>';

              }
              else
              {
                echo '<script> alert("Unable to Save") </script>';
                echo '<script> window.location.href = "employee_list.php" </script>';
              }

}
      
  
}


?>




<!-- Add New Employee Modal -->
<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"  id="employeeModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      

      <form action="add_employee_modal.php" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="">RFID</label>
                          <div class="">
                            <input type="text" name="rfid" class=" form-control form-control-sm" autofocus required/>
                          </div>
                        </div>
                      </div>
                      
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="">First Name</label>
                          <div class="">
                            <input type="text" name="firstname" class=" form-control form-control-sm" placeholder="First Name" required/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="">Last Name</label>
                          <div class="">
                            <input type="text" name="lastname" class="form-control form-control-sm" placeholder="Last Name" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="">Address</label>
                          <div class="">
                            <input type="text" name="address" class="form-control form-control-sm" placeholder="Address" required/>
                          </div>
                        </div>
                      </div>

                      
                    </div>
                    

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="">Contact Number</label>
                          <div class="">
                            <input type="text" name="contact" class=" form-control form-control-sm check_email" placeholder="Contact" required/>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="">Email Address</label>
                          <div class="">
                            <input  type="email" name="email" class=" form-control form-control-sm" placeholder="Email Address" required/>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="">Gender</label>
                          <div class="">
                            <select name="gender" class="form-control form-control-sm" required>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                        <?php
                        require ('./_connection.php');

                        ?>
                        
                        <label class="">Position</label>
                          <div class="">
                            <select name="position" class="form-control form-control-sm"  required>
                            <option> - Select - </option>
                            <?php
                              $sqlSelect = "SELECT * FROM tbl_position";
                              $querySelect = mysqli_query($connection, $sqlSelect);
                              while ($results = $querySelect->fetch_assoc())
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
                        <?php
                        require ('./_connection.php');

                        ?>
                        
                          <label class="">Schedule</label>
                          <div class="">
                            <select name="schedule" class="form-control form-control-sm" required>
                            <option> - Select - </option>
                            <?php
                              $sqlSelect = "SELECT * FROM tbl_schedule";
                              $querySelect = mysqli_query($connection, $sqlSelect);
                              while ($results = $querySelect->fetch_assoc())
                              {
                                echo "
                              <option value='".$results['id']."'> ".date('h:i A', strtotime($results['time_in'])).' - '.date('h:i A', strtotime($results['time_out']))."</option>
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
                      <input type="file" name="employee_image" id="employee_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text"  class="form-control form-control-sm file-upload-info" disabled placeholder="Upload Image">
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
        <button type="submit" class="btn btn-primary" name="add_employee">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>