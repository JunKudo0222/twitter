<?php
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
    $ids = $stmt->fetchAll(PDO::FETCH_COLUMN);
}

echo count($ids);