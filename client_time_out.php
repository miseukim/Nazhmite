<?php
require ('./_connection.php');
require ('./timezones.php');

if(isset($_POST['rfid']))
	
	{
		$rfid = $_POST['rfid'];
		$status = $_POST['status'];

		$querySelect = "SELECT * FROM tbl_employees WHERE rfid = '$rfid'";
		$sqlSelect = mysqli_query($connection, $querySelect);

		if($sqlSelect->num_rows > 0){
			$row = $sqlSelect->fetch_assoc();
			$id = $row['id'];

			$date_now = date('Y-m-d');

			if($status == 'out')
            {
				$querySelect = "SELECT *, tbl_attendance.id AS uid FROM tbl_attendance LEFT JOIN tbl_employees ON tbl_employees.id=tbl_attendance.employee_id WHERE tbl_attendance.employee_id = '$id' AND date = '$date_now'";
				$sqlSelect = mysqli_query($connection, $querySelect);
				if($sqlSelect->num_rows < 1){
					echo 'Cannot Timeout. No time in.';
                }
                else{
					$row = $sqlSelect->fetch_assoc();
					if($row['time_out'] != '00:00:00'){
						$output['error'] = true;
						echo  'You have timed out for today';
					}
                    else{
						
						$queryUpdate = "UPDATE tbl_attendance SET time_out = NOW() WHERE id = '".$row['uid']."'";
						if(mysqli_query($connection, $queryUpdate)){
							echo 'Time out: '.$row['firstname'].' '.$row['lastname'];

							$querySelect = "SELECT * FROM tbl_attendance WHERE id = '".$row['uid']."'";
							$sqlSelect = mysqli_query($connection, $querySelect);
							$urow = $sqlSelect->fetch_assoc();

							$time_in = $urow['time_in'];
							$time_out = $urow['time_out'];

							$querySelect = "SELECT * FROM tbl_employees LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employees.schedule_id WHERE tbl_employees.id = '$id'";
							$sqlSelect = mysqli_query($connection, $querySelect);
							$srow = $sqlSelect->fetch_assoc();

							if($srow['time_in'] > $urow['time_in']){
								$time_in = $srow['time_in'];
							}

							if($srow['time_out'] < $urow['time_in']){
								$time_out = $srow['time_out'];
							}

							$time_in = new DateTime($time_in);
							$time_out = new DateTime($time_out);
							$interval = $time_in->diff($time_out);
							$hrs = $interval->format('%h');
							$mins = $interval->format('%i');
							$mins = $mins/60;
							$int = $hrs + $mins;
							if($int > 4){
								$int = $int - 1;
							}

							$queryUpdate = "UPDATE tbl_attendance SET num_hrs = '$int' WHERE id = '".$row['uid']."'";
							mysqli_query($connection, $queryUpdate);
						}
						else{
							$output['error'] = true;
							$output['message'] = $conn->error;
						}
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



</head>
<body>
<form action="client_time_out.php" method="POST" enctype="multipart/form-data">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth lock-full-bg">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-transparent text-left p-5 text-center">
                
              
              <form class="pt-5">
                <div class="form-group">
                <select class="form-control" name="status">
              <option value="out">Time In</option>
              
            </select>
               
                  <label for="examplePassword1">Time OUt</label>
                  <input type="password" class="form-control text-center" name="rfid" id="time_out" placeholder="Scan RFID Here!" autofocus>
                </div>
                
            
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</form>




</body>
</html>