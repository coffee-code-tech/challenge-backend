<?php
namespace App\Controllers;

use WP_Query;

class CustomProductListController {
    public function index() {
        $paged = isset( $_GET['paged'] ) ? intval( $_GET['paged'] ) : 1;
        $args = [
            'post_type' => 'product',
            'posts_per_page' => 5,
            'paged' => $paged,
            'orderby' => 'meta_value_num',
            'meta_key' => '_price',
            'order' => 'ASC',
        ];
        $query = new WP_Query( $args );

        $products = [];
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                $product = wc_get_product( get_the_ID() );

                $products[] = [
                    'id' => get_the_ID(),
                    'title' => get_the_title(),
                    'description' => get_the_excerpt(),
                    'price' => wc_price( $product->get_price() ),
                    'type' => $product->get_type(),
                    'imageUrl' => wp_get_attachment_url( get_post_thumbnail_id() ),
                    'productLink' => get_permalink(),
                ];
            }
        }
        wp_reset_postdata();

        header( 'Content-Type: application/json' );
        echo json_encode( $products );
        wp_die();
    }
}
