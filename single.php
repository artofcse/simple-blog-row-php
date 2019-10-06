<?php 

include('admin/include/connect.php');

if ( ! $_GET['id'] ) {
	header('Location: index.php');
}
$id = $_GET['id'];

$con = connectBD();

$con = connectBD();
$sql = "SELECT posts.*, categories.title as categoryTitle
		FROM posts
		JOIN categories ON posts.category_id = categories.id
		WHERE posts.id = '$id' ";

$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);


include('include/header.php'); 
?>


<div class="main-content">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				

					<div class="single-post">
						<h1> <?php echo $data['title']; ?> </h2>
						
						<div class="row">
							<div class="col-md-12">
								<img src="admin/<?php echo $data['image']; ?>" alt="">
							</div>
							<div class="col-md-12" style="margin: 15px 0px;">
								<?php echo $data['categoryTitle']; ?>
							</div>
							<div class="col-md-12">
								<?php echo $data['description']; ?>
							</div>
						</div>	
					</div>

				

			</div>
		</div>
	</div>
</div>


<?php include('include/footer.php'); ?>
