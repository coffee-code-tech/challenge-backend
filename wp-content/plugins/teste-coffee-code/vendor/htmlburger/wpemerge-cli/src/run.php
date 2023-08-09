<?php
if ( php_sapi_name() !== 'cli' ) {
	exit;
}

$autoloaders = [
	dirname( dirname( __DIR__ ) ) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php',
	dirname( dirname( dirname( __DIR__ ) ) ) . DIRECTORY_SEPARATOR . 'autoload.php',
	dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php',
	getcwd() . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php',
];

foreach ( $autoloaders as $autoloader ) {
	if ( file_exists( $autoloader ) ) {
		require_once $autoloader;
		break;
	}
}

if ( ! class_exists( \WPEmerge\Cli\App::class ) ) {
	throw new Exception( 'Could not load WP Emerge CLI library.' );
}

\WPEmerge\Cli\App::run();
