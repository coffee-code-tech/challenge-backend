<?php

use MyApp\Controllers\API\Products;
use WPEmerge\Application\ApplicationTrait;

/**
 * @mixin \WPEmergeAppCore\Application\ApplicationMixin
 */
class MyApp {
	use ApplicationTrait;

	public $namespace = 'api/v1';

	public function __construct()
	{
		/**
		 * Chamando classes para habilitar rotas de API
		 */
		new Products;
	}
}