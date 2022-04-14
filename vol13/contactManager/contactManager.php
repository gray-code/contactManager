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

define( 'CM_MAX_NAME_LIMIT', 10);
define( 'CM_MAX_EMAIL_LIMIT', 100);
define( 'CM_MAX_CONTENT_LIMIT', 100);

require_once( CM_PLUGIN_DIR . 'class.cm.php' );
require_once( CM_PLUGIN_DIR . 'class.cm-db.php' );

if( session_status() !== PHP_SESSION_ACTIVE ) {
	session_start();
}

function cm_option_page_html() {

$page_title = 'お問い合わせ管理';
$view = 'index';
$error = array();

if( is_admin() && !empty($_POST['edit_token']) ) {

	if( $_SESSION['edit_token'] === $_POST['edit_token'] ) {

		if( empty($_POST['name']) ) {

			$error[] = '名前を入力してください。';

		} else {

			if( CM_MAX_NAME_LIMIT < mb_strlen($_POST['name']) ) {
				$error[] = '名前は'.CM_MAX_NAME_LIMIT.'文字以内で入力してください。';
			}
		}

		if( empty($_POST['email']) ) {

			$error[] = 'メールアドレスを入力してください。';

		} else {
			
			if( CM_MAX_EMAIL_LIMIT < mb_strlen($_POST['email']) ) {
				$error[] = 'メールアドレスは'.CM_MAX_EMAIL_LIMIT.'文字以内で入力してください。';
			}
		}

		if( empty($_POST['content']) ) {

			$error[] = 'お問い合わせ内容を入力してください。';

		} else {

			if( CM_MAX_CONTENT_LIMIT < mb_strlen($_POST['content']) ) {
				$error[] = 'お問い合わせ内容は'.CM_MAX_CONTENT_LIMIT.'文字以内で入力してください。';
			}
		}

		if( empty($error) ) {

			// ここに編集内容をデータベースに登録する処理が入る

		} else {

			$_SESSION['error_message'] = $error;
			$page_title = 'お問い合わせ管理 編集';
			$view = 'edit';
		}

	} else {

		$_SESSION['error_message'][] = '編集に失敗しました。';
		$page_title = 'お問い合わせ管理 編集';
		$view = 'edit';
	}

}

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