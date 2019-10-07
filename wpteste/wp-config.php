<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wordpress');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

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
define('AUTH_KEY',         '.yjF=Iq[cEr&4uh`HITh.a#|-Je{v{23^./(UFK`.kSw&fPXP=HtXei!1TLWMX1n');
define('SECURE_AUTH_KEY',  'yvAB&UDtU8`wXYLASg;D(+N40=4Q W{g$5>>JS}v>Ah]&-Qo@#=?PxuBL{eM~pT;');
define('LOGGED_IN_KEY',    'LU.Xx+QT6C0)]y~0Oqz}/o;><q=8cMm<[.!9/R%M[p Po;&tA-bay`})Y[;;700z');
define('NONCE_KEY',        '_]sW+[0,%enEO=tv9f7mHQV(;R,7]4*97K6+yDBGJXkStg^3l{_NGW:/~@(jlr/W');
define('AUTH_SALT',        'vSLe~4ubkDZf]>o5GRwD/WlgBhG08hh6r??N-FcyCEIlw2Vkg!n{T)1>VsKPtH#!');
define('SECURE_AUTH_SALT', 'bM5_NjqO]7Ek|ExFpW?sH-VbAnr@Pp@0YY[e]:Jji.vm/}{i-]M;`/!#Luoz+Fh*');
define('LOGGED_IN_SALT',   'yyCfTK1jw]! ZgSXpB@O&rDx^vOophw.YgVQ~Jc@saScj<qrErMiw=aCiJ%t@Ms(');
define('NONCE_SALT',       'tA5*_H.w}l?2|p/h3L9+zWw$#Q3.-sE4J?3_y*0|PBoX$rH&~K6M!{N0qmRa|Fnn');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

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
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
