<?php
/***** WOOCOMMERCE *****/

    //remove woocommerce tabs from single product page
    function change_single_items_on_single_pages () {
        if(is_single() && is_product()) {
            //remove items
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
        }
    }
    add_action( 'woocommerce_before_single_product', 'change_single_items_on_single_pages' );

    function do_the_content() {
        if (get_the_content()) {
            echo '<div class="the-content">';
            echo '<h2>DESCRIPTION</h2>';
            the_content();
            echo '</div>';
        }
    }

    function mytheme_add_woocommerce_support() {
  	add_theme_support( 'woocommerce', array(
  		'thumbnail_image_width' => 150,
  		'single_image_width'    => 300,

          'product_grid'          => array(
              'default_rows'    => 3,
              'min_rows'        => 2,
              'max_rows'        => 8,
              'default_columns' => 4,
              'min_columns'     => 2,
              'max_columns'     => 5,
          ),
  	) );
  }
  add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

    //move the_content to the short description
    // remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    // add_action( 'woocommerce_single_product_summary', 'do_the_content', 30 );

    // Remove Showing results functionality site-wide
    function woocommerce_result_count() {
            return;
    }

    function get_simple_or_variable_price($product) {
        //$currency = get_woocommerce_currency();
        $currency = get_woocommerce_currency_symbol();
        if($product->is_type('variable')) {
            if($product->get_variation_price('min') != $product->get_variation_price('max')) {
                $price_range = $product->get_variation_price('min');
                $price_range .= ' - ' .$currency .$product->get_variation_price('max');
            } else {
                $price_range = $product->get_variation_price('min');
            }
        } else {
            $price_range = $product->get_price();
        }
        if(1 !== preg_match('~[0-9]~', $price_range)){
            $price_range = false;
        }
        return $price_range;
    }

    add_filter('woocommerce_variable_price_html', 'custom_variation_price', 10, 2);
    function custom_variation_price( $price, $product ) {
        $available_variations = $product->get_available_variations();
        $selectedPrice = '';
        $dump = '';

        foreach ( $available_variations as $variation )
        {
            // $dump = $dump . '<pre>' . var_export($variation['attributes'], true) . '</pre>';

            $isDefVariation=false;
            foreach($product->get_default_attributes() as $key=>$val){
                // $dump = $dump . '<pre>' . var_export($key, true) . '</pre>';
                // $dump = $dump . '<pre>' . var_export($val, true) . '</pre>';
                if($variation['attributes']['attribute_'.$key]==$val){
                    $isDefVariation=true;
                }
            }
            if($isDefVariation){
                $price = $variation['display_price'];
            }
        }
        $selectedPrice = wc_price($price);

    //  $dump = $dump . '<pre>' . var_export($available_variations, true) . '</pre>';

        return $selectedPrice . $dump;
    }

    function get_detailed_or_product_url($post_id) {
        $related_posts = get_posts(array(
            'post_type' => 'product-details', //post type from related post.
            'meta_query' => array(
                array(
                    //custom field from related post, that has this post selected.  May return post object or ID.
                    'key' => 'woocommerce_product',
                    'value' => '"' . $post_id . '"', //this posts id, needs extra quotes.
                    'compare' => 'LIKE'
                )
            )
        ));
        $new_post_id = false;
        if($related_posts) {
            $new_post_id = $related_posts[0]->ID;
        } else {
            $new_post_id = $post_id;
        }
        return get_the_permalink($new_post_id);
    }

    add_filter( 'woocommerce_get_price_html', function( $price, $product ) {
    	if ( is_admin() ) return $price;
    	// Hide for these category slugs / IDs
    	$hide_for_categories = array( 'environ', 'dmk' );
    	// Don't show price when its in one of the categories
    	if ( has_term( $hide_for_categories, 'product_cat', $product->get_id() ) ) {
    		return '';
    	}
    	return $price; // Return original price
    }, 10, 2 );
    add_filter( 'woocommerce_cart_item_price', '__return_false' );
    add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );

    // Copy from below here
    add_filter( 'woocommerce_get_price_html', function( $price ) {
    	if ( ! is_user_logged_in() ) {
    		return '';
    	}
    	return $price; // Return original price
    } );
    add_filter( 'woocommerce_cart_item_price', '__return_false' );
    add_filter( 'woocommerce_cart_item_subtotal', '__return_false' );

?>
