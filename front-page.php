<?php get_header(); ?>
	<section class="aboutExcerpt pt-2">
		<div class="container-fluid">
			<div class="col">
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
			<div class="homeDesk">
				<?php include get_template_directory() . '/lib/inc/cards.php'; ?>

			</div>
		</div>
	</main>
<?php get_footer(); ?>
