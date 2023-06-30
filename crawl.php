<?php
/* リダイレクトさせたい時は、このように記述します。 */
require_once 'common.php';
$stmt = $db->prepare("SELECT screen_name,id FROM accounts WHERE registry_datetime IS NUll");
		$res = $stmt->execute();
		if( $res ) {
			$ids = $stmt->fetch(PDO::FETCH_ASSOC);
		}
		


        //最後に終了時刻を出力。
$unitime = time();
saigo($unitime, 'Asia/Tokyo');
function saigo($unix_timestamp, $tz){
    date_default_timezone_set($tz);
    $script_tz = date_default_timezone_get();
    $time=date('Y年m月d日 H:i:s', $unix_timestamp);
	
}

$saigo=date('Y年m月d日 H:i:s', time());

$requser=$ids['id'];



    //DB
    $stmt = $db -> prepare("UPDATE accounts SET registry_datetime = :saigo WHERE id = :requser");//登録準備
    $stmt -> bindValue(':saigo', $saigo, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt -> execute();//データベースの登録を実行
    //ここまで

header('Location: https://azurefennec478.sakura.ne.jp/twitter');
exit;
?>