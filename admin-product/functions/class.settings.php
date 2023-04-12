<?php

if (!class_exists('AP_Cct_Settings')) {
  class AP_Cct_Settings
  {
    #ATRIBUTO FORA DA CLASSE
    public static $options;
    public function __construct()
    {
      self::$options = get_option('swc_options');
      add_action('admin_init', array($this, 'admin_init'));
    }


    public function admin_init()
    {
      register_setting('swc_group', 'swc_options');

      ##################################### PRIMEIRA SESSÃO DA PAGINA CONFIGURAÇÕES
      # PRIMEIRA SESSÃO
      add_settings_section(
        'swc_layout_section',
        '',
        null, #callback
        'swc_settings_page1'
      );

      add_settings_field(
        'swc_solutions_layout',
        '',
        array($this, 'swc_layout_callback'),
        'swc_settings_page1',
        'swc_layout_section',
        ''
      );
    }

    public function swc_layout_callback()
    {
?>
      <input name="swc_options[swc_solutions_layout]" type="radio" id="swc_solutions_layout" value="2" <?php if (isset(self::$options['swc_solutions_layout']) && self::$options['swc_solutions_layout'] == 2) {
                                                                                                          echo 'checked';
                                                                                                        } else {
                                                                                                          echo $retVal = (empty(self::$options['swc_solutions_layout'])) ? 'checked' : '';
                                                                                                        }
                                                                                                        ?>>Em duas colunas <br>
      <div class="row">
        <div class="col-6 col-md-6" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 1</div>
        <div class="col-6 col-md-6" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 2</div>
      </div>
      <br>
      <br>
      <input name="swc_options[swc_solutions_layout]" type="radio" id="swc_solutions_layout" value="3" <?php if (isset(self::$options['swc_solutions_layout']) && self::$options['swc_solutions_layout'] == 3) {
                                                                                                          echo 'checked';
                                                                                                        } else {
                                                                                                          echo '';
                                                                                                        }
                                                                                                        ?>>Em três colunas
      <br>
      <div class="row">
        <div class="col-6 col-md-4" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 1</div>
        <div class="col-6 col-md-4" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 2</div>
        <div class="col-6 col-md-4" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 3</div>
      </div>
      <br>
      <br>
      <input name="swc_options[swc_solutions_layout]" type="radio" id="swc_solutions_layout" value="4" <?php if (isset(self::$options['swc_solutions_layout']) && self::$options['swc_solutions_layout'] == 4) {
                                                                                                          echo 'checked';
                                                                                                        } else {
                                                                                                          echo '';
                                                                                                        }
                                                                                                        ?>>Em quatro colunas
      <br>
      <div class="row">
        <div class="col-6 col-md-3" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 1</div>
        <div class="col-6 col-md-3" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 2</div>
        <div class="col-6 col-md-3" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 3</div>
        <div class="col-6 col-md-3" style=" background-color: lavender; border: solid 9px #f8f8f8;">Produto 4</div>
      </div>
      <br>
<?php

    }
  }
}
