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

					<?php
					if (isset($_GET['pageno'])) {
						$pageno = $_GET['pageno'];
					} else {
						$pageno = 1;
					}
					// Formula for pagination
					$no_of_records_per_page = 12;
					$offset = ($pageno - 1) * $no_of_records_per_page;

					// Total pages calculation
					$total_pages_sql = "SELECT COUNT(*) FROM tblanimal";
					$ret1 = $data->query($total_pages_sql);
					$total_rows = $ret1->fetchColumn();
					$total_pages = ceil($total_rows / $no_of_records_per_page);

					// Fetching the records with limit for pagination
					$query = $data->query("SELECT * FROM tblanimal LIMIT $offset, $no_of_records_per_page");
					?>

					<?php if ($query) : ?>
						<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>
							<div class="col-md-3 welcome-grid">
								<img src="admin/images/<?php echo htmlspecialchars($row['AnimalImage']); ?>" width='220' height='200' alt=" " class="img-responsive" />
								<div class="wel-info">
									<h4><a href="index.php?act=animal-detail&anid=<?php echo htmlspecialchars($row['ID']); ?>"><?php echo htmlspecialchars($row['AnimalName']); ?>(<?php echo htmlspecialchars($row['Breed']); ?>)</a></h4>
								</div>
								<br>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						Error: <?php echo $data->error; ?>
					<?php endif; ?>

					<div class="clearfix"> </div>
				</div>
				<div align="center">
					<ul class="pagination">
						<li><a href="?pageno=1"><strong>First</strong></a></li>
						<li class="<?php if ($pageno <= 1) {
										echo 'disabled';
									} ?>">
							<a href="<?php if ($pageno <= 1) {
											echo '#';
										} else {
											echo "?pageno=" . ($pageno - 1);
										} ?>"><strong style="padding-left: 10px">Prev</strong></a>
						</li>
						<li class="<?php if ($pageno >= $total_pages) {
										echo 'disabled';
									} ?>">
							<a href="<?php if ($pageno >= $total_pages) {
											echo '#';
										} else {
											echo "?pageno=" . ($pageno + 1);
										} ?>"><strong style="padding-left: 10px">Next</strong></a>
						</li>
						<li><a href="index.php?act=animals&pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
					</ul>
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