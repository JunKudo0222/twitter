<?php
require 'common.php';
// 日本時間を取得
$unitime = time();
dipslay_datetime($unitime, 'Asia/Tokyo');
function dipslay_datetime($unix_timestamp, $tz){
    date_default_timezone_set($tz);
    $script_tz = date_default_timezone_get();
    $time=date('Y年m月d日 H:i:s', $unix_timestamp);
	
}
$hiduke=date('Y年m月d日 H:i:s', time());

$stmt = $db->prepare("SELECT screen_name,id FROM need_to_like_users WHERE liked_datetime IS NUll");
		$res = $stmt->execute();
		if( $res ) {
			$ids = $stmt->fetch(PDO::FETCH_ASSOC);
		}
        if($ids==false){

            echo '全て完了済んです';
            exit;
        }
        

$requser=$ids['id'];
    $stmt = $db -> prepare("UPDATE need_to_like_users SET liked_datetime = :hiduke WHERE id = :requser");//登録準備
    $stmt -> bindValue(':hiduke', $hiduke, PDO::PARAM_STR);
    $stmt -> bindValue(':requser', $requser, PDO::PARAM_STR);
    $stmt -> execute();