<?php get_header(); ?>

			<div class="pagecontent container-fluid">
				<div class="row">
					<div class="col-lg-12">
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
				</div>
			</div> <!-- .pagecontent -->

<?php get_footer(); ?>