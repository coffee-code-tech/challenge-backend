<?php
/* 
Plugin Name: Coffeecode Woo
*/

use App\Controllers\ProductController;

add_action( 'wpemerge.init', function() {

    // Cria uma rota para listar os produtos em ordem de preço crescente 
    add_action( 'wpemerge.routes', function( $routes ) {
        $routes->get( '/products', [ProductController::class, 'index'] );
    } );

} );

?>