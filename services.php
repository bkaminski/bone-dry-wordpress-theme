<?php
/**
 * Template Name: Services Page Template
 *
 * @package WordPress
 * @subpackage Bone Dry WordPress Theme
 * 
 */
get_header(); ?>
	<div class="container">
		<div class="intPage">
			<h1><?php echo the_title(); ?></h1>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; else : ?>
					<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
            <div class="row">
			     <div class="col-lg card-deck mb-5">
                    <div class="card border-dark shadow">
                        <img class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/lib/img/mold-remediation-api.jpg" alt="Mold Remediation">
                            <div class="card-body">
                                <h5 class="card-title">Mold Remediation</h5>
                                <p class="card-text">Mold in your home or business is nothing to fool around with and API can help you make sure your home or business is as safe and healthy as possible.</p>
                            </div>
                            <div class="card-footer">
                                <a href="mold-remediation/" class="btn btn-api">Read More <i class="fas fa-angle-double-right ml-2"></i></a>
                            </div>
                    </div>
                    <div class="card border-dark shadow">
                        <img class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/lib/img/kitchen-exhaust-system-cleaning-maintenance-api.jpg" alt="Kitchen Exhaust System Cleaning and Maintenance">
                            <div class="card-body">
                                <h5 class="card-title">Kitchen Exhaust System Cleaning and Maintenance</h5>
                                <p class="card-text">Each year over 11,000 structure fires are reported by eating and drinking establishments, resulting in millions of dollars in damage.</p>
                            </div>
                            <div class="card-footer">
                                <a href="kitchen-exhaust-system-cleaning/" class="btn btn-api">Read More <i class="fas fa-angle-double-right ml-2"></i></a>
                            </div>
                    </div>
                    <div class="card border-dark shadow">
                        <img class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/lib/img/pressure-washing-steam-cleaning-api.jpg" alt="Pressure Washing and Steam Cleaning">
                            <div class="card-body">
                                <h5 class="card-title">Pressure Washing and Steam Cleaning</h5>
                                <p class="card-text">When a little elbow grease just won't do it, pressure washing is the way to go.</p>
                            </div>
                            <div class="card-footer">
                                <a href="pressure-washing-steam-cleaning/" class="btn btn-api">Read More <i class="fas fa-angle-double-right ml-2"></i></a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg card-deck mb-5">
                    <div class="card border-dark shadow">
                        <img class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/lib/img/water-damage-api.jpg" alt="Water Damage">
                            <div class="card-body">
                                <h5 class="card-title">Water Damage</h5>
                                <p class="card-text">Water Damage can strike at any time and usually when you least expect it.  Whether your water damage situation is from flood waters courtesy of Mother Nature, or broken water lines and faulty plumbing...</p>
                            </div>
                            <div class="card-footer">
                                <a href="water-damage/" class="btn btn-api">Read More <i class="fas fa-angle-double-right ml-2"></i></a>
                            </div>
                    </div>
                    <div class="card border-dark shadow">
                        <img class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/lib/img/commercial-air-duct-maintenance-api.jpg" alt="Commercial Air Duct Maintenance">
                            <div class="card-body">
                                <h5 class="card-title">Commercial Air Duct Maintenance</h5>
                                <p class="card-text">A productive business usually means a healthy environment. Keep your business productive and healthy with superior indoor air quality.</p>
                            </div>
                            <div class="card-footer">
                                <a href="air-duct-cleaning/" class="btn btn-api">Read More <i class="fas fa-angle-double-right ml-2"></i></a>
                            </div>
                    </div>
                    <div class="card border-dark shadow">
                        <img class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/lib/img/environmental-services-api.jpg" alt="Environmental Services">
                            <div class="card-body">
                                <h5 class="card-title">Environmental Services</h5>
                                <p class="card-text">When it comes to the environment, everyone is talking. What's the right thing to do and how does it all effect you and your family?</p>
                            </div>
                            <div class="card-footer">
                                <a href="environmental-services/" class="btn btn-api">Read More <i class="fas fa-angle-double-right ml-2"></i></a>
                            </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
<?php get_footer(); ?>
