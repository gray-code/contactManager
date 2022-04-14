<?php
/*
Plugin Name: Contact Manager
Description: お問い合わせを管理するためのプラグイン
Version: 0.1
Author: GRAYCODE
Author URI: https://gray-code.com
Licence: GPL v2 or later
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

define( 'CM_VERSION', '0.1.1' );
define( 'CM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( CM_PLUGIN_DIR . 'class.cm.php' );
require_once( CM_PLUGIN_DIR . 'class.cm-db.php' );

if( session_status() !== PHP_SESSION_ACTIVE ) {
	session_start();
}

function cm_option_page_html() {

$page_title = 'お問い合わせ管理';
$view = 'index';

if( !empty($_GET['cm']) ) {

	switch( $_GET['cm'] ) {
		
		case 'edit':
			$page_title = 'お問い合わせ管理 編集';
			$view = 'edit';
			break;

		case 'delete':
			$page_title = 'お問い合わせ管理 削除';
			$view = 'delete';
			break;

		default:
			$page_title = 'お問い合わせ管理';
			$view = 'index';
	}

}

?>

<div class="wrap">
	<h1><?php echo $page_title; ?></h1>
	<?php Cm::view($view); ?>
</div>

<?php
}


add_action('admin_menu', 'cm_options_page');

function cm_options_page() {
	add_menu_page(
		'お問い合わせ管理',
		'お問い合わせ管理',
		'manage_options',
		'cm',
		'cm_option_page_html',
		'dashicons-feedback',
		3
	);
}


if ( is_admin() ) {
	require_once( CM_PLUGIN_DIR . 'class.cm-admin.php' );
	add_action( 'init', array( 'Cm_Admin', 'init' ) );
}