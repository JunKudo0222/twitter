<?php
$_POST['users']=trim($_POST['users']);
$array = explode("@", $_POST['users']);
$users=[];

foreach($array as $arr){
    if($arr!=""){

        $users[]=trim($arr);
    }
}

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





foreach($users as $user){

    $stmt = $db -> prepare("INSERT INTO need_to_like_users (screen_name,registry_datetime) VALUES(:screen_name,:hiduke)");//登録準備
    $stmt -> bindValue(':screen_name', $user, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt -> bindValue(':hiduke', $hiduke, PDO::PARAM_STR);//登録する文字の型を固定
    $stmt -> execute();//データベースの登録を実行
}


$stmt = $db->prepare("SELECT screen_name,id FROM accounts WHERE registry_datetime IS NUll");
		$res = $stmt->execute();
		if( $res ) {
			$ids = $stmt->fetch(PDO::FETCH_ASSOC);
		}

$requser=$ids['id'];
    $stmt = $db -> prepare("UPDATE accounts SET registry_datetime = :hiduke WHERE id = :requser");//登録準備
    $stmt -> bindValue(':hiduke', $hiduke, PDO::PARAM_STR);
    $stmt -> bindValue(':requser', $requser, PDO::PARAM_STR);
    $stmt -> execute();