<?php 
	require ('./_connection.php');

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$queryValidate = "SELECT *, tbl_employees.id as empid FROM tbl_employees LEFT JOIN tbl_position ON tbl_position.id=tbl_employees.position_id LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employees.schedule_id WHERE tbl_employees.id = '$id'";
		$sqlSelect = mysqli_query($connection, $queryValidate);
		$row = $sqlSelect->fetch_assoc();

		echo json_encode($row);
	}
?>