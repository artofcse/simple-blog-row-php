
<?php 

if (isset($_GET['id'])) {
	include('../include/connect.php');

	$id = $_GET['id'];
	$con = connectBD();
	$sql = "SELECT * FROM categories WHERE id = '$id' ";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($result);
}

include('../include/header.php'); 


?>

<a class="btn btn-success" href="index.php"> Back </a>
<br><br>

<div class="content">
	<h2> Edit category </h2>

	<form method="POST" action="update.php?id=<?php echo $row['id']; ?>">
	  <div class="form-group">
	    <label for="Title">Title</label>
	    <input type="text" class="form-control" id="title" value="<?php echo $row['title']; ?>" placeholder="Title" name="title">
	  </div>

	  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>


</div>
<?php include('../include/footer.php'); ?>