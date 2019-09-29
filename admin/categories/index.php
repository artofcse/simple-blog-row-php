<?php include('../include/connect.php'); ?>

<?php 

	$con = connectBD();
	$sql = "SELECT * FROM categories";
	$result = mysqli_query($con, $sql);
?>



<?php include('../include/header.php'); ?>

<a class="btn btn-success" href="create.php"> + Add Category </a>
<br><br>

<div class="content">
	<h1> Category list </h1>

	<table class="table table-bordered">
		<thead>
			<th> ID </th>
			<th> Title </th>
			<th> Action </th>
		</thead>
	
		<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td> <?php echo $row['id']; ?> </td>
				<td> <?php echo $row['title']; ?> </td>
				<td> 
					<a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $row['id']; ?>"> Edit </a>
					<a class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure');"> Delete </a>
				</td>
			</tr>
		<?php } ?>

	</table>

</div>
<?php include('../include/footer.php'); ?>