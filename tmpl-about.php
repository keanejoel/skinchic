<?php
// Template Name: About Page
get_header();
?>

	<div class="pagecontent">

		<section id="pageheader" class="container-fluid">
			
			<div class="row">
				
				<div class="col-md-12">

					<div class="focas-table">
						
						<div class="cell">
							
							<div class="line-title">

								<h2>
									<span class="strike1"></span>
									<?php the_field('header_title'); ?>
									<span class="strike2"></span>
								</h2>

							</div>

						</div>

					</div>

				</div>

			</div>

		</section>
		
		<section id="about" class="container">

			<?php
			$img = get_field('about_image');
			$img_url = ($img) ? $img['url'] : false;
			$quote = get_field('quote');
			?>
			<div class="row">
				
				<div class="inner col-md-12">
					
					<div class="col-md-6 content">

						<div class="focas-table">

							<div class="cell">

								<h3><?php echo $quote; ?></h3>
								<span class="name"> - Kristen Myers</span>

							</div>

						</div>

					</div>

					<div class="col-md-6 image" style="background-image: url('<?php echo $img_url; ?>');">
						
					</div>

				</div>

			</div>

			<div class="row bio">

				<?php the_field('bio'); ?>

				<div class="sig-wrapper">
					
					<a href="<?php the_field('instagram', 'options'); ?>" target="_blank" class="signature">
				@the_skin_chic</a>	

				</div>
				
			</div>

		</section>

	</div>

<?php get_footer(); ?>