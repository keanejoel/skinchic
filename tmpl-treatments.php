<?php
// Template Name: Treatments
get_header();
?>

	<div class="pagecontent">
			
		<?php
		$bg = get_field('header_bg');
		$bg_url = ($bg) ? $bg['url'] : false;
		?>
		<?php if ( $bg ) { ?>
		<section id="pageheader" style="background-image: url('<?php echo $bg_url; ?>');" >
		<?php } else { ?>
		<section id="pageheader" style="background-image: url('/wp-content/themes/theskinchic/img/pageheader-bg.jpg');" >
		<?php } ?>

			<div class="container-fluid">

				<div class="site-width1200">

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

				</div>

			</div>
		</section>

		<?php if ( get_field('intro_content') ) { ?>
		<section id="intro" class="container">
				
			<div class="row">
				
				<div class="col-md-12">
					
					<?php the_field('intro_content'); ?>

				</div>

			</div>

		</section>
		<?php } ?>


		<?php if ( have_rows('services') ) : ?>
		<section id="services" class="container-fluid">
			
			<div class="site-width1300">

				<div class="row">

					<div class="col-md-12">
						
						<div class="line-title">

							<h2>
								<span class="strike1"></span>
								Services
								<span class="strike2"></span>
							</h2>

						</div>

					</div>

					<?php
					while ( have_rows('services') ) : the_row();
						$name = get_sub_field('service_name');
						//$price = get_sub_field('service_price');
						$extra = get_sub_field('extra_details');
					?>

					<div class="col-md-4 service-box">

							<div class="service-inner">
								
								<div class="focas-table">
									
									<div class="cell">
										
										<h2><?php echo $name; ?></h2>

										<div class="border"></div>

										<?php if ( have_rows('service_price') ) { ?>
											<?php while ( have_rows('service_price') ) { the_row();
												$price = get_sub_field('price'); ?>

												<p class="price"><?php echo $price; ?></p>

											<?php } ?>
										<?php } ?>

										<?php if ( $extra ) { ?>
											<?php echo $extra ?>
										<?php } ?>

									</div>

								</div>

							</div>

						</div>

					<?php
					endwhile;
					?>

				</div>

			</div>

			<a href="/book-now" class="skin-chic-btn">Book A Consultation Now</a>
		</section>
		<?php endif; ?>

		<?php if (get_field('why_dmk') )  { ?>

		<section id="why-dmk" class="container">

			<p class="read-more"><em>For more detailed service descriptions, please continue reading below.</em></p>
			
			<div class="row">
				
				<div class="col-md-12">
					
					<div class="the-content">
						<?php the_field('why_dmk'); ?>
					</div>

					<a href="/book-now" class="skin-chic-btn">Book A Consultation Now</a>

				</div>

			</div>

		</section>
		<?php } ?>

	</div>


<?php get_footer(); ?>