<?php
include 'config.php';
include 'user_role.php';
	$user_id = $_GET['id'];
	$sql = "DELETE FROM user WHERE user_id = '{$user_id}'";
		if (mysqli_query($conn,$sql)) {
			header("Location:{$hostname}/admin/users.php");
		}else{
			echo "<p style='color: red;text-align: center;margin: 10px'>Can't Delete<p>";
			}
mysqli_close($conn);

?>