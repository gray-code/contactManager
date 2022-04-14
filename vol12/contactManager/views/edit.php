<?php

if( !empty($_SESSION['edit_token']) ) {
	unset($_SESSION['edit_token']);
}

$_SESSION['edit_token'] = bin2hex(openssl_random_pseudo_bytes(24));

$data = null;

if( !empty($_GET['id']) ) {

	$data = Cm_Db::getDataFromId($_GET['id']);

}

?>

<p class="link_back"><a href="<?php echo Cm::getBaseUrl(); ?>">戻る</a></p>

<div class="form_area">

<?php if( !empty($data) ): ?>

<form method="post" action="<?php echo Cm::getBaseUrl(); ?>">
<dl class="form_list">
	<dt>お名前</dt>
	<dd><input type="text" name="name" value="<?php if( !empty($data['name']) ){ echo htmlspecialchars( $data['name'], ENT_QUOTES); } ?>"></dd>
	<dt>メールアドレス</dt>
	<dd><input type="email" name="email" value="<?php if( !empty($data['email']) ){ echo htmlspecialchars( $data['email'], ENT_QUOTES); } ?>"></dd>
	<dt>お問い合わせ内容</dt>
	<dd><textarea name="content"><?php if( !empty($data['content']) ){ echo htmlspecialchars( $data['content'], ENT_QUOTES); } ?></textarea></dd>
</dl>
<input type="hidden" name="id" value="<?php echo htmlspecialchars( $data['id'], ENT_QUOTES); ?>">
<input type="hidden" name="edit_token" value="<?php echo $_SESSION['edit_token']; ?>">
<input type="submit" name="btn_register" value="更新">
</form>

<?php else: ?>

<p>お問い合わせのデータを取得できませんでした。</p>
<p class="link_back"><a href="<?php echo Cm::getBaseUrl(); ?>">戻る</a></p>

<?php endif; ?>

</div>