<?php
$db = "host=localhost dbname=tpro_alpha user=tpro password=pw4tPro-DB";
$link = pg_connect($db);
if (!$link) {
    die('接続失敗です。'.pg_last_error());
}

print('接続に成功しました。<br>');


?>
