<?php
ini_set('display_errors','On');
ini_set('error_reporting',E_ALL & ~E_NOTICE);
ini_set('error_reporting',E_ALL);

$dbuser="azurefennec478";
$dbname="azurefennec478_new";
$dbhost="mysql634.db.sakura.ne.jp";
$dbpassword="Iojk3231";


$dsn = "mysql:dbname=".$dbname.";host=".$dbhost.";charset=utf8";


try {
	$db = new PDO($dsn, $dbuser, $dbpassword);
} catch (PDOException $e) {
	echo 'DB接続エラー!: ' . $e->getMessage();
    echo '<br><a href="index.php">戻る</a>';
    
    
	exit;
}




$stmt = $db->prepare("SELECT screen_name FROM accounts");
		$res = $stmt->execute();
		if( $res ) {
			$ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
foreach($ids as $id){

    echo "'".$id['screen_name']."',<br>";
}
exit;