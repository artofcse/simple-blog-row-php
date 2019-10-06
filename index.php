<?php 

include('admin/include/connect.php');

$con = connectBD();

$sql = " SELECT count(id) as total FROM posts ";
$result = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($result);


$skip = 0;
$take = 2;
$page = 1;

if ($_GET['page']) {
	$page = $_GET['page'];
	$skip = ( $page - 1 ) * $take;
}

$totalPage = $data['total'] / $take;

$sql = "
	SELECT * FROM posts	
	ORDER BY id DESC
	LIMIT $skip, $take
";

$result = mysqli_query( $con, $sql );


include('include/header.php'); 
?>


<div class="main-content">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				
				<?php while( $row = mysqli_fetch_assoc( $result ) ) { ?>
					<div class="single-post">
						<h2> 
							<a href="<?php echo $url; ?>/single.php?id=<?php echo $row['id']; ?>">
								<?php echo $row['title']; ?> 
							</a>
						</h2>
						<div class="row">
							<div class="col-md-3">
								<img src="admin/<?php echo $row['image']; ?>" alt="">
							</div>
							<div class="col-md-9">
								<?php echo substr( $row['description'], 0, 280); ?>
							</div>
						</div>	
					</div>
				<?php } ?>

				<div style="margin-bottom: 15px;">
					Showing page <?php echo $page; ?> of <?php echo $totalPage; ?> pages.
				</div>

				<div class="row clearfix">
					<div class="col-md-3">
						<?php if($page > 1) { ?>
							<a href="<?php echo $url ?>index.php?page=<?php echo $page - 1; ?>"> << Previous </a>
						<?php } ?>
					</div>
					<div class="col-md-6">
						<div class="text-center">
							<?php for($i = 1; $i <= $totalPage; $i++ ) { ?>
								<a href="<?php echo $url ?>index.php?page=<?php echo $i; ?>" class="pagination"> 
									<?php echo $i; ?> 
								</a>	
							<?php } ?>
						</div>
					</div>
					<div class="col-md-3">
						<div class="text-right">
							<?php if ($totalPage > $page): ?>
								<a href="<?php echo $url ?>index.php?page=<?php echo $page + 1; ?>"> Next >> </a>	
							<?php endif ?>
							
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<?php include('include/footer.php'); ?>
