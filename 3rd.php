<?php
require 'common.php';

$stmt = $db->prepare("SELECT screen_name FROM accounts");
$res = $stmt->execute();
if( $res ) {
    $ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
}
// var_dump($ids);
// exit;
// 日本時間を取得
$unitime = time();
dipslay_datetime($unitime, 'Asia/Tokyo');
function dipslay_datetime($unix_timestamp, $tz){
    date_default_timezone_set($tz);
    $script_tz = date_default_timezone_get();
    $time=date('Y年m月d日 H:i:s', $unix_timestamp);
	
}
$hiduke=date('Y年m月d日 H:i:s', time());
foreach($ids as $id){
   
    $str = @file_get_contents('files/'.$id.'.txt');
    $str = str_replace(array("\r\n", "\r", "\n"), "\n", $str);
    $arr = explode("\n", $str);
    
    
    $stmt = $db->prepare("SELECT twitterid FROM $id");
    $res = $stmt->execute();
    if( $res ) {
        $saved_accounts = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    foreach($arr as $ar){
    if($ar!==""){

        if(!in_array($ar, $saved_accounts)){
            
    
            $stmt = $db->prepare("INSERT INTO $id (
            twitterid,registry_datetime
        ) VALUES (
            :ar,:hiduke
        )");
        
        $stmt->bindParam( ':ar', $ar, PDO::PARAM_STR);
        $stmt->bindParam( ':hiduke', $hiduke, PDO::PARAM_STR);
        
        $res = $stmt->execute();
    }
        }
    }


}