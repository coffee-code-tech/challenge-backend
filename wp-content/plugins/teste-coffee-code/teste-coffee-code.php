<?php
/*
Plugin Name: Teste Coffee Code
Description: Plugin cria rotas personalizadas para listar produtos
Version: 1.0.1
Author: Igor Fonseca
*/

require_once __DIR__ . '/vendor/autoload.php';

use WPEmerge\Plugin;
use WPEmerge\Request;
use WPEmerge\Routing\Route;
use WPEmerge\ServiceProviders\ServiceProviders;
use WPEmerge\Views\View;

add_action( 'init', function () {
    $plugin = new Plugin( __FILE__ );
    $plugin->setServiceProviders( function ( ServiceProviders $service_providers ) {
        $service_providers->view();
    } );

    $plugin->router()->get( '/custom-products', function ( Route $route, Request $request ) {
        $paged = $request->input( 'paged', 1 );
        $per_page = 5;

        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $per_page,
            'paged'          => $paged,
            'orderby'        => 'meta_value_num',
            'meta_key'       => '_price',
            'order'          => 'asc',
        );

        $query = new WP_Query( $args );

        $products = array();
        foreach ( $query->posts as $product ) {
            $product_data = array(
                'id'          => $product->ID,
                'title'       => get_the_title( $product->ID ),
                'description' => get_the_excerpt( $product->ID ),
                'price'       => wc_get_product( $product->ID )->get_price(),
                'type'        => wc_get_product( $product->ID )->get_type(),
                'imageUrl'    => get_the_post_thumbnail_url( $product->ID, 'full' ),
                'productLink' => get_permalink( $product->ID ),
            );
            $products[] = $product_data;
        }

        wp_reset_postdata();

        header( 'Content-Type: application/json' );
        echo json_encode( $products );
        die();
    } );
} );