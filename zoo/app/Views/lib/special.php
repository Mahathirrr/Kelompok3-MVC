<div class="specials-section">
	<div class="container">
		<div class="specials-grids">

			<div class="col-md-4 specials1">
				<h3> details</h3>
				<ul>
					<li><a href="about.php">About Us</a></li>
					<li><a href="index.php">Home</a></li>
					<li><a href="contact.php">Contact</a></li>
					<li><a href="admin/index.php">Admin</a></li>
				</ul>
			</div>
			<div class="col-md-4 specials1">
				<h3>contact</h3>
				<?php
				$query = $data->query("select * from  tblpage where PageType='contactus'");
				?>
				<?php if ($query) : ?>
					<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)) : ?>
						<address>
							<p>Email : <?php echo $row['Email']; ?></p>
							<p>Phone : <?php echo $row['MobileNumber']; ?></p>
							<p><?php echo $row['PageDescription']; ?></p>
						</address>
					<?php endwhile; ?>
				<?php else : ?>
					Error: <?php echo $data->error; ?>
				<?php endif; ?>


			</div>
			<div class="col-md-4 specials1">
				<h3>social</h3>
				<ul>
					<li><a href="#">facebook</a></li>
					<li><a href="#">twitter</a></li>
					<li><a href="#">google+</a></li>
					<li><a href="#">vimeo</a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>