<?php 
	require ('./_connection.php');

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$querySelect = "SELECT * FROM tbl_position WHERE id = '$id'";
		$sqlSelect = mysqli_query($connection, $querySelect);
		$row = $sqlSelect->fetch_assoc();

		echo json_encode($row);
	}
?>