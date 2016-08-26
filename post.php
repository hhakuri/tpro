<?php
session_start();
require_once 'header.php';

//スキップしてきたらリダイレクト
if(!isset($_SESSION)){
	header('Location: index.php');
	exit();
}

$db = "host=localhost dbname=tpro_alpha user=tpro password=pw4tPro-DB";
$link = pg_connect($db);
if (!$link) {
    die('接続失敗です。'.pg_last_error());
}

print('接続に成功しました。<br>');

//salt
function makeRandStr($length = 20) {
    static $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJLKMNOPQRSTUVWXYZ0123456789';
    $str = '';
    for ($i = 0; $i < $length; ++$i) {
        $str .= $chars[mt_rand(0, 61)];
    }
    return $str;
}
$salt = makeRandStr(20);
echo "<br>saltの生成完了<br>";
echo "$salt<br><br>";
$passhash = hash('sha512', $_SESSION[password].$salt);
//session_start();
//require('dbconnect.php');

//if(!isset($_SESSION['join'])){
//	header('Location: index.php');
//	exit();
//}
//"$_SESSION[name']"　= "$_POST[name]";
//"$_SESSION[screen_name]"　= "$_POST[screen_name]";
//"$_SESSION[password]"　= "$_POST[password]";
//"$_SESSION[email]"　= "$_POST[email]";
if(isset($_POST)){
	//登録処理をする
	echo $_SESSION[name]."<br>";
	echo $_SESSION[screen_name]."<br>";
	echo $_SESSION[password]."<br>";
	echo $_SESSION[email]."<br>";
	echo "<br>登録開始...";
	$result = pg_query('SELECT uid FROM users ORDER BY uid DESC limit 1');
	$result_uid = pg_fetch_array($result, NULL, PGSQL_ASSOC);
	$result_uid['uid'];
	$uid = $result_uid['uid'] + 1;
	$sql = "INSERT INTO users (name, screen_name, uid, password_hash, bio, salt, email) VALUES ('$_SESSION[name]', '$_SESSION[screen_name]', $uid, '$passhash', 'bioのてすと5', '$salt', '$_SESSION[email]' )";
	$result_flag = pg_query($sql);
	if (!$result_flag) {
   		die('<br>'.pg_last_error());
	}	
//	unset($_SESSION['join']);

	echo "<br>登録完了<br>";

//	exit();
}

$close_flag = pg_close($link);

if ($close_flag){
    print('<br>切断に成功しました。');
}

?>

<?php
require_once 'footer.php';
?>