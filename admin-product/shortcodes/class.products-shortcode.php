<?php

if (!class_exists('Products_Shortcode')) {
  class Products_Shortcode
  {
    public function __construct()
    {
      add_shortcode('hf_products', array($this, 'add_shortcode'));
    }

    public function add_shortcode($atts = array(), $contebt = null, $tag = '')
    {
      $atts = array_change_key_case((array) $atts, CASE_LOWER);
      extract(shortcode_atts(
        array('cols' => 4),
        $atts,
        $tag
      ));

      ob_start();

      wp_enqueue_style('shortcode', AP_CCT_URL . 'assets/css/shortcode.css', false, '1.0.0');
      require(AP_CCT_PATH . 'views/shortcode.php');

      return ob_get_clean();
    }
  }
}
