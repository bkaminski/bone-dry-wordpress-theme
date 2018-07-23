<?php get_header(); ?>
	<section class="aboutExcerpt pt-2 mb-4">
		<div class="container-fluid">
			<div class="col">
				<img class="d-none d-md-block mx-auto img-fluid mt-4" src="<?php echo get_template_directory_uri(); ?>/lib/img/api-logo-trans.png" alt="Aqua Pro Incorporated" style="margin-top:-12px;" />
				<h1 class="text-center mobileHeading text-white">Aqua Pro, Inc. (API) is a full service cleaning company specializing in various cleaning services for residential, commercial and industrial clients.</h1>
			</div>
		</div>
	</section>
	<main>
		<div class="container-fluid">
			<!-- mobile view -->
			<div class="mobileHome">
				<?php include get_template_directory() . '/lib/inc/mobile-icons.php'; ?>

			</div>
			<!-- desktop view -->
			<div class="container homeDesk mt-4">
				<div class="d-none d-md-block col text-center text-white">
					<h2>Our Services:</h2>
				</div>
				<?php include get_template_directory() . '/lib/inc/cards.php'; ?>

			</div>
		</div>
		<div class="d-none d-md-block col text-center text-white">
			<h2>Our Location:</h2>
		</div>
		<div class="d-none d-md-block embed-responsive embed-responsive-16by9">
			<iframe class="embed-resopnsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3089.0806731405055!2d-75.58669604876249!3d39.26373613277062!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c7708d383ad65d%3A0x79d3c60112aa557f!2sAqua+Pro+Inc+(API)!5e0!3m2!1sen!2sus!4v1532361016937"></iframe>
		</div>
	</main>
<?php get_footer(); ?>
