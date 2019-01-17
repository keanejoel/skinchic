<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php if ($GLOBALS['mobile']) { ?><meta name="viewport" content="width=device-width" /><?php echo "\n"; } ?><link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- FAVICON -->
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.png" />

	<!--  Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mukta:800" rel="stylesheet">

	<!-- load tweenmax here -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>

	<!-- load jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

	<meta name="google-site-verification" content="pyEPPcXBXwTKWPmLc6zTkasuaBXk53KkLTBN9BldJMw" />

<!-- WP Head Info -->
<?php wp_head(); ?>
<!-- End WP Head Info -->
</head>

<body <?php body_class(); ?>>

	<div class="parent-app container-fluid">

		<div class="row">

			<div class="panel-1 col-md-12">
				<div class="focas-table">
					
					<div class="cell">

						<ul class="cta">
							<li>
								<a href="https://theskinchic.com/glow">Glow on the Go.</a>
							</li>

							<li>
								<a href="https://theskinchic.com/shop">Shop.</a>
							</li>

							<li>
								<a href="https://theskinc.com">The Skin Chic.</a>
							</li>
						</ul>
					

						<div class="w1">Get.</div>
						<div class="w2">Your.</div>
						<div class="w3">Glow.</div>
						<div class="w4">On.</div>

						<h1>Get Your Glow On.</h1>

						<span class="down-arrow" id="cta"><img class="bounce" src="<?php echo get_stylesheet_directory_uri(); ?>/img/angle-down.png" alt="angle-down" /></span>

					</div>

				</div>

				<div class="box-1"></div>

				<div class="box-2">
					<p>our glow</p>
				</div>

			</div><!-- .sub-panel-1 -->

			<div class="panel-2">
				<div class="focas-table">
					<div class="cell">
						<div class="col-md-6">
							<div class="box-3">
								<p class="shimmer">Beauty in a flash.</p>
							</div>
						</div>
						<div class="col-md-6">
							<p class="description">Four effective treatments in 50 mins: $100</p>
							<p class="description">Dermatological grade express facials… No nonsense, only results-driven facial treatments.</p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div> <!-- .parent-app -->

	<div id="mainwrapper">

		<nav id="mobilenav" class="container-fluid">
			<div id="mobilenav_wrapper">
				<div class="row">
					<div class="col-md-12">
						<div class="focas-table">
							<div class="mainlogo">
								<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new-logo.png" alt="<?php bloginfo('name'); ?>" /></a>
							</div>
							<div class="link">
								<a href="#" id="mobilebutton"><i class="fa fa-bars"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="mobile-menu" class="container-fluid" style="display: none;">
				<div class="row">
					<div class="col-md-12 no-padding">
						<nav class="mainnav">
							<div class="menu-right-main-menu-container">
								<ul id="menu-right-main-menu-mobile" class="menu">
									<?php
									if (get_field('facebook', 'options')) {echo '<li class="menu-item menu-item-type-social"><a class="mobile-top-social" href="' . get_field('facebook', 'options') . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';}
									if (get_field('instagram', 'options')) {echo '<li class="menu-item menu-item-type-social"><a class="mobile-top-social" href="' . get_field('instagram', 'options') . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';} ?>
									<li class="menu-item menu-item-type-social"><a href="/cart" class="mobile-top-social"><i class="fa fa-shopping-cart"></i></a></li><br><?php
									if ( get_field('phone', 'options') ) { ?>
										<li class="menu-item menu-item-type-social"><a href="tel:<?php the_field('phone', 'options') ?>"><?php the_field('phone', 'options'); ?></a></li>
									<?php }
									?>
								</ul>
							</div>
						</nav>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 no-padding">
						<?php wp_nav_menu(array('theme_location' => 'main')); ?>
					</div>
				</div>
			</div>
		</nav>
		<script>
			jQuery('#mobilebutton').click(function(e) {
				e.preventDefault();
				jQuery('#mobile-menu').slideToggle(
					'fast'
				);
			});
		</script>

		<header id="mainheader" class="container-fluid">
			<div class="row">
				<div id="mainlogo" class="col-lg-3">
					<h1><?php bloginfo( 'name' ); ?></h1>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/new-logo.png" alt="<?php bloginfo( 'name' ); ?>" /></a>
				</div>
				<div class="col-lg-6">
					<?php if ( has_nav_menu( 'main' ) ) : ?>
					<nav class="mainnav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'main', 'depth' => 1 ) ); ?>
					</nav>
					<?php endif; ?>
				</div>
				<div class="col-lg-3">
					<ul class="social-icons">
						<?php
						if ( get_field('facebook', 'options') ) {echo '<li class="icon"><a href="' . get_field('facebook', 'options') . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';}
						if ( get_field('instagram', 'options') ) {echo '<li class="icon"><a href="' . get_field('instagram', 'options') . '" target="_blank"><i class="fa fa-instagram"></i></a></li>';} ?>
						<li class="icon cart"><a href="/cart"><i class="fa fa-shopping-cart"></i></a></li><?php
						if ( get_field('phone', 'options') ) { ?>
							<li class="icon phone"><a href="tel:<?php the_field('phone', 'options') ?>"><?php the_field('phone', 'options'); ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</header> <!-- #mainheader -->

		<div id="maincontent">
