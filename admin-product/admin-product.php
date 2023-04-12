<?php

/**
 * Plugin Name:         Administração de produtos - Coffee Code Tech
 * Plugin URI:          https://www.linkedin.com/in/herbert-feldkircher/
 * Description:         Um Plugin em WordPress que cria uma rota personalizada que aceite pelo menos os paramentro `paged` que busque e liste os produtos em ordem de preço crescente, paginando de 5 em 5 e retorne o resultado como `JSON`.
 * Author:              Herbert Feldkircher
 * Author URI:          https://www.linkedin.com/in/herbert-feldkircher/
 *
 * Version:             1.7.0
 * Requires at least:   4.8.0
 * Requires PHP:        5.5
 *
 * License:             GPL v3
 *
 * Text Domain:         herbert-feldkircher-for-wordpress
 * Domain Path:         /languages
 *
 * AdminProduct 
 * Copyright (C) 2018-2023, herbert.feldkircher@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category            Plugin
 * @copyright           Copyright © 2023 Herbert Feldkircher
 * @author              Herbert Feldkircher
 * @package             Administração de produtos
 */




// Exit if accessed directly.
if (!defined('ABSPATH')) {
  exit;
}

# VALIDA SE A CLASSE EXISTE
if (!class_exists('AP_Cct')) {
  class AP_Cct
  {

    # METODO CONSTRUTOR (é executado automaticamente quando instanciamos um objeto da classe)
    function __construct()
    {


      #REFERENCIAR METODOS DA CLASSE
      $this->define_constants();

      #REFERÊNCIA DE ARQUIVO DE ESTILOS EM ASSETS/CSS
      add_action('admin_enqueue_scripts', array($this, 'cstm_css_and_js'));

      #ADMIN MENU
      add_action('admin_menu', array($this, 'menu'));

      # ROTA API
      add_action('rest_api_init', function () {
        register_rest_route('api', '/produtos', array(
          'methods' => 'GET',
          'content-type' => 'application/json',
          'callback' => [$this, 'get_produtos'],
          'args' => array(
            'paged' => array(
              'validate_callback' => function ($param) {
                return is_numeric($param);
              }
            )
          )
        ));
      });


      #CARREGANDO CLASSE SETTINGS
      require_once(AP_CCT_PATH . 'functions/class.settings.php');
      $AP_Cct_Settings = new AP_Cct_Settings();

      #CARREGANDO CLASSE SHORTCODE
      require_once(AP_CCT_PATH . 'shortcodes/class.products-shortcode.php');
      $Products_Shortcode = new Products_Shortcode();

      #CARREGANDO CLASSE DA ROTA PERSONALIZADA
      require_once(AP_CCT_PATH . 'functions/class.products.php');
      $Products = new Products();
    }

    # DECLARAÇÃO DE CONSTANTES DO PROJETO
    public function define_constants()
    {
      #Define caminho da pasta e arquivos /home/www/dominio/wp-content/plugins/plugin/
      define('AP_CCT_PATH', plugin_dir_path(__FILE__));

      #Define URL  https://dominio/wp-content/plugins/plugin/
      define('AP_CCT_URL', plugin_dir_url(__FILE__));

      #Define URL  https://dominio/
      define('AP_CCT_URL_BASE', site_url());

      #Define a Versão 
      define('AP_CCT_VERSION', 'v1.0');
    }

    public static function activate()
    {
      # Atualiza links no banco
      update_option('rewrite_rules', '');

      global $wpdb;

      $table_name = $wpdb->prefix . "swchat";

      $swc_db_register = get_option('swc_register');

      if (empty($swc_db_register)) {
        $query = "
          CREATE TABLE $table_name (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            swc_key varchar(255) DEFAULT NULL,
            swc_values longtext,
            swc_token_refresh longtext,
            swc_token_expire datetime,
            PRIMARY KEY  (id),
            KEY swc_key (swc_key))
            ENGINE=InnoDB DEFAULT CHARSET=utf8;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');


        dbDelta($query);
        $swc_db_register = '1:0';
        add_option('swc_register', $swc_db_register);
      }
    }

    public static function deactivate()
    {
      flush_rewrite_rules();
    }

    public static function uninstall()
    {
    }

    function cstm_css_and_js($hook)
    {

      switch ($hook) {
        case 'toplevel_page_hf_home':
          wp_enqueue_style('hf-theme', AP_CCT_URL . 'assets/css/template.css');
          wp_enqueue_style('hf-theme-home', AP_CCT_URL . 'assets/css/home.css');
          break;

        case 'inicio_page_hf_options':
          wp_enqueue_style('hf-theme', AP_CCT_URL . 'assets/css/template.css');
          wp_enqueue_style('hf-theme-config', AP_CCT_URL . 'assets/css/config.css');
          break;

        default:
          //return;
          break;
      }
    }



    # MENU ADMIN
    public function menu()
    {
      add_menu_page(
        'Sobre mim',
        'Início',
        'manage_options',
        'hf_home', # slug
        array($this, 'welcome_page'),
        AP_CCT_URL . 'assets/images/icon.png'
      );


      add_submenu_page(
        'hf_home', #slug
        'Configurações', #Titulo da pagina
        'Configurações', #titulo do menu
        'manage_options', #permissão
        'hf_options', #slug do SUBMENTU
        array($this, 'settings_page'),
        null #posição
      );
    }

    # PÁGINA DE BOAS VINDAS
    public function welcome_page()
    {
      # VALIDA USUÁRIO QUE ESTÁ ACESSANDO PERMISSÕES
      if (!current_user_can('manage_options')) {
        return;
      }

      require_once(AP_CCT_PATH . 'views/home.php');
    }

    # PÁGINA DE CONFIGURAÇÕES
    public function settings_page()
    {
      # VALIDA USUÁRIO QUE ESTÁ ACESSANDO PERMISSÕES
      if (!current_user_can('manage_options')) {
        return;
      }

      # MENSAGEM DE ERRO
      if (isset($_GET['settings-updated']) === true) {
        add_settings_error('swc_options', 'swc_message', 'Alterações salvas com sucesso! ', 'success');
      }
      settings_errors('swc_options');

      # INCLUDE DE TEMPLETE DA PAGINA
      require_once(AP_CCT_PATH . 'views/config.php');
    }

    # ROTA PERSONALIZADA DE TRATAMENTO DE PRODUTOS  
    public function get_produtos($data)
    {
      $products = Products::list($data);
      return $products;
    }
  }
}

if (class_exists('AP_Cct')) {
  #Gancho ou hook que chama a ativação
  register_activation_hook(__FILE__, array('AP_Cct', 'activate'));

  #Gancho ou hook que chama a desativação
  register_deactivation_hook(__FILE__, array('AP_Cct', 'deactivate'));

  #Gancho ou hook que chama a desinstalação
  register_uninstall_hook(__FILE__, array('AP_Cct', 'uninstall'));

  #instanciando a 
  $ap_cct = new AP_Cct();
}
