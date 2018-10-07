<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123605891-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-123605891-1');
		</script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, minimal-ui">
		<meta name="msvalidate.01" content="E4F5FA02C51943257359F1B364428943" />
		<meta name="yandex-verification" content="a684c8cce0f9960e" />
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/lib/img/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/lib/img/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/lib/img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/lib/img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/lib/img/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/lib/img/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/lib/img/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">
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
				<p class="text-center pt-4 h6 text-white callToday">
					<strong>Call Us Today! <a href="tel:302.659.6953"><u>302-659-6593</u></a> Or Call Us Toll Free At <a href="tel:877.278.2776"><u>1-877-AQUAPRO</u></a></strong> 
				</p>
			</div>
		</div>
	</aside>
