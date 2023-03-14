<?php

namespace CoffeeCodeChallange\Controllers\Ajax;

use WPEmerge\Requests\Request;
use WPEmerge\View\ViewInterface;
use CoffeeCodeChallange\Services\Woocommerce;

class Products {

	private const BASE_ENDPOINT = "https://challenge.homolog.tech";
	/**
	 * Handle the param.
	 *
	 * @param Request        $request
	 * @param string         $view
	 * @return ViewInterface
	 */
	public function handle( Request $request, $view ) {
		$woocommerce = Woocommerce::connect(
			self::BASE_ENDPOINT,
			'ck_a2bc55a8f39548ef61d9f2dd9cb51b2a0ef8f3eb',
			'cs_20db47ddaf8ed0f9482e867a9643827da6717323'
		);  

		$array_params = [
			'per_page' => empty($request->query('per_page')) ? 5 : $request->query('per_page'),
			'order' => empty($request->query('per_page')) ? 'desc' : $request->query('order'),
			'orderby' => empty($request->query('orderby')) ? 'price' : $request->query('orderby'),
			'page' => empty($request->query('page')) ? 1 : $request->query('page')
		];	

		return \CoffeeCodeChallange::json( $woocommerce->listProducts($array_params) );
	}
}
