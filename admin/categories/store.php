
<?php 

if(isset($_POST['submit'])) {

	$title = $_POST['title'];

	include('../include/connect.php');
	$con = connectBD();
	$sql = "INSERT INTO categories VALUES (NULL, '$title')";
	
	$result = mysqli_query($con, $sql);

	header('Location: index.php');

}
?>