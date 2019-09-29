<?php 

if(isset($_POST['submit'])) {

	$id = $_GET['id'];
	$title = $_POST['title'];

	include('../include/connect.php');
	$con = connectBD();
	$sql = " UPDATE categories SET title = '$title' WHERE id = '$id' ";
	
	$result = mysqli_query($con, $sql);

	header('Location: index.php');

}
?>