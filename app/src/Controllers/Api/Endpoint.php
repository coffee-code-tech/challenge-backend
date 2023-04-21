<?php

namespace CoffeeCodeChallenge\Controllers\Api;

class Endpoint extends EndpointBase
{
    public $method;
    public $response;

    public function __construct($method)
    {
        $this->method = $method;
        $this->response = array(
            'Status' => false,
            'StatusCode' => 0,
            'StatusMessage' => 'Default'
        );
    }

    private $status_codes = array(
        'success' => true,
        'failure' => 0,
        'missing_param' => 150,
    );

    public function init(\WP_REST_Request $request)
    {
        try {
            if (!method_exists($this, $this->method)) {
                throw new Exception('No method exists', 404);
            }
            $data = $this->{$this->method}($request);
            $this->response['Status'] = $this->status_codes['success'];
            $this->response['StatusCode'] = 200;
            $this->response['StatusMessage'] = 'success';
            $this->response['Data'] = $data;
        } catch (Exception $e) {
            $this->response['Status'] = false;
            $this->response['StatusCode'] = $e->getCode();
            $this->response['StatusMessage'] = $e->getMessage();
        }

        return $this->response;
    }

    public function produtos($request)
    {
		$site = 'https://challenge.homolog.tech';
		$consumer_key = 'ck_a2bc55a8f39548ef61d9f2dd9cb51b2a0ef8f3eb';
		$consumer_secret = 'cs_20db47ddaf8ed0f9482e867a9643827da6717323';
        $productsPerPage = 1;

		$curl = curl_init($site.'/wp-json/wc/v3/products?consumer_key='.$consumer_key.'&consumer_secret='.$consumer_secret);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		$resposta = curl_exec($curl);
		curl_close($curl);

        $products = [];
        foreach (json_decode($resposta) as $key => $product) {
            $products[$key]['id'] = $product->id;
            $products[$key]['title'] = $product->name;
            $products[$key]['description'] = $product->description;
            $products[$key]['price'] = $product->price;
            $products[$key]['imageUrl'] = $product->images[0]->src;
            $products[$key]['productLink'] = $product->permalink;
        }

        $page = (isset($_GET['paged']) && $_GET['paged'] >= 1) ? $_GET['paged'] : 999999999;

        $productsPaged = array_slice($products, ($page - 1) * $productsPerPage, $productsPerPage);
        $final_data['products'] = $productsPaged;
        $final_data['paged'] = (int)$_GET['paged'];
        $final_data['page_size'] = (int)$productsPerPage;

        wp_send_json_success($final_data, null, JSON_UNESCAPED_SLASHES);
	}
}
