<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define( 'DB_NAME', 'wordpress' );

/** MySQL数据库用户名 */
define( 'DB_USER', 'root' );

/** MySQL数据库密码 */
define( 'DB_PASSWORD', 'root' );

/** MySQL主机 */
define( 'DB_HOST', 'localhost' );

/** 创建数据表时默认的文字编码 */
define( 'DB_CHARSET', 'utf8mb4' );

/** 数据库整理类型。如不确定请勿更改 */
define( 'DB_COLLATE', '' );

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'BzVd6J5_:{@ck4Vf-1sC+-I[0Q0MIFB;XDlbH7)bUcJ}5St8FkH3H$wdEOgXrPv^' );
define( 'SECURE_AUTH_KEY',  'ee(3v?/Iq~|y74+&7]!Q1(M73PG)B0&.Vk1kPKb3/w9,EWp#NVlQ2)SU`x %K)j9' );
define( 'LOGGED_IN_KEY',    '8{&K/~3N^KehC]nWZS`BAX_G]w2$$:?)+dLs|CS_-C^oPk|UM#;}Q`{Ihz.ssF/_' );
define( 'NONCE_KEY',        'ytON(GQpr$!ITo|wdJS~U2=>{5^f3XZ:btM!^GAdCUGjFF]|nktAkHb:jv|]p-2u' );
define( 'AUTH_SALT',        'zA }dvguQ0&J$La$Hgz#)cj93j}G5MCWkU<KNE+{2-d#=x,w8&i-6>hATldwZ1Li' );
define( 'SECURE_AUTH_SALT', '(?PH)g]6guDoR;[Bkzo;55,}hl ESz65p)J9*V*4+ucz~X#C58>o/*cPrRDyuiJ5' );
define( 'LOGGED_IN_SALT',   'HO^h~`R]3Zc:7!$?Zzp$~R`X7S8:]y,BWQ^PxgP*E_AdhO~JbIZ%kWFlV)i:|Z d' );
define( 'NONCE_SALT',       'z+6e-opks4vr2v5`J,$%~r|.<}HH8^~Whs]B:|KyE4o2Y?G[]Tqc@C{Gn5F I0jG' );

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** 设置WordPress变量和包含文件。 */
require_once( ABSPATH . 'wp-settings.php' );
