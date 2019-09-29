<?php 
$rand = rand(11111, 89999999999);


$image =  'uploads/' . $rand .$_FILES['image']['name'];
$upload =  '../uploads/' . $rand . $_FILES['image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'], $upload);

$title = $_POST['title'];
$description = $_POST['description'];
$date = $_POST['date'];
$category_id = $_POST['category_id'];


include('../include/connect.php');

$con = connectBD();

$sql = "INSERT INTO posts VALUES (NULL, $category_id, '$title', '$description', '$image', '$date')";
mysqli_query($con, $sql);

header('Location: index.php');