<?php

require ('./_connection.php');
require ('./timezones.php');


	if(isset($_POST['employee_in']))
	
	{
		$rfid = $_POST['rfid'];
		$status = $_POST['status'];

		$querySelect = "SELECT * FROM tbl_employees WHERE rfid = '$rfid'";
		$sqlSelect = mysqli_query($connection, $querySelect);

		if($sqlSelect->num_rows > 0){
			$row = $sqlSelect->fetch_assoc();
			$id = $row['id'];

			$date_now = date('Y-m-d');

			if($status == 'in'){
				$querySelect = "SELECT * FROM tbl_attendance WHERE employee_id = '$id' AND date = '$date_now' AND time_in IS NOT NULL";
				$sqlSelect = mysqli_query($connection, $querySelect);
				if($sqlSelect->num_rows > 0){
					
					echo 'You have timed in for today';
					
				}
				else{
					//updates
					$sched = $row['schedule_id'];
					$lognow = date('H:i:s');
					

					$querySelect = "SELECT * FROM tbl_schedule WHERE id = '$sched'";
					$sqlSelect = mysqli_query($connection, $querySelect);
					$srow = $sqlSelect->fetch_assoc();
					$logstatus = ($lognow > $srow['time_in']) ? 0 : 1;
					//
					$querySelect = "INSERT INTO tbl_attendance (employee_id, date, time_in, status) VALUES ('$id', '$date_now', NOW(),  '$logstatus')";
					if($connection->query($querySelect)){
						
						echo 'Time in: '.$row['firstname'].' '.$row['lastname']   . date("h:i A");
					}
					else{
						
					}
				}
			}
        }
    }
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="jpeg_camera/jpeg_camera_with_dependencies.min.js" type="text/javascript"></script>
    <title>Nazhmite | Day Time Record</title>
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <style type="text/css">
		
		#results { float:bottom; margin:50px; padding:50px;   }
	</style>



</head>
<body>
<form action="client_time_in.php" method="POST" enctype="multipart/form-data">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="logo/Nazhmite_Logo_1.png" alt="logo">
              </div>
              <h1>Time In</h1>
              <h2 class="font-weight-light">Scan RFID Here!</h2>
              <form class="pt-3">
                <div class="form-group">
                  
                  <div class="input-group">
                  <select class="form-control-sm bg-transparent" id="" name="status" >
                      <option value="in"> Time In </option>
                      </select>
                    <div class="input-group-prepend bg-transparent">
                      
                      
                      
                    </div>
                    
                    <input type="password" class="form-control form-control-sm bg-transparent" id="" name="rfid" autofocus>
                  </div>
                </div>
                
                <!-- Time In Button -->
                <div class="my-3">
                  <button type="button"  id="take_snapshot()" onClick="take_snapshot()" class="btn btn-block btn-outline-secondary btn-sm font-weight-medium auth-form-btn" name="employee_in"> </button>
                </div>
                
                
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
          <body>
            <div id="results">Your captured image will appear here...</div>
            
            <div id="my_camera" ></div>
            
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright 2021  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</form>


<script type="text/javascript" src="js/webcam.min.js"></script>
<script type="text/javascript" src="js/webcam.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90,
			flip_horiz: true
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>';
			} );
		}
	</script>



</body>
</html>