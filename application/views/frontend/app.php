<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<title>Training Studio - Free CSS Template</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/frontend/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/frontend/css/font-awesome.css">

	<link rel="stylesheet" href="<?= base_url() ?>/assets/frontend/css/templatemo-training-studio.css">

</head>

<body>

	<!-- ***** Preloader Start ***** -->
	<div id="js-preloader" class="js-preloader">
		<div class="preloader-inner">
			<span class="dot"></span>
			<div class="dots">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->


	<!-- ***** Header Area Start ***** -->
	<?php
	$this->load->view('frontend/layouts/navbar');
	?>
	<!-- ***** Header Area End ***** -->

	<?php
	if (!empty($content)) {
		$this->load->view($content);
	}
	?>

	<!-- ***** Footer Start ***** -->

	<?php
	$this->load->view('frontend/layouts/footer');
	?>

	<!-- jQuery -->
	<script src="<?= base_url() ?>/assets/frontend/js/jquery-2.1.0.min.js"></script>

	<!-- Bootstrap -->
	<script src="<?= base_url() ?>/assets/frontend/js/popper.js"></script>
	<script src="<?= base_url() ?>/assets/frontend/js/bootstrap.min.js"></script>
	<!-- Plugins -->
	<script src="<?= base_url() ?>/assets/frontend/js/scrollreveal.min.js"></script>
	<script src="<?= base_url() ?>/assets/frontend/js/waypoints.min.js"></script>
	<script src="<?= base_url() ?>/assets/frontend/js/jquery.counterup.min.js"></script>
	<script src="<?= base_url() ?>/assets/frontend/js/imgfix.min.js"></script>
	<script src="<?= base_url() ?>/assets/frontend/js/mixitup.js"></script>
	<script src="<?= base_url() ?>/assets/frontend/js/accordions.js"></script>
	<!-- Global Init -->
	<script src="<?= base_url() ?>/assets/frontend/js/custom.js"></script>
</body>

</html>