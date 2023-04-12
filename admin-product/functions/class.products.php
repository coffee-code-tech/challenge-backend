<?php
require_once(AP_CCT_PATH . 'vendor/autoload.php');

use Automattic\WooCommerce\Client;
// Consumer key: ck_a2bc55a8f39548ef61d9f2dd9cb51b2a0ef8f3eb
// Consumer secret: cs_20db47ddaf8ed0f9482e867a9643827da6717323 


if (!class_exists('Products')) {
  class Products
  {
    public function __construct()
    {
      add_action('list', array($this, 'list'));
    }

    static function list($data)
    {
      $woocommerce = new Client(
        'https://challenge.homolog.tech',
        'ck_a2bc55a8f39548ef61d9f2dd9cb51b2a0ef8f3eb',
        'cs_20db47ddaf8ed0f9482e867a9643827da6717323',
        [
          'wp_api' => true,
          'version' => 'wc/v3',
        ]
      );

      $produto = array();
      $produtos =  $woocommerce->get('products');
      if (empty($data['paged'])) {
        foreach ($produtos as $key => $value) {
          $produto[$key]['id'] = $value->id;
          $produto[$key]['title'] = $value->name;
          $produto[$key]['description'] = $value->description;
          $produto[$key]['price'] = $value->price;
          $produto[$key]['type'] = $value->type;
          $produto[$key]['imageUrl'] = $value->images[0]->src;
          $produto[$key]['productLink'] = $value->permalink;
        }
        $results = $produto;
      } else {
        $inicioRange = ($data['paged'] * 5) - 5;
        $fimRange = $data['paged'] * 5;
        $p = (array) $produtos;
        $total_produtos = count($p);
        if ($total_produtos <= $inicioRange) {
          $produto[0]['end'] = 1;
        } else {
          $produtos = array_slice($p, $inicioRange, $fimRange);
          foreach ($produtos as $key => $value) {
            $produto[$key]['id'] = $value->id;
            $produto[$key]['title'] = $value->name;
            $produto[$key]['description'] = $value->description;
            $produto[$key]['price'] = $value->price;
            $produto[$key]['type'] = $value->type;
            $produto[$key]['imageUrl'] = $value->images[0]->src;
            $produto[$key]['productLink'] = $value->permalink;
          }
        }

        $results = $produto;
      }

      return $results;
    }
  }
}
