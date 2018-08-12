<?php
/**
 * Template Name: Projects Page Template
 *
 * @package WordPress
 * @subpackage Bone Dry WordPress Theme
 * 
 */
get_header(); ?>
	<div class="container">
		<div class="intPage">
			<h1 class="mb-4"><?php echo the_title(); ?></h1>
				<div class="col">
					<p>Here are some "on the job" pictures we have collected over the years that help visualize the type of work API performs. We love getting dirty to help you get clean!</p>
					<?php include get_template_directory() . '/lib/inc/projects-carousel.php'; ?>
				</div>
		</div>
	</div>
<?php get_footer(); ?>
