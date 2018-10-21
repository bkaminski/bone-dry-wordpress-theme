<?php get_header(); ?>
	<div class="container">
		<div class="intPage">
			<h1 class="mb-4"><?php echo the_title(); ?></h1>
			<?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox"]'); ?>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<figure>
					<?php the_post_thumbnail( 'medium', array( 'class' => 'img-thumbnail aligncenter mt-4 shadow' ) ); ?>
						
				</figure>
				<main>
				<small class="badge badge-success mt-3"><?php the_date(); ?></small>
				<br />
				<small>By: <?php the_author(); ?></small>
				<?php the_content(); ?>
				
				</main>
				<br />
				<?php endwhile; else : ?>
					<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>

					<h3 class="alert alert-info"><u>Related Articles</u>:</h3>
					<div class="row">
						<?php query_posts('orderby=rand&cat=1&posts_per_page=3'); if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

							<div class="col-lg card-deck mb-5">
								<div class="card border-info shadow">
									<figure class="boxImg">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail( 'small', array( 'class' => 'card-img-top' ) ); ?>

										</a>
								
									</figure>
									<div class="card-body">
										<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
										<?php the_excerpt(); ?>
									</div>
								</div>
		      				</div>
		      			<?php endwhile; ?> <?php wp_reset_query(); ?>

		      		</div>
      			<?php echo do_shortcode('[addthis tool="addthis_inline_share_toolbox"]'); ?>

      			<br />
      			<br />
				<?php the_tags('<span class="badge badge-primary mr-2">Related:</span> ' , ', ', ''); ?>
		</div>
	</div>
<?php get_footer(); ?>
