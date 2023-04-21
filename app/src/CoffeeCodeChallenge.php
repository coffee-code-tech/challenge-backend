<?php

use WPEmerge\Application\ApplicationTrait;

include( plugin_dir_path( __FILE__ ) . 'Controllers/Api/EndpointBase.php');
include( plugin_dir_path( __FILE__ ) . 'Controllers/Api/Endpoint.php');

/**
 * @mixin \WPEmergeAppCore\Application\ApplicationMixin
 */
class CoffeeCodeChallenge {
	use ApplicationTrait;
}
