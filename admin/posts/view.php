
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

include('../include/header.php'); 


?>





<a class="btn btn-success" href="index.php"> Back </a>
<br><br>

<div class="content">
	<h1>  Add new post  </h1>

	
	<table class="table">
		<tr>
			<th> Title : </th>
			<td> <?php echo $data['title'] ?> </td>
		</tr>
		<tr>
			<th> Category : </th>
			<td> <?php echo $data['categoryTitle'] ?> </td>
		</tr>
		<tr>
			<th> Description : </th>
			<td> <?php echo $data['description'] ?> </td>
		</tr>
		<tr>
			<th> Image : </th>
			<td> <img src="../<?php echo $data['image'] ?>" width="200"> </td>
		</tr>
		<tr>
			<th> Date : </th>
			<td> <?php echo $data['date'] ?> </td>
		</tr>
	</table>

</div>
<?php include('../include/footer.php'); ?>