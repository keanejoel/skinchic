<?php get_header(); ?>

	<div class="pagecontent">

		<section id="hero" class="container-fluid">

			<div class="row">

				<div class="hero-slides">

					<?php while ( have_rows('hero_slides') ) { the_row();
						$bg = get_sub_field('hero_bg');
						$bg_url = ($bg) ? $bg['url'] : false;
						$hero_txt = get_sub_field('hero_text');
						$txt_color = get_sub_field('hero_txt_color');
						$hero_btn = get_sub_field('hero_btn_link');
						$hero_btn_txt = get_sub_field('hero_btn_text');
					?>

					<div class="wrap parallax" style="background-image: url('<?php echo $bg_url; ?>');">

						<div class="col-md-4 col-md-offset-1">

							<div class="focas-table">

								<div class="cell">

									<?php if ($hero_txt) { ?>
										<h2 style="color:<?php echo $txt_color; ?>;"><?php echo $hero_txt; ?></h2>
									<?php } ?>

									<?php if ($hero_btn && $hero_btn_txt) { ?>
										<a href="<?php echo $hero_btn; ?>" class="skin-chic-btn peach <?php if ( !$hero_txt) { ?>mb<?php } ?>"><?php echo $hero_btn_txt; ?></a>
									<?php } ?>

								</div>

							</div>

						</div>

					</div>
					<?php } ?>

				</div>

			</div>

		</section>

		<script type="text/javascript">
		jQuery(function() {
			jQuery('.hero-slides').bxSlider({
				auto: true,
				pause: 5000,
				controls: false,
				touchEnabled: false,
			});
		});
		</script>

		<?php
		$image = get_field('treatment_image');
		$image_url = ($image) ? $image['url'] : false;
		$info = get_field('treatment_info');
		?>
		<section id="feat-treatment" class="container">

			<div class="row">

				<h2>Featured Treatment</h2>

			</div>

			<div class="row">

				<div class="col-md-6 image">

					<div class="inner">

						<div class="background-image" style="background-image: url('<?php echo $image_url; ?>');">

						</div>

					</div>

				</div>

				<div class="col-md-6 info">

					<div class="inner">

						<div class="focas-table">

							<div class="cell">

								<?php echo $info; ?>

							</div>

						</div>

					</div>

				</div>

				<div class="view-all">
					<a href="/book-now" class="skin-chic-btn peach">Schedule An Appointment</a>
					<div class="border"></div>
				</div>

			</div>

		</section>


		<section id="products" class="container">

			<div class="row">

				<h2>Products</h2>

			</div>

			<div class="row">

				<div class="product-slides">
					<!-- <?php
					if ( have_rows('products') ) :
						while ( have_rows('products') ) : the_row();
							$prod_image = get_sub_field('product_image');
							$prod_image_url = ($prod_image) ? $prod_image['url'] : false;
							$name = get_sub_field('product_name');
							$desc = get_sub_field('product_desc');
							$price = get_sub_field('product_price');
						?>

						<div class="col-md-4">

							<div class="product-bg" style="background-image: url('<?php echo $prod_image_url; ?>');"></div>
							<p><?php echo $name; ?></p>
							<p><?php echo $price; ?></p>

						</div>

					<?php
						endwhile;
					endif;
					?> -->

					<?php
						$args = array(
							'post_type' => 'product',
							'posts_per_page' => -1
							);
						$loop = new WP_Query( $args );
						if ( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();
							$price = get_post_meta( get_the_ID(), '_regular_price', true);
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>

							<div class="col-md-4">

								<a href="<?php the_permalink(); ?>" style="color: black;">
									<div class="product-bg" style="background-image: url('<?php echo $thumb['0'];?>')"></div>
									<p><?php the_title(); ?></p>

									<?php if ( is_user_logged_in() ) { ?>

										<?php if ($product->is_type('variable') ) { ?>
						                    <p>$<?php echo $product->get_variation_price('min') . ' - $' . $product->get_variation_price('max'); ?></p>
						                <?php } else { ?>
						                    <p>$<?php echo $product->get_price(); ?></p>
						                <?php } ?>

									<?php } ?>
								</a>

							</div>

							<?php
							endwhile;
						} else {
							echo __( 'No products found' );
						}
						wp_reset_postdata();
					?>
				</div>

				<div class="purchase">
					<a href="/shop" class="skin-chic-btn peach">Shop All Products</a>
					<div class="border"></div>
				</div>
				
				<?php if ( !is_user_logged_in() ) { ?>
					<em style="margin-top: 25px; display: inline-block;"><a href="/um-login">Login</a> or <a href="/register">Create an account</a> to view prices. </em>
				<?php } ?>

			</div>

		</section>

		<section id="testimonials" class="container">

			<div class="row">

				<div class="slides">
				<?php
				if ( have_rows('testimonials') ) :

					while ( have_rows('testimonials') ) : the_row();
						$test = get_sub_field('the_testimonial');
						$test_name = get_sub_field('testimonial_name'); ?>

						<div class="col-md-4">

							<div class="inner-testimonial">

								<div class="focas-table">

									<div class="cell">

										<?php echo $test; ?>
										<div class="border"></div>
										<p><?php echo $test_name; ?></p>

									</div>

								</div>

							</div>

						</div>

				<?php
					endwhile;
				endif;
				?>

				</div>
			</div>

		</section>

		<section id="signature" class="container">

			<div class="row">

				<div class="col-md-12">

					<a href="<?php the_field('instagram', 'options'); ?>" target="_blank">
					@the_skin_chic</a>

				</div>

			</div>

		</section>

	</div>

<?php get_footer(); ?>
