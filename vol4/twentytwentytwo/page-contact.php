<?php

// 変数の初期化
$paeg_flag = 1;

if( isset($_POST['btn_confirm']) && $_POST['btn_confirm'] !== null ) {

	$page_flag = 2;

} elseif( isset($_POST['btn_submit']) && $_POST['btn_submit'] !== null ) {

	$page_flag = 3;
}

get_header();
?>
<style>
#contact {
	margin: 0 auto 200px;
	padding: 70px 40px 0;
	width: 100%;
	max-width: 1200px;
	box-sizing: border-box;
	background: #fff;
}
#contact header {
	text-align: center;
}
#contact h1 {
	display: inline-block;
	margin-bottom: 30px;
	font-size: 1.5rem;
	border-bottom: 1px solid #222;
}
#contact p,
#contact ul,
#contact form {
	margin: 0 auto;
	width: 100%;
	max-width: 700px;
	box-sizing: border-box;
}
#contact p {
	margin-bottom: 35px;
	width: 100%;
	max-width: 700px;
	font-size: 1rem;
	line-height: 1.8em;
}
#contact .list_error {
	margin-bottom: 40px;
	padding: 20px;
	color: #d54545;
	border: 4px solid #d54545;
	list-style-type: none;
}
#contact .list_error li {
	margin-left: 1.5em;
	margin-bottom: 5px;
	text-indent: -1.5em;
}
#contact .list_error li:last-child {
	margin-bottom: 0;
}
#contact .list_error li::before {
	display: inline-block;
	content: "";
	margin-right: 10px;
	width: 10px;
	height: 10px;
	border-radius: 5px;
	background: #e99898;
}
#contact dl {
	margin: 0 auto;
	width: 700px;
}
#contact dl dt {
	margin-bottom: 10px;
	font-size: 1rem;
	font-weight: bold;
	color: #222;
	line-height: 1.6em;
}
#contact dl dd {
	margin-left: 0;
	margin-bottom: 30px;
	line-height: 1.0em;
}
#contact dl dd input[type=text],
#contact dl dd input[type=email],
#contact dl dd textarea {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	padding: 15px 20px;
	width: 100%;
	border: 2px solid #2794d9;
	border-radius: 7px;
	box-sizing: border-box;
	font-size: 1rem;
	font-weight: 500;
	line-height: 1.6em;
	color: #222;
	background-color: #fff;
}
#contact dl dd textarea {
  max-width: 100%;
  min-height: 80px;
}
#contact dl dd input[type=text]:focus,
#contact dl dd input[type=email]:focus,
#contact dl dd textarea:focus {
  border: 2px #2794d9 solid inset;
}
#contact dl dd p {
	margin-bottom: 0;
	padding-top: 8px;
	font-size: 0.875rem;
	font-weight: 400;
	line-height: 1.6em;
}
#contact dl dd p a {
	color: #006cdb;
}
#contact .btn_area {
	display: flex;
	justify-content: space-between;
	width: 100%;
	text-align: center;
}
#contact .link_area {
	width: 100%;
	text-align: center;
}

#contact dl dd p {
	padding: 10px 20px;
	width: 100%;
	border: 2px solid #c1e1f5;
	border-radius: 7px;
	box-sizing: border-box;
	font-size: 1rem;
	font-weight: 500;
	color: #222;
}

#contact .btn_area input[name=btn_back],
#contact .btn_area input[name=btn_submit] {
	padding: 12px 5%;
	width: calc(50% - 20px);
}

input[name=btn_confirm],
input[name=btn_submit] {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	display: inline-block;
	padding: 12px 140px;
	width: 100%;
	border-radius: 7px;
	box-sizing: border-box;
	border: none;
	cursor: pointer;
	color: #fff;
	font-size: 1rem;
	font-weight: bold;
	letter-spacing: .1em;
	background: #2794d9 right 20px center / 28px auto no-repeat;
	transition: opacity .2s ease;
}
input[name=btn_confirm]:hover,
input[name=btn_submit]:hover {
	opacity: 0.7;
}
input[name=btn_confirm][disabled] {
	cursor: not-allowed;
	background-color: #b0e0de;
}

