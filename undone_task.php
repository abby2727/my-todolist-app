<?php
	include('includes/db.php');
	
	if($_GET['id'] != ""){
		$id = $_GET['id'];
		
		$conn->query("UPDATE `task` SET `status` = '' WHERE `id` = $id") or die(mysqli_errno($conn));
		header('location: index.php');
	}
?>