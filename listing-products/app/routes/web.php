<?php

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
/**
 * Web Routes.
 * WARNING: Do not use \MyApp::route()->all() here, otherwise you will override
 * ALL web requests which you most likely do not want to.
 *
 * @link https://docs.wpemerge.com/#/framework/routing/methods
 *
 * @package MyApp
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

\MyApp::route()->get()->url( '/products/{paged?}' )->handle( function($request) {
  $url = $request->getRequestTarget();
  $parts = explode('/', $url);
  $paged = isset($parts[3]) ? $parts[3] : 1;
  $filteredArr = [];
  $productsPerPage = 3;

  function comparePrices($a, $b) {
    return $a['price'] - $b['price'];
  }

  $consumerKey = 'ck_a2bc55a8f39548ef61d9f2dd9cb51b2a0ef8f3eb';
  $consumerSecret = 'cs_20db47ddaf8ed0f9482e867a9643827da6717323';
  $siteUrl = 'https://challenge.homolog.tech/';
  $base64EncodedKeys = base64_encode($consumerKey . ':' . $consumerSecret);

  $productsEndpoint = $siteUrl . '/wp-json/wc/v3/products';

  $client = new Client();
  $request = new Request('GET', $productsEndpoint, [
    'Authorization' => 'Basic ' . $base64EncodedKeys,
    'Content-Type' => 'application/json'
  ]);
  $response = $client->sendRequest($request);
  $data = json_decode($response->getBody(), true);

  for($i=0;$i<count($data);$i++) {
    $filteredArr[$i] = [
      'id' => $data[$i]['id'],
      'title' => $data[$i]['name'],
      'description' => $data[$i]['description'],
      'price' => $data[$i]['price'],
      'type' => $data[$i]['type'],
      'imageUrl' => $data[$i]['images'][0]['src'],
      'productLink' => $data[$i]['permalink'],
      
    ];
  }

  usort($filteredArr, 'comparePrices');
  $productsPaged = array_slice($filteredArr, ($paged - 1) * $productsPerPage, $productsPerPage);

  echo json_encode($productsPaged, JSON_PRETTY_PRINT);

  exit();
});

// Using our ExampleController to handle the homepage, for example.
// phpcs:ignore

// If we do not want to hardcode a url, we can use one of the available route conditions instead.
// phpcs:ignore
// \MyApp::route()->get()->where( 'post_id', get_option( 'page_on_front' ) )->handle( 'ExampleController@home' );
