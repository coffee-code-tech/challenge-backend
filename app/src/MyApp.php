<?php

use WPEmerge\Application\ApplicationTrait;

/**
 * @mixin \WPEmergeAppCore\Application\ApplicationMixin
 */
class MyApp {
	use ApplicationTrait;

	public function __construct() {

		add_action('rest_api_init', array($this, 'register_routes'));

		add_filter('template_include', function ($page_template) {

			if (is_page($this->page_title)) {

				$page_template = dirname(__FILE__) . '\..\..\views\page-external-product-listing.php';
			}
			return $page_template;
		});
	}

	/**
	 * Register REST Endpoint
	 */

	public function register_routes() {
		$version = '1';
		$namespace = 'myapp/v' . $version;
		$base = 'products';
		register_rest_route($namespace, '/' . $base, array(
			array(
				'methods'             => WP_REST_Server::READABLE,
				'callback'            => array($this, 'get_items'),
				'args'                => array()
			)
		));
	}

	/**
	 * Retrieve Data
	 */

	public function get_items(WP_REST_Request $request) {
		$data = array();
		$request['paged'] ? $paged = $request['paged'] : $paged = '';;

		$data = json_decode($this->execute_curl($paged));

		$filtered_data = array();
		foreach ($data as $product) {
			$item = array();
			$item['id'] = $product->id;
			$item['title'] = $product->name;
			$item['description'] = $product->description;
			$item['price'] = number_format((float)$product->price, 2, '.', '');
			$item['type'] = $product->type;
			$item['imageURL'] = $product->images[0]->src;
			$item['productLink'] = $product->permalink;
			$filtered_data[] = $item;
		}
		return new WP_REST_Response($filtered_data, 200);
	}

	/**
	 * Curl Handler
	 */

	public function execute_curl($paged) {

		$endpoint = 'https://challenge.homolog.tech/wp-json/wc/v3/products';
		$costumer_key = 'ck_a2bc55a8f39548ef61d9f2dd9cb51b2a0ef8f3eb';
		$costumer_secret = 'cs_20db47ddaf8ed0f9482e867a9643827da6717323';
		$encoded_secrets = base64_encode($costumer_key . ':' . $costumer_secret);

		$paged_params = '';
		if ($paged) {
			$paged = explode(',', $paged);
			$paged_params = '?per_page=' . $paged[0] . '&page=' . $paged[1];
		}

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => $endpoint . $paged_params,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Basic ' . $encoded_secrets
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
	}

	/**
	 * Creates a new external products page on plugin activation
	 */



	/**
	 * Debug helper
	 */

	public function dump_die($a) {
		echo '<pre>';
		var_dump($a);
		die;
	}
}

$ccMyApp = new MyApp();

function create_external_product_page() {
	//die('Plugin');

	$page_title = "external-product-listing";

	$check_page_exist = get_page_by_title($page_title, 'OBJECT', 'page');

	// Check if the page already exists
	if (empty($check_page_exist)) {
		$page_id = wp_insert_post(
			array(
				'comment_status' => 'close',
				'ping_status'    => 'close',
				'post_author'    => 1,
				'post_title'     => ucwords($page_title),
				'post_name'      => strtolower(str_replace(' ', '-', trim($page_title))),
				'post_status'    => 'publish',
				'post_content'   => 'This page will display external products',
				'post_type'      => 'page',

			)
		);

		// add a new option
		update_option('ccMyappExternalProductsID', $page_id);
	}
}

function delete_external_product_page() {

	$page_id = get_option('ccMyappExternalProductsID');
	wp_delete_post($page_id, true);
}

register_deactivation_hook(__FILE__, 'delete_external_product_page');
register_activation_hook(__FILE__, 'create_external_product_page');