<?php
require_once 'header.php';
?>

<div id="page">
	<div class="container">
		<h1>お問い合わせフォーム</h1>

		<div class="row">
			<div class="col-sm-9">
				<form method="post" action="mail.php" class="form-horizontal">
					<div class="form-group">
						<label for="input-name" class="col-sm-2 control-label">お名前</label>
						<div class="col-sm-10">
							<input name="お名前" type="text" class="form-control" id="input-name" placeholder="お名前" required="required">
						</div>
					</div>
					<div class="form-group">
						<label for="input-mail" class="col-sm-2 control-label">メールアドレス</label>
						<div class="col-sm-10">
							<input name="Email" type="email" class="form-control" id="input-mail" placeholder="メールアドレス" required="required">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">ご用件</label>
						<div class="col-sm-10">
							<select name="ご用件" class="form-control">
								<option value="">選択してください</option>
								<option value="ご質問・お問い合わせ">ご質問・お問い合わせ</option>
								<option value="ご意見・ご感想">ご意見・ご感想</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">お問い合わせ内容</label>
						<div class="col-sm-10">
							<textarea name="お問い合わせ内容" class="form-control" rows="5" required="required"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">送信</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
require_once 'footer.php';
?>