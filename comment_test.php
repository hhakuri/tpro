<?php
require_once 'header.php';
if($_POST['uid']){
	$uid_flag = 1;
	$uid = $_POST['uid'];
	$id = $uid - 100000;
}else{
	$uid = 100000;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
		<form action="comment_test.php" method="POST">
		<p>表示したいUID<input type="text" name="uid" value="<?php print($uid)?>">
		<input type="submit" value="検索"></p>
		</form>
		<br>
<?php
		session_start();
		if ($uid_flag == 1) {
			$conn = "host=localhost dbname=tpro_alpha user=tpro password=pw4tPro-DB";
			$link = pg_connect($conn);
			if (!$link) {
			    die('接続失敗です。'.pg_last_error());
			}
			print('接続に成功しました。<br><br>');
			/*
			$sql = "INSERT INTO users (name, screen_name, uid, password_hash, bio, salt) VALUES ('yaster5', 'yaster5', 100004, 'password_hash','bioのてすと5','salt5')";
			$result_flag = pg_query($sql);
			if (!$result_flag) {
			    die('INSERTクエリーが失敗しました。'.pg_last_error());
			}
			*/
			$result = pg_query('SELECT id,name,screen_name,password_hash,email,uid,bio FROM users ORDER BY id');
			if (!$result) {
			    die('クエリーが失敗しました。'.pg_last_error());
			}
			$rows = pg_fetch_array($result, $id, PGSQL_ASSOC);
			if(isset($rows['id'])){
				print('<table border="1">');
				print('<tr><td>id</td><td>'.$rows['id'].'</td></tr>');
				print('<tr><td>name</td><td>'.$rows['name'].'</td></tr>');
				print('<tr><td>screen_name</td><td>'.$rows['screen_name'].'</td></tr>');
				print('<tr><td>password_hash</td><td>'.$rows['password_hash'].'</td></tr>');
				print('<tr><td>email</td><td>'.$rows['email'].'</td></tr>');
				print('<tr><td>uid</td><td>'.$rows['uid'].'</td></tr>');
				print('<tr><td>bio</td><td>'.$rows['bio'].'</td></tr></table><br>');
			}else{
				print('UID"'.$uid.'"は存在しないUIDです。<br><br>');
				$uid_flag = 2;
			}
			$close_flag = pg_close($link);
			if ($close_flag){
				print('切断に成功しました。<br><br>');
			}
			if ($uid_flag != 2) {
?>
				<form action="postbio.php" method="post">
				<p>変更後のBIO<input type="text" name="bio" value="bio text">
				<input type="hidden" name="id" value="<?php print($uid)?>">
				<input type="submit" value="送信"></p>
				</form>
<?php
			}
		}
?>
		</div>
	</div>
</div>
<?php
require_once 'footer.php';
?>