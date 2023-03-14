<?php

namespace CoffeeCodeChallange\Services;

use Automattic\WooCommerce\Client;

class Woocommerce {
	private const PRODUCTS_ENDPOINT = "products";
	private $woocommerce;

	private function __construct ($baseUrl, $clientId, $clientSecret) 
	{
		$this->woocommerce = new Client(
			$baseUrl,
			$clientId,
			$clientSecret,
			[
				'version' => 'wc/v3',
			]
		);
	}

	public static function connect (string $baseUrl, string $clientId, string $clientSecret): Woocommerce
	{
		return new WooCommerce($baseUrl, $clientId, $clientSecret);
	}

	public function listProducts ($arrayParams)
	{
		$response = array_map(function ($produto) {
			$obj = new \stdClass();
			$obj->id = $produto->id;
			$obj->title = $produto->name;
			$obj->description = $produto->description;
			$obj->price = $produto->price;
			$obj->type = $produto->type;
			$obj->imageUrl = $produto->images[0]->src;
			$obj->productLink = $produto->permalink;
			return $obj;
		}, $this->woocommerce->get(self::PRODUCTS_ENDPOINT, $arrayParams));
		return [
			'data' => $response,
			'total' => $this->woocommerce->http->getResponse()->getHeaders()['x-wp-total'],
			'totalPages' => $this->woocommerce->http->getResponse()->getHeaders()['x-wp-totalpages']
		];
	}
}
