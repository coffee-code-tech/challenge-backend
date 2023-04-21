<?php
/**
 * An example view.
 *
 * Layout: layouts/example.php
 *
 * @package CoffeeCodeChallenge
 */

?>
<div class="coffee_code_challenge__view">
	<?php \CoffeeCodeChallenge::render( 'partials/example', [ 'message' => __( 'Hello World!', 'coffee_code_challenge' ) ] ); ?>
</div>
