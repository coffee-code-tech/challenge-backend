<?php
/**
 * WordPress AJAX Routes.
 * WARNING: Do not use \CoffeeCodeChallange::route()->all() here, otherwise you will override
 * ALL AJAX requests which you most likely do not want to do.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package CoffeeCodeChallange
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:ignore
\CoffeeCodeChallange::route()->get()->where( 'ajax', 'listar_produtos', true, true )->handle( 'Products@handle' );
