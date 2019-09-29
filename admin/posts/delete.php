<?php

$id = $_GET['id'];

include('../include/connect.php');

$con = connectBD();



$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);
$image_location = '../' . $data['image'];

if (file_exists($image_location)) {
	unlink($image_location);
}



$sql = "DELETE FROM posts WHERE id = '$id' ";
mysqli_query($con, $sql);

header('Location: index.php');