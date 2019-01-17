		</div> <!-- #maincontent -->

		<footer id="mainfooter" class="container-fluid">

			<div id="footertop">

				<div class="site-width1200">

					<div class="row">

						<div class="col-md-12 no-padding">

							<?php if ( has_nav_menu( 'main' ) ) : ?>
							<nav class="mainnav" role="navigation">
								<?php wp_nav_menu( array( 'theme_location' => 'main', 'depth' => 1 ) ); ?>
							</nav>
							<?php endif; ?>

						</div>

					</div>

					<?php
					$facebook = get_field('facebook', 'options');
					$instagram = get_field('instagram', 'options');
					$pinterest = get_field('pinterest', 'options');
					$twitter = get_field('twitter', 'options');
					$phone = get_field('phone', 'options');
					$address = get_field('address', 'options');
					?>
					<div class="row">

						<div class="col-md-12">
							
						<?php if ($facebook) { ?><a href="<?php echo $facebook; ?>" class="social-icon" target="_blank"><i class="fa fa-facebook"></i></a><?php } ?>
						<?php if ($instagram) { ?><a href="<?php echo $instagram; ?>" class="social-icon" target="_blank"><i class="fa fa-instagram"></i></a><?php } ?>
						<?php if ($pinterest) { ?><a href="<?php echo $pinterest; ?>" class="social-icon" target="_blank"><i class="fa fa-pinterest"></i></a><?php } ?>
						<?php if ($twitter) { ?><a href="<?php echo $twitter; ?>" class="social-icon" target="_blank"><i class="fa fa-twitter"></i></a><?php } ?>

						</div>

					</div>
					<div class="row">
						
						<div class="col-md-12">
							
							<?php if ($phone) { ?>
							<a href="tel: <?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a><br>
							<?php } ?>
							<div class="border"></div>
							<?php if ($address) { ?>
							<span class="address"><?php echo $address; ?></span>
							<?php } ?>

						</div>

					</div>

				</div>

			</div>

			<div id="footerbottom">

				<div class="row">

					<div class="col-md-6 col-sm-6 col-xs-6 left">

						<p>&copy; <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>

					</div>

					<div class="col-md-6 col-sm-6 col-xs-6 right">

						<p>Website by <a href="mailto:<?php echo antispambot('joelkeane3@gmail.com'); ?>">Joel Keane.</a></p>

					</div>

				</div>

			</div>

		</footer> <!-- #mainfooter -->

	</div> <!-- #mainwrapper -->

<?php wp_footer(); ?>

</body>
</html>