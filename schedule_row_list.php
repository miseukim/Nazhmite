<?php 
	require ('./_connection.php');

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$querySelect = "SELECT *, tbl_employees.id AS empid FROM tbl_employees LEFT JOIN tbl_schedule ON tbl_schedule.id=tbl_employees.schedule_id WHERE tbl_employees.id = '$id'";
		$sqlSelect = $connection->query($querySelect);
		$row = $sqlSelect->fetch_assoc();

		echo json_encode($row);
	}
?>