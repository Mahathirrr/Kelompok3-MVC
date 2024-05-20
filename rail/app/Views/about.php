
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Railway Pass Management System || About Us Page</title>

	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- Custom Theme files -->
	<link href="assets/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
	<link href="assets/css/style.css" type="text/css" rel="stylesheet" media="all">
	<link href="assets/css/font-awesome.css" rel="stylesheet"> <!-- font-awesome icons -->
	<!-- //Custom Theme files -->
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<!-- //web-fonts -->
</head>

<body>
	<!-- banner -->
	<div class="agileits-banner">
		<div class="bnr-agileinfo">
			<!-- navigation -->
			<?php include_once('lib/header.php'); ?>
			<!-- //navigation -->
			<!-- banner-text -->
			<div class="banner-text agileinfo about-bnrtext">
				<div class="container">
					<h2><a href="index.php">Home</a> / About</h2>
				</div>
			</div>
			<!-- //banner-text -->
		</div>
	</div>
	<!-- //banner -->
	<!-- welcome -->
	<div class="welcome" id="welcome">
		<?php

		$cnt = 1;
		if ($query->rowCount() > 0) {
			foreach ($results as $row) {               ?>
				<div class="container">
					<div class="agileits-title">
						<h3><?php echo $row->PageTitle; ?></h3>
					</div>
					<div class="welcomerow-agileinfo">

						<p><?php echo $row->PageDescription; ?></p>
					</div>
				</div> <?php $cnt = $cnt + 1;
					}
				} ?>
	</div>
	</div>
	<!-- //welcome -->


	<?php include_once('lib/footer.php'); ?>
	<!-- js -->
	<script src="assets/js/jquery-2.2.3.min.js"></script>
	<script src="assets/js/SmoothScroll.min.js"></script>
	<script src="assets/js/jarallax.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<!-- //js -->
	<!-- Progressive-Effects-Animation-JavaScript -->
	<script type="text/javascript" src="assets/js/numscroller-1.0.js"></script>
	<!-- //Progressive-Effects-Animation-JavaScript -->
	<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="assets/js/move-top.js"></script>
	<script type="text/javascript" src="assets/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/js/bootstrap.js"></script>
</body>

</html>