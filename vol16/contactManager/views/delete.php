<?php

if( !empty($_SESSION['delete_token']) ) {
	unset($_SESSION['delete_token']);
}

$_SESSION['delete_token'] = bin2hex(openssl_random_pseudo_bytes(24));

if( !empty($_GET['id']) ) {

	$data = Cm_Db::getDataFromId($_GET['id']);

} else if( !empty($_POST['id']) ) {

	$data = Cm_Db::getDataFromId($_POST['id']);
}

?>

<p class="link_back"><a href="<?php echo Cm::getBaseUrl(); ?>">戻る</a></p>

<div class="form_area">

<?php if( !empty($_SESSION['error_message']) ): ?>
<ul class="message error_list">
	<?php foreach( $_SESSION['error_message'] as $message ): ?>
		<li><?php echo $message; ?></li>
	<?php endforeach; ?>
</ul>
<?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<?php if( !empty($data) ): ?>

<form method="post" action="<?php echo Cm::getBaseUrl(); ?>">
<dl class="form_list">
	<dt>お名前</dt>
	<dd><p class="text_delete"><?php if( !empty($data['name']) ){ echo htmlspecialchars( $data['name'], ENT_QUOTES); } ?></p></dd>
	<dt>メールアドレス</dt>
	<dd><p class="text_delete"><?php if( !empty($data['email']) ){ echo htmlspecialchars( $data['email'], ENT_QUOTES); } ?></p></dd>
	<dt>お問い合わせ内容</dt>
	<dd><p class="text_delete"><?php if( !empty($data['content']) ){ echo htmlspecialchars( $data['content'], ENT_QUOTES); } ?></p></dd>
</dl>
<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
<input type="hidden" name="delete_token" value="<?php echo $_SESSION['delete_token']; ?>">
<input type="submit" name="btn_register" value="削除">
</form>

<?php else: ?>

<p>お問い合わせのデータを取得できませんでした。</p>
<p class="link_back"><a href="<?php echo Cm::getBaseUrl(); ?>">戻る</a></p>

<?php endif; ?>

</div>