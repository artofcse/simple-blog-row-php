
<?php 

	include('../include/connect.php');

	$con = connectBD();
	$sql = "SELECT * FROM posts ORDER BY id DESC";
	$result = mysqli_query($con, $sql);

?>


<?php include('../include/header.php'); ?>



<a class="btn btn-success" href="create.php"> + Add Post </a>
<br><br>


	<table class="table table-bordered">
		<thead>
			<th> ID </th>
			<th> Title </th>
			<th> Image </th>
			<th> Date </th>
			<th> Action </th>
		</thead>

		<?php while($row = mysqli_fetch_assoc($result)) {?>
		<tr>
			<td> <?php echo $row['id']; ?>  </td>
			<td>  <?= $row['title']; ?> </td>
			<td> <img src="../<?= $row['image']; ?>" width='100'> </td>
			<td> <?= $row['date']; ?> </td>
			<td> 
				<a href="view.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success"> View </a>
				<a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info"> Edit </a>
				<a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"> Delete </a>
			</td>
		</tr>
		<?php  } ?>

	</table>


</div>
<?php include('../include/footer.php'); ?>