<?php
/**
 * Plugin Name: Coffee Code Challange
 * Plugin URI: https://wpemerge.com/
 * Description:
 * Version: 0.17.0
 * Requires at least: 4.7
 * Requires PHP: 5.5.9
 * Author: Atanas Angelov
 * Author URI: https://atanas.dev/
 * License: GPL-2.0-only
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: coffee_code_challange
 * Domain Path: /languages
 *
 * YOU SHOULD NORMALLY NOT NEED TO ADD ANYTHING HERE - any custom functionality unrelated
 * to bootstrapping the theme should go into a service provider or a separate helper file
 * (refer to the directory structure in README.md).
 *
 * @package CoffeeCodeChallange
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Make sure we can load a compatible version of WP Emerge.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'version.php';

$name = trim( get_file_data( __FILE__, [ 'Plugin Name' ] )[0] );
$load = coffee_code_challange_should_load_wpemerge( $name, '0.17.0', '2.0.0' );

if ( ! $load ) {
	// An incompatible WP Emerge version is already loaded - stop further execution.
	// coffee_code_challange_should_load_wpemerge() will automatically add an admin notice.
	return;
}

define( 'COFFEE_CODE_CHALLANGE_PLUGIN_FILE', __FILE__ );

// Load composer dependencies.
$autoload = __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
if ( file_exists( $autoload ) ) {
	require_once $autoload;
}

coffee_code_challange_declare_loaded_wpemerge( $name, 'theme', __FILE__ );

// Load helpers.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'CoffeeCodeChallange.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'helpers.php';

// Bootstrap plugin after all dependencies and helpers are loaded.
\CoffeeCodeChallange::make()->bootstrap( require __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config.php' );

// Register hooks.
require_once __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'hooks.php';
