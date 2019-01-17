<?php
// Template Name: FAQ
get_header();
?>

	<div class="pagecontent">
		
		<section id="FAQ" class="container">
			
			<div class="row">
				
				<div class="col-md-12">

					<div class="line-title">

						<h2>
							<span class="strike1"></span>
							<?php the_title(); ?>
							<span class="strike2"></span>
						</h2>

					</div>

				</div>

			</div>

			<?php
			if ( have_rows('faqs') ) :
				$i =1; ?>
			<div class="row the-questions">
				
				<?php
				while ( have_rows('faqs') ) : the_row();
					$question = get_sub_field('question');
					$answer = get_sub_field('answer');
				?>

				<div id="q-<?php echo $i; ?>" class="col-md-4 questions">

					<div class="inner">

						<!-- <div class="focas-table"> -->
							
							<!-- <div class="cell"> -->

								<h3><?php echo $question; ?></h3>
								<div class="content-wrapper">
									<div class="border"></div>
									<?php echo $answer; ?>
								</div>

							<!-- </div> -->

						<!-- </div> -->

					</div>

				</div>

				<?php
				$i++;
				endwhile;
				?>

			</div>
			<?php
			endif; ?>

		</section>

	</div>

<?php get_footer(); ?>