  <!-- #header -->
  <?php require_once(AP_CCT_PATH . 'views/template/header.php'); ?>
  <!-- #end header -->
  <div id="user-profile" class="wprap" style="width: auto !important; max-width: none; min-height: 100%;">
    <?php $active_tab = isset($_GET['tab']) ? $_GET['tab'] : 'setup'; ?>
    <h2 class="nav-tab-wrapper wp-clearfix">
      <a href="?page=hf_options&tab=setup" class="nav-tab <?php echo $active_tab == 'setup' ? 'nav-tab-active' : ''; ?>">Setup</a>
      <a href="?page=hf_options&tab=log" class="nav-tab <?php echo $active_tab == 'log' ? 'nav-tab-active' : ''; ?>">Sobre</a>
    </h2>
    <br>

    <form action="options.php" method="post">
      <br>
      <?php if ($active_tab == 'setup') { ?>
        <h3>Exibição de produtos.</h3>
        <p>Configure como os produtos serão exibidos e insira o SHORTCODE <b>"[hf_products]"</b> na estrutura da página para exibi-los. Eles serão centralizados automaticamente.</p>
        <?php
        settings_fields('swc_group');
        do_settings_sections('swc_settings_page1');
        submit_button('Salvar configurações', 'btn btn-info waves-effect waves-float waves-light');
        ?>
        <!-- SESSÔES / CAMPOS / BOTÃO  -->


      <?php } else { ?>

        <h3>O Plugin.</h3>
        <p>Com o intuito de apresentar um recurso convincente e completo este plugin possui os seguintes atributos:</p>
        <ul>
          <li>
            - Usa um ShortCode para transportar a exibição da lista de produtos para qualquer página em que seja inserido.
          </li>
          <li>
            - Possui todas os requisitos solicitados no README com exceção do uso do framework WP Emerge.
          </li>
          <li>
            - Explorar a aplicação do conhecimento em diversos contextos do desenvolvimento.
          </li>
          <li>
            - Procura ser assertivo e agradável de maneira a facilitar as informações pessoais de contato e profissionais.
          </li>
          <li>
            - Algumas ideias que vão além do escopo também foram exploradas como a gestão da exibição dos produtos em colunas na aba "Setup".
          </li>
        </ul>
        <br>
        <h4><?= AP_CCT_VERSION ?></h4>
      <?php } ?>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </form>

  </div>