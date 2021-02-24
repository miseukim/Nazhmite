<?php
require ('./_connection.php');


if(isset($_POST['add_admin']))
{

  $rfid = $_POST['rfid'];
  $username = $_POST['username'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $image = $_FILES['admin_image']['name'];
  if(file_exists("admin_images/" . $_FILES["admin_image"]["name"]))
        {
          $store = $_FILES["admin_image"]["name"];
          echo '<script> alert("Image Already Exists! '.$store.' ") </script>';
          echo '<script> window.location.href = "employee_list.php" </script>';
        }

  else
  {


  $queryValidate = "INSERT INTO tbl_admin (rfid, username, firstname, lastname, gender, birthdate, address, email, image) 
  VALUES ('$rfid', '$username', '$firstname', '$lastname', '$gender', '$birthdate', '$address', '$email', '$image')";
  $sqlValidate = mysqli_query($connection, $queryValidate);

  if($sqlValidate)
  {
    echo '<script> alert("Admin Added Successfully") </script>';
    echo '<script> window.location.href = "employee_list.php" </script>';
  }
  else
  {
    echo '<script> alert("Unable to Add") </script>';
    echo '<script> window.location.href = "employee_list.php" </script>';
  }
}

}

?><!-- Add New Admin Modal -->

<div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminModalLabel">Add New Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="add_admin_modal.php" method="POST">
      <div class="modal-body">
      <div class="col-12 grid-margin">
            
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="">RFID</label>
                  <div class="">
                    <input type="text" name="rfid" class=" form-control form-control-sm" placeholder="RFID" required/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="">Username</label>
                  <div class="">
                    <input type="text" name="username" class=" form-control form-control-sm" placeholder="Username" required/>
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
                    <input type="text" name="lastname" class="form-control form-control-sm" placeholder="Last Name"required/>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="">Gender</label>
                  <div class="">
                    <select name="gender" class="form-control form-control-sm" placeholder="-Select-" required>
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="">Date of Birth</label>
                  <div class="">
                    <input type="date" name="birthdate" class="form-control form-control-sm" placeholder="Birthdate" required/>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="">Address</label>
                  <div class="">
                    <input name="address" class="form-control form-control-sm" placeholder="Address" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group row">
                  <label class="">Email Address</label>
                  <div class="">
                    <input name="email" class="form-control form-control-sm" placeholder="Email Address" required/>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-6">
                      <div class="form-group row">
                      <label>File upload</label>
                      <input type="file" name="admin_image" id="admin_image" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control form-control-sm file-upload-info" disabled placeholder="Upload Image">
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
        <button type="submit" class="btn btn-primary" name="add_admin">Save</button>
      </div>

      </form>
      </div>
    </div>
    </div>
