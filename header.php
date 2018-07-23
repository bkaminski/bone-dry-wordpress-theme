<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<nav class="navbar navbar-expand-md fixed-top" style="background:#2f4858;">
			<a class="navbar-brand" href="<?php echo get_home_url(); ?>">
				<img alt="Aqua Pro Incorporated" src="<?php echo get_template_directory_uri(); ?>/lib/img/api-nav-logo.png" class="mr-3" />
				<span class="apiName text-uppercase"><?php echo get_bloginfo('name'); ?></span>
			</a>
			<?php if ( is_front_page() ) {
    		echo '';
			} else {
    		echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars fa-2x"></i>
			</button>';
			};?>
			
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => '',
					'container_class'   => '',
					'container_id'      => '',
					'menu_class'        => 'navbar-nav ml-auto',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>
			</div>
		</nav>
		<aside>
		<div class="subHeader">
			<div class="container">
				<p class="text-center pt-4 h6 text-white">
					<strong>Call Us Today! <a href="tel:302.659.6953"><u>302-659-6593</u></a> Or Call Us Toll Free At <a href="tel:877.278.2776"><u>1-877-AQUAPRO</u></a></strong> 
				</p>
			</div>
		</div>
	</aside>
