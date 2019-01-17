<?php get_header(); ?>

<div class="pagecontent">

  <section id="pageheader" class="container-fluid">

    <div class="row">

      <div class="col-md-12">

        <div class="focas-table">

          <div class="cell">

            <div class="line-title">

              <h2>
                <span class="strike1"></span>
                Shop
                <span class="strike2"></span>
              </h2>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

  <section id="products" class="container-fluid">

    <div class="row">
        <div class="products">

            <?php if ( !is_user_logged_in() ) { ?>
                <div class="col-md-12" style="text-align: center;">
                    <em style="margin-top: 25px; margin-bottom: 50px; display: inline-block;">Please <a href="/um-login">login</a> or <a href="/register">create an account</a> to view prices.</em>
                </div>
            <?php } ?>
        	<?php
        		$args = array(
        			'post_type' => 'product',
        			'posts_per_page' => -1
        			);
        		$loop = new WP_Query( $args );
        		if ( $loop->have_posts() ) {
        			while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <?php
                    global $product;
                    $price = get_post_meta( get_the_ID(), '_regular_price', true);
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                    $id = $product->get_id();
                    ?>

                      <a href="<?php the_permalink(); ?>">
                        <div id="post" class="col-md-4 col-sm-6" style="background-image: url('<?php echo $thumb['0'];?>')">
                          <div class="focas-table">
                            <div class="cell">
                              <p><?php the_title(); ?></p>
                              <!-- <p>$<?php echo get_simple_or_variable_price( $product ); ?></p> -->
                                <?php if ( is_user_logged_in() ) { ?>

                                  <?php if ( $product->is_type('variable') ) { ?>
                                      <p><?php echo '$' .$product->get_variation_price('max'); ?></p>
                                  <?php } else { ?>
                                    <?php if ( $id === 354 || $id === 415 || $id === 408 || $id === 379 ) { ?>
                                        <p></p>
                                    <?php } else { ?>
                                        <p><?php echo '$' .$price; ?></p>
                                    <?php } ?>

                                <?php } ?>

                              <?php } ?>
                            </div>
                          </div>
                        </div>
                      </a>

        			<? endwhile;
        		} else {
        			echo __( 'No products found' );
        		}
        		wp_reset_postdata();
        	?>
        </div><!--/.products-->
    </div>

  </section>

</div>

<?php get_footer(); ?>
