<?php
/**
 * An layout.
 *
 * @link https://docs.wpemerge.com/#/framework/views/layouts
 *
 * @package CoffeeCodeChallange
 */

\CoffeeCodeChallange::render( 'header' );
?>
<div class="coffee_code_challange__layout">
	<?php \CoffeeCodeChallange::layoutContent(); ?>
</div>
<?php
\CoffeeCodeChallange::render( 'footer' );
