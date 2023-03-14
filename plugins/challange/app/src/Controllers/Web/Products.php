<?php

namespace CoffeeCodeChallange\Controllers\Web;

use WPEmerge\Requests\Request;
use WPEmerge\View\ViewInterface;

class Products {
	/**
	 * Handle the param.
	 *
	 * @param Request        $request
	 * @param string         $view
	 * @return ViewInterface
	 */
	public function handle( Request $request, $view ) {		
		return \CoffeeCodeChallange::view( "lista-produtos.php" );
	}
}
