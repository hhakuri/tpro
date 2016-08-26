<?php
require_once 'header.php';

session_start();

if(!empty($_POST)){
  //エラー項目の確認
  if($_POST['name'] == ''){
    $error['name'] = 'blank';
  }
  if($_POST['screen_name'] == ''){
    $error['screen_name'] = 'blank';
  }
  if($_POST['email'] == ''){
    $error['mail'] = 'blank';
  }
  if(strlen($_POST['password']) < 4){
    $error['pass'] = 'length';
  }
  if($_POST['password'] == ''){
    $error['pass'] = 'blank';
  }
 
  if(empty($error)){
    $_SESSION = $_POST;
    header('Location: post.php');
    exit();
  }
}
?>

<!--     <button type="button" class="btn btn-primary">新規登録</button>-->

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-login">
<!--			<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">
									<button class="btn btn-primary">ログイン</button>
								</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">新規登録</a>
							</div>
						</div>
						<hr>
					</div>		-->
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<?php if($error['name'] == 'blank'): ?>
									<p><font color="red">* ユーザー名を入力してください</font></p>
								<?php endif; ?>
								<?php if($error['screen_name'] == 'blank'): ?>
									<p><font color="red">* ユーザー名を入力してください</font></p>
								<?php endif; ?>
								<?php if($error['mail'] == 'blank'): ?>
									<p><font color="red">* メールアドレスを入力してください</font></p>
								<?php endif; ?>
								<?php if($error['pass'] == 'blank'): ?>
									<p><font color="red">* パスワードを入力してください</font></p>
								<?php endif; ?>								
								<?php if($error['pass'] == 'length'): ?>
									<p><font color="red">* パスワードは４文字以上で入力してください</font></p>
								<?php endif; ?>

								<form id="register-form" action="" method="post" role="form" style="display: block;">
									<div class="text-info">Username</div>
									<div class="form-group">
										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="text-info">Password</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="text-info">Email Address</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email Address">
									</div>
									<div class="text-info">ID<span class="text-muted">　マイページのアドレスなどに使用されます</span></div>
									<div class="form-group">
										<input type="text" name="screen_name" id="screen_name" tabindex="4" class="form-control" placeholder="ID" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-4 col-sm-offset-4">
												<input type="submit" name="register-submit" id="register-submit" tabindex="5" class="form-control btn btn-primary" value="Register Now">
											</div>
										</div>
									</div>
<!--							<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>-->
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	require_once 'footer.php';
	?>