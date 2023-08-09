<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wordpresscoffee' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k/rKYT?qZ3BXu)6haA+z5D@h1tjnf/lI|-~T>R~5t=O`KvDW6!_EH6WRoW@YCTu:' );
define( 'SECURE_AUTH_KEY',  's&3~]l:J$9=9*JLlqAqEjt?ZO&5:i)#7.S3e6j4Qxf?Q%PKu1O94*xEeYc$;Y;12' );
define( 'LOGGED_IN_KEY',    'mpPVQ{{/i=6i6t$L4z I%Jo<|.VG?w5(ai]V.k~29&^o+ACiq_[O`usO65+D?612' );
define( 'NONCE_KEY',        'u=z[&Y-^(j$_ug4K}xg&t}L/*|/&0EomeKyvNvfh^:R#h1]`&J30mYwYmhB)iJp`' );
define( 'AUTH_SALT',        'Zeju196qmI0*:(H{tD[w}>`:FT:TY~F*CZ5W%h)c6pIAJ-5?R}85|tTO1n6>O>T=' );
define( 'SECURE_AUTH_SALT', '/5cn[s-`757rC_n$B&IS5&bD0t3-#UDD;-JgE>7<Hf8D+nJiClyupUA>!dPy!-&<' );
define( 'LOGGED_IN_SALT',   'IxEp&P]PyYix/4&s$DFSiDS__jfe+^{)#*}`h4E-q=OLZN.HLw*EDa*<#CrSOMC<' );
define( 'NONCE_SALT',       '~^>hnw/}1X]}Vr<%LpVXC1+C-9;8)0[4zygollz@j eE,@de7`<0-vcIWwV9uR7*' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
