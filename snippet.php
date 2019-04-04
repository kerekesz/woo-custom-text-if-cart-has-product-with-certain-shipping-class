add_action( 'woocommerce_cart_totals_before_shipping', 'cart_has_product_with_shipping_class', 10 );

function cart_has_product_with_shipping_class() {

  // Get $product object from Cart object
  
  $cart = WC()->cart->get_cart();

  foreach( $cart as $cart_item ){

      $product = wc_get_product( $cart_item['product_id'] );

      // Now you have access to (see above)...

      $terms = get_the_terms( $product->get_id(), 'product_shipping_class' );
      if ( $terms ) {
          foreach ( $terms as $term ) {
              $_shippingclass = $term->slug;
              if ( $_shippingclass === 'add_shipping_class_slug_here') { // Add your certain shipping class here
                  
                  // Our Shipping Class is in cart, do something!
                  
            }
         }
      }
   }
}
