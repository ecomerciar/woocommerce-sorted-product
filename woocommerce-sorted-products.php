<?php

/*
Plugin Name: Sorted products
Plugin URI: http://ecomerciar.com
Description: Integracion de Woocommerce que muestra los productos ordenados por stock en la tienda
Version: 1.0
Author: Ecomerciar
Author URI: http://ecomerciar.com
License: GPL2
*/

add_filter('woocommerce_get_catalog_ordering_args', 'am_woocommerce_catalog_orderby', 1);
function am_woocommerce_catalog_orderby( $args ) {
	if(! current_user_can('administrator')){
        $args['meta_key'] = '_stock_status';
        $args['orderby'] = 'meta_value total_sales';
        $args['order'] = 'ASC'; 
    }
    return $args;
}