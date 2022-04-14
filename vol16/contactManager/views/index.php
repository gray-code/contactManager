<?php

$contact_data = Cm_Db::getAllData();

$success_message = null;

if( !empty($_SESSION['success_message']) ) {
	$success_message = $_SESSION['success_message'];
	unset($_SESSION['success_message']);
}

?>

<?php if( !empty($success_message) ): ?>
	<p class="message success_message"><?php echo $success_message; ?></p>
<?php endif; ?>

<?php if( !empty($contact_data) && 0 < count($contact_data) ): ?>
<table class="data_table">
	<tr>
		<th>日時</th><th>お名前</th><th>メールアドレス</th><th>お問い合わせ内容</th><th></th>
	</tr>
	<?php foreach( $contact_data as $data): ?>
	<tr>
		<td><?php echo htmlspecialchars($data['created'], ENT_QUOTES); ?></td>
		<td><?php echo htmlspecialchars( $data['name'], ENT_QUOTES); ?></td>
		<td><?php echo htmlspecialchars( $data['email'], ENT_QUOTES); ?></td>
		<td><?php echo nl2br( htmlspecialchars( $data['content'], ENT_QUOTES)); ?></td>
		<td>
			<a href="<?php echo Cm::getBaseUrl(); ?>&cm=edit&id=<?php echo htmlspecialchars( $data['id'], ENT_QUOTES); ?>">編集</a>&nbsp;&nbsp;<a href="<?php echo Cm::getBaseUrl(); ?>&cm=delete&id=<?php echo htmlspecialchars( $data['id'], ENT_QUOTES); ?>">削除</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php endif; ?>