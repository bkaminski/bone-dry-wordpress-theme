<?php get_header(); ?>
	<div class="container">
		<div class="intPage">
			<h1 class="mb-4"><?php echo the_title(); ?></h1>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<figure>
				<?php the_post_thumbnail( 'full', array( 'class' => 'mx-auto d-block img-thumbnail' ) ); ?>
						
				</figure>
				<main>

				<?php the_content(); ?>
				
				<br />
				</main>

				<?php the_tags('<span class="badge badge-primary mr-2">Related:</span> ' , ', ', ''); ?>

				<?php endwhile; else : ?>
					<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
		</div>
	</div>
<?php get_footer(); ?>
