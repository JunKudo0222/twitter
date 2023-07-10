<?php
require 'common.php';

$stmt = $db->prepare("SELECT screen_name FROM accounts");
$res = $stmt->execute();
if( $res ) {
    $ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
}
$array=[];
foreach($ids as $id){

$stmt = $db->prepare("SELECT twitterid,registry_datetime FROM $id");
$res = $stmt->execute();
if( $res ) {
    $newfollowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

foreach($newfollowers as $newfollower){
    
    $event_date=explode(" ",$newfollower['registry_datetime'])[0];
    $event_date = str_replace('日', '', $event_date);  // "日"を空文字に置換する
    $event_date = str_replace('年', '-', $event_date); // "年"を"-"に置換する
    $event_date = str_replace('月', '-', $event_date); // "月"を"-"に置換する
    $event_date = strtotime($event_date);
    echo $event_date."<br>";
    
}
exit;
foreach($newfollowers as $newfollower){
    $array[]=$newfollower;

}
}
$array=array_unique($array);
foreach($array as $arr){
    echo $arr."<br>";

}