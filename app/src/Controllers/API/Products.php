<?php

namespace MyApp\Controllers\API;

use MyApp;
use MyApp\Helpers\External;

/**
 * @mixin \WPEmergeAppCore\Application\ApplicationMixin
 */
class Products extends MyApp {

    public function __construct()
    {
		add_action('rest_api_init', function()
		{
			register_rest_route($this->namespace, '/products', [
				[
					'methods' => \WP_REST_Server::READABLE,
					'callback' => [$this, 'list']
				]
			]);
			register_rest_route($this->namespace, '/products/(?P<paged>\d+)', [
				[
					'methods' => \WP_REST_Server::READABLE,
					'callback' => [$this, 'list'],
					'args' => ['paged']
				]
			]);
		});
	}

    /**
     * @param   integer   $paged    Número da página atual (inicia no 1)
     */
	public function list(\WP_REST_Request $request)
    {
        $params = $request->get_params();
        $paged = $params['paged'] ?? 1;

        $limit = 5;

        $queries = http_build_query([
            'order' => 'asc',
            'orderby' => 'price',
            'per_page' => $limit,
            'page' => $paged
        ]);

        $endpoint = 'wp-json/wc/v3/products?' . $queries;

        $external = new External();
        $response = $external->request('GET', $endpoint);

        return $response;
    }

}