input[name=btn_back] {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	display: inline-block;
	padding: 12px 140px;
	border-radius: 7px;
	border: 2px solid #2794d9;
	cursor: pointer;
	color: #2794d9;
	font-size: 1rem;
	font-weight: bold;
	letter-spacing: .1em;
	background: #fff left 20px center / 28px auto no-repeat;
	transition: opacity .2s ease;
}
input[name=btn_back]:hover {
	opacity: 0.7;
}

a.btn_back {
	color: #2794d9;
	font-size: 1rem;
	font-weight: bold;
	background: #fff left 20px center / 28px auto no-repeat;
	transition: opacity .3s ease;
}
a.btn_back:hover {
	opacity: 0.7;
	text-decoration: none;
}
</style>

<article id="contact">
	<header>
		<h1>お問い合わせ</h1>
	</header>

	<?php if( $page_flag === 2 ): ?>

		<p>送信内容をご確認いただき、よろしければ「送信」ボタンを押してください。</p>
		<form action="" method="post">
			<dl>
				<dt>お名前</dt>
				<dd><p><?php if( !empty($_POST['input_name']) ) { echo htmlspecialchars($_POST['input_name'], ENT_QUOTES); } ?></p></dd>
				<dt>メールアドレス</dt>
				<dd><p><?php if( !empty($_POST['input_email']) ) { echo htmlspecialchars($_POST['input_email'], ENT_QUOTES); } ?></p></dd>
				<dt>お問い合わせ内容</dt>
				<dd class="last"><p><?php if( !empty($_POST['input_content']) ) { echo nl2br(htmlspecialchars($_POST['input_content'], ENT_QUOTES)); } ?></p></dd>
			</dl>
			<div class="btn_area">
				<input type="submit" name="btn_back" value="修正する">
				<input type="submit" name="btn_submit" value="送信">
			</div>
			<input type="hidden" name="input_name" value="<?php if( !empty($_POST['input_name']) ) { echo htmlspecialchars($_POST['input_name'], ENT_QUOTES); } ?>">
			<input type="hidden" name="input_email" value="<?php if( !empty($_POST['input_email']) ) { echo htmlspecialchars($_POST['input_email'], ENT_QUOTES); } ?>">
			<input type="hidden" name="input_content" value="<?php if( !empty($_POST['input_content']) ) { echo htmlspecialchars($_POST['input_content'], ENT_QUOTES); } ?>">
		</form>

	<?php elseif( $page_flag === 3 ): ?>

		<p>お問い合わせいただきありがとうございます。<br>受付が完了いたしました。</p>
		<div class="link_area">
			<a class="btn_back" href="/">トップページに戻る</a>
		</div>
	
	<?php else: ?>

		<form action="" method="post">
			<dl>
				<dt>お名前</dt>
				<dd><input type="text" name="input_name" value="<?php if( !empty($_POST['input_name']) ) { echo htmlspecialchars($_POST['input_name'], ENT_QUOTES); } ?>"></dd>
				<dt>メールアドレス</dt>
				<dd><input type="email" name="input_email" value="<?php if( !empty($_POST['input_email']) ) { echo htmlspecialchars($_POST['input_email'], ENT_QUOTES); } ?>"></dd>
				<dt>お問い合わせ内容</dt>
				<dd>
					<textarea name="input_content"><?php if( !empty($_POST['input_content']) ) { echo htmlspecialchars($_POST['input_content'], ENT_QUOTES); } ?></textarea>
				</dd>
			</dl>
			<div class="btn_area">
				<input type="submit" name="btn_confirm" value="送信内容の確認">
			</div>
		</form>

	<?php endif; ?>
</article>

<?php get_footer(); ?>