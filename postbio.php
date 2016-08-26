<?php
require_once 'header.php';
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">
<?php
		$conn = "host=localhost dbname=tpro_alpha user=tpro password=pw4tPro-DB";
		$link = pg_connect($conn);
		if (!$link) {
			die('接続失敗です。'.pg_last_error());
		}
		print('接続に成功しました。<br><br>');
		$bio = $_POST['bio'];
		$id = $_POST['id'];
		$result = pg_query('SELECT uid FROM users ORDER BY uid DESC limit 1');
		$result_uid = pg_fetch_array($result, NULL, PGSQL_ASSOC);
		if($id>$result_uid['uid']){
			print('存在しないIDです。書き込めませんでした。<br><br>');
		}else{
			$sql = sprintf("UPDATE users SET bio = '%s' WHERE uid = '%s'", pg_escape_string($bio),$id);
			$result_flag = pg_query($sql);
			if (!$result_flag) {
				die('UPDATEクエリーが失敗しました。<br>'.pg_last_error());
			}else{
				print('UID '.$id.' のbioを '.$bio.' に書き換えました。<br><br>');
			}
		}
		$close_flag = pg_close($link);
		if ($close_flag){
			print('切断に成功しました。<br>');
		}
?>
		<a href="comment_test.php?uid=<?php print($id) ?>">戻る</a>
		</div>
	</div>
</div>
<?php
require_once 'footer.php';
?>