<?php get_header(); ?>
	<div class="container">
		<div class="intPage">
			<h1 class="mb-5">Latest News:</h1>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<div class="row">
				<div class="col-md-3 featImg">
					<figure>
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'medium', array( 'class' => 'img-thumbnail shadow' ) ); ?>
						</a>
					</figure>
				</div>
				<div class="col-md-9 articleExcerpt">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<small class="badge badge-success"><?php the_date(); ?></small>
					<div class="mb-5"><?php the_excerpt(); ?></div>
				</div>
			</div>
			<hr class="shadow" />
			<?php endwhile; else : ?>
				<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<?php echo api_inc_pagination(); ?>
		</div>
	</div>
<?php get_footer(); ?>
