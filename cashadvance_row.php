<?php 
	require ('./_connection.php');

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$queryValidate = "SELECT *, tbl_cashadvance.id AS caid FROM tbl_cashadvance LEFT JOIN tbl_employees on tbl_employees.id=tbl_cashadvance.employee_id WHERE tbl_cashadvance.id = '$id'";
        $sqlValidate = $connection-> query($queryValidate);
		$row = $sqlValidate->fetch_assoc();

		echo json_encode($row);
	}
?>