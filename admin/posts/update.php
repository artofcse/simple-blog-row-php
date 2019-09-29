<?php

$id = $_GET['id'];

include('../include/connect.php');
$con = connectBD();


$sql = "SELECT posts.*, categories.title as categoryTitle
		FROM posts
		JOIN categories ON posts.category_id = categories.id
		WHERE posts.id = '$id' ";

$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);

$title 			= $_POST['title'];
$description 	= $_POST['description'];
$date 			= $_POST['date'];
$category_id 	= $_POST['category_id'];

$updateSql = "UPDATE posts SET 
			title= '$title', 
			description = '$description', 
			date='$date', 
			category_id = '$category_id'";	


if ( !empty( $_FILES['image']['name'] )) {
	$rand = rand(11111, 89999999999);
	$image =  'uploads/' . $rand .$_FILES['image']['name'];
	$upload =  '../uploads/' . $rand . $_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], $upload);

	$updateSql .= ", image = '$image' ";

	if (!empty($data['image']) && file_exists( '../'.$data['image'] )) {
		unlink('../' . $data['image']);
	}
}

	


$updateSql .= " WHERE id = $id";

		
mysqli_query($con, $updateSql);

header('Location: index.php');