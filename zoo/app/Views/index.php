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
	<div class="header-banner">
		<div class="container">
			<div class="head-banner">
				<h3>Visit to a Zoo</h3>
				<p> A visit to a zoo offers us an opportunity to see the wild animals.Zoo is a place where we can see different animals and birds at one place. It has great attraction particularly for the children. A visit to a zoo gives us both information and entertainment. We come to learn about the rare species.</p>
			</div>
			<div class="banner-grids">
				<div class="col-md-6 banner-grid">
					<h4>Vestibulum sagittis</h4>
					<p>Donec dui velit, hendrerit id pharetra nec, posuere porta nisl. Donec magna nulla, commodo in ultrices faucibus lacus aliquet.</p>
				</div>
				<div class="col-md-6 banner-grid">
					<h4>Itaque Earum Rerum</h4>
					<p>Donec dui velit, hendrerit id pharetra nec, posuere porta nisl. Donec magna nulla, commodo in ultrices faucibus lacus aliquet.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--header-->
	<!--welcome-->
	<div class="content">
		<div class="welcome">
			<div class="container">
				<h2>welcome to zoo planet</h2>
				<div class="welcome-grids">
					<?php
					$query = $data->query("SELECT * FROM tblanimal ORDER BY RAND() LIMIT 4");
					?>
					<?php if ($query) : ?>
						<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>
							<div class="col-md-3 welcome-grid">
								<img src="admin/images/<?php echo htmlspecialchars($row['AnimalImage']); ?>" width="220" height="200" alt=" " class="img-responsive" />
								<div class="wel-info">
									<h4><a href="index.php?act=animal-detai&anid=<?php echo htmlspecialchars($row['ID']); ?>"><?php echo htmlspecialchars($row['AnimalName']); ?> (<?php echo htmlspecialchars($row['Breed']); ?>)</a></h4>
									<p><?php echo htmlspecialchars(substr($row['Description'], 0, 100)); ?>.</p>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						Error: <?php echo $data->error; ?>
					<?php endif; ?>

					<br>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--welcome-->

		<!--animals-->
		<div class="animals">
			<div class="container">
				<h3>animals</h3>
				<div class="clients">
					<ul id="flexiselDemo3">
						<?php
						$query = $data->query("select * from tblanimal");
						?>
						<?php if ($query) : ?>
							<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>
								<li><img src="admin/images/<?php echo $row['AnimalImage']; ?>" width='220' height='200' alt=" " class="img-responsive" /></li>
							<?php endwhile; ?>
						<?php else : ?>
							Error: <?php echo $data->error; ?>
						<?php endif; ?>
					</ul>
					<script type="text/javascript">
						$(window).load(function() {

							$("#flexiselDemo3").flexisel({
								visibleItems: 5,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: {
									portrait: {
										changePoint: 480,
										visibleItems: 1
									},
									landscape: {
										changePoint: 640,
										visibleItems: 2
									},
									tablet: {
										changePoint: 768,
										visibleItems: 3
									}
								}
							});
						});
					</script>
					<script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--models-->


		<!--events-->
		<!--specials-->
		<?php include_once('lib/special.php'); ?>
	</div>
	<!--footer-->
	<?php include_once('lib/footer.php'); ?>
</body>

</html>