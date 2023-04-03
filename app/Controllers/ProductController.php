<?php
namespace App\Controllers;

use Automattic\WooCommerce\Client;
use WP_Query;

class ProductController {

    public function index() { 
        // Autenticação
        $woocommerce = new Client(
            'https://challenge.homolog.tech',
            'ck_a2bc55a8f39548ef61d9f2dd9cb51b2a0ef8f3eb',
            'cs_20db47ddaf8ed0f9482e867a9643827da6717323',
            [
                'wp_api' => true,  
                'version' => 'wc/v3',
            ]
        );

        // Query para buscar produtos
        $products = $woocommerce->get('products', [
            'per_page' => 5,
            'page' => (int) $_GET['paged'] ?: 1,
            'orderby' => 'price',
            'order' => 'asc',
        ]);

        // Formatar produtos
        $formatted_products = array_map(function($product) {
            return [
                'id' => $product->id,
                'title' => $product->name,
                'description' => $product->short_description,
                'price' => $product->price,
                'type' => $product->type,
                'imageUrl' => $product->images[0]->src,
                'productLink' => $product->permalink,
            ];
        }, $products);

        // Retornar produtos como JSON
        wp_send_json($formatted_products);
    }

}
?>