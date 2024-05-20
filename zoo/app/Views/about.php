<!DOCTYPE HTML>
<html>

<head>
	<title>Zoo Management System | Home Page</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" />

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
</head>

<body>
	<?php include_once('lib/header.php'); ?>

	<div class="banner-header">
		<div class="container">
			<h2>about</h2>
		</div>
	</div>
	<!--about-->
	<div class="content">

		<!--advantage-->
		<div class="advantages">
			<div class="container">

				<?php
				$query = $data->query("select * from  tblpage where PageType='aboutus'");
				?>
				<?php if ($query) : ?>
					<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>
						<div class="advantages-grids">
							<div class="col-md-12 advantage-grid">
								<div class="advantage">
									<h3><?php echo $row['PageTitle']; ?></h3>
									<div class="right-grid">

										<p><?php echo $row['PageDescription']; ?>.</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>

							<div class="clearfix"></div>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					Error: <?php echo $data->error; ?>
				<?php endif; ?>



			</div>
		</div>
		<!--advantage-->
		<!--specials-->
		<?php include_once('lib/special.php'); ?>
	</div>
	<!--footer-->
	<?php include_once('lib/footer.php'); ?>
</body>

</html>