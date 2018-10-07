<?php get_header(); ?>
<div class="container">
	<div class="intPage">
		<div class="row">
			<header>
				<div class="col">
					<h1 class="mb-5 text-uppercase"><?php _e( '404: Page Not Found', 'bone_dry' ); ?></h1>
				</div>
			</header>
		</div>
		<div class="row mt-5">
			<div class="col-md-12 mb-4">
				<main>
					<h2><?php _e( 'Oops, something went wrong!', 'bone_dry' ); ?></h2>
					<p><?php _e( 'The page you are looking for has either been moved or deleted. Please choose an option from the above menu.', 'crafted_brew' ); ?>
						
					</p>
				</main>
				<br />
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
