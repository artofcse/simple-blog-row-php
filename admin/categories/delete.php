<?php
if(isset($_GET['id'])) {

	$id = $_GET['id'];

	include('../include/connect.php');
	$con = connectBD();
	$sql = "DELETE FROM categories WHERE id = '$id' ";
	
	$result = mysqli_query($con, $sql);

	header('Location: index.php');

}