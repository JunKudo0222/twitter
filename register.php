<?php
ini_set('error_reporting',E_ALL & ~E_NOTICE);
require_once 'common.php';






// SQL作成
//次にliked_usersのテーブル作成
$sql = 'CREATE TABLE IF NOT EXISTS liked_users (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  screen_name VARCHAR(20),
  registry_datetime VARCHAR(20)
) engine=innodb default charset=utf8';

// SQL実行
$res = $db->query($sql);

//次にneed_to_like_usersのテーブル作成
$sql = 'CREATE TABLE IF NOT EXISTS need_to_like_users (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  screen_name VARCHAR(20),
  tweetid VARCHAR(20),
  registry_datetime VARCHAR(20)
) engine=innodb default charset=utf8';

// SQL実行
$res = $db->query($sql);






$db = NULL;//データベース接続を解除

echo '<br>';
echo '追加が完了しました。';
?>
<br>
<a href="index.php">一覧画面へ戻る</a>
