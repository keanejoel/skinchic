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
              <?php the_title(); ?>
              <span class="strike2"></span>
            </h2>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>

<section id="the-product" class="container-fluid woocommerce">

<?php if ( !is_user_logged_in() ) { ?>
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <em style="margin-top: 25px; margin-bottom: 50px; display: inline-block;"><a href="/um-login">Login</a> or <a href="/register">Create an account</a> to view prices.</em>
        </div>
    </div>
<?php } ?>

<div class="row product">

  <div class="col-md-12">
      <?php while ( have_posts() ) : the_post(); ?>

        <?php
            wc_get_template_part( 'content', 'single-product' );
        ?>

      <?php endwhile; // end of the loop. ?>
    </div>

</div>

</section>

</div>


<?php get_footer(); ?>
