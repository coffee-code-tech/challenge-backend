<?php

/* Template Name: External Products */

$scripts_version = '2023/17/03';

get_header();


?>
<script src="<?php echo WP_PLUGIN_URL  ?>/marcio-lopesfao/views/js/script.js?<?php $scripts_version ?>"></script>
<link rel="stylesheet"
    href="<?php echo WP_PLUGIN_URL  ?>/marcio-lopesfao/views/css/style.css?<?php $scripts_version ?>">


<div class="container">
    <div class="product-listing">
        <span class="dashicons dashicons-image-rotate loading"></span>
    </div>
</div>

<?

get_footer();