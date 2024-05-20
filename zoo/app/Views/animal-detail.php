<!DOCTYPE HTML>
<html>

<head>
	<title>Zoo Management System | Animal Detail</title>
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
	<!--lightbox-->
	<link rel="stylesheet" type="text/css" href="assets/css/jquery.lightbox.css">
	<script src="assets/js/jquery.lightbox.js"></script>
	<script>
		// Initiate Lightbox
		$(function() {
			$('.gallery a').lightbox();
		});
	</script>
	<!--lightbox-->
</head>

<body>
	<?php include_once('lib/header.php'); ?>
	<div class="banner-header">
		<div class="container">
			<h2>Animal Detail</h2>
		</div>
	</div>
	<div class="content">
		<!--gallery-->
		<div class="gallery-section">
			<div class="container">
				<div class="welcome-grid">

					<div class="col-md-8">
						<div>
							<?php
							$anid = $_GET['anid'];
							$query = $data->query("select * from tblanimal where ID='$anid'");
							?>
							<?php if ($query) : ?>
								<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>

									<img src="admin/images/<?php echo $row['AnimalImage']; ?>" alt=" " class="img-responsive" width="300" height="300" />
									<h4 style="padding-top: 20px"><?php echo $row['AnimalName']; ?>(<?php echo $row['Breed']; ?>)</h4>
									<p style="padding-top: 20px"><?php echo $row['Description']; ?>.</p>
									<strong style="padding-top: 20px">Breed: <?php echo $row['Breed']; ?></strong><br>
									<strong style="padding-top: 20px">Cage Number: <?php echo $row['CageNumber']; ?>.</strong><br>
									<strong style="padding-top: 20px">Feed Number: <?php echo $row['FeedNumber']; ?>.</strong>
								<?php endwhile; ?>
							<?php else : ?>
								Error: <?php echo $data->error; ?>
							<?php endif; ?>

						</div>
					</div>

					<div class="clearfix"> </div>
				</div>

			</div>
		</div>
		<!--gallery-->
		<!--specials-->
		<?php include_once('lib/special.php'); ?>
	</div>
	<?php include_once('lib/footer.php'); ?>
</body>

</html>