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

function cm_option_page_html() {
?>

<div class="wrap">
	<h1>お問い合わせ管理</h1>
	<p>プラグイン内のページを表示</p>
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