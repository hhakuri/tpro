<?php
session_start();
//$_SESSION["email"] = $_POST["email"];
//$_SESSION["pass"] = $_POST["pass"];


require_once 'header.php';
$status = "none";

$conn = "host=localhost dbname=tpro_alpha user=tpro password=pw4tPro-DB";
$link = pg_connect($conn);
if (!$link) {
	die('接続失敗です。'.pg_last_error());
}
//print('接続に成功しました。<br><br>');



//セッションにセットされていたらログイン済み
if(isset($_SESSION["email"]))
	$status = "logged_in";
else if(!empty($_POST["email"]) && !empty($_POST["pass"])){
  //ユーザ名、パスワードが一致する行を探す
//  $password = md5($_POST["pass"] . $salt);
	$result = pg_query_params( $link, 'SELECT id,name,screen_name,password_hash,email,uid,bio,salt FROM users WHERE email = $1', array($_POST["email"]));
	$rows = pg_fetch_array($result, 0, PGSQL_ASSOC);
//	$stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
//	$rows['email'] = $result['email'];

	if($_POST["email"] === $rows["email"] && hash('sha512', $_POST[pass].$rows[salt]) === $rows["password_hash"]){
		$status = "ok";
    //セッションにユーザ名を保存
		$_SESSION["email"] = $_POST["email"];

	}else
	$status = "failed";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>ログイン</title>
</head>
<body>
	<h1>ログイン</h1>
	<?php if($status == "logged_in"): ?>
		<p>ログイン済み</p>
		<?php
		$result = pg_query_params( $link, 'SELECT id,name,screen_name,password_hash,email,uid,salt,bio FROM users WHERE email = $1', array($_SESSION["email"]));
		$rows = pg_fetch_array($result, 0, PGSQL_ASSOC);
		print('<table border="1">');
		print('<tr><td>id</td><td>'.$rows['id'].'</td></tr>');
		print('<tr><td>name</td><td>'.$rows['name'].'</td></tr>');
		print('<tr><td>screen_name</td><td>'.$rows['screen_name'].'</td></tr>');
		print('<tr><td>password_hash</td><td>'.$rows['password_hash'].'</td></tr>');
		print('<tr><td>email</td><td>'.$rows['email'].'</td></tr>');
		print('<tr><td>uid</td><td>'.$rows['uid'].'</td></tr>');
		print('<tr><td>salt</td><td>'.$rows['salt'].'</td></tr>');
		print('<tr><td>bio</td><td>'.$rows['bio'].'</td></tr></table><br>');
		?>
		<p><a href="logout.php">ろぐあうとする</a></p>
	<?php elseif($status == "ok"): ?>
		<p>ログイン成功</p>
		<?php
		print('<table border="1">');
		print('<tr><td>id</td><td>'.$rows['id'].'</td></tr>');
		print('<tr><td>name</td><td>'.$rows['name'].'</td></tr>');
		print('<tr><td>screen_name</td><td>'.$rows['screen_name'].'</td></tr>');
		print('<tr><td>password_hash</td><td>'.$rows['password_hash'].'</td></tr>');
		print('<tr><td>email</td><td>'.$rows['email'].'</td></tr>');
		print('<tr><td>uid</td><td>'.$rows['uid'].'</td></tr>');
		print('<tr><td>salt</td><td>'.$rows['salt'].'</td></tr>');
		print('<tr><td>bio</td><td>'.$rows['bio'].'</td></tr></table><br>');
		?>
		<p><a href="logout.php">ろぐあうとする</a></p>
	<?php elseif($status == "failed"): ?>
		<p>ログイン失敗</p>
	<?php else: ?>
		<p>ログイン失敗です</p>
	<?php endif; ?>
</body>
</html>