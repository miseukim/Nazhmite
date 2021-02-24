<?php 
  require('./_connection.php');

  session_start();

  /* Functions */
  function pathTo($destination) {
    echo "<script>window.location.href = '$destination.php'</script>";
  }

  if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    /* Set Default Invalid */
    $_SESSION['status'] = 'invalid';
  }

  if ($_SESSION['status'] == 'valid') {
    pathTo('dashboard');
  }
  
  if (isset($_POST['btn_login'])) {
    $username = trim($_POST['username']);
    $rfid = trim($_POST['rfid']);

    if (empty($username) || empty($rfid)) {
      echo "Please fill up all fields";
    } else {
      $queryValidate = "SELECT * FROM tbl_admin WHERE username = '$username' AND rfid = '$rfid'";
      $sqlValidate = mysqli_query($connection, $queryValidate);
      $rowValidate = mysqli_fetch_array($sqlValidate);

      if (mysqli_num_rows($sqlValidate) > 0) {
        $_SESSION['status'] = 'valid';
        $_SESSION['username'] = $rowValidate['username'];
		echo "<script> alert('Welcome Back!')</script>";
        pathTo('dashboard');
      } 
	  
	  else
	  {
        $_SESSION['status'] = 'invalid';
		echo "<script> alert('Woops! This User Does Not Exist!')</script>";
		pathTo('login');
      }
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Nazhmite: DTR System</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="login.php" method="POST">
				<img src="img/avatar.svg">
				<h2 class="title">Welcome to Nazhmite</h2>
				<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-lock"></i>
           		   </div>
					  <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username"  autofocus>
           		   </div>
           		</div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-lock"></i>
           		   </div>
					  <div class="div">
           		   		<h5>Tap your card here!</h5>
           		   		<input type="password" class="input" name="rfid"  autofocus>
           		   </div>
           		</div>
           		
            	<input type="submit" class="btn" name="btn_login" value="Login">

				

            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>


