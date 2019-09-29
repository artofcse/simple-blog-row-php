
<?php 

include('../include/connect.php');
$con = connectBD();
$sql = "SELECT * FROM categories";
$result = mysqli_query($con, $sql);


include('../include/header.php'); 


?>





<a class="btn btn-success" href="index.php"> Back </a>
<br><br>

<div class="content">
	<h1>  Add new post  </h1>

	<form action="store.php" enctype="multipart/form-data" method="post">

	  <div class="form-group">
	    <label for="title">Title</label>
	    <input type="text" class="form-control" name="title" placeholder="Title">
	  </div>


	  <div class="form-group">
	    <label for="description">Description</label>
	    <textarea type="text" class="form-control" name="description" rows="10"></textarea>
	  </div>

	  <div class="form-group">
	    <label for="image">Image</label>
	    <input type="file" class="form-control" name="image">
	  </div>

	  <div class="form-group">
	    <label for="date">Date</label>
	    <input type="date" class="form-control" name="date" placeholder="Date">
	  </div>


	  <div class="form-group">
	    <label for="category">Category</label>
	    <select name="category_id" class="form-control">
	    	<option> Select Category </option>
	    	<?php while ($row = mysqli_fetch_assoc($result)) { ?>
		    	<option value="<?= $row['id'] ?>"> <?= $row['title'] ?> </option>
		    <?php } ?>
	    </select>
	  </div>


	
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>


</div>
<?php include('../include/footer.php'); ?>


