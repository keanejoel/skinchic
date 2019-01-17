<?php
// Template Name: Contact
get_header();
?>

	<div class="pagecontent container-fluid">


		<section id="pageheader">

			<div class="row">

				<div class="col-md-12">

					<div class="focas-table">

						<div class="cell">

							<div class="line-title">

								<h2>
									<span class="strike1"></span>
									<?php the_title(); ?>
									<span class="strike2"></span>
								</h2>

							</div>

						</div>

					</div>

				</div>

			</div>

		</section>

		<section id="form-map" class="container">

			<div class="site-width1200">

				<div class="row">

					<?php if ( is_page(59) ) { ?>
					<div class="col-md-6">

						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								the_content();
							endwhile;
						else :
							echo 'We\'re sorry, but the page you\'re looking for isn\'t available.';
						endif;
						?>

					</div>

					<div class="col-md-5 col-md-offset-1" id="map">

						<a href="<?php echo the_field('map_link'); ?>" target="_blank">
							<div class="map"></div>
						</a>

						<p><i class="fa fa-map-marker"></i><?php the_field('address', 'options'); ?></p>
						<p><i class="fa fa-envelope"></i> <a href="mailto:<?php echo antispambot(get_field('email', 'options')); ?>" class="mailto"><?php the_field('email', 'options'); ?></a></p>
						<p><i class="fa fa-phone"></i> <?php the_field('phone', 'options'); ?> </p>

					</div>

					<div class="row" style="text-align: center;">

						<div class="col-md-12">

							<h2 class="" style="margin-top: 35px;">SCHEDULE AN APPOINTMENT</h2>

							<?php the_field('booking_code'); ?>

						</div>

					</div>
					<?php } else { ?>

						<div class="col-md-12">

							<h2 class="">SCHEDULE AN APPOINTMENT</h2>

							<p style="color: red;">Note: Due to an abundant amount of last minute cancellations and no-shows, we now reserve the right to implement a non-refundable deposit of 50% of the entire service amount of any service over $50. If the service is not booked online then an invoice via Square can be emailed to you. This guarantees your appointment time and verifies that you are fully aware of the cancellation policy.</p>

							<?php the_field('booking_code'); ?>

						</div>

					<?php } ?>

				</div>

			</div>

		</section>

	</div> <!-- .pagecontent -->


<?php get_footer(); ?>
